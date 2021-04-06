<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
    public function index(string $company)
    {
        return view('company.dashboard.index');
    }
}
