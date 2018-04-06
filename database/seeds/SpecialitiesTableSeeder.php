<?php

use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('specialities')->insert([
            'especialidad' => 'Informatica',  
            'area' => '',  
        ]);
    }
}
