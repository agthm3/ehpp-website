<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Notification;
use Midtrans\Config;
use Midtrans\Transaction;

class MidtransController extends Controller
{
    public function callback(){
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


        //membuat instance midtrans notification
        $notification = new Notification();


        //Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;


        //Transaction ID (LUX-XXX) untuk update status
        //dipecahkan stingnya menjadi array, untuk hanya mengambil angkanya saja
        $order = explode('-', $order_id);

        //Cari transaksi berdsasarkan ID
        $transaction = Transaction::findOrFail($order[1]);

        //Handle notification status midtrans
        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if($status == 'sattlement'){
            $transaction-> status = 'SUCCESS';
        }
        else if($status == 'pending'){
            $transaction-> status = 'PENDING';
        }
        else if($status == 'deny'){
            $transaction-> status = 'PENDING';
        }
            else if($status == 'expire'){
            $transaction-> status = 'CANCELLED';
        }
        else if($status == 'cancel'){
            $transaction-> status = 'CANCELLED';
        }




        //Simpan transaksi 
        $transaction-> save();

        //Return response midtrans
        return response()->json([
            'meta' => [
                'code' => 200, 
                'message' => 'Midtrans Notification Success!'
            ]
        ]);

        // Sumber https://github.com/Midtrans/midtrans-php
    }
}
