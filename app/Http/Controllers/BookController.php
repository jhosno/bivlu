<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Tag;
use App\BookTag;
use App\AuthorBook;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        extract($request->only('query','author','tag','class'));

        $tag = explode(',',$tag);
        $author = explode(',',$author);

        $authorsFilter = function($q) use($author){ 
            foreach ($author as $key => $value) { 
                if($key==0) 
                        $q->where('nombre' , 'LIKE', "%".trim($value)."%" );
                else    
                        $q->orWhere( 'nombre', 'LIKE', "%".trim($value)."%" );    
            }
        };

        $tagsFilter = function($q) use($tag){
            foreach ($tag as $key => $value) {
                if($key==0) 
                    $q->where( 'palabras', 'LIKE', "%".trim($value)."%" );
                else    
                    $q->orWhere( 'palabras', 'LIKE', "%".trim($value)."%" ); 
            }
        };

        $data = Book::select('id','titulo','idioma','numero_paginas','portada','url','clasificacion','subclasificacion','resumen')
                    ->whereHas('authors', $authorsFilter)
                    ->whereHas('tags', $tagsFilter)
                    ->where('titulo','LIKE',"%$query%")
                    ->where('clasificacion','LIKE',"%$class%")
                    ->get()
                    ->toArray();

        $nuevoArreglo = [];

        foreach ($data as $key => $value) 
        {
            $bookFilter = function($q) use($value){
                    $q->where('books.id','=',$value['id']);
                };

            $value['tags'] = Tag::whereHas('books',$bookFilter)
                                ->get()
                                ->toArray();

            $value['authors'] = Author::whereHas('books',$bookFilter)
                                ->get()
                                ->toArray();

            $value['disponibles'] = Book::find($value['id'])
                                ->items()
                                ->where('estado_item','DISPONIBLE')
                                ->count();

            $nuevoArreglo[] = $value;
        }

        return view('ajax.books')->with('data',$nuevoArreglo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listado(Request $request)
    { 
        $data = Book::select('id','titulo','idioma','clasificacion','subclasificacion','numero_paginas','portada','url','resumen')
                    ->get()
                    ->toArray();

        $nuevoArreglo = []; 
        foreach ($data as $key => $value) 
        {
            $bookFilter = function($q) use($value){
                    $q->where('books.id','=',$value['id']);
                };

            $value['tags'] = Tag::whereHas('books',$bookFilter)
                                ->get()
                                ->toArray();

            $value['authors'] = Author::whereHas('books',$bookFilter)
                                ->get()
                                ->toArray();

            $value['disponibles'] = Book::find($value['id'])
                                ->items()
                                ->where('estado_item','DISPONIBLE')
                                ->count();

            $nuevoArreglo[] = $value;
        }
        return view('books.index')->with('data',$nuevoArreglo);
    }

    public function create()
    {
        return view('books.form')->with(
            ['accion'=>'Nuevo Registro',
            'libro'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         extract($request->only('autores'));

        $author = explode(',',$autores);

        $authorsFilter = function($q) use($author){ 
            foreach ($author as $key => $value) { 
                if($key==0) 
                        $q->where('nombre' , 'LIKE', "%".trim($value)."%" );
                else    
                        $q->orWhere( 'nombre', 'LIKE', "%".trim($value)."%" );    
            }
        };


        $data = Book::select('id')
                    ->whereHas('authors', $authorsFilter)
                    ->where('titulo','=',$request->titulo)
                    ->get()
                    ->toArray();
        if(count($data))
        {
            $request->session()->flash('error','Este documento ya esta registrado.'); 
            return redirect('libros/listado');
        }

        $miBook = new Book();
        $miBook->titulo = $request->titulo;
        $miBook->numero_paginas = $request->numero_paginas;
        $miBook->anio_edicion = $request->anio_edicion;
        /*mod inicia aquí*/
        $miBook->resumen = $request->resumen;
        /*mod termina aquí*/
        $miBook->portada = $request->portada;
        $miBook->sala =1;
        $miBook->clasificacion =$request->clasificacion;
        if($miBook->clasificacion=='2')
        {
            $miBook->portada = $request->portada;
        }
        else
            $miBook->portada = '';

        if($miBook->clasificacion=='3')
        {
            $miBook->subclasificacion = $request->subclasificacion;
        }        
        
        $miBook->fecha_incorporacion =date("Y-m-d");
        $miBook->idioma = 'ESPAÑOL';
        $miBook->publisher_id = 1;
        $miBook->speciality_id = 1;
        $miBook->save();

        $it = new Item();
        $it->book_id = $miBook->id;
        $it->correlativo = $request->correlativo;
        $it->save();
        
        $arr_tags = strstr(",", $request->etiquetas) != -1 ? explode(",", $request->etiquetas) : [$request->etiquetas];
        $arr_autores = strstr(",", $request->autores) != -1 ? explode(",", $request->autores) : [$request->autores];

        foreach ($arr_tags as $key => $value) {
            $value = trim($value); 
            $tag = Tag::where(
                'palabras', '=', strtoupper($value) )
                ->first();

            if(!$tag) {

            $tag = new Tag;
            $tag->palabras =  strtoupper($value);
            $tag->save();
            }

            $c = new BookTag();
            $c->book_id = $miBook->id;
            $c->tag_id = $tag->id;
            $c->save();
        }

        foreach ($arr_autores as $key => $value) {
            $value = trim($value);
            $author = Author::where(
                'nombre', '=', strtoupper($value) )
                ->first();

            if(!$author) {

            $author = new Author;
            $author->nombre =  strtoupper($value);
            $author->save();
            }

            $c = new AuthorBook();
            $c->book_id = $miBook->id;
            $c->author_id = $author->id;
            $c->save();
        }
        if($request->clasificacion!='2'){

        $fileName = md5(rand(1,999999)) . '.' . 
        $request->file('archivo')->getClientOriginalExtension();

        $request->file('archivo')->move(
            base_path() . '/public/uploads', $fileName
        ); 
        $miBook->url = $fileName;
        $miBook->save();
        }
        $miBook->save();


        $request->session()->flash('exito','Libro guardado');
        return redirect('libros/listado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $libro = Book::find($id);
        $libro->veces += 1;
        $libro->save();
        return view('books.display')->with('libro',$libro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $libro = Book::find($id);
        return view('books.edit')->with('libro',$libro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $miBook =  Book::find($id);
        $miBook->titulo = $request->titulo;
        $miBook->numero_paginas = $request->numero_paginas;
        $miBook->anio_edicion = $request->anio_edicion;
        $miBook->portada = $request->portada;
        $miBook->resumen = $request->resumen;
        $miBook->sala =1;
        $miBook->tipo ='LIBRO';
        $miBook->fecha_incorporacion =date("Y-m-d");
        $miBook->idioma = 'ESPAÑOL';
        $miBook->publisher_id = 1;
        $miBook->speciality_id = 1;
        $miBook->save();
        
        $arr_tags = explode(",", $request->etiquetas);
        $arr_autores = explode(",", $request->autores);

        BookTag::where('book_id',$miBook->id)->delete();

        foreach ($arr_tags as $key => $value) {
            $value = trim($value);
            $tag = Tag::where(
                'palabras', '=', strtoupper($value) )
                ->first();

            if(!$tag) {

            $tag = new Tag;
            $tag->palabras =  strtoupper($value);
            $tag->save();
            }

            $c = new BookTag();
            $c->book_id = $miBook->id;
            $c->tag_id = $tag->id;
            $c->save();
        }

        AuthorBook::where('book_id',$miBook->id)->delete();

        foreach ($arr_autores as $key => $value) {
            $value = trim($value);
            $author = Author::where(
                 'nombre', '=', strtoupper($value) )
                ->first();

            if(!$author) {

            $author = new Author;
            $author->nombre =  strtoupper($value);
            $author->save();
            }

            $c = new AuthorBook();
            $c->book_id = $miBook->id;
            $c->author_id = $author->id;
            $c->save();
        }
        /*Esta es la línea de error al modificar libro */
        
        if($request->file('archivo'))
        {
        $fileName = md5(rand(1,999999)) . '.' .  
        $request->file('archivo')->getClientOriginalExtension();

        $request->file('archivo')->move(
            base_path() . '/public/uploads', $fileName
        );

        $miBook->url = $fileName;
        }
        $miBook->save();
        
        $request->session()->flash('exito','Libro editado.');
        return redirect('libros/listado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $book)
    {
        foreach (Book::find($book)->items as $key => $value) {
            foreach ($value->loans as $ke2 => $value2) {
        $request->session()->flash('errorñaño','Este libro no puede eliminarse porque tiene prestamos pendientes.');
        return redirect('libros/listado'); 
            }
        }
        Book::destroy($book);
        $request->session()->flash('exito','exito en el borrado');
        return redirect('libros/listado');
    }
}
