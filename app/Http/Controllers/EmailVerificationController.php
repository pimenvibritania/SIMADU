<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }

    public function request(): RedirectResponse
    {
        auth()->user()->sendEmailVerificationNotification();

        return back()
            ->with('success', 'Verification link sent!');
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->to('/dashboard'); // <-- change this to whatever you want
    }
}
