<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Handle the email verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        $user = User::findOrFail($request->route('id'));

        // Check if the verification hash is valid
        if (!hash_equals($request->route('hash'), sha1($user->email))) {
            throw new AuthorizationException;
        }

        // Mark the email as verified
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectTo);
        }

        $user->markEmailAsVerified();

        // Fire an event for the verified user
        event(new Verified($user));

        // Log in the user automatically
        Auth::login($user);

        return redirect($this->redirectTo)->with('verified', true);
    }

    /**
     * Get the response for a successful verification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function verified(Request $request)
    {
        return redirect($this->redirectTo);
    }
}
