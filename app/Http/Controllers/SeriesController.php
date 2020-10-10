<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class SeriesController extends BaseController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()->json(Serie::create($request->all()), Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        }

        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json(['error' => 'Recurso nao encontrado'], Response::HTTP_NOT_FOUND);
        }

        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidas = Serie::destroy($id);
        if ($qtdRecursosRemovidas === 0) {
            return response()->json(['error' => 'Recurso nao encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
