<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PedidoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        // Gerar 10 pedidos
        foreach (range(1, 10) as $index) {
            Pedido::create([
                'cliente_id' => $faker->numberBetween(1, 10),
                'valor_total' => $faker->randomFloat(2, 10, 100),
                'valor_com_desconto' => $faker->randomFloat(2, 5, 50),
                'forma_pagamento' => $faker->randomElement(['cartão de crédito', 'dinheiro', 'pix']),
                'status' => $faker->randomElement(['em_aberto', 'aguardando_preparo', 'em_preparo', 'em_rota', 'entregue']),
                'data_hora_pedido' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
