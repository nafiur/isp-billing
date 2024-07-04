<?php

namespace App\Http\Controllers;

use App\Models\Router;
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

    public function store(Request $request)
    {


        // Validation
        $validated = $request->validate([
           'name' => 'required|string|max:255|unique:routers',
           'location' => 'required',
           'ip' => 'required|ip',
           'username' => 'required',
           'password' => 'required',
       ], [
            'name.required' => 'Please enter Department ID',
            'name.unique' => 'This Department ID is already in use',
            'location.required' => 'Please enter Department Name',
            'ip.required' => 'Please enter Department Name',
            'username.required' => 'Please enter Department Name',
            'password.required' => 'Please enter Department Name',
       ]);


        try {

            $router = new Router();
            $router->name = $request->name;
            $router->location = $request->location;
            $router->ip = $request->ip;
            $router->username = $request->username;
            $router->password = $request->password;
            $router->save();

            flash()->addSuccess("Router Added Successfully.");
        } catch (\Exception $e) {
            flash()->addError("An error occurred while saving the department. Please try again.");
            return redirect()->back()->withInput();
        }

        return redirect()->route('router.index');


    }
}