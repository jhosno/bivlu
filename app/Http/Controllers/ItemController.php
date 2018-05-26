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
        return view('items.form')->with(
            [

            'accion'=>'Nuevo Ejemplar',
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
         
        $miBook = new Item();
        $miBook->book_id = $request->book_id;
        $libro =  Book::find($request->book_id);
        //$ult = $libro->items()->orderBy('correlativo','desc')->first()->correlativo;
        //$corr = $ult+1;
        //$n_ejemplar = $request->num_sala.$request->sala
       // $miBook->n_ejemplar= $n_ejemplar;
        //$miBook->n_registro = $request->n_registro;
        //$miBook->cbn = $request->cbn;
        //die(var_dump($miBook->n_ejemplar, $miBook->n_registro, $miBook->cbn));
        //$miBook->save();
            $request->session()->flash('Éxito','Ejemplar agregado');
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
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $it = Item::find($item);
        $id = Item::find($item)->id;
        $mod->n_registro=$request->n_registro;
        $mod->n_ejemplar=$request->n_ejemplar;
        $mod->cbn=$request->cbn;
        $mod->save();
        $request->session()->flash('Éxito','Ejemplar Actualizado.');
       parent::saveOperation("Inicio","Registro","Actualizado  el ejemplar ".$it->correlativo." del libro".$it->book->titulo);
        return redirect('ejemplares/'.$id);
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
        var_dump($id);
        $item = "Desincorporado";
        $Item->save();
        $request->session()->flash('Éxito','Ejemplar Desincorporado.');
       parent::saveOperation("Inicio","Registro","Desincorporado  el ejemplar ".$it->correlativo." del libro".$it->book->titulo);
        return redirect('ejemplares/'.$id);
    }
}
