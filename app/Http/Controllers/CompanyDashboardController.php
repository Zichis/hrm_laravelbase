<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
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

        return view('company.dashboard.index', [
            'company' => $company
        ]);
    }
}
