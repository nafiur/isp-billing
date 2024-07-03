<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index()
    {

        return view('backoffice.router.index');
    }


    public function create()
    {

        return view('backoffice.router.create');
    }

    public function store()
    {


        flash()->success('Your account has been re-activated.');

        return redirect()->route('router.index');
    }
}