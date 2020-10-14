<?php

namespace App\Models;

use CodeIgniter\Model;

class Turma extends Model
{

    protected $table = "turma";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'nome',
        'segA',
        'segB',
        'segC',
        'segD',
        'terA',
        'terB',
        'terC',
        'terD',
        'quaA',
        'quaB',
        'quaC',
        'quaD',
        'quiA',
        'quiB',
        'quiC',
        'quiD',
        'sexA',
        'sexB',
        'sexC',
        'sexD',
    ];
    /* protected $returnType = 'object'; */

    public function getTurmas($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

}
