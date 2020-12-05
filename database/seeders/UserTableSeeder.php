<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name'=>'Admin']);
        $managerRole = Role::create(['name'=>'Manager']);
        $employeeRole = Role::create(['name'=>'Employee']);
        $clientRole = Role::create(['name'=>'client']);

        $viewCarsPermissions = Permission::create(['name'=> 'View cars']);

        $admin = User::factory()->create([
            'name' => 'Faustino Vasquez Limon',
            'username' => 'fvasquez',
            'email' => 'admin@local.com',
            'password' =>  bcrypt('password')
        ]);
        $admin->assignRole($adminRole);

        $manager = User::factory()->create([
            'name' => 'Jaime Aguilar',
            'username' => 'jaguilar',
            'email' => 'jaguilar@local.com',
            'password' =>  bcrypt('password')
        ]);
        $manager->assignRole($managerRole);

        $employee = User::factory()->create([
            'name' => 'Juan Perez',
            'username' => 'Juan Perez',
            'email' => 'jperez@local.com',
            'password' => bcrypt('password')
        ]);
        $employee->assignRole($employeeRole);

        $client1 = User::factory()->create([
            'name' => 'client1',
        ]);
        $client1->assignRole($clientRole);

        $client2 = User::factory()->create([
            'name' => 'client2',
        ]);
        $client2->assignRole($clientRole);

        $client3 = User::factory()->create([
            'name' => 'client3',
        ]);
        $client3->assignRole($clientRole);

        $client4 = User::factory()->create([
            'name' => 'client4',
        ]);
        $client4->assignRole($clientRole);

    }
}
