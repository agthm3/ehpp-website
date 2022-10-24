<?php

namespace App\Http\Controllers;

use App\Models\Mixing;
use App\Models\Record;
use App\Models\totalPerPakan;
use App\Models\totalSemuaPakan;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function print($code){
              $mixing=  Mixing::firstWhere('code', $code);
       $total_per_pakan = totalPerPakan::where('code', $code)->get();
       $total_semua_pakan = totalSemuaPakan::firstWhere('code', $code);
             $record_id = auth()->user()->records->first()->code;
            $mixing = Mixing::firstWhere('code', $record_id);

       $data = [
        'mixing' => $mixing,
        'total_per_pakan' => $total_per_pakan,
        'total_semua_pakan' => $total_semua_pakan,
        'record' => $record_id
       ];

        return view('pages.dashboard.print.show', $data);
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
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
