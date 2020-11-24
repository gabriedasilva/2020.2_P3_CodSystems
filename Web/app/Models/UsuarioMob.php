<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioMob extends Model
{

    protected $table = "usuariomob";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'matricula',
        'senha',
        'turma',
        'nomeAluno',
        'nomeResponsavel',
        'telefone',
        'faltas',
    ];
    /* protected $returnType = 'object'; */

    public function getUsuarios($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function getUsuariosTurma()
    {
        return  $this->select(
            'usuariomob.id,
            usuariomob.matricula,
            usuariomob.senha,
            usuariomob.turma,
            usuariomob.nomeAluno,
            usuariomob.nomeResponsavel,
            usuariomob.telefone,
            turma.nome'
        )->join('turma', 'turma.id = usuariomob.turma')->paginate(10);
         
    }

}
