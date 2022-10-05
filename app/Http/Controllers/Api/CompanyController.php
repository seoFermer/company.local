<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->paginate();

        $companiesList = $companies->map(function ($company) {
            return [
                'id' => $company->id,
                'name' => $company->name,
                'created_at' => $company->created_at
            ];
        });

        return response()->json([
            'companies' => $companiesList,
            'current_page' => $companies->currentPage(),
            'total' => $companies->total(),
            'last_page' => $companies->lastPage(),
        ], 200);
    }
}
