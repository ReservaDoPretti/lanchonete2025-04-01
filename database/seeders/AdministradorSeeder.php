<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdministradorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');  // Usando 'pt_BR' para geração de CPF e dados brasileiros.

        // Gerar 10 administradores
        foreach (range(1, 10) as $index) {
            Administrador::create([
                'nome' => $faker->name,
                'cpf' => $faker->cpf,  // Gerar CPF válido
                'email' => $faker->unique()->safeEmail,
                'senha' => bcrypt('password'),  // Defina uma senha padrão
            ]);
        }
    }
}
