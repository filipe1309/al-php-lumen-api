<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
// use Laravel\Lumen\Routing\Controller as BaseController;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }
}
