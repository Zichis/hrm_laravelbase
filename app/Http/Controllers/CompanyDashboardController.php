<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
{
    public function index(string $company)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (Auth::user()->company != $company) {
            abort('404');
        }
        return view('company.dashboard.index', [
            'company' => $company
        ]);
    }
}
