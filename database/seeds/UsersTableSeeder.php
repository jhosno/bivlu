<?php

use App\User; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        	[
        	'email'=>'jhosno@gmail.com',
        	'name'=>'Jhosnoirlit',
        	'password'=> Hash::make('12345678'),
        	'user_level'=>'admin',
            'domanda_di_securida'=>'Nombre de su software',
            'answer'=> md5('bivlu'),
            'human_id'=> 1
        	]);
        User::create(
            [
            'email'=>'daniel@gmail.com',
            'name'=>'Daniel',
            'password'=> Hash::make('12345678'),
            'user_level'=>'estudiante',
            'human_id'=> 2
            ]);
        User::create(
            [
            'email'=>'josanto@gmail.com',
            'name'=>'José',
            'password'=> Hash::make('12345678'),
            'user_level'=>'estudiante',
            'human_id'=> 3
            ]);
        User::create(
            [
            'email'=>'yisus@gmail.com',
            'name'=>'Jesús',
            'password'=> Hash::make('12345678'),
            'user_level'=>'profesor',
            'human_id'=> 4
            ]);
        User::create(
            [
            'email'=>'esperanzacastellano@hotmail.com',
            'name'=>'Esperanza',
            'password'=> Hash::make('12345678'),
            'user_level'=>'jefe',
            'human_id'=> 5
            ]);

    }
}
