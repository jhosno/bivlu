<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('items')->insert([
            'book_id' => 1, 
            'correlativo' => 1, 
        ]);
    	DB::table('items')->insert([
            'book_id' => 2, 
            'correlativo' => 1, 
        ]);
        DB::table('items')->insert([
            'book_id' => 2, 
            'correlativo' => 2, 
        ]);
        DB::table('items')->insert([
            'book_id' => 2, 
            'correlativo' => 3, 
        ]);
    	DB::table('items')->insert([
            'book_id' => 3, 
            'correlativo' => 1, 
        ]);
        DB::table('items')->insert([
            'book_id' => 3, 
            'correlativo' => 2, 
        ]);
        DB::table('items')->insert([
            'book_id' => 3, 
            'correlativo' => 3, 
        ]);
        DB::table('items')->insert([
            'book_id' => 4, 
            'correlativo' => 1, 
        ]);
        DB::table('items')->insert([
            'book_id' => 4, 
            'correlativo' => 2, 
        ]);
        DB::table('items')->insert([
            'book_id' => 4, 
            'correlativo' => 3, 
        ]);
        DB::table('items')->insert([
            'book_id' => 5, 
            'correlativo' => 1, 
        ]);
        DB::table('items')->insert([
            'book_id' => 5, 
            'correlativo' => 2, 
        ]);
        DB::table('items')->insert([
            'book_id' => 5, 
            'correlativo' => 3, 
        ]);
        DB::table('items')->insert([
            'book_id' => 5, 
            'correlativo' => 4, 
        ]);
        DB::table('items')->insert([
            'book_id' => 6, 
            'correlativo' => 1, 
        ]);
        DB::table('items')->insert([
            'book_id' => 6, 
            'correlativo' => 2, 
        ]);
        DB::table('items')->insert([
            'book_id' => 6, 
            'correlativo' => 3, 
        ]);
    }
}
