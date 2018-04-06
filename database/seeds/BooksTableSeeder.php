<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('books')->insert([ 
            'tipo' => 'LIBRO',
            'titulo' => '20 000 Leguas de Viaje Submarino',
            'anio_edicion' => '2010',
            'numero_paginas' => '123',
            'sala' => '1',
            'portada' => 'TAPA BLANDA',
            'idioma' => 'ESPAÑOL',
            'fecha_incorporacion' => '2011-01-07', 
            'publisher_id' => 1,
            'speciality_id' => 1,
            'resumen' => 'Viaje a lo largo del mundo en un submarino, de la mano fuurisa de Julio Verne. Sumergee en una avenura replea de pasion y peligros.'
        ]);
    	DB::table('books')->insert([ 
            'tipo' => 'LIBRO',
            'titulo' => '100 años de soledad',
            'anio_edicion' => '1998',
            'numero_paginas' => '123',
            'sala' => '1',
            'portada' => 'TAPA DURA',
            'idioma' => 'ESPAÑOL',
            'fecha_incorporacion' => '2011-01-07', 
            'publisher_id' => 1,
            'speciality_id' => 1,
            'resumen' => 'Una saga muligeneracional, que nos adenra en la familia Buendia y la fundacion de Macondo, una poblacion ficicia surgida de la imaginacion ganadora de un Nobel de Lieraura.'
        ]);
    	DB::table('books')->insert([ 
            'tipo' => 'LIBRO',
            'titulo' => 'Viaje al Centro de la Tierra',
            'anio_edicion' => '2010',
            'numero_paginas' => '123',
            'sala' => '1',
            'portada' => 'TAPA BLANDA',
            'idioma' => 'ESPAÑOL',
            'fecha_incorporacion' => '2015-09-27', 
            'publisher_id' => 1,
            'speciality_id' => 1,
            'resumen' => 'Una ripulacion emeraria se avenura a indagar en lo mas hondo del planea para hallar el cenro del planea.'
        ]);
        DB::table('books')->insert([ 
            'tipo' => 'LIBRO',
            'titulo' => 'Don Quijoe de la Mancha',
            'anio_edicion' => '1500',
            'numero_paginas' => '1269',
            'sala' => '1',
            'portada' => 'TAPA BLANDA',
            'idioma' => 'ESPAÑOL',
            'fecha_incorporacion' => '2015-09-27', 
            'publisher_id' => 1,
            'speciality_id' => 1,
            'resumen' => 'Un avido hidalgo lecor de novelas de caballeria ermina por ceder a la locura en medio de su voraz apeio por las hisorias de epica.'
        ]);
        DB::table('books')->insert([ 
            'tipo' => 'LIBRO',
            'titulo' => 'Mago de Oz',
            'anio_edicion' => '1900',
            'numero_paginas' => '123',
            'sala' => '1',
            'portada' => 'TAPA BLANDA',
            'idioma' => 'ESPAÑOL',
            'fecha_incorporacion' => '2015-09-27', 
            'publisher_id' => 1,
            'speciality_id' => 1,
            'resumen' => 'Un leon sin valor, un espanapajaros sin cerebro, un robo sin corazon y una nina sin oficio.'
        ]);
        DB::table('books')->insert([ 
            'tipo' => 'LIBRO',
            'titulo' => 'The Hellbound Heart',
            'anio_edicion' => '1900',
            'numero_paginas' => '50',
            'sala' => '1',
            'portada' => 'TAPA BLANDA',
            'idioma' => 'ENGLISH',
            'fecha_incorporacion' => '2015-09-27', 
            'publisher_id' => 1,
            'speciality_id' => 1,
            'resumen' => 'Deep inside he human hear, he sickes passions and desires live wihin. An arifac, called he Lemarchand Box, promises o he seekers a whole new world of feelings, involving pleny of pleasure... or pain?'
        ]);
    	DB::table('author_book')->insert([ 
            'author_id' => 1,
            'book_id' =>1
        ]);
    	DB::table('author_book')->insert([ 
            'author_id' => 1,
            'book_id' =>3
        ]);
    	DB::table('author_book')->insert([ 
            'author_id' => 2,
            'book_id' =>2
        ]);
        DB::table('author_book')->insert([ 
            'author_id' => 3,
            'book_id' =>4
        ]);
        DB::table('author_book')->insert([ 
            'author_id' => 4,
            'book_id' =>5
        ]);
        DB::table('author_book')->insert([ 
            'author_id' => 5,
            'book_id' =>6
        ]);
    	DB::table('book_tag')->insert([ 
            'tag_id' => 2,
            'book_id' =>1
        ]);
    	DB::table('book_tag')->insert([ 
            'tag_id' => 1,
            'book_id' =>2
        ]);
        DB::table('book_tag')->insert([ 
            'tag_id' => 2,
            'book_id' =>2
        ]);
    	DB::table('book_tag')->insert([ 
            'tag_id' => 2,
            'book_id' =>3
        ]);
        DB::table('book_tag')->insert([ 
            'tag_id' => 2,
            'book_id' =>4
        ]);
        DB::table('book_tag')->insert([ 
            'tag_id' => 2,
            'book_id' =>5
        ]);
        DB::table('book_tag')->insert([ 
            'tag_id' => 2,
            'book_id' =>6
        ]);
    }
}
