<?php

namespace App\Http\Controllers;

use App\Models\hpp;
use App\Models\hpprecord;
use App\Models\Record;
use App\Models\totalSemuaPakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $data['hpp_record'] = hpprecord::where('code', $id)->get();
       $datas['hpp'] = hpp::where('code', $id)->get();

       return view('pages.dashboard.hpp.show',$data, $datas);
    }

    /**;
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'bangunan'=> 'required |numeric',
            'pulet' => 'required |numeric',
            'afkir' =>'required |numeric',
            'deplesi' =>'required |numeric',
            'produksi' =>'required |numeric',
            'tenaga' =>'required |numeric',
            'ovk' =>'required |numeric',
            'pln' => 'required |numeric',
    
        ]);
        $hargapulet = $request->pulet * 25;
        $afkir_per_ekor = $request->afkir/12;
        $deplesi_harga = $afkir_per_ekor * 0.01*(100-($request->deplesi));
        $total_biaya_ayam = ($hargapulet-$deplesi_harga)/ $request->produksi;

        $total_harga = totalSemuaPakan::firstWhere('code', $request->pakan)->total_harga;
        // $total_harga = 6708;

        $biaya_pakan = ($total_harga/100) * 2.5;
        $biaya_pakan_per_rak = $biaya_pakan * 1.8;

        $tenaga_kerja_per_rak = $request->tenaga * 1.8;
        $tenaga_kerja_ekor_per_bulan = ($request->tenaga * $request->produksi)/16;
        $ovk_per_rak = $request->ovk*1.8;
        $ovk_ekor_per_bulan = ($request->ovk * $request->produksi)/16;
        $pln_per_rak = $request->pln * 1.8;
        $pln_ekor_per_bulan = ($request->pln * $request->produksi)/16;

        $hpp = $request->bangunan + $total_biaya_ayam + $biaya_pakan + $request->tenaga + $request->ovk + $request->pln;
        
        $record_id = time().'HPP';
        $user_id = auth()->user()->id;

        $result = [
            'code' => $record_id,
            'user_id' => $user_id,
            'hargapulet' => $hargapulet,
            'afkir_per_ekor' => $afkir_per_ekor,
            'deplesi_harga' => $deplesi_harga, 
            'total_biaya_ayam' => $total_biaya_ayam, 
            'total_harga' => $total_harga,
            'biaya_pakan' => $biaya_pakan, 
            'biaya_pakan_per_rak' => $biaya_pakan_per_rak,
            'tenaga_kerja_per_rak' => $tenaga_kerja_per_rak,
            'tenaga_kerja_ekor_per_bulan' => $tenaga_kerja_ekor_per_bulan, 
            'ovk_per_rak'=> $ovk_per_rak, 
            'ovk_ekor_per_bulan' => $ovk_ekor_per_bulan, 
            'pln_per_rak' => $pln_per_rak,
            'pln_ekor_per_bulan' => $pln_ekor_per_bulan,
            'hpp' => $hpp 
        ];
  
        $result2 = new hpp;

        $result2->bangunan = $request->bangunan;
        $result2->bangunan = $request->bangunan;
        $result2->pulet = $request->pulet;
        $result2->afkir = $request->afkir;
        $result2->deplesi = $request->deplesi;
        $result2->produksi = $request->produksi;
        $result2->tenaga = $request->tenaga;
        $result2->ovk = $request->ovk;
        $result2->pln = $request->pln;
        $result2->user_id = $user_id;
        $result2->code = $record_id;

        // $result2 = [
        //     'code'=> $record_id,
        //     'user_id' => $user_id, 
        //     'bangunan ' => $bangunan, 
        //     'pulet ' => $pulet, 
        //     'afkir ' => $afkir, 
        //     'deplesi ' => $deplesi, 
        //     'produksi ' => $produksi, 
        //     'tenaga ' => $tenaga, 
        //     'ovk ' => $ovk, 
        //     'pln ' => $pln, 
        // ];
    $result2->save();
        // hpp::create($result2);
      hpprecord::create($result);
      Record::create([
        'code' => $record_id,
        'user_id'=> $user_id,
        'name' =>'HPPRECORD'
      ]);
       
      return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hpp  $hpp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $record_id=$request->id;
        $data['hpp']= hpprecord::firstWhere('code', $record_id);
        
        return view('pages.dashboard.hpp.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hpp  $hpp
     * @return \Illuminate\Http\Response
     */
    public function edit(hpp $hpp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hpp  $hpp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hpp $hpp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hpp  $hpp
     * @return \Illuminate\Http\Response
     */
    public function destroy(hpp $hpp)
    {
        //
    }
}
