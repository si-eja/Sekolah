<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Scholl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    //operator
    public function galeri(){
        $data['sch'] = Scholl::first();
        $data['glr'] = Galeri::all();
        return view('operator.galeri',$data);
    }
    public function galeriA(){
        $data['sch'] = Scholl::first();
        $data['glr'] = Galeri::all();
        return view('admin.galeri',$data);
    }
    public function addft(){
        $data['sch'] = Scholl::first();
        return view('operator.addft',$data);
    }
    public function addvid(){
        $data['sch'] = Scholl::first();
        return view('operator.addvid',$data);
    }
    public function editGlr(String $id){
        $id = $this->decryptId($id);

        $data['sch'] = Scholl::first();
        $data['glr'] = Galeri::findOrFail($id);
        return view('operator.editGlr',$data);
    }
    private function decryptId($id){
        try{
            return Crypt::decrypt($id);
        }catch(DecryptException $e){
            abort(404);
        }
    }
    public function ftPost(Request $request){
        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'image|required|max:5084',
        ]);
        $image = $request->file('file');
        $ftGaleri = time()."-".$request->name.".".$image->getClientOriginalExtension();
        $image->storeAs('public/galeri/foto/'.$ftGaleri);

        if (!$request->filled('tanggal')) {
            $validate['tanggal'] = date('Y-m-d');
        }

        $validate['file'] = $ftGaleri;
        Galeri::create($validate);

        return redirect()->route('galeri');
    }
    public function vidPost(Request $request){
        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'required|mimes:mp4,avi,mov,wmv|max:204800',
        ]);
        $image = $request->file('file');
        $vidGaleri = time()."-".$request->name.".".$image->getClientOriginalExtension();
        $image->storeAs('public/galeri/video/'.$vidGaleri);

        if (!$request->filled('tanggal')) {
            $validate['tanggal'] = date('Y-m-d');
        }

        $validate['file'] = $vidGaleri;
        Galeri::create($validate);

        return redirect()->route('galeri');
    }
    public function glrDelete(String $id){
        $id = $this->decryptId($id);

        $galeri = Galeri::findOrFail($id);
        $folder = $galeri->kategori === 'Video' ? 'galeri/video' : 'galeri/foto';
        if (Storage::exists('public/galeri/'.$folder.'/'.$galeri->file)) {
            Storage::delete('public/galeri/'.$folder.'/'.$galeri->file);
        }
        $galeri->delete();
        return redirect()->back();
    }
    public function glrUpdate(Request $request, String $id){
        $id = $this->decryptId($id);
        $galeri = Galeri::findOrFail($id);

        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => $galeri->kategori === 'Video'
                    ? 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200' // max 50MB
                    : 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Tentukan folder sesuai kategori
        $folder = $galeri->kategori === 'Video' ? 'galeri/video' : 'galeri/foto';
        $video = Galeri::find($id);

        if ($request->hasFile('file')) {
        // hapus file lama kalau ada
            if (Storage::exists('public/' . $folder . '/' . $galeri->file)) {
                Storage::delete('public/' . $folder . '/' . $galeri->file);
            }

            // simpan file baru
            $file = $request->file('file');
            $namaFile = time() . '-' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                        . '.' . $file->getClientOriginalExtension();

            Storage::makeDirectory('public/' . $folder);
            $file->storeAs('public/' . $folder, $namaFile);

            $validate['file'] = $namaFile;
        }
        $video->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'file' => $validate['file'] ?? $galeri->file,
        ]);
        return redirect()->route('galeri');
    }
    //===
    //admin
    public function editGlrA(String $id){
        $id = $this->decryptId($id);

        $data['sch'] = Scholl::first();
        $data['glr'] = Galeri::findOrFail($id);
        return view('admin.layanan.editGlr',$data);
    }
    public function glrUpdateA(Request $request, String $id){
        $id = $this->decryptId($id);
        $galeri = Galeri::findOrFail($id);

        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => $galeri->kategori === 'Video'
                    ? 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200' // max 50MB
                    : 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Tentukan folder sesuai kategori
        $folder = $galeri->kategori === 'Video' ? 'galeri/video' : 'galeri/foto';
        $video = Galeri::find($id);

        if ($request->hasFile('file')) {
        // hapus file lama kalau ada
            if (Storage::exists('public/' . $folder . '/' . $galeri->file)) {
                Storage::delete('public/' . $folder . '/' . $galeri->file);
            }

            // simpan file baru
            $file = $request->file('file');
            $namaFile = time() . '-' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                        . '.' . $file->getClientOriginalExtension();

            Storage::makeDirectory('public/' . $folder);
            $file->storeAs('public/' . $folder, $namaFile);

            $validate['file'] = $namaFile;
        }
        $video->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'file' => $validate['file'] ?? $galeri->file,
        ]);
        return redirect()->route('galeriA');
    }
    public function addftA(){
        $data['sch'] = Scholl::first();
        return view('admin.layanan.addft',$data);
    }
    public function addvidA(){
        $data['sch'] = Scholl::first();
        return view('admin.layanan.addvid',$data);
    }
    public function ftPostA(Request $request){
        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'image|required|max:5084',
        ]);
        $image = $request->file('file');
        $ftGaleri = time()."-".$request->name.".".$image->getClientOriginalExtension();
        $image->storeAs('public/galeri/foto/'.$ftGaleri);

        if (!$request->filled('tanggal')) {
            $validate['tanggal'] = date('Y-m-d');
        }

        $validate['file'] = $ftGaleri;
        Galeri::create($validate);

        return redirect()->route('galeriA');
    }
    public function vidPostA(Request $request){
        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'required|mimes:mp4,avi,mov,wmv|max:204800',
        ]);
        $image = $request->file('file');
        $vidGaleri = time()."-".$request->name.".".$image->getClientOriginalExtension();
        $image->storeAs('public/galeri/video/'.$vidGaleri);

        if (!$request->filled('tanggal')) {
            $validate['tanggal'] = date('Y-m-d');
        }

        $validate['file'] = $vidGaleri;
        Galeri::create($validate);

        return redirect()->route('galeriA');
    }
}
