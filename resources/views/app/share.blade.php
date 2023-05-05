@extends('layouts.main')
@section('title', 'Enquete.me')
@section('content')


    @php

        /*if(count($respostas)>0){
            for($i = 0; $i<count($respostas); $i++){
                $responses[] = $respostas[$i]['respostas'];
                $vals = array_count_values($responses);
            }
            $haveValues = true;

        }else{
            $haveValues = false;
        }*/
        $haveValues = false;
        if(count($respostas)>0){
            for($i = 0; $i<count($respostas); $i++){
                $responses[] = $respostas[$i]['respostas'][0];
                $vals = array_count_values($responses);
            }
            
            $haveValues = true;

            
            
        
        }else{
                $haveValues = false;
        }
       
     

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
            @if($haveValues == true)
                @foreach ($vals as $key => $val)
                    <div class="progress m-5" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 50px; font-size:1.1em">
                        <div class="progress-bar" style="width: {{$val*10}}%">{{$key}}</div>
                    </div>
                @endforeach
            @endif
            @if($haveValues == false)
                @foreach ($enquete[0]['opcoes'] as $opcao)
                    <div class="progress m-5" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 50px; font-size:1.1em">
                        <div class="progress-bar" style="width: 2%">{{$opcao}}</div>
                    </div>
                @endforeach  
            @endif

        </div>
    </div>

@endsection