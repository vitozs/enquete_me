@extends('layouts.main')
@section('title', 'Enquete.me')
@section('content')


    @php

        function getVals($respostas){
            if(count($respostas) > 0){
                for($i = 0; $i<count($respostas); $i++){
                    $responses[] = $respostas[$i]['respostas'][0];
                    $vals = array_count_values($responses);
                } 
            }else {
                $vals = null;
            }
            
            return $vals;
        }
        
        $vals = getVals($respostas);

    @endphp

    <div class="m-5 w-75">
        <div>
            <h1>{{$enquete[0]['titulo']}}</h1>
            <p>{{$enquete[0]['descricao']}}</p>
            <form action="/share/vote/{{$enquete[0]['id_enquete']}}/{{$enquete[0]['id_usuario']}}" method="POST">
                @csrf
                @foreach ($enquete[0]['opcoes'] as $opcao)
                    <input type="checkbox" name="resposta[]" value="{{$opcao}}">{{$opcao}}
                @endforeach
                <input type="submit" value="Responder">
            </form>
            @foreach($enquete[0]['opcoes'] as $opcao)
                <div class="progress m-3" role="progressbar" aria-label="Example 20px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 30px">
                    @if( !is_null($vals) && array_key_exists($opcao, $vals))
                        <div class="progress-bar" style="width: {{$vals[$opcao] * 10}}%">{{$opcao}}</div>
                    @else 
                        <div class="progress-bar" style="width: 1%">{{$opcao}}</div>
                    @endif
                </div>
            @endforeach

        </div>
    </div>

@endsection