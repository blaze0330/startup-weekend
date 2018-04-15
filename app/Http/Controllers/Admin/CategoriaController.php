<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Categoria;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CategoriaController extends Controller
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
		$categorias = Categoria::orderBy("id","DESC")->paginate(10);
		return view('admin.categoria.index')->with(['categorias' => $categorias]);
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		return View::make('admin.categoria.create');
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$categoria = new Categoria();
		$categoria->fill($request->only('name'));
		$categoria->save();

		Session::flash('message', 'Correcto, se ha dado de alta la categoría con éxito.');
		Session::flash('tipo', 'success');

		return Redirect::to('/admin/categoria');
	}

	/**
	 * @param Categoria $categoria
	 * @return mixed
	 */
	public function edit(int $idCategoria)
	{
		$categoria = Categoria::findOrFail($idCategoria);
		return View::make('admin.categoria.edit')->with(['categoria' => $categoria]);
	}

	/**
	 * @param Request $request
	 * @param Categoria $categoria
	 * @return mixed
	 */
	public function update(Request $request, int $idCategoria)
	{
		$categoria = Categoria::findOrFail($idCategoria);
		$categoria->update($request->only('name'));

		$categoria->save();
		Session::flash('message', 'Correcto, los datos de la categoría han sido cambiados con éxito.');
		Session::flash('tipo', 'success');
		return Redirect::to('/admin/categoria');
	}

	/**
	 * @param int $idCategoria
	 * @return \Illuminate\Http\JsonResponse
	 * @internal param User $categoria
	 */
	public function destroy(int $idCategoria)
	{
		$categoria = Categoria::findOrFail($idCategoria);
		$resp = ["type" => "error", "message" => "No se encontró el registro, por favor inténtelo de nuevo reiniciando la página."];
		if ($categoria) {
			$resp = ["type" => "success", "message" => "Se ha eliminado el registro correctamente."];
			$categoria->delete();
		}
		return response()->json($resp);
	}
}
