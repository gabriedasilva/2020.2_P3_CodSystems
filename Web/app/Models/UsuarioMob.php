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
        'notaParcial',
        'notaProva',
        'notaMedia',
        'notaParcial2bm',
        'notaProva2bm',
        'notaMedia2bm'
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
        $db = db_connect();

        $builder = $db->table('usuariomob');
        $builder->select(
            'usuariomob.id,
            usuariomob.matricula,
            usuariomob.senha,
            usuariomob.turma,
            usuariomob.nomeAluno,
            usuariomob.nomeResponsavel,
            usuariomob.telefone,
            usuariomob.notaParcial,
            usuariomob.notaProva,
            usuariomob.notaMedia,
            turma.nome'
        );
        $builder->join('turma', 'turma.id = usuariomob.turma');

        $query = $builder->get();
        return $query->getResultArray();
    }
}
