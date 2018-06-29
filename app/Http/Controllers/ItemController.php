<?php

namespace App\Http\Controllers;

use App\Book;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function lista(Request $request,$id)
    { 
        $libro = Book::find($id);
        $items = Item::where('book_id',$id)->get()->toArray();
            
        return view('items.index')
        ->with('libro',$libro)
        ->with('data',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $libro = Book::find($id);
     

        
        $libro = $libro;
        

        return view('items.form')->with(
            ['accion'=>'Nuevo Ejemplar',
            'libro'=>$libro]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = Book::find($request->book_id);
        $miBook = new Item();
        $miBook->book_id = $request->book_id;
        $miBook->n_ejemplar = $request->n_ejemplar;
        $miBook->n_registro = $request->n_registro;
        $miBook->cbn = $request->cbn;
        
        $miBook->save();
            $request->session()->flash('Éxito','Se ha agregado el ejemplar Nro.'.$request->n_ejemplar." del libro ".$libro->titulo);
       parent::saveOperation("Inicio","Registro","registrado  el ejemplar ".$request->correlativo." del libro".$libro->titulo);
        return redirect('ejemplares/'.$request->book_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $item = Item::find($id);
        $libro = Book::where('id', $item->book_id)->get()->toArray();
        $book_id = $item->book_id;
           
        
        Return view('items.edit')         
            ->with('libro',$libro)
            ->with('item',$item);
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $book = Book::find($request->book_id);
        $item = Item::find($request->id);
        $item->n_ejemplar = $request->n_ejemplar;
        $item->n_registro = $request->n_registro;
        $item->cbn = $request->cbn;
        $item->estado_item = $request->estado_item;
        $item->save();
        $request->session()->flash('Éxito','Se ha actualizado el Ejemplar '.$item->id." del libro ".$book->titulo);
       parent::saveOperation("Inicio","Registro","Actualizado  el ejemplar ".$item->id." del libro".$book->titulo."ID de libro ".$request->book_id);
        return redirect('ejemplares/'.$item->book_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $item)
    {
        $it = Item::find($item);
        $id = Item::find($item)->id;
        $book_id = $it->book_id;
        $it->estado_item = "DESINCORPORADO";
        $it->save();
        //die(var_dump($it));
        $request->session()->flash('Éxito','Ejemplar Desincorporado.');
       parent::saveOperation("Inicio","Registro","Desincorporado  el ejemplar ".$it->correlativo." del libro".$it->book->titulo);
        return redirect('ejemplares/'.$book_id);
    }
}
