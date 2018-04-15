<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Administrador Global',
			'username' => 'admin',
			'password' => bcrypt('admin123'),
			'rol' => \App\Models\User::ADMIN_GLOBAL,
			'email' => 'danielediazmx@gmail.com'
		]);

		//$this->call(UsersTableSeeder::class);
	}
}
