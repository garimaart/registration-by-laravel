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
            'last_name' => 'required|max:1000|unique:posts,slug',
            'email' => 'required|unique:customers,email',
            'phone' => 'required|min:10',
            'password' => 'required|
            min:6|
            regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|
            confirmed',           
        ]);

        Customer::createorupdate($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
      }
}
