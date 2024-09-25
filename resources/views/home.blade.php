@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- Company Profile Information --}}
                        @if ($profile)
                            <h3 class="mt-4">Company Profile</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nature of Ownership</th>
                                    <td>{{ $profile->ownership }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Name</th>
                                    <td>{{ $profile->contact_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $profile->contact_phone }}</td>
                                </tr>
                                <tr>
                                    <th> email</th>
                                    <td>{{ $profile->contact_email }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $profile->address }}</td>
                                </tr>
                                <tr>
                                    <th>Year of Registration</th>
                                    <td>{{ $profile->year_of_registration }}</td>
                                </tr>
                                <tr>
                                    <th>TIN</th>
                                    <td>{{ $profile->tin }}</td>
                                </tr>
                                <tr>
                                    <th>BIN</th>
                                    <td>{{ $profile->bin }}</td>
                                </tr>

                                <tr>
                                    <th>Trade License (PDF)</th>
                                    <td>
                                        @if (file_exists(public_path('storage/' . $profile->trade_license_path)))
                                            <a href="{{ asset('storage/' . $profile->trade_license_path) }}"
                                                target="_blank">Download</a>
                                        @else
                                            <span class="text-danger">File Not Found</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>TIN (PDF)</th>
                                    <td>
                                        @if (file_exists(public_path('storage/' . $profile->tin_pdf_path)))
                                            <a href="{{ asset('storage/' . $profile->tin_pdf_path) }}"
                                                target="_blank">Download</a>
                                        @else
                                            <span class="text-danger">File Not Found</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>BIN (PDF)</th>
                                    <td>
                                        @if (file_exists(public_path('storage/' . $profile->bin_pdf_path)))
                                            <a href="{{ asset('storage/' . $profile->bin_pdf_path) }}"
                                                target="_blank">Download</a>
                                        @else
                                            <span class="text-danger">File Not Found</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Certificate of Incorporation (PDF)</th>
                                    <td>
                                        @if (file_exists(public_path('storage/' . $profile->certificate_of_incorporation_path)))
                                            <a href="{{ asset('storage/' . $profile->certificate_of_incorporation_path) }}"
                                                target="_blank">Download</a>
                                        @else
                                            <span class="text-danger">File Not Found</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Joined</th>
                                    <td>{{ $profile->created_at->format('Y-m-d') }}</td>
                                </tr>

                            </table>
                        @else
                            <p>No company profile found for your account.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
