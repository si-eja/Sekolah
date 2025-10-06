<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Guru;
use App\Models\Scholl;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SchollController extends Controller
{
    //
    public function index(){
        $data['temp'] = Scholl::first();
        $data['ekskul'] = Ekskul::all();
        $data['berita'] = Berita::latest()->take(3)->get();
        return view('home.home', $data);
    }
    public function info(String $id){
        $id = $this->decryptId($id);
        
        $data['temp'] = Scholl::first();
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['ekskul'] = Ekskul::all();
        $data['berita'] = Berita::all();
        return view('home.info', $data);
    }
    public function berita(){
        $data['temp'] = Scholl::first();
        $data['berita'] = Berita::all();
        return view('home.berita', $data);
    }
    public function ekskul(){
        $data['temp'] = Scholl::first();
        $data['ekskul'] = Ekskul::all();
        return view('home.ekskul', $data);
    }
    public function eksInfo(String $id){
        $id = $this->decryptId($id);
        
        $data['temp'] = Scholl::first();
        $data['ekskul'] = Ekskul::findOrFail($id);
        return view('home.eksInfo', $data);
    }
    public function brtInfo(String $id){
        $id = $this->decryptId($id);
        
        $data['temp'] = Scholl::first();
        $data['berita'] = Berita::findOrFail($id);
        return view('home.brtInfo', $data);
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
    public function postsch(Request $request, String $id)
    {
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'kepsek' => 'required|string|max:40',
            'ft_kepsek' => 'nullable|image|max:5084',
            'foto' => 'nullable|image|max:5084',
            'visi_misi' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $sch = Scholl::findOrFail($id);

        // default ke data lama
        $ftKepsek = $sch->ft_kepsek;
        $fotoSekolah = $sch->foto;

        // upload foto kepala sekolah
        if ($request->hasFile('ft_kepsek')) {
            if (Storage::exists('public/'.$sch->ft_kepsek)) {
                Storage::delete('public/'.$sch->ft_kepsek);
            }

            $image = $request->file('ft_kepsek');
            $ftKepsek = time().'-kepsek.'.$image->getClientOriginalExtension();
            $image->storeAs('public', $ftKepsek);
        }

        // upload foto sekolah
        if ($request->hasFile('foto')) {
            if (Storage::exists('public/'.$sch->foto)) {
                Storage::delete('public/'.$sch->foto);
            }

            $image = $request->file('foto');
            $fotoSekolah = time().'-sekolah.'.$image->getClientOriginalExtension();
            $image->storeAs('public', $fotoSekolah);
        }

        // update data
        $sch->update([
            'kepsek' => $request->kepsek,
            'ft_kepsek' => $ftKepsek,
            'foto' => $fotoSekolah,
            'visi_misi' => $request->visi_misi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin')->with('success', 'Data sekolah berhasil diperbarui.');
    }
}
