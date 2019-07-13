<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }


    public function create()
    {
        return view('companies.create');
    }

    public function store()
    {
        $rules = request()->validate([
            'name' => 'required|min:4|max:15'
        ]);

        Company::create($rules);
        return redirect('company');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('company');
    }
}
