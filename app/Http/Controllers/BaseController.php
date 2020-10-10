<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class BaseController
{
    protected string $classe;

    public function index(Request  $request)
    {
        return $this->classe::paginate($request->per_page);
        // $offset = ($request->page - 1)*$request->per_page;
        // return $this->classe::query()->offset($offset)->limit($request->per_page)->get();
        // return $this->classe::all();
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        }

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json(['error' => 'Recurso nao encontrado'], Response::HTTP_NOT_FOUND);
        }

        $recurso->fill($request->all());
        $recurso->save();

        return response()->json($recurso);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidas = $this->classe::destroy($id);
        if ($qtdRecursosRemovidas === 0) {
            return response()->json(['error' => 'Recurso nao encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
