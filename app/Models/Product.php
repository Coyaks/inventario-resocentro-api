<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; //Habilitar uso de factory (setear data fake in table)
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;
    //Todos los campos dentro de '$fillable' se podrán insertar o actualizar (is required)
    protected $fillable = [
        'name',
        'pv',
        'cu',
        'id_categoria',
    ];

}
