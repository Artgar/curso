@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-3">Ultimas Entradas</h1>
    <hr>
    @each('componentes.cardPost', $posts, 'post')
</div>
@endsection
