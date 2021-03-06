<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'company_name' => 'required|regex:/^[\pL\s]+$/u|unique:companies,name'
        ]);

        $company = Company::create([
            'name' => $request->company_name,
            'identifier' => str_replace(' ','-',$request->company_name)
        ]);

        Auth::login($user = User::create([
            'email' => $request->email,
            'company_id' => $company->id,
            'password' => Hash::make($request->password),
        ]));

        $user->personal()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        event(new Registered($user));

        // return redirect(RouteServiceProvider::HOME);
        return redirect("/" . $user->company->identifier . "/dashboard");
    }
}
