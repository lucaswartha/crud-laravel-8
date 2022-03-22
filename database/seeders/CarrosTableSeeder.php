<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CarrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carros')->insert([
            'modeloCarro' => 'Corola',
            'marcaCarro' => 'Toyota',
            'anoCarro' => '2021',
            'imagemCarro' => '',
            ]);
        DB::table('carros')->insert([
            'modeloCarro' => 'Prisma',
            'marcaCarro' => 'Chevrolet',
            'anoCarro' => '2015',
            'imagemCarro' => '',
            ]);
        DB::table('carros')->insert([
            'modeloCarro' => 'Celta',
            'marcaCarro' => 'Chevrolet',
            'anoCarro' => '2007',
            'imagemCarro' => '',
            ]);
    }
}
