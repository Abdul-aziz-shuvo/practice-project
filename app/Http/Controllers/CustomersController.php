<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{

    public function index()
    {
        $customers = Customer::all();


        return view(
            'customers.index',
            compact('customers')
        );
    }


    public function create()
    {
        $customer = new Customer();
        $companies = Company::all();
        return view('customers.create', compact('customer', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',

        ]);

        // dd($data);

        $data = new Customer();
        $data->name = $request->name;
        $data->slug = str_slug($request->name).'-'.uniqid();
        $data->email = $request->email;
        $data->active = $request->active;
        $data->company_id = $request->company_id;
        $data->save();


        return redirect('customer');
    }


    public function show(Customer $customer)
    { 
         
       
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {   
       
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',

        ]);

        // dd($data);

        $data = $customer;
        $data->name = $request->name;
        $data->slug = str_slug($request->name).'-'.uniqid();
        $data->email = $request->email;
        $data->active = $request->active;
        $data->company_id = $request->company_id;
        $data->save();



        return redirect('customer/' . $customer->id);
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customer');
    }
}
