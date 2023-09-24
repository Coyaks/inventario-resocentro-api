<?php namespace App\Models;

class Pair
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function getYesOrNotOptions(){
        return [
            pair('1', 'SI'),
            pair('0', 'NO'),
        ];
    }

}
