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
        return response()->json(Serie::create(['nome' => $request->nome]), Response::HTTP_CREATED);
    }

    public function get(int $id)
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        }

        return response()->json($serie);
    }
}
