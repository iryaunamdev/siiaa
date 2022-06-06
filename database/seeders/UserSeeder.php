<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Superadmin']);
        $role2 = Role::create(['name'=>'Administrador']);
        $role3 = Role::create(['name'=>'Usuario-1']);
        $role4 = Role::create(['name'=>'Usuario-2']);
        $role5 = Role::create(['name'=>'Usuario-3']);


        $user1 = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('secret'),
        ]);

        $user1->assignRole($role1);

        $user2= User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret'),
        ]);

        $user2->assignRole($role2);

        $user3= User::create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@mail.com',
            'password' => Hash::make('secret'),
        ]);

        $user3->assignRole($role3);

        $user4= User::create([
            'name' => 'Usuario 2',
            'email' => 'usuario2@mail.com',
            'password' => Hash::make('secret'),
        ]);

        $user4->assignRole($role4);

        $user5= User::create([
            'name' => 'Usuario 3',
            'email' => 'usuario3@mail.com',
            'password' => Hash::make('secret'),
        ]);

        $user5->assignRole($role5);
    }
}
