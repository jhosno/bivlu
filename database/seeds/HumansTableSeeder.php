<?php

use App\Human;
use App\Student;
use Illuminate\Database\Seeder;

class HumansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Human::create(
        	[
        	'cedula'=>'12345678',
        	'nombres'=>'Jhosnoirlit Gabriela',
        	'apellidos'=>'Hernandez Castillo',
            'numero_telefono'=>'04124373630',
        	]);
        Human::create(
        	[
        	'cedula'=>'23456789',
        	'nombres'=>'Heider Daniel',
        	'apellidos'=>'Sanchez',
            'numero_telefono'=>'04124373630',
        	]);
        Human::create(
        	[
        	'cedula'=>'3456789',
        	'nombres'=>'Geovanny Jesus',
        	'apellidos'=>'Abbinante',
            'numero_telefono'=>'04124373630',
        	]);
        Human::create(
        	[
        	'cedula'=>'4567890',
        	'nombres'=>'Jesús Omar',
        	'apellidos'=>'Guevara Rivas',
            'numero_telefono'=>'04124373630',
        	]);
        Human::create(
            [
            'cedula'=>'8765432',
            'nombres'=>'Esperanza',
            'apellidos'=>'Castellano',
            'numero_telefono'=>'04124373630',
            ]);
        Human::create(
            [
            'cedula'=>'121212',
            'nombres'=>'Saori',
            'apellidos'=>'Kido',
            'numero_telefono'=>'04124373630',
            ]);
        Student::create(
            [
            'human_id'=>'2',
            'speciality_id'=>'1', 
            ]);
        Student::create(
            [
            'human_id'=>'3',
            'speciality_id'=>'1', 
            ]);
        Student::create(
            [
            'human_id'=>'6',
            'speciality_id'=>'1', 
            ]);
    }
}
