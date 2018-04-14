<?php
namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MenuHandler
{
	private static $menus = [];

	public static function items(): array
	{
		$ms = [
			["url" => "/admin", "title" => "Dashboard", "icon" => "fa fa-dashboard", "class" => "", "submenus" => []],
			["url" => "/admin", "title" => "Administración", "icon" => "fa fa-files-o", "class" => "",
				"submenus" => [
					["url" => "/admin/usuario", "title" => "Usuarios", "class" => ""],
				],
				"rol" => [
					User::ADMIN_GLOBAL
				]
			]
		];

		self::$menus = $ms;

		return self::$menus;
	}

	public static function isActive(array $menu): bool
	{
		$uri = $_SERVER['REQUEST_URI'];

		$menuUrl = str_replace($_SERVER['APP_URL'], "", $menu['url']);

		$explode = explode("/", $uri);

		if (strpos($menuUrl, $uri) || $menuUrl == $uri || $explode[1] == str_replace("/", "", $menuUrl)) {
			return true;
		}

		return false;
	}
}
