<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('persona')->insert([
            'nombre' => 'Duilio Palacios',
            'edad' => 20,
            'fecha_Nacimiento' => '12/07/1997'
            
        ]);
       
    }
}
