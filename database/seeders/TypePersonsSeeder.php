<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_persons')->insert([
            [
                'name' => 'Usuario interno',
            ],
            [
                'name' => 'Cliente',
            ]
        ]);
    }
}
