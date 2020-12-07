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
        $clientRole = Role::create(['name'=>'Client']);

        $viewCarsPermissions = Permission::create(['name'=> 'View cars']);
        $createCarsPermissions = Permission::create(['name'=> 'Create cars']);
        $updateCarsPermissions = Permission::create(['name'=> 'Update cars']);
        $deleteCarsPermissions = Permission::create(['name'=> 'Delete cars']);

        $admin = User::factory()->create([
            'name' => 'Faustino Vasquez Limon',
            'username' => 'fvasquez',
            'email' => 'admin@local.com',
        ]);
        $admin->assignRole($adminRole);

        $manager = User::factory()->create([
            'name' => 'Jaime Aguilar',
            'username' => 'jaguilar',
            'email' => 'jaguilar@local.com',
        ]);
        $manager->assignRole($managerRole);

        $employee = User::factory()->create([
            'name' => 'Juan Perez',
            'username' => 'Juan Perez',
            'email' => 'jperez@local.com',
        ]);
        $employee->assignRole($employeeRole);

        $client1 = User::factory()->create([
            'username' => 'client1',
        ]);
        $client1->assignRole($clientRole);

        $client2 = User::factory()->create([
            'username' => 'client2',
        ]);
        $client2->assignRole($clientRole);

        $client3 = User::factory()->create([
            'username' => 'client3',
        ]);
        $client3->assignRole($clientRole);

        $client4 = User::factory()->create([
            'username' => 'client4',
        ]);
        $client4->assignRole($clientRole);

    }
}
