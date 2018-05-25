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
        	'cedula'=>'21026870',
        	'nombres'=>'Jhosnoirlit Gabriela',
        	'apellidos'=>'Hernández Castillo',
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
        	'cedula'=>'4367905',
        	'nombres'=>'José Antonio Hernández',
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
            'cedula'=>' 8810760',
            'nombres'=>'Esperanza',
            'apellidos'=>'Castellano',
            'numero_telefono'=>'04144903142',
            ]);
        Human::create(
            [
            'cedula'=>'10356503',
            'nombres'=>'Noiralith Irene',
            'apellidos'=>'Castillo Capote',
            'numero_telefono'=>'04127572161',
            ]);
        Human::create(
            [
            'cedula'=>'17270003',
            'nombres'=>'Digna Leonor',
            'apellidos'=>'Salcedo',
            'numero_telefono'=>'04262209579',
            ]);
        Human::create(
            [
            'cedula'=>'6670846',
            'nombres'=>'Ana',
            'apellidos'=>'Toro',
            
            ]);
        Human::create(
            [
            'cedula'=>'8817817',
            'nombres'=>'Mercedes',
            'apellidos'=>'Cardell',
            
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
        Student::create(
            [
            'human_id'=>'7',
            'speciality_id'=>'1', 
            ]);
    }
}
