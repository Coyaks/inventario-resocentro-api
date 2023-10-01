<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {

        DB::table('maintenances')->insert([
            [
                'id_device'    => 1,
                'id_user' => 1,
                'observations'         => "test maintenances observations",
            ],
        ]);
    }
}
