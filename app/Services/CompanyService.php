<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyService {
    public function isCompanyStaff(Company $company): bool
    {
        if (Auth::user()->company == $company) {
            return true;
        }

        return false;
    }
}
