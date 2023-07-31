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
                <label for="desc" class="form-label">Link Maps</label>
                <input type="text" name="link_maps" class="form-control">
            </div>

            <div class="mb-3 w-50">
                <label for="image" class="form-label">Upload Foto</label>
                <div id="previewContainer"></div>
                {{-- <img class="img-preview img-fluid mb-3 mx-auto" id="previewContainer"> --}}
                <input type="file" id="image" name="image[]"
                    class="form-control d-block @error('image') is-invalid @enderror" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/dashboard/wisata">Batal</a>


        </form>
        {{-- <script>
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
        </script> --}}
        <script>
            document.getElementById("image").addEventListener("change", function(event) {
                const previewContainer = document.getElementById("previewContainer");
                previewContainer.innerHTML = ""; // Clear previous previews

                const files = event.target.files;

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // Ensure the file is an image
                    if (!file.type.match("image.*")) {
                        continue;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imagePreview = document.createElement("img");
                        imagePreview.style.width = "180px";
                        imagePreview.style.height = "200px";
                        imagePreview.style.margin = "10px";
                        imagePreview.src = e.target.result;
                        imagePreview.classList.add("preview-image");
                        previewContainer.appendChild(imagePreview);
                    };

                    reader.readAsDataURL(file);
                }
            });
        </script>

    </div>

@endsection
