<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $primaryKey ="id_Personas";
    use HasFactory;
    protected $fillable=[
        'nombre',
        'edad' ,
        'domicilio'
    ];
}