<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboadController extends Controller
{
    public function show()
    {
        $array = array(
            "Fichero1.pdf" => "Nombre1",
            "/Fichero2.pdf" => "Nombre2",
            "Fichero3.pdf" => "Nombre3",
            "/Fichero4.pdf" => "Nombre4",
        );
        return view('dashboard.dashboardBase',  ['array' => $array]);
    }
}
