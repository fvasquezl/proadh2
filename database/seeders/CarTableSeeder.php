<?php

namespace Database\Seeders;

use App\Models\Car;

use Illuminate\Database\Seeder;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()->times(2)->create([
            'user_id' => 4,
        ]);
        Car::factory()->times(4)->create([
            'user_id' => 5,
        ]);
        Car::factory()->times(3)->create([
            'user_id' => 6,
        ]);
        Car::factory()->times(3)->create([
            'user_id' => 7,
        ]);
    }
}
