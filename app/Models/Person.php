<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;

    //public $timestamps = false;

    protected $table = "persons";

    protected $fillable = [
      'id_type_person',
      'name',
      'surname',
      'document',
      'email',
      'phone',
      'address',
      'id_city',
      'id_province',
      'id_district',
      'contact_person',
      'birth_date',
      'observations',
      'gender',
      'state',
      'created_by',
      'updated_by',
    ];

}
