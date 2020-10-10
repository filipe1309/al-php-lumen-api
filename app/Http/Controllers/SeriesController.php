<?php

namespace App\Http\Controllers;

use App\Models\Serie;
// use Laravel\Lumen\Routing\Controller as BaseController;

class SeriesController extends BaseController
{
    public function __construct()
    {
        $this->classe = Serie::class;
    }
}
