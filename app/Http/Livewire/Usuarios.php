<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
//para las fotos
use Livewire\WithFileUploads;
//para la paginación
use Livewire\WithPagination;
//para los pdf
use Barryvdh\DomPDF\Facade\Pdf;

class Usuarios extends Component
{
    use WithPagination;
    //para las fotos
    use WithFileUploads;
    //

    protected $paginationTheme = 'bootstrap';

    var $nombre;
    var $correo;
    var $contrasenia;
    var $idd;
    var $txtBoton='Crear';
    var $foto;

    public function crear(){
        $path=$this->foto->store('fotos');
        if($this->txtBoton=='Crear'){
            $usuario=new User([
                    'name'=>$this->nombre,
                    'email'=>$this->correo,
                    'foto'=>$path,
                    'password'=>Hash::make($this->contrasenia)
                ]);
        }else{ 
            $usuario=User::findOrFail($this->idd);
            $usuario->name=$this->nombre;
            $usuario->foto=$path; 
            $usuario->email=$this->correo;   
        }
            $usuario->save();
            $this->txtBoton='Crear';
            session()->flash('msg','Usuario Ingresado Correctamente');
    }
    public function eliminar($id){
        $usuario=User::findOrFail($id);
        $usuario->delete();
        session()->flash('msg',"Usuario Eliminado Correctamente");
    }
    public function cargar($id){
        $usuario=User::findOrFail($id);
        $this->nombre=$usuario->name;
        $this->correo=$usuario->email;
        $this->idd=$usuario->id;
        $this->txtBoton="Editar";
    }
    public function render()
    {
        $usuarios=User::paginate(5);
        return view('livewire.usuarios',[
                'usuarios'=>$usuarios
            ]);
    }
}