@extends('dashboard_admin.layout')
@section('title', 'Tambah Wisata')
@section('content')
    <div class="content">
        <form method="post" action="{{ route('wisata.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-50">
                <label for="namaWisata" class="form-label">Nama Wisata</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Deskripsi Wisata</label>
                <input type="text" name="desc" class="form-control">
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Link Maps</label>
                <input type="text" name="link_maps" class="form-control">
            </div>

            <div class="mb-3 w-50">
                <label for="image" class="form-label">Upload Foto</label>
                <img class="img-preview img-fluid mb-3 mx-auto">
                <input type="file" id="image" name="image"
                    class="form-control d-block @error('image') is-invalid @enderror" onchange="previewImage()" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/dashboard/wisata">Batal</a>
        </form>
        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = "block";
                imgPreview.style.height = "200px";
                imgPreview.style.width = "180px";

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    </div>

@endsection
