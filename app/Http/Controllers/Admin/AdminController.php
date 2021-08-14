<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin')     => backpack_url('dashboard'),
            trans('backpack::base.dashboard') => false,
        ];

        return view(backpack_view('dashboard'), $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }

    public function markNotification(Request $request){

        $notif = 0;

        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request){
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        if (!auth()->user()->unreadNotifications->isEmpty()){

            foreach (auth()->user()->notifications as $not){
                if ($not->read_at == null){
                    $notif++;
                }
            }
        }

        return response()->json([
            'total' => $notif
        ]);
    }
}
