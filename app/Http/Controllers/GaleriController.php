<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    //
    public function galeri(){
        $data['sch'] = Scholl::first();
        return view('operator.galeri',$data);
    }
}
