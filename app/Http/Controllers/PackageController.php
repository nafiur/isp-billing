<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::all();
        return view('backoffice.package.index', compact('package'));
    }


    public function create()
    {
        $router = Router::all();

        return view('backoffice.package.create', compact('router'));
    }

    public function store(Request $request)
    {

        // Validation
        $validated = $request->validate([
           'name' => 'required|string|max:255|unique:packages',
           'router_id' => 'required',
           'price' => 'required',
       ], [
            'name.required' => 'Please enter Package Name',
            'name.unique' => 'This Package Name  is already in use',
            'router_id.required' => 'Please Select Router',
            'price.required' => 'Please enter Price',
       ]);


        try {

            $package = new Package();
            $package->name = $request->name;
            $package->router_id = $request->router_id;
            $package->price = $request->price;
            $package->save();

            flash()->addSuccess("Package Added Successfully.");
        } catch (\Exception $e) {
            flash()->addError("An error occurred while saving the package. Please try again.");
            return redirect()->back()->withInput();
        }

        return redirect()->route('package.index');
    }


    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $router = Router::all();

        return view('backoffice.package.edit', compact('package', 'router'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:packages,name,' . $id,
            'router_id' => 'required',
            'price' => 'required',
        ], [
             'name.required' => 'Please enter Package Name',
             'name.unique' => 'This Package Name  is already in use',
             'router_id.required' => 'Please Select Router',
             'price.required' => 'Please enter Price',
        ]);

        try {
            $package = Package::findOrFail($id);
            $package->name = $request->name;
            $package->router_id = $request->router_id;
            $package->price = $request->price;
            $package->save();

            flash()->addSuccess("Package Updated Successfully.");
        } catch (\Exception $e) {
            flash()->addError("An error occurred while updating the router. Please try again.");
            return redirect()->back()->withInput();
        }

        return redirect()->route('package.index');
    }


    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        flash()->addSuccess("Package Deleted Successfully.");
        return redirect()->route('package.index');
    }

}