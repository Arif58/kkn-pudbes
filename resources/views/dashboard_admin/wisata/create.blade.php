@extends('dashboard_admin.layout')
@section('title', 'Tambah Wisata')
@section('content')
    <div class="content">
        <form method="post" action="{{ route('wisata.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-50">
                <label for="namaWisata" class="form-label">Nama Wisata</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Deskripsi Wisata</label>
                <textarea name="desc" class="form-control" rows="10" required></textarea>
            </div>

            <div class="mb-3 w-50">
                <label for="desc" class="form-label">Link Maps</label>
                <input type="text" name="link_maps" class="form-control">
            </div>

            <div class="mb-3 w-50">
                <label for="image" class="form-label">Upload Foto</label>
                <div id="previewContainer"></div>
                <p id="error-message" style="color: red;"></p>
                <input type="file" id="image" name="image[]" accept="image/*" maxlength="2097152"
                    class="form-control d-block @error('image') is-invalid @enderror" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/dashboard/wisata">Batal</a>


        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // document.getElementById("image").addEventListener("change", function(event) {
        //     const previewContainer = document.getElementById("previewContainer");
        //     previewContainer.innerHTML = ""; // Clear previous previews

        //     const files = event.target.files;

        //     for (let i = 0; i < files.length; i++) {
        //         const file = files[i];

        //         // Ensure the file is an image
        //         if (!file.type.match("image.*")) {
        //             continue;
        //         }

        //         const reader = new FileReader();

        //         reader.onload = function(e) {
        //             const imagePreview = document.createElement("img");
        //             imagePreview.style.width = "180px";
        //             imagePreview.style.height = "200px";
        //             imagePreview.style.margin = "10px";
        //             imagePreview.src = e.target.result;
        //             imagePreview.classList.add("preview-image");
        //             previewContainer.appendChild(imagePreview);
        //         };

        //         reader.readAsDataURL(file);
        //     }
        // });

        $(document).ready(function() {
            $('#image').on('change', function() {
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                const errorMessage = $('#error-message');
                errorMessage.text('');

                const previewContainer = document.getElementById("previewContainer");
                previewContainer.innerHTML = "";

                const files = this.files;
                let invalidFiles = [];

                for (let i = 0; i < files.length; i++) {
                    if (files[i].size > maxSize) {
                        invalidFiles.push(files[i].name);
                    }
                }

                if (invalidFiles.length > 0) {
                    errorMessage.text(
                        'Salah satu foto memiliki ukuran lebih dari 2MB, Silahkan gunakan foto yang lain atau compres foto: ' +
                        invalidFiles.join(
                            ', '));
                    $(this).val(''); // Clear the selected files
                }

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
        });
    </script>

@endsection
