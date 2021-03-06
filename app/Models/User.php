<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use LogsActivity;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Users';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $ignoreChangedAttributes = ['password'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $dates = [
        'last_login'
    ];


    protected static $logAttributes = [
        'name',
        'email',
        'organisation',
        'job_title',
        'department',
        'active',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'job_title',
        'department',
        'organisation',
        'password',
        'last_login',
        'last_login_ip',
        'active',
    ];

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
    ];

    /**
     * The attributes that should be cast to native types.
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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if (!$user->roles()->get()->contains(2)) {
                $user->roles()->attach(2);
            }
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function clients()
    {
        return $this->hasMany(clients::class);
    }

    public function reviews()
    {
        return $this->hasMany(clients::class);
    }

    public function dashOrders()
    {
        $this->hasMany(DashOrder::class);
    }

    public function AnnualReviewLinks()
    {
        return $this->hasMany(AnnualReviewLink::class);
    }

    public function setPasswordAttribute($password)
    {
        if (trim($password) === '') {
            return;
        }
        $this->attributes['password'] = bcrypt($password);
    }
}
