<nav class="navbar fixed-top">
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll" href="index.html">Pavo</a> -->

        <!-- Image Logo -->
        <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline"
            href="/">
            <img src="images/logo_bangka.png" alt="alternative" class="h-8" />
        </a>
        <b>Kecamatan Puding Besar</b>

        <button
            class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400"
            type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center" id="navbarsExampleDefault">
            <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                <li class="mt-1">
                    <a class="nav-link page-scroll" href="{{ route('home') }}">Profile</a>
                </li>
                <li class="mt-1">
                    <a class="nav-link page-scroll" href="/potensi_wisata">Potensi Wisata</a>
                </li>
                <li class="dropdown mt-1">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Kalori</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="/kalori">Kalkulator Kalori</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="/akg">Kalkulator AKG</a>
                    </div>
                </li>
                <li>
                    @if (Auth::user())
                        <a class="nav-link page-scroll mt-1" href="/dashboard/profile">Dashboard</a>
                    @else
                        <a class="btn-outline-reg" href="/login" style="margin-left: 20px;">Login</a>
                    @endif
                </li>
            </ul>

        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->
