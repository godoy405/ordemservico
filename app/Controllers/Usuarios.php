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
        $usuarios = $this->usuarioModel->findAll();
        $data = [
            'titulo' => 'Listando os usuários do sistema',
            'usuarios' => $usuarios,
        ];
        return view('Usuarios/index', $data);
    }

    public function recuperausuarios()
    {
        if(!$this->request->isAJAX()){
             return redirect()->back();
         }

        $atributos = [
            'id',
            'imagem',
            'nome',
            'email',
            'ativo'
        ];   

        $usuarios = $this->usuarioModel->select($atributos)
                                       ->findAll();

        // Receberá o array do objeto $usuarios
        $data = [];

        foreach($usuarios as $usuario){

            $data[] = [
                'imagem' => $usuario->imagem ? '<img src="' . site_url("recursos/img/usuarios/$usuario->imagem") . '" alt="Imagem de perfil" class="img-fluid" width="50">' : '<img src="' . site_url("recursos/img/usuario_sem_imagem.png") . '" alt="Sem imagem" class="img-fluid" width="50">',
                'nome'   => anchor("usuarios/exibir/$usuario->id", esc($usuario->nome), 'title="Exibir usuário '.esc($usuario->nome).'"'),
                'email'  => esc($usuario->email),
                'ativo'  => ($usuario->ativo ?  '<i class="fa fa-unlock text-success"></i>&nbsp;Ativo' : '<i class= "fa fa-lock text-warning"></i>&nbsp;Inativo')
            ];
        }

        $retorno = [
            'data' => $data,
        ];

        return $this->response->setJSON($retorno);
    }

    public function exibir($id = null)
    {
        $usuario = $this->buscaUsuarioOu404($id);

        $data = [
            'titulo' => 'Detalhes do usuário ' . esc($usuario->nome),
            'usuario' => $usuario,
        ];

        return view('Usuarios/exibir', $data);
    }

    public function editar($id = null)
    {
        $usuario = $this->buscaUsuarioOu404($id);

        $data = [
            'titulo' => 'Editando o usuário ' . esc($usuario->nome),
            'usuario' => $usuario,
        ];

        return view('Usuarios/editar', $data);
    }


    /**
     * Método responsável por retornar uma instância do Model de usuário, após já ter sido validado
     * @param integer|null $id
     * @return Exceptions|object
     * 
     * 
     */


    private function buscaUsuarioOu404(?int $id = null)
    {
        if(!$id || !$usuario = $this->usuarioModel->withDeleted(true)->find($id)) 
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
            
        }

        return $usuario;
        
    }


}
