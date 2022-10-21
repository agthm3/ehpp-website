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
            'pakans_id' => $id
        ]);

        return redirect('cart');
    }

  
  


}