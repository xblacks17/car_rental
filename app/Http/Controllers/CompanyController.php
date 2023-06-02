<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index()
    {

        return Inertia::render('Admin/Companies', [
            'companies' => Company::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Company::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function edit(Company $company, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $company->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->back();
    }
}
