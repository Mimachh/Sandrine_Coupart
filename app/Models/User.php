<?php

namespace App\Models;

use App\Models\Regime;
use App\Models\Patient;
use App\Models\Allergene;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function regimes()
    {
        return $this->belongsToMany(Regime::class);
    }

    public function allergenes()
    {
        return $this->belongsToMany(Allergene::class);
    }

    public function created_date() 
    {
        $date = $this->created_at;
        return "le ".date('d/m/y', strtotime($date)). " à ".date('h', strtotime($date))."h".date('m', strtotime($date));
    }

    public function updated_date() 
    {
        $date = $this->updated_at;
        return "le ".date('d/m/y', strtotime($date)). " à ".date('h', strtotime($date))."h".date('m', strtotime($date));
    }

}
