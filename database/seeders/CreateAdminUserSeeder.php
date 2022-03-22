<?php

namespace Database\Seeders;

use App\Models\Admin\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'hussein sim',
            'email' => 'adda5mad@outlook.com',
            'username' => '@hussein87',
            'password' => bcrypt('22444488')
        ]);
        Profile::create([
            'user_id' => $user->id
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
