<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('persons')->truncate();
        DB::table('persons')->insert([
            [
                'name'           => 'Root',
                'surname'        => 'Surdemo',
                'birth_date'     => '2000-01-01',
                'email'          => 'demo@demo.com',
                'phone'          => '999999999',
                'gender'         => 1,
                'id_type_person' => 2,
                'state'          => 1,
                'created_by'     => 1,
                'updated_by'     => 1,
            ]
        ]);
    }
}
