<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
	use Notifiable;

	const ADMIN_GLOBAL = 1, ADMIN = 2, INVITADO = 3;

	/**
	 * @return bool
	 */
	public static function isAdmin(): bool
	{
		return (Auth::user()->rol <= User::ADMIN);
	}

	public static function getRoles(): array
	{
		return [
			User::ADMIN_GLOBAL => "Administrador Global",
			User::ADMIN => "Administrador",
			User::INVITADO => "Invitado"
		];
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'name', 'password', 'rol', 'email'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
}
