<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    var $nombre;
    var $correo;
    var $contrasenia;
    var $idd;
    var $txtBoton='Crear';

    public function crear(){
        if($this->txtBoton=='Crear'){
            $usuario=new User([
                    'name'=>$this->nombre,
                    'email'=>$this->correo,
                    'password'=>Hash::make($this->contrasenia)
                ]);
        }else{ 
            $usuario=User::findOrFail($this->idd);
            $usuario->name=$this->nombre; 
            $usuario->email=$this->correo;   
        }
            $usuario->save();
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