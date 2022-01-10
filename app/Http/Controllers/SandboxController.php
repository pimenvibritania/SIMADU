<?php

namespace App\Http\Controllers;

use App\Rules\PMI;
use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function index()
    {
        return view('sandbox.create');
    }

    public function store(Request $request)
    {

        $request->validate([
           'name' => $this->validatePmi()
        ]);

        return $request;
    }

    private function validatePmi(){
        if (auth()->user()->status == 'pmi' ){
            return 'required';
        }
    }
}
