<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $data['sch'] = Scholl::first();
        return view('admin.dash',$data);
    }
    public function operator(){
        $data['sch'] = Scholl::first();
        return view('operator.dash',$data);
    }
    
    public function login(){
        $data['sch'] = Scholl::first();
        return view('login',$data);
    }
    public function auth(Request $request){
        if (Auth::attempt([
            'username'=> $request->username,
            'password'=> $request->password
        ])) {
            $user = Auth::user();
            if ($user->role == 'admin'){
                return redirect()->route('admin')->with('success','Login Success');
            }else if ($user->role == 'operator'){
                return redirect()->route('operator')->with('success','Login Success');
            }else{
                Auth::logout();
                return redirect()->route('login')->with('error','Please Login Again');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
