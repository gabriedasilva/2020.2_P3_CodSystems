<?php

namespace App\Models;

use CodeIgniter\Model;

class Atividade extends Model
{

    protected $table = "atividades";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'idTurma',
        'idDisciplina',
        'entrega',
        'titulo',
        'descricao',
    ];
    /* protected $returnType = 'object'; */

    public function getAtividades($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function getAtividadesTurma($idTurma, $idDisciplina)
    {

        $result = $this->asArray()->where('idTurma', $idTurma)
            ->where('idDisciplina', $idDisciplina)
            ->paginate(4);

        return $result;
    }
}
