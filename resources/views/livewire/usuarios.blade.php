<div class="container">
    <h1>Usuarios</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <form class="form" wire:submit.prevent="crear()">
                <div class="card offset-5 col-2">
                    <div class="card-header">Foto:</div>
                    <div class="card-body">
                        <div wire:loading wire:target="foto">
                            <div class="alert alert-info">cargando imagen</div>                     
                        </div>
                        @if ($foto)
                            <img class="img-fluid"src="{{ $foto->temporaryUrl() }}">
                        @endif
                    </div>
                </div>
                <label for="nombre">Nombre: </label>
                <input type="text" wire:model="nombre" id="nombre" class="form-control">
                <label for="email">Email: </label>
                <input type="text" wire:model="correo" id="email" class="form-control">
                <label for="contraseña">Contraseña</label>
                <input type="text" wire:model="contrasenia" id="contraseña" class="form-control">
                <label for="foto">Foto: </label>
                <input type="file" wire:model="foto" class="form-control">
                <input type="submit" value="{{ $txtBoton }}" wire:loading.attr="disabled" wire:target="crear" class="btn btn-dark mt-4">
                @if(session('msg')) 
                    <div class="alert alert-success mt-4">{{ session('msg') }}</div>
                @endif
            </form>
            <a class="btn btn-dark mt-4" href="{{ route('usuariosPDF') }}">Crear pdf</a>
            <div class="card mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @empty($usuarios)
                            <tr>
                                <td>Sin Datos</td>
                            </tr>
                        @else
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img width="40px" src="{{asset($user->foto)}}" alt="">
                                    </td>
                                    <td>
                                        <div class="btn btn-success" wire:click="cargar({{ $user->id }})">Editar</div>
                                        <div class="btn btn-danger" wire:click="eliminar({{ $user->id }})">Eliminar</div>
                                        <a class="btn btn-secondary" href="{{ route('soloUnUsuarioPDF',$user->id) }}">PDF</a>
                                    </td>
                                </tr>                            
                            @endforeach
                        @endempty
                    </tbody>
                </table>
                {{ $usuarios->links() }}
            </div>
        </div>

    </div>
</div>
