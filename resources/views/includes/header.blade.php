<section style="height: 100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        .navbar-light .navbar-nav .nav-link {
            color: #092a33;
        }
        .navbar-light .navbar-nav .nav-link.active {
            font-weight: 500;
        }
        .btn-get-started {
            border-radius: 20px;
            padding-top: 12px;
            padding-bottom: 12px;
            padding-left: 30px;
            padding-right: 30px;
            font-weight: 500;
        }

        .btn-get-started-blue {
            background-color: #0ec8f8;
            color: #fff;
        }
        .btn-get-started-blue:hover {
            background-color: #3ad8ff;
            color: #fff;
        }
    </style>
    <nav
        class="navbar navbar-expand-lg navbar-light p-4 px-md-4 mb-3 bg-body border-bottom"
        style="font-family: Poppins, sans-serif;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="mytitle">SIMADU</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-header-2-2">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="modal-header-2-2 modal fade" id="targetModal-header-2-2" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel-header-2-2" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-header-2-2">
                        <div class="modal-header" style="padding:	2rem; padding-bottom: 0;">
                            <a class="modal-title" style="text-decoration: none" id="targetModalLabel-header-2-2">
                                <span class="mytitle">SIMADU</span>
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                            <ul class="navbar-nav responsive-header-2-2 me-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Menu</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="mb-2">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-user" style="margin-right: 10px"></i>
                                        {{ trans('backpack::base.my_account') }}
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="modal-footer" style="padding:	2rem; padding-top: 0.75rem">
                            @if(auth()->check())
                                <a href="{{backpack_url('logout')}}" class="btn btn-danger"><i class="fa fa-sign-out"></i><span style="margin-left: 5px">Logout</span></a>
                            @else
                                <a href="{{url('login')}}" class="btn btn-fill-header-2-2"><i class="fa fa-lock"></i><span style="margin-left: 5px">Login</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-md-4 active" aria-current="page" href="#"
                        >Menu</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="#">Menu</a>
                    </li>
                    {{--                    <li class="nav-item dropdown pr-4">--}}
{{--                        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <img class="img-avatar" src="{{ backpack_avatar_url(backpack_auth()->user()) }}" alt="{{ backpack_auth()->user()->name }}">--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu {{ config('backpack.base.html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1">--}}
{{--                            <a class="dropdown-item" href="{{ route('backpack.account.info') }}"><i class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                </ul>

                <div class="dropdown">
                    <a class="nav-link" id="dropdownMenuButton1" data-bs-toggle="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="img-avatar" src="{{ backpack_avatar_url(backpack_auth()->user()) }}" alt="{{ backpack_auth()->user()->name }}">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-md-left" style="right: 0; left: auto" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{url('biodata/'.auth()->user()->id)}}"><i class="fa fa-user" style="margin-right: 10px"></i> {{ trans('backpack::base.my_account') }}</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out" style="margin-right: 10px"></i> {{ trans('backpack::base.logout') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</section>
