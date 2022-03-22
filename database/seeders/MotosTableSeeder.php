<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motos')->insert([
            'modeloMoto' => 'MT-09',
            'marcaMoto' => 'Yamaha',
            'anoMoto' => '2021',
            'imagemMoto' => '',
            ]);
        DB::table('motos')->insert([
            'modeloMoto' => 'PCX',
            'marcaMoto' => 'Honda',
            'anoMoto' => '2005',
            'imagemMoto' => '',
            ]);
        DB::table('motos')->insert([
            'modeloMoto' => 'S1000RR',
            'marcaMoto' => 'BMW',
            'anoMoto' => '2017',
            'imagemMoto' => '',
            ]);
    }
}
