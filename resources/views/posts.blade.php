@extends('layouts.app')
@section('content')
    {{--    .container>form.form>input:text.form-control --}}
    <div class="container card p-4">
        <form action="{{ route('posts') }}" method="post" class="form">
            @csrf
            @if(session('id'))
                <input type="hidden" name="id" value="{{ session('id') }}">
            @endif
            <label for="titulo">titulo: </label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ session('titulo')?session('titulo'):'' }}">
            <label for="contenido">contenido: </label>
            <textarea class="form-control" name="contenido" id="contenido" rows="5">{{ session('contenido')?session('contenido'):'' }}</textarea>
            <label for="tema">Tema: </label>
            <select name="tema" id="tema" class="form-select" >
                @empty($temas)
                    <option value="">sin temas</option>
                @else
                    @foreach ($temas as $tema)
                        @if($tema->id == session('tema'))
                            <option value="{{$tema->id}}" selected>{{$tema->nombreTema}}</option>
                        @else
                            <option value="{{$tema->id}}">{{$tema->nombreTema}}</option>
                        @endif;
                    @endforeach
                @endempty
            </select>
            <input type="submit" value="{{ session('id')?'Modificar':'Crear' }}" class="btn btn-dark mt-4">
            @if(session('msg'))
                <div class="{{ session('clase') }} mt-4" role="alert">{{ session('msg') }}</div>
            @endif
        </form>
        {{-- .card>.card-body--}}
        <div class="card mt-4">
            <div class="card-body">
                {{--table.table>thead>tr>td*3--}}
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Titulo</td>
                            <td>Contenido</td>
                            <td>Autor</td>
                            <td>Tema</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->titulo }}</td>
                                <td>{{ $post->contenido }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->temas->nombreTema }}</td>
                                <td>
                                    <a href="{{route('deletePost',$post->id)}}" class="btn btn-danger">Eliminar</a>
                                    <a href="{{route('editarPost',$post->id)}}" class="btn btn-info">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>    
@endsection