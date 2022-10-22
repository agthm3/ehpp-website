<?php

namespace App\Http\Controllers;

use App\Models\Mixing;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class DashboardController extends Controller
{
    public function index()
    {
        if (!empty(auth()->user()->records->first()->code)) {
            $record_id = auth()->user()->records->first()->code;
            $mixing = Mixing::firstWhere('code', $record_id);
          
        }
     
        $data['record'] = Record::all();
        
       
        return view('dashboard', $data);
    }
}
