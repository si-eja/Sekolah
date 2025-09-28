<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use App\Models\Siswa;
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
    public function editsis(){
        $data['sch'] = Scholl::first();
        // $data['siswa'] = Siswa::findOrFail();
        return view('admin.editsis',$data);
    }
}
