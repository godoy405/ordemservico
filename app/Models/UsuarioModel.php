<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'App\Entities\Usuario';    
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;    
    protected $allowedFields    = [
        'nome',
        'email',
        'password_hash', // Alterado para corresponder à migração
        'reset_hash',
        'reset_expira_em',
        'imagem',
        // Não colocaremos o campo ativo... Pois existe a manipulação de formulário 
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';
}
