<?php namespace App\Models;

use CodeIgniter\Model;

class Disciplinas extends Model {

    protected $table = "disciplinas";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'nome',
        'professor',
    ];
    /* protected $returnType = 'object'; */

    public function getDisciplinas($id = null){
        if($id === null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

}