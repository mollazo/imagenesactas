<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acta;
use App\Models\Imagen;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

            // if(Auth::user()->tipo=="visor"){
            //     return redirect()->route('homevisor');
            // }
            $consulta=$request->get('busqueda');
            $acta = Acta::where('codigo',$consulta)->first();
            $msg='';
            $imagenes=null;
            if($acta==null)
            {
                $msg='No existe acta con el codigo que busco verifique el codigo';
            }else{
                $imagenes = Imagen::where('acta_id',$acta->id)->get();
            }
            if($consulta==null){
                $msg='';
            }
        return view('home')->with('acta',$acta)->with('msg',$msg)->with('imagenes',$imagenes);
    }
}
