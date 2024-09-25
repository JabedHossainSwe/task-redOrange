<?php
namespace App\Http\Controllers;

use App\Models\OrganizationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'name' => $validated['organization_name'],
            'organization_type_id' => 1,
            'email' => $validated['email'],
            'password' => Hash::make('password'),
        ]);
        $user->sendEmailVerificationNotification();
        Auth::login($user);

        return redirect()->route('profile.create');
    }
}
