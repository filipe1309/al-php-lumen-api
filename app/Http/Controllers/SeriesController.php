<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Laravel\Lumen\Routing\Controller as BaseController;

class SeriesController extends BaseController
{
    public function index()
    {
        return Serie::all();
    }
}
