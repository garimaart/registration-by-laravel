<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create() { 

        return view('customer.create'); 
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

        Customer::createorupdate($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
      }
}
