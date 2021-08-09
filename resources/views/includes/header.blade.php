<style>
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
        background-color: #868686;
    }

    .dropdown-menu > li:hover, .dropdown-menu > li:focus {
        background-color: #868686;
    }
</style>
@php
    $notifications = auth()->user()->unreadNotifications;

@endphp
<section style=" width: 100%; box-sizing: border-box; background-color: #FFFFFF">

    <nav
        class="navbar navbar-expand-lg navbar-light p-4 px-md-4 mb-3 bg-body border-bottom"
        style="font-family: Poppins, sans-serif;">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <span class="mytitle">SIMADU</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-header-2-2">
                <span class="navbar-toggler-icon"></span>
            </button>

{{--Mobile version--}}
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
{{--Web version--}}

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-md-4 {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{route('dashboard')}}"
                        >Dashboard</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4 {{Request::is('surat/*') ? 'active' : ''}}" href="{{route('surat.dashboard')}}">Pengajuan & Permohonan</a>
                    </li>


                </ul>
                <div class="dropdown">
                    <a class="nav-link" id="dropdownMenuButton1" data-bs-toggle="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span style="font-size: 1.5em; color: black;">
                            <i class="fas fa-bell"></i>
                                <span id="badge" style="font-size: 0.5em;
                                float: right;
                                color: white;
                                border-radius: 25px ;
                                padding: 2px 8px;
                                background: red">
                                    {{$notifications->count()}}
                                </span>

                        </span>
                    </a>

                    <ul class="no-notif dropdown-menu dropdown-menu-md-left" style="right: 0; left: auto" aria-labelledby="dropdownMenuButton1">
                       @if(isset($notifications))
                            @forelse($notifications as $notif)
                                @if($loop->iteration > 10)

                                    @break

                                @endif
                                <li class="notif dropdown-item" >
                                    <a style="font-size: 0.8em" href="{{route($notif->data['uri'] )}}" class="btn btn-secondary " role="alert">
                                        Pengajuan dengan nomor permohonan [{{$notif->data['data']['no_surat']}}] {{$notif->data['data']['status']}}
                                    </a>
                                    <a style="font-size: 0.8em" href="#" class="btn btn-danger float-right mark-as-read ml-4 " data-id="{{$notif->id}}">
                                        x
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                @if($loop->last)
                                    <div style="margin-left: 1em; padding: 5px 0px">
                                        <a style="font-size: 0.8em" href="#"  class="btn btn-sm btn-danger " id="mark-all">
                                            Mark all as read
                                        </a>
                                    </div>
                                @endif
                            @empty
                                <li class="dropdown-item">
                                    There are no new notifications
                                </li>
                            @endforelse

                                <script>
                                    function sendMarkRequest(id = null) {
                                        return $.ajax("{{route('markNotification')}}", {
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            method: "POST",
                                            data: {
                                                id
                                            },
                                            success: function(result) {
                                                // Show an alert with the result
                                                console.log(result.total)
                                                // $('#preview-word').val(result.response.deskripsi);
                                                $('span#badge').text(result.total)
                                            },
                                        });
                                    }

                                    $(function () {
                                        $('.mark-as-read').click(function () {
                                            let request = sendMarkRequest($(this).data('id'));

                                            request.done(()=>{
                                                $(this).parents('li.notif').remove();
                                                if( !$('li.notif').length )         // use this if you are using id to check
                                                {
                                                    $('a#mark-all').remove();
                                                    $('div.dropdown-divider').remove();
                                                    $('ul.no-notif').append(
                                                        `
                                                        <li class="dropdown-item">
                                                            There are no new notifications
                                                        </li>
                                                        `
                                                    );
                                                }
                                            });
                                        });

                                        $('#mark-all').click(function () {
                                            let request = sendMarkRequest();

                                            request.done(()=>{
                                                $('li.notif').remove();
                                                $('a#mark-all').remove();
                                                $('div.dropdown-divider').remove();
                                                $('ul.no-notif').append(
                                                    `
                                                        <li class="dropdown-item">
                                                            There are no new notifications
                                                        </li>
                                                        `
                                                );
                                            })
                                        })

                                    })
                                </script>

                       @endif

{{--                        <li><a class="dropdown-item" href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out" style="margin-right: 10px"></i> {{ trans('backpack::base.logout') }}</a></li>--}}
                    </ul>
                </div>
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
