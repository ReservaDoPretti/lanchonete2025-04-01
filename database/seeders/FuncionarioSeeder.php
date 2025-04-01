<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FuncionarioSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        // Gerar 10 funcionários
        foreach (range(1, 10) as $index) {
            Funcionario::create([
                'nome' => $faker->name,
                'cpf' => $faker->cpf,  // Gerar CPF válido
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),  // Senha padrão
            ]);
        }
    }
}
