<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {

        return view('backoffice.package.index');
    }


    public function create()
    {

        return view('backoffice.package.create');
    }

    public function store()
    {

        return view('backoffice.package.create');
    }


}