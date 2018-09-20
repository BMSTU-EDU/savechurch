<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
        User::create([
			'name'		=> env('ADMIN_LOGIN'),
			'email'		=> env('ADMIN_EMAIL'),
			'password'	=> Hash::make(env('ADMIN_PASSWORD'))
		]);
    }
}
