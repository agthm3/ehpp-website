<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mixing;
use App\Models\Pakan;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class MixingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('pakan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function cardAdd(){

        return 'dfjdf';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
    
        Cart::create([
            'users_id' =>Auth::user()->id, 
            'pakans_id' => $id
        ]);

        $carts = Cart::with('product.galleries')->where('users_id', Auth::user()->id)->get();
        // return view('pages.frontend.cart', compact('carts'));
      
        return view('mixing', compact('carts'));

        
    }
    public function cart(Request $request){
        //membentuk relasi
        $carts = Cart::with('product.galleries')->where('users_id', Auth::user()->id)->get();
        return view('pages.frontend.cart', compact('carts'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
