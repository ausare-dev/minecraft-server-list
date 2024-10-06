<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Server; // Импортируйте модель Server
use Faker\Factory as Faker;

class ServerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) { // Создание 20 серверов
            $server = Server::create([
                'name' => $faker->domainName,
                'ip_address' => $faker->ipv4,
                "description" => $faker->sentence(10),
            ]);

            $categories = \App\Models\Category::all()->random(rand(1, 5));
            $server->categories()->attach($categories);
        }
    }
}

