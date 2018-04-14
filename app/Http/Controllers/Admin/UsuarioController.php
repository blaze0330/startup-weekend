<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UsuarioController extends Controller
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
		$usuarios = User::orderBy("id","DESC")->paginate(10);
		return view('admin.usuario.index')->with(['usuarios' => $usuarios]);
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		return View::make('admin.usuario.create');
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$usuario = new User();
		$usuario->fill($request->only('name', 'username', 'rol'));
		$usuario->password = Hash::make($request->password);
		$usuario->save();

		Session::flash('message', 'Correcto, se ha dado de alta al usuario con éxito.');
		Session::flash('tipo', 'success');

		return Redirect::to('/admin/usuario');
	}

	/**
	 * @param User $usuario
	 * @return mixed
	 */
	public function edit(User $usuario)
	{
		return View::make('admin.usuario.edit')->with(['usuario' => $usuario]);
	}

	/**
	 * @param Request $request
	 * @param User $usuario
	 * @return mixed
	 */
	public function update(Request $request, User $usuario)
	{
		$usuario->update($request->only('name', 'username', 'rol'));

		if (!empty($request->password)) {
			$usuario->password = Hash::make($request->password);
		}

		$usuario->save();
		Session::flash('message', 'Correcto, los datos del usuario han sido cambiados con éxito.');
		Session::flash('tipo', 'success');
		return Redirect::to('/admin/usuario');
	}

	/**
	 * @param User $usuario
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy(User $usuario)
	{
		$resp = ["type" => "error", "message" => "No se encontró el registro, por favor inténtelo de nuevo reiniciando la página."];
		if ($usuario) {
			$resp = ["type" => "success", "message" => "Se ha eliminado el registro correctamente."];
			$usuario->delete();
		}
		return response()->json($resp);
	}
}
