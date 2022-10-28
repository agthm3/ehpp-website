<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PakanRequest;
use App\Models\Pakan;
use Yajra\DataTables\DataTables;

class PakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        if(request()->ajax()){
            $query = Pakan::query();
            return DataTables::of($query)
                    //Menambah tombol untuk mengedit isi kolom
                    ->addColumn('action', function($item){
                        return ' 
                          <a href="'.route('dashboard.pakan.show', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Detail </a>
                            <a href="'.route('dashboard.pakan.edit', $item->id) . '" class="bg-green-500 text-white rounded-md px-2 py-1 m-2"s> Edit </a>
                            <form class="inline-block bg-grey-500 text-white rounded-md px-2 py-1 m-2" action="'.route('dashboard.pakan.destroy', $item->id).'" method="POST">
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
 
        return view('pages.dashboard.pakan.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages.dashboard.pakan.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pakan $pakan)
    {

    
        //      $data =$request->validate([
        //     'lemak'=> 'required |numeric',
        //     'protein' => 'required |numeric',
        //     'serat' =>'required |numeric',
        //     'energi' =>'required |numeric',
        //     'name' =>'required |string',
        //     'ca' =>'required |numeric',
        //     'p' =>'required |numeric',
        //     'price' => 'required |numeric',
        //     'description' => 'string'
    
        // ]);
            $data = new Pakan;
        $protein = $request->protein;
        $lemak = $request->lemak;
        $serat = $request->serat;
        $energi = $request->energi;
      
        $ca = $request->ca;
        $p = $request->p;
        $mixing = $request->mixing;
        $gprotein = (( $protein * $mixing)/10000)*100;
        $glemak = (( $lemak * $mixing)/10000)*100;
        $gserat = (( $serat * $mixing)/10000)*100;
        $genergi = ( $energi * $mixing)/100;
        $gca = (($ca * $mixing)/10000)*100;
        $gp = (( $p * $mixing)/10000)*100;
        
        $data['slug']= Str::slug($request->name);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->protein = $request->protein;
        $data->lemak = $request->lemak;
        $data->serat = $request->serat;
        $data->energi = $request->energi;
        $data->ca = $request->ca;
        $data->p = $request->p;
        $data-> mixing = $request->mixing;
        
       
     

        $data->gprotein = $gprotein;
        $data->glemak = $glemak;
        $data->gkasar = $gserat;
        $data->genergi = $genergi;
        $data->gca = $gca;
        $data->gp = $gp;
        


        $data->save();
        // return ($data);
        return redirect()->route('dashboard.pakan.index');
    }

    public function hitung(Request $request, Pakan $pakan){
        return 'flkjasd';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pakan $pakan)
    {
                 if(request()->ajax()){
        
            return DataTables::of($query)
                    //relasi product price
                    ->editColumn('pakan.price', function($item){
                        return number_format($item->pakan->price);
                    })
                    ->rawColumns(['action'])
                    -> make();
        }
         return view('pages.dashboard.pakan.show', [
            'pakan' => $pakan, 
            'item' => $pakan,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pakan $pakan)
    {
        return view('pages.dashboard.pakan.edit', [
            'item' => $pakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pakan $pakan)
    {
        $data = $request->all();
        $data['slug']= Str::slug($request->name);

        $pakan->update($data);

        return redirect()->route('dashboard.pakan.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pakan $pakan)
    {
          $pakan->delete();

        return redirect()->route('dashboard.pakan.index');
    }
}
