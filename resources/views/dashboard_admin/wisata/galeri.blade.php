@extends('dashboard_admin.layout')
@section('content')
    <style>
        .image-preview {

            width: 500px;
            height: 500px;
            /* border: 2px solid #ccc; */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="image-preview">
        <div id="carouselExampleFade" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($images as $image)
                    <div class="carousel-item active">
                        <div>
                            <img src="{{ asset($image->image_url) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="mt-2 text-center">
                            <form action="" method="post">
                                @csrf
                                <button class="btn btn-danger" onClick="return confirm('Yakin Ingin Hapus Tempat Wisata?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
@endsection
