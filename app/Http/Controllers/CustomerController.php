<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function create() { 

        $customer = Customer::all();
        return view('customer.create')->with(compact('customer'));
       }  
       public function store(Request $request) {
        $request->validate([
            'site_id' => 'required|max:10',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|min:10',
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        Customer::create($request->all());
        return json_encode(array(
            "statusCode" => 200,
        ));
      }
      public function userdata()
    {
        $userData = Customer::get();
        return $userData;
    }
    public function index()
    {
        $customer = Customer::all();
        return view('customer.list')->with(compact('customer'));
    }
    public function set()
    {
       
        $customer = Customer::all();
        return view('customer.edit')->with(compact('customer'));
    }
    public function password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new Customer],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Customer::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        dd('Password change successfully.');
    }
}
