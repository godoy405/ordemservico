<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioFakerSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        $criarQuantosUsuarios = 5000;

        $usuarioPush = [];

        for ($i = 0; $i < $criarQuantosUsuarios; $i++) {
            array_push($usuarioPush, [
                'nome' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT), // Hash seguro da senha
                'ativo' => $faker->numberBetween(0, 1),  // true ou false
            ]);
        }

        // Desativa a validação e proteção para permitir a inserção do campo 'ativo'
        $usuarioModel->skipValidation(true)
                     ->protect(false)
                     ->insertBatch($usuarioPush);

        echo "$criarQuantosUsuarios usuários criados com sucesso!";
    }
}