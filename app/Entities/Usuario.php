<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Usuario extends Entity
{
   
    protected $dates   = [
        'criado_em',
        'atualizado_em',
        'deletado_em'
    ];
    
    protected $casts = [
        'criado_em'     => 'datetime',
        'atualizado_em' => 'datetime',
        'deletado_em'   => 'datetime',
        'ativo'         => 'boolean'
    ];
}
