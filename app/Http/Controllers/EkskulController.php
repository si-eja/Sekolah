<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Scholl;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    //
    public function Ekskul(){
        $data['sch'] = Scholl::first();
        $data['ekskul'] = Ekskul::all();
        return view('operator.ekstra',$data);
    }
    public function addEks(){
        $data['sch'] = Scholl::first();
        return view('operator.addeks',$data);
    }
    public function editEks(String $id){
        $id = $this->decryptId($id);
        
        $data['sch'] = Scholl::first();
        $data['ekskul'] = Ekskul::findOrFail($id);
        return view('operator.editeks',$data);
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function eksPost(Request $request){
        $validate = $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal' => 'required|string|max:40',
            'deksripsi' => 'required|string',
            'gambar' => 'image|required|max:5084',
        ]);
        $image = $request->file('gambar');
        $ftEkskul = time()."-".$request->name.".".$image->getClientOriginalExtension();
        $image->storeAs('public/ekskul/'.$ftEkskul);

        $validate['gambar'] = $ftEkskul;
        Ekskul::create($validate);

        return redirect()->route('ekskul');
    }
    public function eksUpdate(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal' => 'required|string|max:40',
            'deksripsi' => 'required|string',
            'gambar' => 'image|required|max:5084',
        ]);
        $guru = Ekskul::find($id);

        if($request->hasFile('gambar')){
            if(Storage::exists('public/ekskul/'. $guru->foto)){
                Storage::delete('public/ekskul/'. $guru->foto);
            }

            $image = $request->file('gambar');
            $ftEkskul = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/ekskul/'.$ftEkskul);
            $validate['gambar'] = $ftEkskul;
        }
        $guru->update($validate);
        return redirect()->route('ekskul');
    }
    public function eksDelete(String $id){
        $id = $this->decryptId($id);

        $ekskul = Ekskul::findOrFail($id);
        $ekskul->delete();
        return redirect()->back();
    }
}
