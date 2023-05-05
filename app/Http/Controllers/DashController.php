<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;

class DashController extends Controller
{
    public function index(){
        $user = auth()->user();
        $enquetes = Enquete::where('id_usuario', $user->id)->get();

        return view('app.dashboard', ['enquetes' => $enquetes]);
    }

    public function create(){
        return view('app.create_enquete');
    }

    public function store(Request $request){
        $enquete = new Enquete;
        $user = auth()->user();
        $enquete->id_usuario = $user->id;
        $enquete->titulo = $request->title;
        $enquete->descricao = $request->description;
        $enquete->opcoes = $request->options;
        $enquete->save();

        return redirect('/dashboard');
    }
}
