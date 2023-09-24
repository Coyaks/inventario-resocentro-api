<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\StateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'id_person',
        'id_role',
    ];
    #Si no usas los campos de timestamps
    #public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public static function getUserWithPerson($idUser = null)
    {
        $qb = DB::table('users as us');
        $qb->select(
            'us.*',
            'pe.name as pe_name',
            'pe.surname as pe_surname',
            DB::raw('CONCAT(pe.name, " ", pe.surname) as pe_fullname')
        );
        $qb->join('persons as pe', 'pe.id', '=', 'us.id_person');
        $qb->where('us.state', StateEnum::ENABLED);
        if($idUser){
            $qb->where('us.id', $idUser);
            return $qb->first();
        }
        return $qb->get();
    }


  /*  public function root()
    {
        return $this->ro_name === 'Root';
    }*/

    public function baseDir()
    {
        return '';
    }

}
