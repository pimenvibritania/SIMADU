<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <a href="{{URL::to('/')}}">
                <h6 class="font-weight-bolder mb-0">SIMADU</h6>
            </a>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{url('biodata/'.auth()->user()->id)}}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Profile</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center ml-2 mr-2">
                    |
                </li>
                <li class="nav-item d-flex align-items-center">
                    @if(auth()->check())
                        <a href="{{backpack_url('logout')}}" class="nav-link text-body font-weight-bold px-0">
                            <i style="color: #b83b3b" class="fa fa-sign-out-alt"></i><span style="color: #b83b3b; margin-left: 5px">Logout</span>
                        </a>
                    @else
                        <a href="{{url('login')}}" class="btn btn-fill-header-2-2"><i class="fa fa-lock"></i><span style="margin-left: 5px">Login</span></a>
                    @endif
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
