<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    // use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    //this field type date
    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
        //meprotec agar record ini tidak muncul
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    //one to many
    public function appointment(){ //nama function adalah tabel yg ingin dituju
        return $this->hasMany('app\Models\Operational\Appointment','user_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }
    
    //one to one
    public function detail_user(){ //nama function adalah tabel yg ingin dituju
        return $this->hasOne('app\Models\ManagamentAccess\DetailUser','user_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }

    //one to many
    public function role_user(){ //nama function adalah tabel yg ingin dituju
        return $this->hasMany('app\Models\ManagamentAccess\RoleUser','user_id'); //parameter 1 path yg ingin dituju, parameter 2 field yg ingin dituju
     }
}
