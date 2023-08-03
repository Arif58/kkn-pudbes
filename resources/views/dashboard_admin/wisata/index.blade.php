@extends('dashboard_admin.layout')
@section('title', 'Wisata')
@section('content')
    <div class="page-section">
        <div>
            <div>
                <h1>
                    Potensi Wisata
                </h1>
            </div>

            <div class="text-right mb-3">
                <a class="btn btn-primary" href="{{ route('wisata.create') }}">
                    <div>
                        <i class="fa fa-plus-square px-1"></i>
                        <b class="px-1">Tambah</b>
                        {{-- <div class="col-md-auto">
                        </div>
                        <div class="col">
                            
                        </div> --}}
                    </div>
                </a>
            </div>
            <div class="">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Wisata</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Link Maps</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="customtable">
                                @foreach ($tourisms as $data)
                                    <tr class="text-wrap">
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->desc }}</td>
                                        <td>{{ $data->link_maps }}</td>
                                        {{-- @dd($data->images) --}}
                                        <td class="d-flex flex-row mb-3">
                                            <div class="">
                                                <a class="btn btn-warning" href="{{ route('wisata.edit', $data->id) }}"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>

                                            <div class="px-2">
                                                <form action="{{ route('wisata.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onClick="return confirm('Yakin Ingin Hapus Tempat Wisata?')"
                                                        data-bs-toggle="tooltip" data-bs-title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="">
                                                <a class="btn btn-info" data-bs-toggle="tooltip"
                                                    data-bs-title="Lihat Gambar"
                                                    href="{{ route('display.images', $data->id) }}">
                                                    <i class="fa fa-camera"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>



@endsection
