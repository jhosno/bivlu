<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('publishers')->insert([
            'nombre' => 'Salamandra',  
            'pais' => 'España',  
        ]); 
    }
}
