<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('perms')->truncate();
        //$modules = Module::all();
        DB::table('perms')->insert([
            [
                'id_role'   => 1,
                'id_module' => 1,
                'see'       => 1,
                'edit'      => 1,
            ],
            [
                'id_role'   => 1,
                'id_module' => 2,
                'see'       => 1,
                'edit'      => 1,
            ],
        ]);
    }
}
