<?php

namespace App\Http\Controllers;

use App\Models\Catalogo\Calendario\EtapaCalendarioExtemporaneo;
use App\Models\Catalogo\Calendario\EtapaCalendarioOrdinario;
use App\Models\Catalogo\Entidad;
use App\Models\Catalogo\Municipio;
use App\Models\Catalogo\Oficina\SedePlaticaInfomativa;
use App\Models\Preinscripcion\PlaticaInformativa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		return view('index');
	}
}
