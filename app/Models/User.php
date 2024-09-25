<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'organization_name',
        'organization_type_id',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    protected function getEmailVerificationUrl()
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $this->id, 'hash' => sha1($this->email)]
        );
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function organizationType()
    {
        return $this->belongsTo(OrganizationType::class, 'organization_type_id');
    }
}
