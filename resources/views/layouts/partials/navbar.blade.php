<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-md">
    <!-- <div class="col">
      <div class="row">
        <a class="" id="title-navbar" href="#">Lapak</a>
      </div>
      <div class="row">
        <a class="" id="title-navbar" href="#">Hidroponik</a>
      </div>
    </div> -->
        <a class="navbar-brand" id="title-navbar" href="{{route ('getProduk') }}">LapakHidroponik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route ('getProduk') }}">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('keranjangIndex')}}">Keranjang</a>
                </li>
                <li class="nav-item dropdown">
                    <form action="{{route ('getProduk') }}" id="get-lokasi" method="get">
                        @csrf 
                        <select class="form-select bg-body-tertiary dropdownmenu" onclick="getLokasiProduk()" name="lokasiSort" id ="pilihan"  aria-label="Default select example" style="border:none; margin-top: 2px; width : 200px">
                            <option selected>Lokasi</option>
                            <option value="Andir">Andir</option>
                            <option value="Astana Anyar">Astana Anyar</option>
                            <option value="Arcamanik">Arcamanik</option>
                            <option value="Buah Batu">Buah Batu</option>
                            <option value="Kiaracondong">Kiaracondong</option>
                        </select>
                    </form>
                </li>
                
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown d-flex fluid">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->nama_lengkap }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>      
                    </ul>
                @endguest    
                </li>
            </ul>    
        </div>
    </div>
</nav>

      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->