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

        $criarQuantosUsuarios = 50;

        $usuarioPush = [];

        for ($i = 0; $i < $criarQuantosUsuarios; $i++) {
            array_push($usuarioPush, [
                'nome' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'password_hash' => '123456', // alterar o fake seeder quando conhecermos como criptografar a senha(hash)
                'ativo' => true,

            ]);
        }

        //echo '<pre>';
        //print_r($usuarioPush);
        //exit;

        $usuarioModel->skipValidation(true) // bypass validation
                     ->protect(false) // bypass protection dos campos allowedFields
                     ->insertBatch($usuarioPush);

        echo "$criarQuantosUsuarios criados com sucesso!";
        
    }
}
