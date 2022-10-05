<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('users')->orderBy('created_at', 'DESC')->paginate();

        return view('backend.company.index', compact('companies'));
    }

    public function show(Company $company)
    {
        return view('backend.company.show', compact('company'));
    }

    public function create()
    {
        return view('backend.company.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Company::create($data);

        return redirect()->route('dashboard.company.index');
    }

    public function edit(Company $company)
    {
        return view('backend.company.edit', compact('company'));
    }

    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();
        $company->update($data);

        return redirect()->route('dashboard.company.show', $company->id);
    }

    public function delete(Company $company)
    {
        $company->users()->detach();
        $company->delete();

        return response()->json(['success' => true, 'message' => 'Company deleted successfully'], 200);

    }
}
