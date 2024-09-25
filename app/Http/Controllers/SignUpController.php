<?php

namespace App\Http\Controllers;

use App\Models\OrganizationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignUpController extends Controller
{
    public function showSignUpForm()
    {
        $organizationTypes = OrganizationType::all();
        return view('sign-up', compact('organizationTypes'));
    }

    public function submitSignUpForm(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|exists:organization_types,id',
            'email' => 'required|email:rfc,dns|unique:users,email',
        ]);

        $user = User::create([
            'organization_name' => $validated['organization_name'],
            'organization_type_id' => $validated['organization_type'],
            'email' => $validated['email'],
            'password' => Hash::make('password'),
        ]);

        Log::info('Sending email verification notification...');
        $user->sendEmailVerificationNotification();
        Auth::login($user);

        return redirect()->route('profile.create');
    }

}
