<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'user',
            'email' => 'user@gmail.com',
            'mobile' => '09153210245',
            'role' => '1',
            'city' => 'مشهد',
            'postal_code' => '123456',
            'address' => '44Elahie St',
            'password' => Hash::make('kachar'),
            'verified' => '1'
        ]);

        $role = Role::create(['name' => 'User']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
