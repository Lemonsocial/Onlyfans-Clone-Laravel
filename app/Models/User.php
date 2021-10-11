<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use App\Traits\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    // protected $with = ['user'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'google_id',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'personal_settings',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'site_security_settings' => 'array',
        'site_notification_settings' => 'array',
        'site_toast_settings' => 'array',
        'site_privacy_settings' => 'array',
        'site_security_settings' => 'array',
        'identification'=> 'array',
        'personal_settings' => 'array'
    ];
    protected $attributes = [
        'site_security_settings' => '{
            "Google Authenticator":false,
            "Phone OTP Verification":false,
            "Phone Number":"",
            "Phone Is Verified":false
        }',
        'site_notification_settings' => '{
            "New Campaign Contribution":true,
            "New Comment":true,
            "New Likes":true,
            "Discounts from users I used to follow":true,
            "New Subscriber":true,
            "New Tip":true,
            "Upcoming stream reminders":true
        }',
        'site_toast_settings' => '{
            "New Campaign Contribution":true,
            "New Comment":true,
            "New Likes":true,
            "New Subscriber":true,
            "New Tip":true
        }',
        'site_privacy_settings' => '{
            "Show Activity Status":true,
            "Show Subscription Offers":true,
            "Allow Costreaming Requests":""
        }',
        'site_security_settings' => '{
            "theme": "minimalist",
            "color": "light"
        }',
        'personal_settings' => '{
            "Dark Mode": false,
            "Language":"en",
            "Allow Costreaming Requests":"Nobody"   
        }',
        'identification' => '{
            "identification_type": "none",
            "identification_verified":false ,
            "identification_front_side_url":"",
            "identification_side_by_side_url":"",
            "identification_expires_on":"",
            "releases":""
        }'

    ];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];
}
