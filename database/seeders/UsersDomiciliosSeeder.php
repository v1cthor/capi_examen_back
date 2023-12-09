<?php

namespace Database\Seeders;

use App\Models\UserDomicilio;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersDomiciliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userD = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            UserDomicilio::create([
                'user_id' => $userD->numberBetween(1, 100),
                'domicilio' => $userD->streetAddress,
                'numero_exterior' => $userD->buildingNumber,
                'colonia' => $userD->citySuffix,
                'cp' => $userD->postcode,
                'ciudad' => $userD->city,
            ]);
        }
    }
}
