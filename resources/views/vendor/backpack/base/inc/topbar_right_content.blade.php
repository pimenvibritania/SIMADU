<!-- This file is used to store topbar (right) items -->
@php
    $notifications = auth()->user()->unreadNotifications;

@endphp

{{-- <li class="nav-item d-md-down-none"><a class="nav-link" href="#"><i class="la la-bell"></i><span class="badge badge-pill badge-danger">5</span></a></li>--}}
{{--<li class="nav-item d-md-down-none"><a class="nav-link" href="#"><i class="la la-list"></i></a></li>--}}
{{--<li class="nav-item d-md-down-none"><a class="nav-link" href="#"><i class="la la-map"></i></a></li>--}}
<div class="">

    <li class="nav-item d-md-down-none mt-2 mr-2" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false"><a class="nav-link" href="#">
            <i class="la la-bell"></i>
            <span class="badge badge-pill badge-danger">{{$notifications->count()}}</span></a>
    </li>

    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
        <div id="no-notif" class="pb-2">

        @forelse($notifications as $notif)
                @if($loop->iteration > 10)

                    @break

                @endif
                <div class="notif dropdown-item">
                    <a href="{{route($notif->data['uri'] )}}" class="btn btn-primary" role="alert">
                        {{$notif->data['data']['user']['name']}} mengajukan permohonan surat [{{$notif->data['data']['no_permohonan']}}]
                    </a>
                    <a href="#" class="float-right mark-as-read ml-4 mt-2" data-id="{{$notif->id}}">
                        Mark as read
                    </a>
                </div>
                @if($loop->last)
                    <div class="p-2">
                        <a href="#"  class="ml-3 mt-5" id="mark-all">
                            Mark all as read
                        </a>
                    </div>
                @endif
            @empty
                <div class="p-2">
                    There are no new notifications
                </div>
            @endforelse
        </div>
{{--        <button class="dropdown-item" type="button">Action</button>--}}
{{--        <button class="dropdown-item" type="button">Another action</button>--}}
{{--        <button class="dropdown-item" type="button">asasaksgahs ajshgajhsgjahgs ajkshgajhsgajks sakjshgakjsgaks akjsajk</button>--}}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
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
                $(this).parents('div.notif').remove();
                if( !$('div.notif').length )         // use this if you are using id to check
                {
                    $('a#mark-all').remove();
                    $('div#no-notif').append(
                        `
                        <div class="p-2">
                            There are no new notifications
                        </div>
                        `
                    );
                }
            });
        });

        $('#mark-all').click(function () {
            let request = sendMarkRequest();

            request.done(()=>{
                $('div.notif').remove();
                $('a#mark-all').remove();
                $('div#no-notif').append(
                    `
                        <div class="p-2">
                            There are no new notifications
                        </div>
                        `
                );
            })
        })

    })
</script>
