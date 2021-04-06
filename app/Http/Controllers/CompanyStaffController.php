<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyStaffController extends Controller
{
    public function index(string $company)
    {
        return view('company.staff.index');
    }
}
