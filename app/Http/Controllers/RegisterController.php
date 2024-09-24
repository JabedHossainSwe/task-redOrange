<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function create(array $data)
    {
        return User::create([
            'organization_name' => $data['organization_name'],
            'organization_type_id' => $data['organization_type_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'organization_name' => 'required|string|max:255',
            'organization_type_id' => 'required|exists:organization_types,id',
            'email' => 'required|string|email:rfc,dns|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create user and fire Registered event
        event(new Registered($user = $this->create($request->all())));

        // Send verification email
        $user->sendEmailVerificationNotification();

        // Log the user in (optional)
        // Auth::login($user);

        return redirect()->route('verification.notice')->with('status', 'Verification link sent! Check your email.');
    }
}
