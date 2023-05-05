@extends('layouts.dash')
@section('enquetes')
    <div class="m-5">
        <form action="/dashboard/store" method="POST">
            @csrf
            <h2>Titulo</h2>
            <input type="text" name="title">
            <h2>Descricao</h2>
            <input type="text" name="description">
            <h2>Opções</h2>
            <input type="text" name="options[]"> 
            <input type="text" name="options[]"> 
            <input type="submit" value="enviar">
        </form>
    </div>
@endsection