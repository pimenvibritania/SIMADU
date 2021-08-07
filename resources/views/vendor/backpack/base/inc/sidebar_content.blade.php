<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- Users, Roles, Permissions -->

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-server"></i> Layanan WNI</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('izin-tinggal') }}'><i class='nav-icon la la-home'></i> Izin Tinggal</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pengampunan') }}'><i class='nav-icon la la-hammer'></i> Pengampunan</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('alamat-mesir') }}'><i class='nav-icon la la-flag-o'></i> Ket. Alamat Mesir</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('alamat-indonesia') }}'><i class='nav-icon la la-flag-o'></i> Alamat Indonesia</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('masuk-mesir') }}'><i class='nav-icon la la-institution'></i> Izin Masuk Mesir</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('visa-haji') }}'><i class='nav-icon la la-passport'></i> Visa Haji</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('visa-umroh') }}'><i class='nav-icon la la-passport'></i> Visa Umroh</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tidak-keluar-negeri') }}'><i class='nav-icon la la-outdent'></i> Tidak Keluar Negeri</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('kepentingan') }}'><i class='nav-icon la la-warning'></i> Kepentingan</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('keterangan-lahir') }}'><i class='nav-icon la la-baby'></i> Keterangan Lahir</a></li>

    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-graduation-cap"></i> Layanan Mahasiswa</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('keterangan-belajar') }}'><i class='nav-icon la la-book-open'></i> Keterangan Belajar</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pindah-kuliah-indonesia') }}'><i class='nav-icon la la-plane-arrival'></i> Pindah Kuliah Indonesia</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pindahkuliahluarnegeri') }}'><i class='nav-icon la la-plane-departure'></i> Pindah Kuliah Luar Negeri</a></li>
        <div class="dropdown-divider"></div>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('masukkuliah') }}'><i class='nav-icon la la-cash-register'></i> Daftar Kuliah</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('masukmahad') }}'><i class='nav-icon la la-moon'></i> Masuk Ma'had</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('kuliahiftha') }}'><i class='nav-icon la la-school'></i> Kuliah Iftha</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('ketnonbeasiswa') }}'><i class='nav-icon la la-id-badge'></i> Ket Tidak Menerima Beasiswa</a></li>

    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Layanan Umum</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('legalisir') }}'><i class='nav-icon la la-print'></i> Legalisir</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('akta-lahir') }}'><i class='nav-icon la la-baby-carriage'></i> Akta Lahir</a></li>

    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-briefcase"></i> Admin Transactions</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pnbp') }}'><i class='nav-icon la la-stream'></i> PNBP</a></li>
    </ul>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-hands-helping"></i> Master Data</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tandatangan') }}'><i class='nav-icon la la-signature'></i> Penanda Tangan</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('master-pnbp') }}'><i class='nav-icon la la-archive'></i> Master PNBP</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fakultas') }}'><i class='nav-icon la la-building-o'></i> Fakultas</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('changableword') }}'><i class='nav-icon la la-pen-square'></i> Changable Words</a></li>

    </ul>

</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> User Management</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('biodata') }}'><i class='nav-icon la la-user-secret'></i> Biodata</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
{{--        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>--}}

    </ul>
</li>

{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('customletter') }}'><i class='nav-icon la la-question'></i> CustomLetters</a></li>--}}

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('aktalahir') }}'><i class='nav-icon la la-question'></i> AktaLahirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('alamatindonesia') }}'><i class='nav-icon la la-question'></i> AlamatIndonesias</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('alamatmesir') }}'><i class='nav-icon la la-question'></i> AlamatMesirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('biodata') }}'><i class='nav-icon la la-question'></i> Biodatas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('changableword') }}'><i class='nav-icon la la-question'></i> ChangableWords</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('cutikuliah') }}'><i class='nav-icon la la-question'></i> CutiKuliahs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('izintinggal') }}'><i class='nav-icon la la-question'></i> IzinTinggals</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('kepentingan') }}'><i class='nav-icon la la-question'></i> Kepentingans</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('keteranganlahir') }}'><i class='nav-icon la la-question'></i> KeteranganLahirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('legalisir') }}'><i class='nav-icon la la-question'></i> Legalisirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('fakultas') }}'><i class='nav-icon la la-question'></i> Fakultas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('ketnonbeasiswa') }}'><i class='nav-icon la la-question'></i> KetNonBeasiswas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('keteranganbelajar') }}'><i class='nav-icon la la-question'></i> KeteranganBelajars</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('kuliahiftha') }}'><i class='nav-icon la la-question'></i> KuliahIfthas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('masukkuliah') }}'><i class='nav-icon la la-question'></i> MasukKuliahs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('masukmahad') }}'><i class='nav-icon la la-question'></i> MasukMahads</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pindahkuliahindonesia') }}'><i class='nav-icon la la-question'></i> PindahKuliahIndonesias</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pindahkuliahluarnegeri') }}'><i class='nav-icon la la-question'></i> PindahKuliahLuarNegeris</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('masterpnbp') }}'><i class='nav-icon la la-question'></i> MasterPnbps</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('masukmesir') }}'><i class='nav-icon la la-question'></i> MasukMesirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('masukruak') }}'><i class='nav-icon la la-question'></i> MasukRuaks</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pendidikanmesir') }}'><i class='nav-icon la la-question'></i> PendidikanMesirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pengampunan') }}'><i class='nav-icon la la-question'></i> Pengampunans</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pindahfakultas') }}'><i class='nav-icon la la-question'></i> PindahFakultas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pnbp') }}'><i class='nav-icon la la-question'></i> Pnbps</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('riwayatpendidikan') }}'><i class='nav-icon la la-question'></i> RiwayatPendidikans</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tandatangan') }}'><i class='nav-icon la la-question'></i> TandaTangans</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tidakkeluarnegeri') }}'><i class='nav-icon la la-question'></i> TidakKeluarNegeris</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('visahaji') }}'><i class='nav-icon la la-question'></i> VisaHajis</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('visaumroh') }}'><i class='nav-icon la la-question'></i> VisaUmrohs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('wilayah') }}'><i class='nav-icon la la-question'></i> Wilayahs</a></li>