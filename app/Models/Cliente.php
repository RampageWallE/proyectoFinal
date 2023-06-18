<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    //conexion con mongodb I think
    protected $connection = 'mongodb';
    //forzar nombre de la migracion 
    protected $collection = 'clientes';
}
