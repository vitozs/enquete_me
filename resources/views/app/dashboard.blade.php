@extends('layouts.dash')
@section('enquetes')
    <div class="m-5">
        <h1>Enquetes</h1>
        <div class="d-flex justify-between flex-wrap">
            @foreach ($enquetes as $enquete)
                <div class="m-3 bg-danger p-5" style="
                border-radius:14px;   
                ">
                    <h3>{{$enquete->titulo}}</h3>
                    <p>{{$enquete->descricao}}</p>
                    <a href="/share/{{$enquete->id_enquete}}/{{$enquete->id_usuario}}">/share/{{$enquete->id_enquete}}/{{$enquete->id_usuario}}</a>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection