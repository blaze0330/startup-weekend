<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Categoria;
use App\Models\Admin\Paquete;
use App\Models\Admin\PaqueteProducto;
use App\Models\Admin\Producto;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class PaqueteController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * @return mixed
	 */
	public function index()
	{
		$paquetes = Paquete::paginate(10);
		return view('admin.paquete.index')->with(['paquetes' => $paquetes]);
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		$productos = Producto::get();
		return View::make('admin.paquete.create', ['productos' => $productos]);
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$paquete = new Paquete();
		$paquete->fill($request->only('name', 'keywords', 'description'));
		$productos = $request->productos;
		if ($request->file('image') != null) {
			$file = $request->file('image');
			$imageName = $file->getClientOriginalName();

			$paquete->image = '/uploads/images/' . md5($imageName . time()) . '.' . $file->getClientOriginalExtension();

			$file->move(base_path() . '/public/uploads/', md5($imageName . time()) . '.' . $file->getClientOriginalExtension());
		}
		$paquete->save();

		foreach ($productos as $idProducto) {
			$paqProducto = new PaqueteProducto();
			$paqProducto->id_producto = $idProducto;
			$paqProducto->id_paquete = $paquete->id;
			$paqProducto->save();
		}

		Session::flash('message', 'Correcto, se ha dado de alta el paquete con éxito.');
		Session::flash('tipo', 'success');

		return Redirect::to('/admin/paquete');
	}

	/**
	 * @param int $idPaquete
	 * @return mixed
	 * @internal param Producto $producto
	 */
	public function edit(int $idPaquete)
	{
		$productos = Producto::get();
		$paquete = Paquete::findOrFail($idPaquete);
		$misProductos = [];
		foreach ($paquete->productos as $prod) {
			$misProductos[] = $prod->producto->id;
		}
		return View::make('admin.paquete.edit')->with(['productos' => $productos, 'paquete' => $paquete,
			'misProductos' => $misProductos]);
	}

	/**
	 * @param Request $request
	 * @param int $idPaquete
	 * @return mixed
	 * @internal param int $idProducto
	 * @internal param Producto $producto
	 */
	public function update(Request $request, int $idPaquete)
	{
		$paquete = Paquete::findOrFail($idPaquete);
		$productos = $request->productos;
		$paquete->update($request->only('name', 'keywords', 'description'));
		if ($request->file('image') != null) {
			$file = $request->file('image');
			$imageName = $file->getClientOriginalName();

			$paquete->image = '/uploads/images/' . md5($imageName . time()) . '.' . $file->getClientOriginalExtension();

			$file->move(base_path() . '/public/uploads/', md5($imageName . time()) . '.' . $file->getClientOriginalExtension());
		}

		$paquete->save();
		PaqueteProducto::where('id_paquete', $paquete->id)->delete();
		foreach ($productos as $idProducto) {
			$paqProducto = new PaqueteProducto();
			$paqProducto->id_producto = $idProducto;
			$paqProducto->id_paquete = $paquete->id;
			$paqProducto->save();
		}
		Session::flash('message', 'Correcto, los datos del producto han sido cambiados con éxito.');
		Session::flash('tipo', 'success');
		return Redirect::to('/admin/paquete');
	}

	/**
	 * @param int $idPaquete
	 * @return \Illuminate\Http\JsonResponse
	 * @internal param int $idProducto
	 */
	public function destroy(int $idPaquete)
	{
		$paquete = Paquete::findOrFail($idPaquete);
		$resp = ["type" => "error", "message" => "No se encontró el registro, por favor inténtelo de nuevo reiniciando la página."];
		if ($paquete) {
			$resp = ["type" => "success", "message" => "Se ha eliminado el registro correctamente."];
			$paquete->delete();
		}
		return response()->json($resp);
	}
}
