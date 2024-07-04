<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use RouterOS\Query;
use App\Models\User;
use RouterOS\Client;
use App\Models\Detail;
use App\Models\Router;
use App\Models\Billing;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $package = Package::all();
        $customer = User::with('detail')->where('role', 'user')->get();

        return view('backoffice.customer.index', compact('package', 'customer'));
    }
    public function create()
    {
        $router = Router::all();
        $package = Package::all();
        $customer = User::with('detail')->where('role', 'user')->get();

        return view('backoffice.customer.create', compact('package', 'customer', 'router'));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([

        //     "name" => "required|string|max:255",
        //     "email" => "required|email|unique:users",
        //     "password" => "required|min:6|confirmed",
        //     "address" => "required|string",
        //     "phone" => "required|unique:details|regex:/^[0-9]{10,15}$/",
        //     "dob" => "required|date",
        //     "package_name" => "required|string|max:255",
        //     "router_password" => "required|string|min:6",
        //     "router_name" => "required",
        // ], [
        //     'name.required' => 'Please enter your name',
        //     'email.required' => 'Please enter your email address',
        //     'email.email' => 'Please enter a valid email address',
        //     'email.unique' => 'This email address is already in use',
        //     'password.required' => 'Please enter your password',
        //     'password.min' => 'Password must be at least 6 characters long',
        //     'password.confirmed' => 'Password confirmation does not match',
        //     'address.required' => 'Please enter your address',
        //     'phone.required' => 'Please enter your phone number',
        //     'phone.unique' => 'This phone number is already in use',
        //     'phone.regex' => 'Please enter a valid phone number',
        //     'dob.required' => 'Please enter your date of birth',
        //     'dob.date' => 'Please enter a valid date',
        //     'package_name.required' => 'Please enter the package name',
        //     'router_password.required' => 'Please enter the router password',
        //     'router_password.min' => 'Router password must be at least 6 characters long',
        //     'router_name.required' => 'Please enter the router name',
        // ]);

        $package = Package::where("id", $request->package_name)->firstOrFail();
        $router = Router::where("id", $request->router_name)->firstOrFail();
        $randomNumber = rand(1000000, 9999999);

        try {
            $client = new Client([
                "host" => $router->ip,
                "user" => $router->username,
                "pass" => $router->password,
            ]);

            $query = new Query("/ppp/secret/add");
            $query->equal("name", $request->name);
            $query->equal("password", $randomNumber);
            $query->equal("service", 'any');
            $query->equal("profile", $package->name);

            $client->query($query)->read();
        } catch (\Exception $e) {
            return back()->with("error", __("Mikrotik connection fails"));
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_id = $randomNumber;
        $user->role = 'user';
        $user->password = Hash::make($user->user_id);
        $user->save();

        $details = new Detail();
        $details->phone = $request->phone;
        $details->address = $request->address;
        $details->dob = $request->dob;
        $details->pin = $request->pin;
        $details->router_password = $user->user_id;
        $details->package_name = $package->name;
        $details->router_name = $router->name;
        $details->package_price = $package->price;
        $details->due = $package->price;
        $details->status = 'active';
        $details->package_start = Carbon::now();
        $details->user_id = $user->id;
        $details->save();

        $billing = new Billing();
        $billing->invoice = $billing->generateRandomNumber();
        $billing->package_name = $details->package_name;
        $billing->package_price = $details->package_price;
        $billing->package_start = $details->package_start;
        $billing->user_id = $user->id;
        $billing->save();

        return redirect("users")->with("success", __("User added successfully"));
    }

}