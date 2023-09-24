<?php namespace App\Models;

use Inc\Bases\BaseModel;

class State
{
    public $id;
    public string $color;
    public string $colorText;
    public string $name;
    public string $surname;
    public string $fontSize;

    /**
     * State constructor.
     * @param string $color
     * @param string $name
     * @param string $surname
     */
    public function __construct(
        string $color = '',
        string $name = '',
        string $surname = '',
        string $colorText = null,
        string $fontSize = '' //default '9px'
    )
    {
        $this->color = $color;
        $this->name = $name;
        $this->surname = $surname;
        $this->colorText = is_null($colorText) ?  BaseModel::COLOR_BLANCO : $colorText;
        $this->fontSize = $fontSize;
    }

    private static function mapGeneral()
    {
        return [
            BaseModel::_STATE_ENABLED  => new State('#0abb87', 'Activo'),
            BaseModel::_STATE_DISABLED => new State('#ffb822', 'Inactivo'),
            BaseModel::_STATE_DELETED  => new State('#fd397a', 'Eliminado'),
        ];
    }

    public static function generalState($state)
    {
        $map = self::mapGeneral();
        return $map[$state] ?? new State();
    }

    private static function mapUser()
    {
       /* return [
            User::_STATE_ENABLED    => new State('#0abb87', 'Activo'),
            User::_STATE_DISABLED   => new State('#ffb822', 'Inactivo'),
            User::_STATE_UNVERIFIED => new State('#282a3c', 'Nuevo'),
            User::_STATE_DELETED    => new State('#fd397a', 'Eliminado'),
        ];*/
    }


}
