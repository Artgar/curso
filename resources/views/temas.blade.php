@extends('layouts.app')
@section('content')
    {{--    .container>form.form>input:text.form-control --}}
    <div class="container card p-4">
        <form action="{{ route('temas') }}" method="POST" class="form">
            @csrf
            <label for="tema">Tema: </label>
            <input type="text" name="tema" id="tema" class="form-control">
            <input type="submit" value="Crear" class="btn btn-dark mt-4">
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