<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Resposta;

class ShareController extends Controller
{
    public function render($id_enquete, $id_usuario){
        $enquete = Enquete::where('id_enquete','=', $id_enquete)->where('id_usuario', '=',$id_usuario)->get();
        
        $respostas = Resposta::select('respostas')->where('id_enquete', '=', $id_enquete)->get();
        
        return view('app.share', ['enquete' => $enquete->toArray(), 'respostas' => $respostas->toArray()]);
    }

    public function vote(Request $request, $id_enquete, $id_usuario){
        $resposta = new Resposta;
        $resposta->id_enquete = $id_enquete;
        $resposta->respostas = $request->resposta;
        $resposta->save();

        return redirect('/share/'.$id_enquete.'/'.$id_usuario);
    }
}
