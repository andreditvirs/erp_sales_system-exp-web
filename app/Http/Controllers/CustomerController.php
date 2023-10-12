<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function getData()
    {
        $customers = Customer::all();
        return ResponseHelper::sendApiSuccess($customers);
    }

    public function create()
    {
        return view('customer.create');   
    }

    public function store(Request $request)
    {
        $item = new Customer;
        $item->code = $request->code;
        $item->name = $request->name;
        $item->address = $request->address;
        $item->phone_no = $request->phone_no;
        $item->city = $request->city;
        $item->save();
        return ResponseHelper::sendApiSuccess($item, "Data is Strored!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Customer::find($id);
        return view('customer.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Customer::find($id);
        $item->name = $request->name;
        $item->address = $request->address;
        $item->phone_no = $request->phone_no;
        $item->city = $request->city;
        $item->save();
        return ResponseHelper::sendApiSuccess($item, "Data is Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Customer::find($id);
        $item->delete();
        return ResponseHelper::sendApiSuccess([], "Data is Deleted!");
    }

    public function getName(Request $request)
    {
        $id = $request->id;
        
        $customer = Customer::find($id);
        return response()->json($customer);
    }
}
