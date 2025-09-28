<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Scholl;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function guru(){
        $data['sch'] = Scholl::first();
        return view('admin.guru',$data);
    }
    public function addgr(){
        $data['sch'] = Scholl::first();
        return view('admin.addgr',$data);
    }
    public function editgr(){
        $data['sch'] = Scholl::first();
        // $data['guru'] = Guru::findOrFail();
        return view('admin.editgr',$data);
    }
}
