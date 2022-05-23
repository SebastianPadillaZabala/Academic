<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    protected $fillable=['name','slug','description','role_id'];
    //relaciones
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    //almacenamiento
    public function store($request){
        $slug = Str::slug($request->name,'-');
        return self::create($request->all()+[
                'slug'=>$slug,
                ]);
    }
}
