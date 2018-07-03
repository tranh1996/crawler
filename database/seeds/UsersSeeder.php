<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersSeeder extends Seeder
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

        
        $user1 = User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $user1->roles()->attach($admin);
        
        $user2 = User::create([
            'name' => 'Nguyen Van A', 
            'email' => 'anv@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($employee);
        
        $user3 = User::create([
            'name' => 'Nguyen Van B', 
            'email' => 'bnv@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user3->roles()->attach($creator);

        $user4 = User::create([
            'name' => 'Nguyen Van c', 
            'email' => 'cnv@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user4->roles()->attach($employee);
    }
}
