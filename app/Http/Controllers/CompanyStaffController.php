<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyStaffController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(string $company)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company)) {
            abort('404');
        }

        return view('company.staff.index', ['company' => $company]);
    }

    public function create(string $company)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company)) {
            abort('404');
        }
        return view('company.staff.create', [
            'company' => $company
        ]);
    }

    public function store(Request $request, string $company)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company)) {
            abort('404');
        }
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'email' => $request->email,
            'company_id' => auth()->user()->company->id,
            'password' => Hash::make($request->password),
        ]);

        $user->personal()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        return redirect()->route('staff.index', auth()->user()->company->identifier);
    }

    public function show(string $company, User $staff)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company, $staff)) {
            abort('404');
        }

        return view('company.staff.show', [
            'staff' => $staff,
            'company' => $company
        ]);
    }

    public function edit(string $company, User $staff)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company, $staff)) {
            abort('404');
        }

        return view('company.staff.edit', [
            'staff' => $staff,
            'company' => $company
        ]);
    }

    public function update(Request $request, string $company, User $staff)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company, $staff)) {
            abort('404');
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$staff->id
        ]);

        $staff->update([
            'email' => $request->email,
        ]);

        $staff->personal->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        return redirect()->route('staff.show', [
            'company' => $company->identifier,
            'staff' => $staff->id
        ]);
    }

    public function destroy(string $company, User $staff)
    {
        $company = Company::where('identifier', $company)->firstOrFail();
        if (!$this->companyService->isCompanyStaff($company, $staff)) {
            abort('404');
        }

        $staff->personal->delete();
        $staff->delete();

        return redirect()->route('staff.index', $company->identifier);
    }
}
