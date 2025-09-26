<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function guru(){
        $data['sch'] = Scholl::first();
        return view('admin.guru',$data);
    }
}
