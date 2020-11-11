<?php

namespace App\Models;

use CodeIgniter\Model;

class Frequencia extends Model
{

    protected $table = "frequencia";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'idTurma',
        'idDisciplina',
        'frequencia',
        'idAluno',
    ];
    /* protected $returnType = 'object'; */

    public function getFrequencia($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

}
