<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        // Gerar 10 clientes
        foreach (range(1, 10) as $index) {
            Cliente::create([
                'nome' => $faker->name,
                'endereco' => $faker->address,
                'telefone' => $faker->phoneNumber,
                'cpf' => $faker->cpf,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),  // Definindo uma senha padrão
            ]);
        }
    }
}
