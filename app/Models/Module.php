<?php

namespace App\Models;

use App\Enums\StateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Libs\Pixie\QB;
use Models\Modulo;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $fillable = [
        'id_parent',
        'id_type_user',
        'sort',
        'name',
        'url',
        'icon',
        'root',
        'section',
        'level',
        'badge',
        'state',
    ];

    public static function getModulesFathersWithChildren(){
        //obtener todos los modulos
        $modulesFathers = self::getModulesCustom(true);
        $modulesChildren = self::getModulesCustom(null, true);
        foreach ($modulesFathers as $o){
            $o->children = self::getChildrenById($o->id, $modulesChildren);
        }
        return $modulesFathers;
    }

    public static function getChildrenById($idModule, $modulesChildren)
    {
        $childrenRsp = [];
        foreach ($modulesChildren as $o){
            if($o->id_parent == $idModule){
                $childrenRsp[] = $o;
            }
        }
        return $childrenRsp;
    }

    public static function getModulesCustom($onlyFathers = null, $onlyChildren = null)
    {
        $qb = DB::table('modules');
        $qb->select([
            'id',
            'id_parent',
            'name',
            'url',
            'sort',
        ]);
        $qb->where('state', StateEnum::ENABLED);
        if($onlyFathers){
            $qb->where('id_parent', 0);
        }
        if($onlyChildren){
            $qb->where('id_parent', '!=',0);
        }

        $qb->orderBy('sort', 'ASC');
        return $qb->get();
    }

}
