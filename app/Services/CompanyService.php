<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompanyService {
    public function isCompanyStaff(Company $company, ?User $user = null): bool
    {
        if (Auth::user()->company == $company) {
            return true;
        }

        if (!is_null($user) && $user instanceof User) {
            if ($user->company == $company) {
                return true;
            }
        }

        return false;
    }
}
