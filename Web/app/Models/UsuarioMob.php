<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioMob extends Model {

    protected $table = "usuariomob";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'matricula',
        'senha',
        'turma', 
        'nomeAluno',
        'nomeResponsavel',
        'telefone',
        'notaParcial',
        'notaProva',
        'notaMedia'
    ];
    /* protected $returnType = 'object'; */

    public function getUsuarios($id = null){
        if($id === null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

}