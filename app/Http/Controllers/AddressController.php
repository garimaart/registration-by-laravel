<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|excists',
            'addressline1' => 'required|max:255',
            'addressline2' => 'required|max:255',
            'country' => 'required|max:100',
            'state' => 'required|max:100',
        ]);

        Address::create($request->all());
        return json_encode(array(
            "statusCode" => 200,
        ));
    }
    public function Address()
    {
    	return view('customer.address');
    }
}
