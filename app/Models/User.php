<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

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


    public function adminlte_image(){
        return $this->profile_photo_url;
    }

    public function adminlte_desc()
    {
        // modificar código cuando se haga tabla de roles
        // return 'rol del usuario';
        return 'Administrador';


    //     if ($this->hasRole('Admin')) {
    //         return 'Administrador';
    //     }
    //     elseif ($this->hasRole('Gestor')) {
    //         return 'Gestor';
    //     }
    //     else{
    //         return 'Usuario';
    //     }

    }

    public function adminlte_profile_url()
    {
        // modificar código para ir al perfil del usuario 
        // return 'profile/username';
        return 'user/profile';
    }

    //Relaciones uno a muchos

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }

}
