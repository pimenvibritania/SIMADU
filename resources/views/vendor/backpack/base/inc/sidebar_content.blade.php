<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> User Management</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('biodata') }}'><i class='nav-icon la la-user-secret'></i> Biodata</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>

    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-hand-paper"></i> Permohonan</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('izin-tinggal') }}'><i class='nav-icon la la-home'></i> Izin Tinggal</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pengampunan') }}'><i class='nav-icon la la-hammer'></i> Pengampunan</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-hands-helping"></i> Miscellaneous</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tandatangan') }}'><i class='nav-icon la la-signature'></i> Penanda Tangan</a></li>

    </ul>
</li>



<li class='nav-item'><a class='nav-link' href='{{ backpack_url('izintinggal') }}'><i class='nav-icon la la-question'></i> IzinTinggals</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pendidikanmesir') }}'><i class='nav-icon la la-question'></i> PendidikanMesirs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('riwayatpendidikan') }}'><i class='nav-icon la la-question'></i> RiwayatPendidikans</a></li>

