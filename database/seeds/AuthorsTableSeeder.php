<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('authors')->insert([
            'nombre' => 'JULIO VERNE',  
        ]);
    	DB::table('authors')->insert([
            'nombre' => 'GABRIEL GARCIA MARQUEZ',  
        ]);
        DB::table('authors')->insert([
            'nombre' => 'MIGUEL DE CERVANES',  
        ]);
        DB::table('authors')->insert([
            'nombre' => 'DESCONOCIDO',  
        ]);
        DB::table('authors')->insert([
            'nombre' => 'CLIVE BARKER',  
        ]);
    }
}