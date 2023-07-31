@extends('dashboard_admin.layout')
@section('title', 'Tambah Wisata')
@section('content')
    <div class="content">
        <form method="post" action="{{ route('wisata.update', $tourism->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-50">
                <label for="namaWisata" class="form-label">Nama Wisata</label>
                <input type="text" name="name" class="form-control" value={{ $tourism->name }}>
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Deskripsi Wisata</label>
                <input type="text" name="desc" class="form-control" value="{{ $tourism->desc }}">
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Link Maps</label>
                <input type="text" name="link_maps" class="form-control" value="{{ $tourism->link_maps }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/dashboard/wisata">Batal</a>


        </form>

        {{-- <script>
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
        </script> --}}

    </div>

@endsection
