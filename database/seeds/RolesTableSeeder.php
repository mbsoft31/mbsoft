<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    protected $roles = [
    	[
    		'name'        => 'admin',
    		'description' => 'Super Admin'
    	],
    	[
    		'name'        => 'client',
    		'description' => 'Client'
    	],
    	[
    		'name'        => 'screen-admin',
    		'description' => 'Screen Admin'
    	]
    ];

    public function run()
    {
        foreach ($this->roles as $value) {
        	Role::create($value);
        }
    }
}
