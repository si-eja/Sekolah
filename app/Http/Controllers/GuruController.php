<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Scholl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Nette\Utils\Strings;

class GuruController extends Controller
{
    //
    public function guru(){
        $data['sch'] = Scholl::first();
        $data['guru'] = Guru::all();
        return view('admin.guru',$data);
    }
    public function addgr(){
        $data['sch'] = Scholl::first();
        return view('admin.addgr',$data);
    }
    public function editgr(String $id){
        $id = $this->decryptId($id);
        
        $data['sch'] = Scholl::first();
        $data['guru'] = Guru::findOrFail($id);
        return view('admin.editgr',$data);
    }
    public function grPost(Request $request){
        $validate = $request->validate([
            'nama' => 'required|string|max:40',
            'nip' => 'required|numeric|min:0',
            'mapel' => 'required|string',
            'foto' => 'image|required|max:5084',
        ]);
        $image = $request->file('foto');
        $ftGuru = time()."-".$request->name.".".$image->getClientOriginalExtension();
        $image->storeAs('public/guru/'.$ftGuru);

        $validate['foto'] = $ftGuru;
        Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $ftGuru
        ]);

        return redirect()->route('guru');
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function grUpdate(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'nama' => 'required|string|max:40',
            'nip' => 'required|numeric|min:0',
            'mapel' => 'required|string',
            'foto' => 'image|required|max:5084',
        ]);
        $guru = Guru::find($id);

        if($request->hasFile('foto')){
            if(Storage::exists('public/guru/'. $guru->foto)){
                Storage::delete('public/guru/'. $guru->foto);
            }

            $image = $request->file('foto');
            $ftGuru = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/guru/'.$ftGuru);
            $validate['foto'] = $ftGuru;
        }
        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $ftGuru
        ]);
        return redirect()->route('guru');
    }
    public function grDelete(String $id){
        $id = $this->decryptId($id);

        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->back();
    }
}
