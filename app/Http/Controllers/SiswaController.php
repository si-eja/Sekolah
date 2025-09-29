<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    //
    public function siswa(){
        $data['sch'] = Scholl::first();
        $data['siswa'] = Siswa::all();
        return view('admin.siswa',$data);
    }
    public function addsis(){
        $data['sch'] = Scholl::first();
        return view('admin.addsis',$data);
    }
    public function editsis(String $id){
        $id = $this->decryptId($id);
        
        $data['sch'] = Scholl::first();
        $data['siswa'] = Siswa::findOrFail($id);
        return view('admin.editsis',$data);
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function sisPost(Request $request){
        $validate = $request->validate([
            'nisn' => 'required|numeric',
            'nama' => 'required|string|max:40',
            'jenis_kelamin' => 'required|string',
            'thn_masuk' => 'required',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'thn_masuk' => $request->thn_masuk
        ]);

        return redirect()->route('siswa');
    }
    public function sisUpdate(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'nisn' => 'required|numeric',
            'nama' => 'required|string|max:40',
            'jenis_kelamin' => 'required|string',
            'thn_masuk' => 'required',
        ]);
        $siswa = Siswa::find($id);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'thn_masuk' => $request->thn_masuk
        ]);
        return redirect()->route('siswa');
    }
    public function sisDelete(String $id){
        $id = $this->decryptId($id);

        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->back();
    }
}
