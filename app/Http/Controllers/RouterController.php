<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Models\Package;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index()
    {
        $router = Router::all();

        return view('backoffice.router.index', compact('router'));
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
            'name.required' => 'Please enter Name',
            'name.unique' => 'This Router Name  is already in use',
            'location.required' => 'Please enter location',
            'ip.required' => 'Please enter ip address',
            'username.required' => 'Please enter username',
            'password.required' => 'Please enter password',
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


    public function edit($id)
    {
        $router = Router::findOrFail($id);
        return view('backoffice.router.edit', compact('router'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:routers,name,' . $id,
            'location' => 'required',
            'ip' => 'required|ip',
            'username' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Please enter Name',
            'name.unique' => 'This Router Name is already in use',
            'location.required' => 'Please enter location',
            'ip.required' => 'Please enter IP address',
            'username.required' => 'Please enter username',
            'password.required' => 'Please enter password',
        ]);

        try {
            $router = Router::findOrFail($id);
            $router->name = $request->name;
            $router->location = $request->location;
            $router->ip = $request->ip;
            $router->username = $request->username;
            $router->password = $request->password;
            $router->save();

            flash()->addSuccess("Router Updated Successfully.");
        } catch (\Exception $e) {
            flash()->addError("An error occurred while updating the router. Please try again.");
            return redirect()->back()->withInput();
        }

        return redirect()->route('router.index');
    }


    public function destroy($id)
    {
        $router = Router::findOrFail($id);
        $router->delete();
        flash()->addSuccess("Router Deleted Successfully.");
        return redirect()->route('router.index');
    }

    public function getPackagesByRouter($router_id)
    {
        $packages = Package::where('router_id', $router_id)->get();
        return response()->json($packages);
    }
}