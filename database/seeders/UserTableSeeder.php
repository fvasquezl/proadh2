<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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

        $manager = User::factory()->create([
            'name' => 'Jaime Aguilar',
            'username' => 'jaguilar',
            'email' => 'jaguilar@local.com',
            'password' =>  bcrypt('password')
        ]);
        $manager->assignRole($managerRole);

        $admin = User::factory()->create([
            'name' => 'Faustino Vasquez Limon',
            'username' => 'fvasquez',
            'email' => 'admin@local.com',
            'password' =>  bcrypt('password')
        ]);

        $admin->assignRole($adminRole);

        $employee = User::factory()->create([
            'name' => 'Juan Perez',
            'username' => 'Juan Perez',
            'email' => 'jperez@local.com',
            'password' => bcrypt('password')
        ]);
        $employee->assignRole($employeeRole);
    }
}
