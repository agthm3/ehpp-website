<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class DashboardController extends Controller
{
    public function index()
    {
         if(request()->ajax()){
            $query = transaction::query();
            return DataTables::of($query)
                    //Menambah tombol untuk mengedit isi kolom
                    ->addColumn('action', function($item){
                        return '
                            <a href="'.route('dashboard.transaction.show', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Cetak </a>
                            <a href="'.route('dashboard.transaction.show', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Show </a>
                            <a href="'.route('dashboard.transaction.show', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Edit </a>
                        ';
                    })
                    //menambahkan koma pada kolom price
                    ->editColumn('total_price', function($item){
                        return number_format($item->total_price);
                    })
                    ->rawColumns(['action'])
                    -> make();
        }
        return view('dashboard');
    }
}
