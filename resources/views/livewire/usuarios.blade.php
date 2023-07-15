<div class="container">
    <h1>Usuarios</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <form class="form" wire:submit.prevent="crear()">
                <label for="nombre">Nombre: </label>
                <input type="text" wire:model="nombre" id="nombre" class="form-control">
                <label for="email">Email: </label>
                <input type="text" wire:model="correo" id="email" class="form-control">
                <label for="contraseña">Contraseña</label>
                <input type="text" wire:model="contrasenia" id="contraseña" class="form-control">
                <input type="submit" value="{{ $txtBoton }}" class="btn btn-dark mt-4">
                @if(session('msg')) 
                    <div class="alert alert-success mt-4">{{ session('msg') }}</div>
                @endif
            </form>
            <div class="card mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
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
                                        <div class="btn btn-success" wire:click="cargar({{ $user->id }})">Editar</div>
                                        <div class="btn btn-danger" wire:click="eliminar({{ $user->id }})">Eliminar</div>
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
