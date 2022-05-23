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
        'apellido',
        'celular',
        'tipo',
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

    static public $atributos = ['name','email','apellido','celular','tipo',];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function profesor(){
        return $this->hasOne(Profesor::class,'id_profe','id');
    }
    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }
    public function permissions(){
        return $this->belongsToMany('App\Models\Permission')->withTimestamps();
    }
    public function has_permission($id)
    {
        $flag=false;
        foreach ($this->permissions as $permission){
            if ($permission->id == $id || $permission->slug == $id){
                $flag = true;
            }
        }
        return $flag;
    }
    public function has_any_role(array $roles): bool
    {
        foreach ($roles as $role){
            if ($this->has_role($role)) {
                return true;
            }
        }
        return false;
    }
    public function has_role($id)
    {
        $flag =false;
        foreach ($this->roles as $role){
            if ($role->id == $id || $role->slug == $id ){
                $flag = true;
            }
        }
        return $flag;
    }
    //asinacion de roles y permisos
}
