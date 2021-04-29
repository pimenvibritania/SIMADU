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
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-hands-helping"></i> Miscellaneous</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tandatangan') }}'><i class='nav-icon la la-signature'></i> Penanda Tangan</a></li>
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
