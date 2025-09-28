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
            <h5 style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">
                Mewujudkan peserta didik yang beriman, berkarakter,<br>
                cerdas, dan berdaya saing di era global.
            </h5>
        </div>
    </div>
    <div style="background-color: rgb(253, 244, 227);
            display: flex;
            justify-content: center;
            width: 100%;">
        <div class="container py-4" 
             style="height: fit-content;">
            <h2 class="text-color">
                Kepala sekolah saat ini
            </h2>
            <div class="rounded-5" 
                 style="height: fit-content;
                    width: 100%;
                    background-color: rgb(237, 63, 39);
                    border: 3px solid black;">
                <div class="rounded-top-5 d-flex flex-column justify-content-center py-3 px-5"
                     style="background-color: rgb(19, 70, 134);">
                    <form action="{{ route('postsch', Crypt::encrypt($sch->id)) }}" method="post" enctype="multipart/form-data" class="row">
                        <div class="col-md-2 d-flex justify-content-center mb-3">
                            <img id="ft_kepsek" src="{{ asset('storage/'.$edit->ft_kepsek) }}" alt=""
                                class="rounded-circle" 
                                style="height: 150px; width: 150px;
                                border: 5px solid rgb(254, 178, 26);">
                        </div>
                        <div class="col-md-10">
                            @csrf
                            <label for="kepsek" class="form-label text-style">Kepala sekolah</label>
                            <input type="text" name="kepsek" id="kepsek" class="form-control" value="{{ $edit->kepsek }}">
                            <label for="ft_kepsek" class="form-label text-style">Foto Kepala sekolah</label>
                            <input type="file" name="ft_kepsek" id="ft_kepsek" class="form-control" value="{{ $edit->ft_kepsek }}" accept="image/*" onchange="previewImage(event, 'ft_kepsek')">
                            <label for="foto" class="form-label text-style">Foto sekolah</label>
                            <input type="file" name="foto" id="foto" class="form-control" value="{{ $edit->foto }}" accept="image/*" onchange="previewBackground(event, 'foto')">
                            <label for="vimi" class="form-label text-style">Visi Misi</label>
                            <input type="text" class="form-control" id="vimi" name="visi_misi" value="{{ $edit->visi_misi }}"></input>
                        </div>
                        <input type="submit" value="Edit" class="btn btn-primary mt-4">
                    </form>
                    <script>
                    function previewImage(event, previewId) {
                        const file = event.target.files[0];
                        const reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById(previewId).src = reader.result;
                        };
                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    }

                    function previewBackground(event, previewId) {
                        const file = event.target.files[0];
                        const reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById(previewId).style.backgroundImage = `url('${reader.result}')`;
                        };
                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    }
                    </script>
                </div>
                <div class="px-5">
                    <h4 class="my-3 lonjong hovera"
                        style="color: white; text-shadow: 2px 2px 4px rgb(254, 178, 26); background-color: rgb(237, 63, 39); font-weight: bold;">
                        Lokasi sekolah
                    </h4>
                    <img src="{{ asset('asset/'.$sch->ft_lokasi) }}" alt="" style="width: 100%; margin-bottom: 40px;" class="rounded-4">
                </div>
            </div>
        </div>
    </div>
@endsection