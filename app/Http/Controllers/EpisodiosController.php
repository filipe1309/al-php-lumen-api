<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class EpisodiosController extends BaseController
{
    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {
        return response()->json(Episodio::create($request->all()), Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $episodio = Episodio::find($id);

        if (is_null($episodio)) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        }

        return response()->json($episodio);
    }

    public function update(int $id, Request $request)
    {
        $episodio = Episodio::find($id);
        if (is_null($episodio)) {
            return response()->json(['error' => 'Recurso nao encontrado'], Response::HTTP_NOT_FOUND);
        }

        $episodio->fill($request->all());
        $episodio->save();

        return response()->json($episodio);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidas = Episodio::destroy($id);
        if ($qtdRecursosRemovidas === 0) {
            return response()->json(['error' => 'Recurso nao encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
