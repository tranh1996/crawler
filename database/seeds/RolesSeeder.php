<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = Role::create([
            'name' => 'employee', 
        ]);

        $admin = Role::create([
            'name' => 'admin',         
        ]);

        $creator = Role::create([
            'name' => 'creator',         
        ]);
    }
}
