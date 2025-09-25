<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;

class SchollController extends Controller
{
    //
    public function index(){
        $data['temp'] = Scholl::first();
        return view('home.home', $data);
    }
    public function temp(){
        $data['temp'] = Scholl::first();
        return view('home.home', $data);
    }
}
