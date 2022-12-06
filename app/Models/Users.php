<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'name',
        'surname',
        'email',
        'password',
        'image'
    ];

    //public function citas(){
   //     return $this->hasMany(Cita::class,'id_usuario','id');
   // }
}
