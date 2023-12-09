<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Faker::create();

        foreach (range(1, 100) as $index) {
            $birthdate = $user->dateTimeBetween('1900-01-01', '2000-12-31');

            DB::table('users')->insert([
                'name' => $user->name,
                'fecha_nacimento' => $birthdate,
                'email' => $user->unique()->safeEmail,
                'password' => bcrypt('password')
            ]);
        }
    }
}
