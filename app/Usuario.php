<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tb_usuarios';
    protected $primaryKey = 'id_user';
    protected $fillable = ['user_name', 'user_email', 'user_pass'];
}
