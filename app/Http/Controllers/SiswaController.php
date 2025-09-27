<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function siswa(){
        $data['sch'] = Scholl::first();
        return view('admin.siswa',$data);
    }
    public function addsis(){
        $data['sch'] = Scholl::first();
        return view('admin.addsis',$data);
    }
}
