<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.profile-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ownership' => 'required|string',
            'tin' => 'required|numeric|unique:profiles,tin',
            'bin' => 'nullable|numeric',
            'year_of_registration' => 'required|numeric',
            'years_in_operation' => 'required|numeric',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email:rfc,dns',
            'contact_phone' => [
                'required',
                'regex:/^\+880[0-9]{8,11}$/',
            ],
            'trade_license' => 'required|file|mimes:pdf|max:2048',
            'tin_pdf' => 'required|file|mimes:pdf|max:2048',
            'bin_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'certificate_of_incorporation' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $tradeLicensePath = $request->file('trade_license')->store('uploads', 'public');
        $tinPdfPath = $request->file('tin_pdf')->store('uploads', 'public');
        $binPdfPath = $request->file('bin_pdf')->store('uploads', 'public');
        $certificateOfIncorporationPath = $request->file('certificate_of_incorporation')->store('uploads', 'public');

        Profile::create([
            'user_id' => auth()->id(),
            'ownership' => $validated['ownership'],
            'tin' => $validated['tin'],
            'bin' => $validated['bin'],
            'year_of_registration' => $validated['year_of_registration'],
            'years_in_operation' => $validated['years_in_operation'],
            'address' => $validated['address'],
            'website' => $validated['website'],
            'contact_name' => $validated['contact_name'],
            'contact_email' => $validated['contact_email'],
            'contact_phone' => $validated['contact_phone'],
            'trade_license_path' => $tradeLicensePath,
            'tin_pdf_path' => $tinPdfPath,
            'bin_pdf_path' => $binPdfPath,
            'certificate_of_incorporation_path' => $certificateOfIncorporationPath,
        ]);

        return redirect()->back()->with('success', 'Profile created successfully.');
    }

}
