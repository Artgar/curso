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
    public function create(){
        $tema= new Tema();
        $tema->nombreTema=$_REQUEST['tema'];
        $tema->save();
        return redirect('temas');
    }
}
