<?php

namespace App\Http\Controllers;

use App\Models\PakanGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\PakanController;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PakanGalleryRequest;
use App\Models\Pakan;

class PakanGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pakan $pakan)
    {
         if(request()->ajax()){
            $query = PakanGallery::where('pakans_id', $pakan->id );
            return DataTables::of($query)
                    //Menambah tombol untuk mengedit isi kolom
                    ->addColumn('action', function($item){
                        return '
                            <form class="inline-block bg-grey-500 text-white rounded-md px-2 py-1 m-2" action="'.route('dashboard.gallery.destroy', $item->id).'" method="POST">
                                <button class="bg-red-500 text-white rounded-md px-2 py-1 m-2">
                                    Hapus
                                </button>
                            '.method_field('delete'). csrf_field().' 
                            </form>
                        ';
                    })
                    //menambahkan koma pada kolom price
                    ->editColumn('url', function($item){
                        return '<img style="max-widht:150px" src="'. Storage::url($item->url).'"/>';
                    })
                    ->editColumn('is_featured', function($item){
                        return $item->is_feature ? 'Yes': 'No';
                    })
                    //menambahkan tag url untuk memunculkan gambar 
                    ->rawColumns(['action', 'url'])
                    -> make();
                    
        }
        return view('pages.dashboard.gallery.index', compact('pakan'));
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

    public function hitung(){
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
        //
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
