<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyStaffController extends Controller
{
    public function index(string $company)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (Auth::user()->company != $company) {
            abort('404');
        }

        return view('company.staff.index', ['company' => $company]);
    }

    public function create()
    {
        return view('company.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => auth()->user()->company->id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('staff.index', auth()->user()->company->identifier);
    }
}
