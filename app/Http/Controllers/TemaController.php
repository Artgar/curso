<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index(){
        //$temas=Tema::all();
        $temas=Tema::paginate(10);
        return view('temas',[
            'temas'=>$temas
        ]);
    }
    public function create(Request $request){
        $request->validate([
            'tema' => 'required|max:255|min:4'
        ]);
        if(isset($request->id) && $request->id!=""){
            $tema=Tema::find($request->id);
            $clase="alert alert-primary";
            $msg="Elemento <b>Modificado</b> Correctamente";
        }
        else{
            $tema= new Tema();
            $clase="alert alert-success";
            $msg="Elemento <b>Agregado</b> Correctamente";
        }
        $tema->nombreTema=$request->input('tema');
        $tema->save();
        return redirect('temas')
                ->with('msg',$clase)
                ->with('clase',$msg);
    }
    public function delete($id){
        $tema=Tema::find($id);
        $tema->delete();
        return redirect()
                ->route('temas')
                ->with('msg','Elemento Eliminado Correctamente')
                ->with('clase','alert alert-danger');
    }
    public function editar($id){
        $tema=Tema::find($id);
        return redirect()
                ->route('temas')
                ->with(['id'=>$tema->id,
                        'tema'=>$tema->nombreTema
                        ]);
    }
}
