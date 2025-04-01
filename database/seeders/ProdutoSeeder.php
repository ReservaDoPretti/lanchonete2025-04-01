<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Gerar 20 produtos
        foreach (range(1, 20) as $index) {
            Produto::create([
                'nome' => $faker->word,
                'ingredientes' => $faker->sentence,
                'valor' => $faker->randomFloat(2, 10, 100),  // Preço entre 10 e 100
            ]);
        }
    }
}
