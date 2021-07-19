<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\Postagens;
use Illuminate\Http\Request;

class PostagensController extends Controller
{
    //
    public function store(Request $request, Postagem $postagem) {
        
        $novaPostagem = $request->user()->postagens()->create([
            'body' => $request->get('body')
        ]);

        return response()->json($postagem->with('user')->find($novaPostagem->id));
    }
}
