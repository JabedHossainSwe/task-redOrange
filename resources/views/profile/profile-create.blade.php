@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Complete Your Organization Profile</h2>

        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nature of Ownership -->
            <div class="form-group">
                <label for="ownership">Nature of Ownership</label>
                <select name="ownership" id="ownership" class="form-control" required>
                    <option value="Sole-Proprietorship">Sole-Proprietorship</option>
                    <option value="Private Ltd.">Private Ltd.</option>
                    <option value="Public Ltd.">Public Ltd.</option>
                    <option value="Partnership Business">Partnership Business</option>
                    <option value="NGO/NPO">NGO/NPO</option>
                    <option value="Govt. Entity">Govt. Entity</option>
                </select>
            </div>

            <!-- TIN -->
            <div class="form-group">
                <label for="tin">Tax Identification Number (TIN)</label>
                <input type="number" name="tin" id="tin" class="form-control" required>
                @error('tin')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- BIN -->
            <div class="form-group">
                <label for="bin">Business Identification Number (BIN) (optional)</label>
                <input type="number" name="bin" id="bin" class="form-control">
            </div>

            <!-- Year of Registration -->
            <div class="form-group">
                <label for="year_of_registration">Year of Registration</label>
                <input type="number" name="year_of_registration" id="year_of_registration" class="form-control" required>
            </div>

            <!-- Number of Years in Operation -->
            <div class="form-group">
                <label for="years_in_operation">Number of Years in Operation</label>
                <input type="number" name="years_in_operation" id="years_in_operation" class="form-control" required>
            </div>

            <!-- Registered Office Address -->
            <div class="form-group">
                <label for="address">Registered Office Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <!-- Website URL -->
            <div class="form-group">
                <label for="website">Website URL (optional)</label>
                <input type="url" name="website" id="website" class="form-control">
            </div>

            <!-- Contact Person Name -->
            <div class="form-group">
                <label for="contact_name">Contact Person Name</label>
                <input type="text" name="contact_name" id="contact_name" class="form-control" required>
            </div>

            <!-- Contact Person Email -->
            <div class="form-group">
                <label for="contact_email">Contact Person Email</label>
                <input type="email" name="contact_email" id="contact_email" class="form-control" required>
                @error('contact_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contact Person Phone -->
            <div class="form-group">
                <label for="contact_phone">Contact Person Phone Number</label>
                <input type="text" name="contact_phone" id="contact_phone" class="form-control" required>
                @error('contact_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- File Uploads (PDF) -->
            <div class="form-group">
                <label for="trade_license">Trade License (PDF)</label>
                <input type="file" name="trade_license" id="trade_license" class="form-control" accept="application/pdf"
                    required>
                @error('trade_license')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tin_pdf">TIN (PDF)</label>
                <input type="file" name="tin_pdf" id="tin_pdf" class="form-control" accept="application/pdf" required>
            </div>

            <div class="form-group">
                <label for="bin_pdf">BIN (PDF) (optional)</label>
                <input type="file" name="bin_pdf" id="bin_pdf" class="form-control" accept="application/pdf">
            </div>

            <div class="form-group">
                <label for="certificate_of_incorporation">Certificate of Incorporation (PDF) (optional)</label>
                <input type="file" name="certificate_of_incorporation" id="certificate_of_incorporation"
                    class="form-control" accept="application/pdf">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
