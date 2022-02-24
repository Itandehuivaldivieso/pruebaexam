<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class maestrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('maestros')->insert([
            'nombre' => 'Juanita perez'
            
        ]);
        DB::table('maestros')->insert([
            'nombre' => 'Agustin Esquivel'
            
        ]);
        DB::table('maestros')->insert([
            'nombre' => 'Isaias May'
            
        ]);
        DB::table('maestros')->insert([
            'nombre' => 'Blandy Pamplona'
            
        ]);
        DB::table('maestros')->insert([
            'nombre' => 'Laura Hidalgo'
            
        ]);
    }
}
