<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'customer',
            'description' => 'Customer Role',
        ]);

        $role = Role::create([
            'name' => 'admin',
            'description' => 'Admin Role',
        ]);

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
        ]);
    }
}
