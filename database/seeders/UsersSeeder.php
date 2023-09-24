<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        # User::factory()->create : crear un User con los campos especificados, pero los campos no especificados se generan de forma random (factory)
        /* User::factory()->create([
             'username' => 'root@skoy.pe',
             'password' => 'root',
         ]);*/
        //\App\Models\User::factory(5)->create();

        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id_person'         => 1,
                'id_role'           => 1,
                'username'          => 'root@focusit.pe',
                'password'          => Hash::make('root'),
                'email_verified_at' => null,
                'id_type_username'  => 1,
            ]
        ]);
    }
}
