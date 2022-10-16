<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\cart;
use App\Models\Product;
use App\Models\Pakan;
use App\Models\transaction;
use App\Models\TransactionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;


class FrontendController extends Controller
{
    #return view ke index
    public function index(Request $request){
        $pakans = Pakan::with(['galleries'])->latest()->get();
        return view('pages.frontend.index', compact('pakans'));
    }

    public function details(Request $request, $slug){
        $pakan = Pakan::with(['galleries'])->where('slug', $slug)->firstOrFail();

        return view('dashboard.pakan.show', compact('pakan'));
    }

    public function cartAdd(Request $request, $id){
        Cart::create([
            'users_id' =>Auth::user()->id, 
            'products_id' => $id
        ]);

        return redirect('cart');
    }

    public function cart(Request $request){
        //membentuk relasi
        $carts = Cart::with('product.galleries')->where('users_id', Auth::user()->id)->get();
        return view('pages.frontend.cart', compact('carts'));
    }

    public function cartDelete(Request $request, $id){
        $item = Cart::findOrFail($id);

        $item->delete();
        
        return redirect('cart');
    }

    public function success(Request $request){
        return view('pages.frontend.success');
    }

    public function checkout(CheckoutRequest $request){
        $data = $request->all();

        //get Carts Data
        $carts = Cart::with(['product'])->where('users_id', Auth::user()->id)->get();
        

        //Add to transaction data
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('product.price');

        //Create transaction
        $transaction = Transaction::create($data);

        //Create transaction item
        foreach ($carts as $cart){
            $item[] =  TransactionItem::create([
                'transactions_id' => $transaction->id, 
                'users_id' => $cart->users_id, 
                'products_id' => $cart->products_id
            ]);
        }
        //Delete cart after transaction finish
        cart::where('users_id', Auth::user()->id)->delete();

        //Midtrans configuration
        // ================================================================
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        //Setup variable midtrans 
        $midtrans = [
            'transaction_details' => [
                'order_id' =>'LUX-' . $transaction->id, //LUX-100 (untuk nomor iD)
                'gross_amount' => (int) $transaction->total_price //dipaksa untuk convert ke integer
            ],
            'customer_details' => [
                'first_name' => $transaction->name, 
                'email' => $transaction->email
            ],
            'enabled_payment' =>['gopay', 'bank_transfer'],
            'vtweb' => []
        ];

        //Payment process
            try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            //simpan ke database
            $transaction -> payment_url = $paymentUrl;
            $transaction->save();
            
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            }
            catch (Exception $e) {
            echo $e->getMessage();
            }
        }


}