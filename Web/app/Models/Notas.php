<?php

namespace App\Models;

use CodeIgniter\Model;

class Notas extends Model
{

    protected $table = "notas";
    protected $primaryKey = "idAluno";
    protected $allowedFields = [
        'idTurma',
        'idAluno',
        'idDisciplina',
        'prova1bm',
        'prova2bm',
        'prova3bm',
        'prova4bm',
        'media',
    ];
    /* protected $returnType = 'object'; */

    public function getFrequencia($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['idAluno' => $id])->first();
    }

}
