<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mixing;
use App\Models\Pakan;
use App\Models\cart;
use App\Models\totalPerPakan;
use App\Models\totalSemuaPakan;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MixingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->carts->first()->pakan);  
        if(request()->ajax()){
            $query = Pakan::query();
            return DataTables::of($query)
                    //Menambah tombol untuk mengedit isi kolom
                    ->addColumn('action', function($item){
                        return ' s
                          <a href="'.route('dashboard.product.gallery.index', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Gallery </a>
                            <a href="'.route('dashboard.product.gallery.index', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Gallery </a>
                            <a href="'.route('dashboard.product.edit', $item->id) . '" class="bg-green-500 text-white rounded-md px-2 py-1 m-2"s> Edit </a>
                            <form class="inline-block bg-grey-500 text-white rounded-md px-2 py-1 m-2" action="'.route('dashboard.product.destroy', $item->id).'" method="POST">
                                <button class="bg-red-500 text-white rounded-md px-2 py-1 m-2">
                                    Hapus
                                </button>
                            '.method_field('delete'). csrf_field().' 
                            </form>
                        
                        ';
                    })
                    //menambahkan koma pada kolom price
                    ->editColumn('price', function($item){
                        return number_format($item->price);
                    })
                    ->rawColumns(['action'])
                    -> make();
        }
        return view('pages.dashboard.mixing.index');
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
    public function store()
    {
    
   
     $user_id = auth()->user()->id;
   
    $glemak = [];
   
    function hitungMixing($value1){
        $gprotein = [];
        $mixingkg =[];
        $cart = auth()->user()->carts;
        
        foreach ($cart as $key) {
        $protein = $key->pakan->$value1;
        $mixing = $key->pakan->mixing;
        
        array_push($gprotein, $protein);
        array_push($mixingkg, $mixing);

       
    }
        $protein_total = array_sum($gprotein);
        $mixing_total = array_sum($mixingkg);
        $protein_mixing = ($protein_total/$mixing_total) *100;

        return $protein_mixing;
    }

    $hasilProtein = hitungMixing('gprotein');
    $hasilLemak = hitungMixing('glemak');
    $hasilKasar = hitungMixing('gkasar');
    $hasilEnergi = hitungMixing('genergi');
    $hasilCa = hitungMixing('gca');
    $hasilP = hitungMixing('gp');

    $data = [
        $hasilProtein,
        $hasilLemak,
        $hasilKasar, 
        $hasilEnergi, 
        $hasilCa, 
        $hasilP
    ];

    //Mengambil total harga
  
    $cart = auth()->user()->carts;
        $totalPerPakan = [];
        $apel = [];
        foreach ($cart as $key) {
        $harga = $key->pakan->price;
        
        $hasil = $harga * $harga ;
        $data2 = [
        'user_id'=> $user_id,
          'pakan_id' => $key->pakan->id,
          'total_harga'=> $hasil  
        ];
        array_push($totalPerPakan, $data2);
        array_push($apel, $hasil);
    }
    
    $apel = array_sum($apel);
   
    $all = [
        'user_id' => $user_id,
        'protein' => $hasilProtein,
        'lemak' => $hasilLemak, 
        'kasar' => $hasilKasar, 
        'energi' => $hasilEnergi, 
        'ca' => $hasilCa, 
        'p' => $hasilP,
    ];

    $totalPerPakan = $totalPerPakan;
    $totalHarga = [
        'user_id'=>$user_id,
        'total_harga' => $apel
    ] ;
    
   

    Mixing::create($all);
    foreach ($totalPerPakan as $item) {
        totalPerPakan::create($item);
    }
  
    totalSemuaPakan::create($totalHarga);

    Cart::where('user_id', $user_id)->delete();


    return redirect(url('dashboard/pakan'));
  


   
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
