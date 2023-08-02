@extends('client.layout.template')
@section('content')
    <!-- Header -->
    <header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
            <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
                <h1 class="h1-large mb-5">Kecamatan Puding Besar</h1>
                <p class="p-large mb-8">Start getting things done together with your team based on Pavo's revolutionary
                    team management features</p>
            </div>
            <div class="xl:text-right">
                <img class="inline" src="images/kantor.jpg" alt="alternative" style="height: 100%" />
            </div>
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Introduction -->
    <div class="pt-14 pb-14 text-center">
        <div class="container px-4 sm:px-8 xl:px-4">
            <h2 class="mb-3">Tentang Kecamatan</h2>
            <p class="mb-4 text-gray-800 text-1xl leading-10 lg:max-w-5xl lg:mx-auto">{{ $profile->desc }}</p>
        </div> <!-- end of container -->
    </div>
    <!-- end of introduction -->
    <!-- Statistics -->
    <div class="counter">
        <div class="container px-4 sm:px-8">

            <!-- Counter -->
            <div id="counter">
                <div class="cell">
                    <div class="counter-value number-count" data-count="17740">1</div>
                    <p class="counter-info">Total Penduduk</p>
                </div>
                <div class="cell">
                    <div class="counter-value number-count" data-count="9354">1</div>
                    <p class="counter-info">Laki-laki</p>
                </div>
                <div class="cell">
                    <div class="counter-value number-count" data-count="8386">1</div>
                    <p class="counter-info">Perempuan</p>
                </div>
                {{-- <div class="cell">
                    <div class="counter-value number-count" data-count="127">1</div>
                    <p class="counter-info">Case Studies</p>
                </div>
                <div class="cell">
                    <div class="counter-value number-count" data-count="211">1</div>
                    <p class="counter-info">Orders Received</p>
                </div> --}}
            </div>
            <!-- end of counter -->

        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->

    <!-- Details 1 -->
    <div id="details" class="pt-12 pb-16 lg:pt-16">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:col-span-5">
                <div class="mb-16 lg:mb-0 xl:mt-16">
                    <h2 class="mb-6">Visi</h2>
                    <p class="mb-4">{{ $profile->visi }}</p>
                </div>
            </div> <!-- end of col -->
            <div class="lg:col-span-7">
                <div class="xl:ml-14">
                    <img class="inline" src="images/people.png" alt="alternative" />
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of container -->
    </div>
    <!-- end of details 1 -->


    <!-- Details 2 -->
    <div class="py-24">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:col-span-7">
                <div class="mb-12 lg:mb-0 xl:mr-14">
                    <img class="inline" src="images/happy.jpg" alt="alternative" />
                </div>
            </div> <!-- end of col -->
            <div class="lg:col-span-5">
                <div class="xl:mt-12">
                    <h2 class="mb-6">Misi</h2>
                    <p>{!! nl2br($profile->misi) !!}</p>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of container -->
    </div>
    <!-- end of details 2 -->

    <div class="pt-24 text-center">
        <div class="container px-4 sm:px-8 xl:px-4">
            <h2 class="mb-6">Temukan Kami</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.3746033014268!2d105.9353993748308!3d-2.0054354979764617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22e669d209566d%3A0xf8663c353da1c274!2sKantor%20Kecamatan%20Puding%20Besar!5e0!3m2!1sid!2sid!4v1690997344361!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div> <!-- end of container -->
    </div>
@endsection
