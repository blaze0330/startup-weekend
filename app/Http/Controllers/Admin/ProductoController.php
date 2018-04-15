<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Categoria;
use App\Models\Admin\Producto;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ProductoController extends Controller
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
		$categorias = Categoria::get();
		$productos = Producto::orderBy("id", "DESC")->paginate(10);
		return view('admin.producto.index')->with(['productos' => $productos, 'categorias' => $categorias]);
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		$categorias = Categoria::get();
		return View::make('admin.producto.create', ['categorias' => $categorias]);
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$producto = new Producto();
		$producto->fill($request->only('name', 'price', 'id_category', 'description'));
		if ($request->file('image') != null) {
			$file = $request->file('image');
			$imageName = $file->getClientOriginalName();

			$producto->image = '/uploads/images/' . md5($imageName . time()) . '.' . $file->getClientOriginalExtension();

			$file->move(base_path() . '/public/uploads/', md5($imageName . time()) . '.' . $file->getClientOriginalExtension());
		}
		$producto->save();

		Session::flash('message', 'Correcto, se ha dado de alta el producto con éxito.');
		Session::flash('tipo', 'success');

		return Redirect::to('/admin/producto');
	}

	/**
	 * @param int $idProducto
	 * @return mixed
	 * @internal param Producto $producto
	 */
	public function edit(int $idProducto)
	{
		$categorias = Categoria::get();
		$producto = Producto::findOrFail($idProducto);
		return View::make('admin.producto.edit')->with(['producto' => $producto, 'categorias' => $categorias]);
	}

	/**
	 * @param Request $request
	 * @param int $idProducto
	 * @return mixed
	 * @internal param Producto $producto
	 */
	public function update(Request $request, int $idProducto)
	{
		$producto = Producto::findOrFail($idProducto);
		$producto->update($request->only('name'));
		if ($request->file('image') != null) {
			$file = $request->file('image');
			$imageName = $file->getClientOriginalName();

			$producto->image = '/uploads/images/' . md5($imageName . time()) . '.' . $file->getClientOriginalExtension();

			$file->move(base_path() . '/public/uploads/', md5($imageName . time()) . '.' . $file->getClientOriginalExtension());
		}

		$producto->save();
		Session::flash('message', 'Correcto, los datos del producto han sido cambiados con éxito.');
		Session::flash('tipo', 'success');
		return Redirect::to('/admin/producto');
	}

	/**
	 * @param int $idProducto
	 * @return \Illuminate\Http\JsonResponse
	 * @internal param Producto $producto
	 */
	public function destroy(int $idProducto)
	{
		$producto = Producto::findOrFail($idProducto);
		$resp = ["type" => "error", "message" => "No se encontró el registro, por favor inténtelo de nuevo reiniciando la página."];
		if ($producto) {
			$resp = ["type" => "success", "message" => "Se ha eliminado el registro correctamente."];
			$producto->delete();
		}
		return response()->json($resp);
	}
}
