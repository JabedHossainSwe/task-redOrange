<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ownership',
        'tin',
        'bin',
        'year_of_registration',
        'years_in_operation',
        'address',
        'website',
        'contact_name',
        'contact_email',
        'contact_phone',
        'trade_license_path',
        'tin_pdf_path',
        'bin_pdf_path',
        'certificate_of_incorporation_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
