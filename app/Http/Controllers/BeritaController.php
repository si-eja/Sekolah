<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //
    public function berita(){
        $data['sch'] = Scholl::first();
        return view('operator.berita',$data);
    }
}
