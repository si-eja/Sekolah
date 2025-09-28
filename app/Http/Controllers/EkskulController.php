<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    //
    public function Ekskul(){
        $data['sch'] = Scholl::first();
        return view('operator.ekstra',$data);
    }
}
