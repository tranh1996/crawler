<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::where('name', 'admin')->first();
        $employee = Role::where('name', 'employee')->first();
        $creator = Role::where('name', 'creator')->first();
       
        $permission1 = [
        	[
        		'name' => 'role-list',
        	],
        	[
        		'name' => 'role-create',
        	],
        	[
        		'name' => 'role-edit',
        	],
        	[
        		'name' => 'role-delete',
        	],
         	
        	[
        		'name' => 'edit-item',
        	],
        	[
        		'name' => 'delete-item',
        	]
        ];

         $permission2 = [
                'name' => 'create-item',
            ];

          $permission3 = [
                'name' => 'view-item',
            ];

        foreach ($permission1 as $key => $value) {
            $permission = Permission::create($value);
            $permission->roles()->attach($admin);
        }


        $permission1 = Permission::create($permission2);
        $permission1->roles()->attach($creator);
        $permission1->roles()->attach($admin);


        $permission2 = Permission::create($permission3);
        $permission2->roles()->attach($creator);
        $permission2->roles()->attach($admin);
        $permission2->roles()->attach($employee);
        
    }
}
