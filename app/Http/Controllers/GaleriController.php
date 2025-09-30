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
    //
    public function galeri(){
        $data['sch'] = Scholl::first();
        $data['foto'] = Galeri::where('kategori', 'Foto')->get();
        $data['video'] = Galeri::where('kategori', 'Video')->get();
        return view('operator.galeri',$data);
    }
    public function addft(){
        $data['sch'] = Scholl::first();
        return view('operator.addft',$data);
    }
    public function editft(String $id){
        $id = $this->decryptId($id);

        $data['sch'] = Scholl::first();
        $data['foto'] = Galeri::findOrFail($id);
        return view('operator.editft',$data);
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
    public function ftUpdate(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'image|required|max:5084',
        ]);
        $foto = Galeri::find($id);

        if($request->hasFile('file')){
            if(Storage::exists('public/galeri/foto/'. $foto->file)){
                Storage::delete('public/galeri/foto/'. $foto->file);
            }

            $image = $request->file('file');
            $ftEdit = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/galeri/foto/'.$ftEdit);
            $validate['file'] = $ftEdit;
        }
        $foto->update($validate);
        return redirect()->route('galeri');
    }
    public function glrDelete(String $id){
        $id = $this->decryptId($id);

        $foto = Galeri::findOrFail($id);
        $foto->delete();
        return redirect()->back();
    }
    public function addvid(){
        $data['sch'] = Scholl::first();
        return view('operator.addvid',$data);
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
    public function editvid(String $id){
        $id = $this->decryptId($id);

        $data['sch'] = Scholl::first();
        $data['video'] = Galeri::findOrFail($id);
        return view('operator.editVid',$data);
    }
    public function vidUpdate(Request $request, String $id){
        $id = $this->decryptId($id);

        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'required|mimes:mp4,avi,mov,wmv|max:204800',
        ]);
        $video = Galeri::find($id);

        if($request->hasFile('file')){
            if(Storage::exists('public/galeri/video/'. $video->file)){
                Storage::delete('public/galeri/video/'. $video->file);
            }

            $image = $request->file('file');
            $vidEdit = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/galeri/video/'.$vidEdit);
            $validate['file'] = $vidEdit;
        }
        $video->update($validate);
        return redirect()->route('galeri');
    }
}
