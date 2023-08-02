@extends('dashboard_admin.layout')
@section('content')
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 300px;
            /* Set the height of the container to center the image vertically */
        }

        /* Apply the hover effect to the images */
        .card {
            position: relative;
        }

        .card:hover .delete-icon {
            opacity: 1;
        }

        /* Style the delete icon */

        .delete-icon {
            position: absolute;
            font-size: 24px;
            color: red;
            background-color: white;
            border-radius: 50%;
            padding: 4px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }
    </style>
    <div>
        <div class="pt-1">
            <h1>{{ $tourism->name }}</h1>
        </div>
        <div class="my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Foto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('image.add', $tourism->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Foto</h1>
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 w-50">
                                    <label for="image" class="form-label">Upload Foto</label>
                                    <p id="error-message" style="color: red;"></p>
                                    <input type="file" id="image" name="image[]" accept="image/*" maxlength="2097152"
                                        class="form-control d-block  @error('image') is-invalid @enderror" multiple>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($images->isEmpty())
            <div class="text-center pt-5">
                <i class="fa fa-file" style="font-size: 100px;"></i>
                <h6>Empty Image</h6>
            </div>
        @else
            {{-- <div class="text-center" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                <div id="carouselExampleFade" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($images as $image)
                            <div class="carousel-item active">
                                <div>
                                    <img src="{{ asset($image->image_url) }}" class=" justify-content-center"
                                        style="width: 300px; height: 300px;" alt="...">
                                </div>
                                <div class="mt-2 text-center">
                                    <form action="{{ route('image.destroy', $image->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger"
                                            onClick="return confirm('Yakin Ingin Hapus Tempat Wisata?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div> --}}
            <div class="row">
                @forelse ($images as $image)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="image-container">
                                <img src="{{ asset($image->image_url) }}" class="card-img-top"
                                    style="height: 300px; width:300px;" alt="Image">
                                <div class="delete-icon">
                                    <form
                                        action="{{ route('image.destroy', ['tourism_id' => $tourism->id, 'id' => $image->id]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn" onClick="return confirm('Yakin Ingin Hapus Tempat Wisata?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No images found.</p>
                @endforelse
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').on('change', function() {
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                const errorMessage = $('#error-message');
                errorMessage.text('');

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
            });
        });
    </script>

@endsection
