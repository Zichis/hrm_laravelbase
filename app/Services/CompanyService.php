<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompanyService {
    public function isCompanyStaff(Company $company, ?User $staff = null): bool
    {
        if (Auth::user()->company == $company) {
            return true;
        }

        if (!is_null($staff) && $staff instanceof User) {
            if ($staff->company == $company) {
                return true;
            }
        }

        return false;
    }
}
