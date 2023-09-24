<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->truncate();

        // Agrega los registros de configuración
        DB::table('settings')->insert([
            [
                'name' => 'address',
                'value' => 'Av. Javier Prado, La Molina, Lima, Perú',
                'description' => 'Direccion de la empresa',
            ],
            [
                'name' => 'brand',
                'value' => 'Skoy soft',
                'description' => 'Nombre comercial',
            ],
            [
                'name' => 'cms_version',
                'value' => '1.0',
                'description' => 'version del cms',
            ],
            [
                'name' => 'coin',
                'value' => 'coin',
                'description' => 'Simbolo de moneda',
            ],
            [
                'name' => 'color_accent',
                'value' => '#ff6a00',
                'description' => 'Color primario',
            ],
            [
                'name' => 'country_code',
                'value' => 'PE',
                'description' => 'Codigo de pais ISO-2',
            ],
            [
                'name' => 'dni_ruc_token',
                'value' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNveWFrczE5QGdtYWlsLmNvbSJ9.1NdRT9-w-xvSN0NONmckZLfMLcVixw_7sC30dAW9ALI',
                'description' => 'APIS PERU: REST API para conculta de DNI & RUC ',
            ],
            [
                'name' => 'email',
                'value' => 'hola@skoy.pe',
                'description' => 'Email de la empresa',
            ],
            [
                'name' => 'enable_live',
                'value' => '0',
                'description' => "Habilitar o desabilitar controller live para simular realtime (actualizar dependiendo de 'interval')",
            ],
            [
                'name' => 'igv',
                'value' => '18',
                'description' => "Impuesto General a las Ventas (IGV) producto o servicio",
            ],
            [
                'name' => 'interval',
                'value' => '60',
                'description' => "Intervalo de tiempo en segundos para actualizar ajaxs u otros (controller live)",
            ],
            [
                'name' => 'interval',
                'value' => '60',
                'description' => "Intervalo de tiempo en segundos para actualizar ajaxs u otros (controller live)",
            ],
        ]);
    }
}
