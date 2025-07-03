<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{

    private $usuarioModel;
    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando os usuários do sistema',
        ];
        return view('Usuarios/index', $data);

    }

    public function recuperausuarios()
    {
       
        // if(!$this->request->isAJAX()){
        //     return redirect()->back();
        // }

        $atributos = [
            'id',
            'imagem',
            'nome',
            'email',
            'ativo'
        ];

        $usuarios = $this->usuarioModel->select($atributos)
                                       ->findAll();
    }
}
