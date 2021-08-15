<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{url('/')}}">
            <img src="{{URL::asset('images/simadu.jpg')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">SIMADU</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard') ? 'active' : '' }}" href="{{url('dashboard')}}">
                    <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @if(auth()->user()->biodata == null)
                <li class="nav-item">
                    <a class="nav-link {{
                    Request::is('biodata/create') ? 'active' : ''
                    }} " href="{{url('biodata/create')}}">
                        <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Biodata</span>
                    </a>
                </li>
            @else

                {{--            TKI MENU--}}

                @if(auth()->user()->roles->first()->name == 'tki')
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Layanan Konsuler</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/izin-tinggal') || Request::is('surat/izin-tinggal/create') ? 'active' : ''
                    }} " href="{{url('surat/izin-tinggal')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-home"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Izin Tinggal</span>
                        </a>
                    </li>
                @else

                    {{--                MAHASISWA MENU--}}
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Layanan Mahasiswa</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/keterangan-belajar') || Request::is('surat/keterangan-belajar/create') ? 'active' : ''
                    }} " href="{{url('surat/keterangan-belajar')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-university"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Keterangan<br>Belajar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/pindah-kuliah-indonesia') || Request::is('surat/pindah-kuliah-indonesia/create') ? 'active' : ''
                    }} " href="{{url('surat/pindah-kuliah-indonesia')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Pindah<br>Kuliah di Indonesia</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/pindah-kuliah-luar-negeri') || Request::is('surat/pindah-kuliah-luar-negeri/create') ? 'active' : ''
                    }} " href="{{url('surat/pindah-kuliah-luar-negeri')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Pindah<br>Kuliah ke Nuar Negeri</span>
                        </a>
                    </li>
                @endif
            @endif

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Layanan Umum</h6>
            </li>
        </ul>
    </div>
</aside>
