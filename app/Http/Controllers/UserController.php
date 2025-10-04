<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Scholl;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    public function index(){
        $data['sch'] = Scholl::first();
        $data['berita'] = Berita::all();
        $data['ekskul'] = Ekskul::all();
        $data['galeri'] = Galeri::all();
        $data['siswa'] = Siswa::all();
        $data['guru'] = Guru::all();
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
    public function user(){
        $data['sch'] = Scholl::first();
        $data['user'] = User::all();
        return view('admin.user',$data);
    }
    public function adduser(){
        $data['sch'] = Scholl::first();
        return view('admin.addusr',$data);
    }
    public function edituser(String  $id){
        $id = $this->decryptId($id);
        
        $data['sch'] = Scholl::first();
        $data['user'] = User::findOrFail($id);
        return view('admin.editusr',$data);
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function userPost(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:40',
            'username' => 'required|string',
            'role' => 'required|string',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user');
    }
    public function userUpdate(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'name' => 'required|string|max:40',
            'username' => 'required|string',
            'role' => 'required|string',
            'password' => 'password|nullable',
        ]);
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;

        // Cek apakah password diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // hanya update jika diisi
        }

        $user->save();
        return redirect()->route('user');
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
    public function userDelete(String $id){
        $id = $this->decryptId($id);

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
