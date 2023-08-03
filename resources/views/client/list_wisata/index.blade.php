@extends('client.layout.template')
@section('content')
    <header id="header" class="header py-28 text-center  md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
        <div class="w-full md:h-[200px] h-[100px] flex justify-center items-center bg-food bg-cover bg-center">
            <h1 class="md:text-5xl text-2xl font-bold text-putih">
                Potensi Wisata
            </h1>
        </div>
    </header>

    <!-- Features -->
    <div id="features" class="cards-1">
        <div class="container px-4 sm:px-8 xl:px-4">

            <!-- Card -->

            @foreach ($tourism as $data)
                <div class="mb-9 rounded overflow-hidden shadow-lg">
                    {{-- @dd($data->images()) --}}
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-2">{{ strtoupper($data->name) }}</div>
                    </div>
                    @component('components.carousel', ['images' => $data->images()->get()])
                    @endcomponent
                    {{-- <x-carousel :images="$data->images()->get()" /> --}}
                    {{-- <img class="w-75 h-75" src="{{ asset($data->images()->first()->image_url) }}"
                        alt="Sunset in the mountains"> --}}
                    <div class="px-6 py-4">
                        <p class="text-gray-700 text-base">
                            {{ $data->desc }}
                        </p>
                    </div>

                </div>
            @endforeach
            <!-- end of card -->


        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of features -->
@endsection
