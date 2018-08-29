<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');

        $roles = Role::all();

        $user = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@email.com',
        	'password' => $password
        ]);

        $user->roles()->attach($roles->where('name' , 'admin')->first());
        $user->roles()->attach($roles->where('name' , 'screen-admin')->first());
    }
}
