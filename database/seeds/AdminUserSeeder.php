<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Role::class)->create([
        //     'name' => 'admin',
        //     'description' => 'administrator'
        // ]);
        
        Role::create([
            'name' => 'admin',
            'description' => 'administrator'
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'User'
        ]);

        // factory(Role::class, 4)->create();

        factory(User::class)->create([
            'name' => 'Administrator',
            'role_id' => '1',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        factory(User::class)->create([
            'name' => 'User',
            'role_id' => '2',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);

        factory(User::class, 3)->create();
    }
}