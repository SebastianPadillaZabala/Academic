<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

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

    static public $atributos = ['name','email','apellido','celular','tipo'];
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
    public function has_curso($idc){
        $flag=false;
        $id = Auth()->user()->id;
        $curso = DB::select('SELECT id_curso FROM  cursos_alumnos, cursos, alumnos
                      where cursos.id_curso=cursos_alumnos.curso_id and  alumnos.id_alum=cursos_alumnos.alumno_id
                        and alumnos.id_user = '. $id);
        foreach ($curso as $c){
            if ($c->id_curso == $idc)
                return true;
        }
        return false;
    }

    public function id_alum(){
        $idu = Auth::user()->id;
        $alumno = DB::select('SELECT * FROM alumnos, users where alumnos.id_user=users.id and users.id = '. $idu);
        return $alumno[0]->id_alum;
    }
}
