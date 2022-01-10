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

            @if(
                auth()->user()->biodata == null ||
                (auth()->user()->hasRole('mahasiswa') && auth()->user()->biodata->riwayatPendidikan->isEmpty()) ||
                auth()->user()->biodata->verified_date == null
                )
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

                @if(auth()->user()->hasRole('tki'))
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
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/pengampunan') || Request::is('surat/pengampunan/create') ? 'active' : ''
                    }} " href="{{url('surat/pengampunan')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-praying-hands"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Pengampunan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/alamat-mesir') || Request::is('surat/alamat-mesir/create') ? 'active' : ''
                    }} " href="{{url('surat/alamat-mesir')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan SK<br>Alamat Mesir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/alamat-indonesia') || Request::is('surat/alamat-indonesia/create') ? 'active' : ''
                    }} " href="{{url('surat/alamat-indonesia')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan SK<br>Alamat Indonesia</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/masuk-mesir') || Request::is('surat/masuk-mesir/create') ? 'active' : ''
                     }} " href="{{url('surat/masuk-mesir')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-hat-wizard"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Masuk Mesir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/visa-haji') || Request::is('surat/visa-haji/create') ? 'active' : ''
                     }} " href="{{url('surat/visa-haji')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-passport"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Visa Haji</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/visa-umroh') || Request::is('surat/visa-umroh/create') ? 'active' : ''
                     }} " href="{{url('surat/visa-umroh')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-passport"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Visa Umroh</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/keterangan-lahir') || Request::is('surat/keterangan-lahir/create') ? 'active' : ''
                     }} " href="{{url('surat/keterangan-lahir')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-baby-carriage"></i>
                            </div>
                            <span class="nav-link-text ms-1">Keterangan Lahir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/kepentingan') || Request::is('surat/kepentingan/create') ? 'active' : ''
                     }} " href="{{url('surat/kepentingan')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-walking"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat<br> Berkepentingan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/tidak-keluar-negeri') || Request::is('surat/tidak-keluar-negeri/create') ? 'active' : ''
                     }} " href="{{url('surat/tidak-keluar-negeri')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tidak ke-<br> Luar Negeri</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasRole('mahasiswa'))

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

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/masuk-kuliah') || Request::is('surat/masuk-kuliah/create') ? 'active' : ''
                    }} " href="{{url('surat/masuk-kuliah')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Pengajuan<br>Daftar Kuliah</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/masuk-mahad') || Request::is('surat/masuk-mahad/create') ? 'active' : ''
                    }} " href="{{url('surat/masuk-mahad')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-quran"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Pengajuan<br>Masuk Ma'had</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/kuliah-iftha') || Request::is('surat/kuliah-iftha/create') ? 'active' : ''
                    }} " href="{{url('surat/kuliah-iftha')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-mosque"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Pengajuan<br>Kuliah Iftha</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/ket-non-beasiswa') || Request::is('surat/ket-non-beasiswa/create') ? 'active' : ''
                    }} " href="{{url('surat/ket-non-beasiswa')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-mosque"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Keterangan<br>Tidak Menerima<br>Beasiswa</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/masuk-ruak') || Request::is('surat/masuk-ruak/create') ? 'active' : ''
                    }} " href="{{url('surat/masuk-ruak')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-sticky-note"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Keterangan<br>Masuk Ruak</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/cuti-kuliah') || Request::is('surat/cuti-kuliah/create') ? 'active' : ''
                    }} " href="{{url('surat/cuti-kuliah')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Keterangan<br>Cuti Kuliah</span>
                        </a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{--}}
{{--                    Request::is('surat/pindah-fakultas') || Request::is('surat/pindah-fakultas/create') ? 'active' : ''--}}
{{--                    }} " href="{{url('surat/pindah-fakultas')}}">--}}
{{--                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                                <i class="fas fa-building"></i>--}}
{{--                            </div>--}}
{{--                            <span class="nav-link-text ms-1">Surat Keterangan<br>Pindah Fakultas</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/cabut-berkas') || Request::is('surat/cabut-berkas/create') ? 'active' : ''
                    }} " href="{{url('surat/cabut-berkas')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Permintaan<br>Cabut Berkas</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/daftar-nilai') || Request::is('surat/daftar-nilai/create') ? 'active' : ''
                    }} " href="{{url('surat/daftar-nilai')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-window-restore"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Permintaan<br>Daftar Nilai</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/keringanan-biaya') || Request::is('surat/keringanan-biaya/create') ? 'active' : ''
                    }} " href="{{url('surat/keringanan-biaya')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Permohonan<br>Keringanan Biaya</span>
                        </a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{--}}
{{--                    Request::is('surat/minta-tashdiq') || Request::is('surat/minta-tashdiq/create') ? 'active' : ''--}}
{{--                    }} " href="{{url('surat/minta-tashdiq')}}">--}}
{{--                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                                <i class="fas fa-clipboard-check"></i>--}}
{{--                            </div>--}}
{{--                            <span class="nav-link-text ms-1">Surat Permintaan<br>Minta Tashdiq</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/izin-libur') || Request::is('surat/izin-libur/create') ? 'active' : ''
                    }} " href="{{url('surat/izin-libur')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Pengajuan<br>Izin Libur</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/izin-sakit') || Request::is('surat/izin-sakit/create') ? 'active' : ''
                    }} " href="{{url('surat/izin-sakit')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-procedures"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan Tidak<br>Ikut Ujian (Sakit)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/izin-tawaquf') || Request::is('surat/izin-tawaquf/create') ? 'active' : ''
                    }} " href="{{url('surat/izin-tawaquf')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-pray"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan Tidak<br>Ikut Ujian (Tawaquf)</span>
                        </a>
                    </li>

{{--                LAYANAN KONSULER--}}
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
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/pengampunan') || Request::is('surat/pengampunan/create') ? 'active' : ''
                    }} " href="{{url('surat/pengampunan')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-praying-hands"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Pengampunan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/alamat-mesir') || Request::is('surat/alamat-mesir/create') ? 'active' : ''
                    }} " href="{{url('surat/alamat-mesir')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan SK<br>Alamat Mesir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/alamat-indonesia') || Request::is('surat/alamat-indonesia/create') ? 'active' : ''
                    }} " href="{{url('surat/alamat-indonesia')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan SK<br>Alamat Indonesia</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/masuk-mesir') || Request::is('surat/masuk-mesir/create') ? 'active' : ''
                     }} " href="{{url('surat/masuk-mesir')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-hat-wizard"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Masuk Mesir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/visa-haji') || Request::is('surat/visa-haji/create') ? 'active' : ''
                     }} " href="{{url('surat/visa-haji')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-passport"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Visa Haji</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/visa-umroh') || Request::is('surat/visa-umroh/create') ? 'active' : ''
                     }} " href="{{url('surat/visa-umroh')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-passport"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan<br>Visa Umroh</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/keterangan-lahir') || Request::is('surat/keterangan-lahir/create') ? 'active' : ''
                     }} " href="{{url('surat/keterangan-lahir')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-baby-carriage"></i>
                            </div>
                            <span class="nav-link-text ms-1">Keterangan Lahir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/kepentingan') || Request::is('surat/kepentingan/create') ? 'active' : ''
                     }} " href="{{url('surat/kepentingan')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-walking"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat <br> Berkepentingan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                    Request::is('surat/tidak-keluar-negeri') || Request::is('surat/tidak-keluar-negeri/create') ? 'active' : ''
                     }} " href="{{url('surat/tidak-keluar-negeri')}}">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tidak ke-<br> Luar Negeri</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Layanan Umum</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{
                    Request::is('surat/akta-lahir') || Request::is('surat/akta-lahir/create') ? 'active' : ''
                    }} " href="{{url('surat/akta-lahir')}}">
                        <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-baby"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengajuan Akta Lahir</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{
                    Request::is('surat/legalisir') || Request::is('surat/legalisir/create') ? 'active' : ''
                    }} " href="{{url('surat/legalisir')}}">
                        <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-archive"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengajuan Legalisir</span>
                    </a>
                </li>

            @endif
        </ul>
    </div>
</aside>
