<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ImagenController extends Controller
{
    //
    public function index(Request $request)
    {
            $consulta=$request->get('busqueda');
            $acta = Acta::where('codigo',$consulta)->first();
            
            $imagenes=null;
            $msg='';
            if($acta==null)
            {
                $msg='No existe acta con el codigo que busco verifique el codigo';
            }else{
                $imagenes = Imagen::where('acta_id',$acta->id)->get();
            }
            if($consulta==null){
                $msg='';
            }
            
            

            // dd($msg);
        return view('homeVisor')->with('acta',$acta)->with('msg',$msg)->with('imagenes',$imagenes);
    }

    public function upload($id, Request $request)
    {
        //
        $acta=Acta::find($id);
        $ruta='/public/imagenes/'.$acta->provincia.'/'.$acta->municipio.'/'.$acta->localidad.'/'.$acta->recinto.'/'.$acta->mesa;
        $nombre = $request->file('file')->getClientOriginalName();
        $nombre=$acta->codigo;
        $path = $request->file('file')->store($ruta);
        //\Storage::disk('local')->put($nombre,  \File::get($file));
        // $path = public_path() . '/images/projects';
        // $fileName = uniqid() . $file->getClientOriginalName();
        $url=Storage::url($path);
        // $file->move($path, $fileName);
        $imagen = new Imagen();
        $imagen->acta_id = $id;
        $imagen->user_id = auth()->user()->id;
        $imagen->url = $url;
        $imagen->tipo=$request->tipo;
        $imagen->save();
        
    }

    public function store(Request $request){
        
        $user=new User();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->tipo=$request->get('tipo');
        $user->password = Hash::make($request->get('password'));
        
        $user->save();
        return redirect('/home');

    }

    
}
