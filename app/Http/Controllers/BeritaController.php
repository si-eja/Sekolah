<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Scholl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    //opeator
    public function berita(){
        $data['sch'] = Scholl::first();
        $data['berita'] = Berita::all();
        return view('operator.berita',$data);
    }
    public function addbrt(){
        $data['sch'] = Scholl::first();
        return view('operator.addbrt',$data);
    }
    public function editbrt(String $id){
        $id = $this->decryptId($id);
        
        $data['sch'] = Scholl::first();
        $data['berita'] = Berita::findOrFail($id);
        return view('operator.editbrt',$data);
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function brtPost(Request $request){
        $validate = $request->validate([
        'judul'   => 'required|string',
        'isi'     => 'required|string',
        'tanggal' => 'nullable|date',
        'gambar'  => 'required|image|max:5084',
        ]);

        // Simpan gambar
        $image = $request->file('gambar');
        $brtGambar = time() . '-' . $request->judul . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/berita/', $brtGambar);

        // Kalau tanggal kosong, isi otomatis tanggal hari ini
        if (!$request->filled('tanggal')) {
            $validate['tanggal'] = date('Y-m-d');
        }

        // Tambahkan nama file gambar ke data yang akan disimpan
        $validate['gambar'] = $brtGambar;

        // Tambahkan id user dari Auth
        $validate['id_user'] = Auth::id();

        // Simpan ke database
        Berita::create($validate);

        return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan!');
    }
    public function brtUpdate(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $berita = Berita::findOrFail($id);

        $validate = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:5084',
        ]);

        // 🔸 Kalau user upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar && Storage::exists('public/berita/' . $berita->gambar)) {
                Storage::delete('public/berita/' . $berita->gambar);
            }

            // Simpan gambar baru
            $image = $request->file('gambar');
            $brtGambar = time() . '-' . $request->judul . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/berita', $brtGambar);

            $validate['gambar'] = $brtGambar;
        } else {
            // Tetap pakai gambar lama
            $validate['gambar'] = $berita->gambar;
        }

        // Update berita
        $berita->update([
            'judul' => $validate['judul'],
            'isi' => $validate['isi'],
            'tanggal' => $validate['tanggal'],
            'gambar' => $validate['gambar'],
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('berita');
    }
    public function brtDelete(String $id){
        $id = $this->decryptId($id);

        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->back();
    }
    //admin
    public function addbrtA(){
        $data['sch'] = Scholl::first();
        return view('admin.layanan.addbrt',$data);
    }
    public function beritaA(){
        $data['sch'] = Scholl::first();
        $data['berita'] = Berita::all();
        return view('admin.berita',$data);
    }
    public function brtPostA(Request $request){
        $validate = $request->validate([
        'judul'   => 'required|string',
        'isi'     => 'required|string',
        'tanggal' => 'nullable|date',
        'gambar'  => 'required|image|max:5084',
        ]);

        // Simpan gambar
        $image = $request->file('gambar');
        $brtGambar = time() . '-' . $request->judul . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/berita/', $brtGambar);

        // Kalau tanggal kosong, isi otomatis tanggal hari ini
        if (!$request->filled('tanggal')) {
            $validate['tanggal'] = date('Y-m-d');
        }

        // Tambahkan nama file gambar ke data yang akan disimpan
        $validate['gambar'] = $brtGambar;

        // Tambahkan id user dari Auth
        $validate['id_user'] = Auth::id();

        // Simpan ke database
        Berita::create($validate);

        return redirect()->route('beritaA')->with('success', 'Berita berhasil ditambahkan!');
    }
    public function brtUpdateA(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $berita = Berita::findOrFail($id);

        $validate = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:5084',
        ]);

        // 🔸 Kalau user upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar && Storage::exists('public/berita/' . $berita->gambar)) {
                Storage::delete('public/berita/' . $berita->gambar);
            }

            // Simpan gambar baru
            $image = $request->file('gambar');
            $brtGambar = time() . '-' . $request->judul . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/berita', $brtGambar);

            $validate['gambar'] = $brtGambar;
        } else {
            // Tetap pakai gambar lama
            $validate['gambar'] = $berita->gambar;
        }

        // Update berita
        $berita->update([
            'judul' => $validate['judul'],
            'isi' => $validate['isi'],
            'tanggal' => $validate['tanggal'],
            'gambar' => $validate['gambar'],
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('beritaA');
    }
    public function editbrtA(String $id){
        $id = $this->decryptId($id);
        
        $data['sch'] = Scholl::first();
        $data['berita'] = Berita::findOrFail($id);
        return view('admin.layanan.editbrt',$data);
    }
}
