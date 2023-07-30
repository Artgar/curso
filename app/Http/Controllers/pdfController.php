<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function usuariosPDF(){
        $usuarios=User::all();
        $pdf = Pdf::loadView('pdf.usuariospdf',compact('usuarios'));
        return $pdf->download('usuarios.pdf');
    }
    public function unoPDF($id){
        $usuario=User::findOrFail($id);
        $pdf = Pdf::loadView('pdf.unUsuarioPDF',compact('usuario'));
        return $pdf->download('usuario.pdf');
    }
}
