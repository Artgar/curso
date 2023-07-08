@extends('layouts.app')
@section('content')
    {{--    .container>form.form>input:text.form-control --}}
    <div class="container card p-4">
        <form action="{{ route('temas') }}" method="POST" class="form">
            @csrf
            @if(session('id'))
                <input type="hidden" name="id" value="{{ session('id') }}">
            @endif
            <label for="tema">Tema: </label>
            <input type="text" name="tema" id="tema" class="form-control" value="{{ session('tema')?session('tema'):'' }}">
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
                            <td>Nombre del Tema</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($temas as $tema)
                            <tr>
                                <td>{{$tema->id}}</td>
                                <td>{{$tema->nombreTema}}</td>
                                <td>
                                    <a href="{{route('deleteTema',$tema->id)}}" class="btn btn-danger">Eliminar</a>
                                    <a href="{{route('editarTema',$tema->id)}}" class="btn btn-info">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $temas->links() }}
            </div>
        </div>
    </div>    
@endsection