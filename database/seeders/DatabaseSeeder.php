<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() : void
    {
        $this->call([
            SettingsSeeder::class,
            PersonsSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            ModulesSeeder::class,
            PermsSeeder::class,
            TypePersonsSeeder::class
        ]);
    }
}
