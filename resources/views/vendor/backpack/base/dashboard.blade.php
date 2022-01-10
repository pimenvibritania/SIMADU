@extends(backpack_view('blank'))

@php
    Widget::add(
        [
            'type'        => 'jumbotron',
            'heading'     => trans('backpack::base.welcome'),
            'content'     => 'Assalamualaikum wr wb',
            'button_link' => backpack_url('logout'),
            'button_text' => trans('backpack::base.logout'),
        ]
    );

    Widget::add(
            [
                'type'    => 'div',
                'class'   => 'row',
                'content' => [ // widgets
                    [
                         'type'       => 'chart',
                        'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,

                        // OPTIONALS

                        'class'   => 'card mb-2',
                        'wrapper' => ['class'=> 'col-md-6'] ,
                        'content' => [
                             'header' => 'New Users',
                             'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                        ],
                    ],
                    [
                        'type'       => 'chart',
                        'controller' => \App\Http\Controllers\Admin\Charts\TestChartChartController::class,

                        // OPTIONALS

                        'class'   => 'card mb-2',
                        'wrapper' => ['class'=> 'col-md-6'] ,
                        'content' => [
                             'header' => 'New Users',
                             'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                        ],
                    ],
                ]
            ]
    );
    $widgets['after_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => 'as',
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];
@endphp

@section('content')
    CONTENT
@endsection
