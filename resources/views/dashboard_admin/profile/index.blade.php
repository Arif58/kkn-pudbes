@extends('dashboard_admin.layout')
@section('title', 'Profile')
@section('content')
    <div class="content">
        <style>
            .break-line {
                white-space: pre-line;
            }

            textarea {
                resize: none;
                /* overflow: hidden; */
                font-size: 16px;
                height: 300px;
                width: 100%;
                border: none;
                background-color: white;
            }
        </style>

        <div class="page-section" id="profil">
            <h1>PROFIL KECAMATAN PUDING BESAR</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Profil Singkat</h6>
                        </div>
                        <div class="justify-content-end">
                            <div class="btn-edit-desc">
                                <a class="btn btn-warning">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('desc.update', $profile->id) }}" method="post">
                        @csrf
                        <div>
                            <textarea type="text" class="" name="desc" id="input-desc" disabled>{{ $profile->desc }}</textarea>
                            <div style="display: none;" class="row mt-3" id="btn-desc">
                                <div class="col col-sm-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                                <div class="col col-sm-auto">
                                    <a href="/dashboard/profile" class="btn btn-danger">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Sejarah</h6>
                        </div>
                        <div class="justify-content-end">
                            <div class="btn-edit-history">
                                <a class="btn btn-warning">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('history.update', $profile->id) }}" method="post">
                        @csrf
                        {{-- <p>{{ $profile->history }}</p> --}}
                        <div>
                            <textarea type="text" name="history" id="input-history" disabled>{{ $profile->history }}</textarea>
                            <div style="display: none;" class="row mt-3" id="btn-history">
                                <div class="col col-sm-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                                <div class="col col-sm-auto">
                                    <a href="/dashboard/profile" class="btn btn-danger">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Visi</h6>
                        </div>
                        <div class="justify-content-end">
                            <div class="btn-edit-visi">
                                <a class="btn btn-warning">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('visi.update', $profile->id) }}" method="post">
                        @csrf
                        {{-- <p>{{ $profile->visi }}</p> --}}
                        <div>
                            <textarea type="text" name="visi" id="input-visi">{{ $profile->visi }}</textarea>
                            <div style="display: none;" class="row mt-3" id="btn-visi">
                                <div class="col col-sm-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                                <div class="btn-close-desc col col-sm-auto">
                                    <a href="/dashboard/profile" class="btn btn-danger">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Misi</h6>
                        </div>
                        <div class="justify-content-end">
                            <div class="btn-edit-misi">
                                <a class="btn btn-warning">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('misi.update', $profile->id) }}" method="post">
                        @csrf
                        <div>
                            <textarea type="text" name="misi" id="input-misi" disabled>{{ $profile->misi }}</textarea>
                            <div style="display: none; " class="row mt-3" id="btn-misi">
                                <div class="col col-sm-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                                <div class="btn-close-desc col col-sm-auto">
                                    <a href="/dashboard/profile" class="btn btn-danger">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-edit-desc").on("click", function() {
                var inputField = $("#input-desc");
                var buttonDesc = $("#btn-desc");
                // Show the input field and set its value to the current text
                inputField.prop("disabled", false);
                // inputField.style.border = 1 px;
                buttonDesc.show().val(buttonDesc.prev().text());
                // Hide the text content
                inputField.prev().hide();
            });

            $(".btn-edit-history").on("click", function() {
                var inputField = $("#input-history");
                var buttonHistory = $("#btn-history");
                // Show the input field and set its value to the current text
                inputField.prop("disabled", false);
                buttonHistory.show().val(buttonHistory.prev().text());

                // Hide the text content
                inputField.prev().hide();
            });

            $(".btn-edit-visi").on("click", function() {
                var inputField = $("#input-visi");
                var buttonVisi = $("#btn-visi");
                // Show the input field and set its value to the current text
                inputField.prop("disabled", false);
                buttonVisi.show().val(buttonVisi.prev().text());


                // Hide the text content
                inputField.prev().hide();
            });

            $(".btn-edit-misi").on("click", function() {
                var inputField = $("#input-misi");
                var buttonMisi = $("#btn-misi");
                // Show the input field and set its value to the current text
                inputField.prop("disabled", false);
                buttonMisi.show().val(buttonMisi.prev().text());
                inputField.prev().hide();
            });


        });
    </script>

@endsection
