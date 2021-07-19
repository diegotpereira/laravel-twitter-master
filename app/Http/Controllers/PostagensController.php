<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;

class PostagensController extends Controller
{
    //

    public function index(Request $request, Postagem $postagem) 
    {
        $postagens = $postagem->whereIn('user_id', $request->user()->following()
                              ->pluck('users.id')
                              ->push($request->user()->id))
                              ->with('user')
                              ->orderBy('created_at', 'desc')
                              ->take($request->get('limit', 10))
                              ->get();

                              return response()->json($postagens);
    }

    
    public function store(Request $request, Postagem $postagem) {
        
        $novaPostagem = $request->user()->postagens()->create([
            'body' => $request->get('body')
        ]);

        return response()->json($postagem->with('user')->find($novaPostagem->id));
    }
}
