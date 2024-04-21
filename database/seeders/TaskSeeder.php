<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('tasks')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'priority' => $faker->randomElement([1, 2, 3]),
                'due_date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}