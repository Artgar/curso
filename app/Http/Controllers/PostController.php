<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        //$posts=post::all();
        $temas=Tema::all();
        $posts=Post::paginate(10);
        return view('posts',[
            'posts'=>$posts,
            'temas'=>$temas
        ]);
    }
    public function create(Request $request){
        if(isset($request->id) && $request->id!=""){
            $post=post::find($request->id);
            $clase="alert alert-primary";
            $msg="Elemento <b>Modificado</b> Correctamente";
        }
        else{
            $post= new Post();
            $clase="alert alert-success";
            $msg="Elemento <b>Agregado</b> Correctamente";
        }
        $post->titulo=$request->input('titulo');
        $post->tema=$request->input('tema');
        $post->contenido=$request->input('contenido');
        $post->autor=Auth::id();
        $post->save();
        return redirect('posts')
                ->with('msg',$clase)
                ->with('clase',$msg);
    }
    public function delete($id){
        $post=post::find($id);
        $post->delete();
        return redirect()
                ->route('posts')
                ->with('msg','Elemento Eliminado Correctamente')
                ->with('clase','alert alert-danger');
    }
    public function editar($id){
        $post=post::find($id);
        return redirect()
                ->route('posts')
                ->with(['id'=>$post->id,
                        'titulo'=>$post->titulo,
                        'contenido'=>$post->contenido,
                        'tema'=>$post->tema
                        ]);
    }
}
