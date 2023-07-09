@extends('dashboard_admin.layout')
@section('title', 'Wisata')
@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col-md-2 offset-md-9">
                <a class="btn btn-secondary" href="{{ route('wisata.create') }}">
                    <p>Tambah Wisata</p>
                </a>
            </div>
            <div class="col">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Wisata</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Link Maps</th>
                                </tr>
                            </thead>
                            <tbody class="customtable">
                                @foreach ($tourisms as $data)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->desc }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->link_maps }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
