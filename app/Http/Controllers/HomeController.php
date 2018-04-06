<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->session()->has('logueado'))
        {
            $rs = Auth::user()->loans()->where([['fecha_expiracion','<',date("Y-m-d 00:00:00")],
                ['estado','=','SIN DEVOLVER']])->get()->toArray();
            if(count($rs))
                $request->session()->put('deudas',1);
            parent::saveOperation("Inicio","Entrada","iniciado sesión");
            $request->session()->put('logueado',1);
        }
        return view('home');
    }

    /**
     * Saves the logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveLogout(Request $request)
    { 
       parent::saveOperation("Inicio","Salida","cerrado sesión");
       $request->session()->forget('logueado');
       $request->session()->forget('deudas');
       Auth::logout();
       return redirect('/');
    }


}
