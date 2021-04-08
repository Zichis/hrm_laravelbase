<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company1 = Company::create([
            'name' => 'TripleeeMedia',
            'identifier' => str_replace(' ','-','TripleeeMedia')
        ]);

        $company2 = Company::create([
            'name' => 'Jetbrains',
            'identifier' => str_replace(' ','-','Jetbrains')
        ]);

        $adminRolesArray = ['add staff', 'view staff', 'delete staff', 'update staff'];

        $companyAdmin = Role::create(['name' => 'COMPANY_ADMIN_ROLE']);
        $companyHr = Role::create(['name' => 'COMPANY_HR_ROLE']);
        $companyStaff = Role::create(['name' => 'COMPANY_USER_ROLE']);
        $companyManager = Role::create(['name' => 'COMPANY_MANAGER_ROLE']);

        foreach ($adminRolesArray as $role) {
            $companyAdmin->givePermissionTo(Permission::create(['name' => $role]));
        }

        $user1 = User::create([
            'email' => 'ezichiofficial@gmail.com',
            'password' => Hash::make('password'),
            'company_id' => $company1->id
        ]);

        $user1->personal()->create([
            'first_name' => 'Ezichi',
            'last_name' => 'Ebere'
        ]);

        $user1->assignRole($companyAdmin);

        $user2 = User::create([
            'email' => 'johndoe@company.com',
            'password' => Hash::make('password'),
            'company_id' => $company1->id
        ]);

        $user2->personal()->create([
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]);

        $user2->assignRole($companyStaff);
    }
}
