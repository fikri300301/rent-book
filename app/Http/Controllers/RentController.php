<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rent_log;

class RentController extends Controller
{
    public function index(){

        $rents = rent_log::all();
        return view('rentlog',[
            'rentlogs' => $rents
        ]);
    }
}