<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'id_type_person' => 1,
                'id_module'      => 1,
                'name'           => 'Root',
            ],
            [
                'id_type_person' => 1,
                'id_module'      => 1,
                'name'           => 'Administrador',
            ]
        ]);
    }
}
