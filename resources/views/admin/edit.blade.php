@extends('admin.temp')
@section('admin')
    <div id="foto"
         style="background: url('{{ asset('storage/'.$edit->foto) }}')
            no-repeat center center; 
            background-size: cover; 
            width: 100%; 
            display: flex; 
            justify-content: space-between;
            padding-top: 20%;
            padding-bottom: 15%;">
        <div class="container">
            <h1 style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">
                Kami {{ $sch->nama }}
            </h1><br>
            <h5 class="col-7" style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">{{ $sch->visi_misi }}</h5>
        </div>
    </div>
    <div style="background-color: rgb(253, 244, 227);
            display: flex;
            justify-content: center;
            width: 100%;">
        <div class="container py-4" 
             style="height: fit-content;">
            <form action="{{ route('postsch', Crypt::encrypt($sch->id)) }}" method="post" enctype="multipart/form-data" class="row">
                <div class="col-md-3">
                    <img src="{{ asset('storage/'.$edit->ft_kepsek) }}" 
                    alt="" 
                    class="img-fluid rounded-5 border border-4 border-dark">
                </div>
                <div class="col-md-9">
                    @csrf
                    <label for="kepsek" class="form-label fw-bold ">Kepala sekolah</label>
                    <input type="text" name="kepsek" id="kepsek" class="form-control" value="{{ $edit->kepsek }}">

                    <label for="input_ft_kepsek" class="form-label fw-bold ">Foto Kepala sekolah</label>
                    <input type="file" name="ft_kepsek" id="input_ft_kepsek" class="form-control" 
                        accept="image/*" onchange="previewImage(event, 'preview_ft_kepsek')">

                    <label for="input_foto" class="form-label fw-bold ">Foto sekolah</label>
                    <input type="file" name="foto" id="input_foto" class="form-control"
                        accept="image/*" onchange="previewBackground(event, 'foto')">

                    <label for="vimi" class="form-label fw-bold ">Visi Misi</label>
                    <input type="text" class="form-control" id="vimi" name="visi_misi" value="{{ $edit->visi_misi }}">
                    
                    <label for="deskripsi" class="form-label fw-bold ">Deskripsi</label>
                    <textarea rows="3" name="deskripsi" id="deskripsi" class="form-control">{{ $edit->deskripsi }}</textarea>
                </div>
                <input type="submit" value="Edit" class="btn btn-primary mt-4">
            </form>
        </div>
    </div>
    <script>    
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById(previewId).src = reader.result;
            };
            if (file) reader.readAsDataURL(file);
        }

        function previewBackground(event, previewId) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById(previewId).style.backgroundImage = `url('${reader.result}')`;
            };
            if (file) reader.readAsDataURL(file);
        }
    </script>
@endsection