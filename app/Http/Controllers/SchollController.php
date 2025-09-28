<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SchollController extends Controller
{
    //
    public function index(){
        $data['temp'] = Scholl::first();
        return view('home.home', $data);
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function editsch(String $id){
        $id = $this->decryptId($id);

        $data['sch'] = Scholl::first();
        $data['edit'] = Scholl::findOrFail($id);
        return view('admin.edit', $data);
    }
    public function postsch(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'kepsek' => 'required|string|max:40',
            'ft_kepsek' => 'image|required|max:5084',
            'foto' => 'image|required|max:5084',
            'visi_misi' => 'required|string',
        ]);
        $sch = Scholl::find($id);

        if($request->hasFile('ft_kepsek')){
            if(Storage::exists('public/'. $sch->ft_kepsek)){
                Storage::delete('public/'. $sch->ft_kepsek);
            }

            $image = $request->file('ft_kepsek');
            $ftKepsek = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/'.$ftKepsek);
            $validate['ft_kepsek'] = $ftKepsek;
        }
        if($request->hasFile('foto')){
            if(Storage::exists('public/'. $sch->foto)){
                Storage::delete('public/'. $sch->foto);
            }

            $image = $request->file('foto');
            $fotoName = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/'.$fotoName);
            $validate['foto'] = $fotoName;
        }
        $sch->update([
            'kepsek' => $request->kepsek,
            'ft_kepsek' => $ftKepsek,
            'foto' => $fotoName,
            'visi_misi' => $request->visi_misi
        ]);
        return redirect()->route('admin');
    }
}
