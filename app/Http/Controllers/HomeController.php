<?php

namespace App\Http\Controllers;

use App\Models\Admin\Categoria;
use App\Models\Admin\Paquete;
use App\Models\Admin\Producto;
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
		return view('index', ['pageTheme' => 'home']);
	}

	public function hazTuPedido()
	{
		$productos = Producto::where('id', '!=', 0);
		$categorias = Categoria::where('id', '!=', 0)->get();
		$paquetes = Paquete::where('id', '!=', 0)->get();

		if (isset($_GET['id_category'])) {
			$productos->where('id_category', $_GET['id_category']);
		}
		if (isset($_GET['id_paquete'])) {
			$idProductos = [];
			$paquete = Paquete::findOrFail($_GET['id_paquete']);
			foreach ($paquete->productos as $producto) {
				$idProductos[] = $producto->id_producto;
			}
			$productos->whereIn('id', $idProductos);
		}

		return view('pedido', ['pageTheme' => 'page page-template', 'productos' => $productos->paginate(10),
			'categorias' => $categorias, 'paquetes' => $paquetes]);
	}
}
