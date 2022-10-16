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
                            <a href="'.route('dashboard.pakan.gallery.index', $item->id) . '"  class="bg-gray-500 text-white rounded-md px-2 py-1 m-2 mr-2"> Gallery </a>
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
    public function store(Request $request)
    {
        $data = $request->all();
       
        $data['slug']= Str::slug($request->name);

        Pakan::create($data);

        // return ($data);
        return redirect()->route('dashboard.pakan.index');
    }

    public function hitung(Request $request){
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
            $query = TransactionItem::with(['product'])->where('transactions_id', $transaction->id);
            return DataTables::of($query)
                    //relasi product price
                    ->editColumn('product.price', function($item){
                        return number_format($item->product->price);
                    })
                    ->rawColumns(['action'])
                    -> make();
        }
         return view('pages.dashboard.pakan.show', compact('pakan'));
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
    public function destroy($id)
    {
        //
    }
}
