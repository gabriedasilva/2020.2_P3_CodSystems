<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioWeb extends Model {

    protected $table = "usuarioweb";
    protected $primaryKey = "id";
    protected $allowedFields = ['nome','email','senha','telefone', 'cargo'];
    /* protected $returnType = 'object'; */

    public function getUsuarios($id = null){
        if($id === null){
            return $this->paginate(10);
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

}