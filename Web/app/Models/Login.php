<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{

    protected $table = "usuarioweb";
    protected $primaryKey = "email";
    protected $allowedFields = ['nome','email','senha','telefone', 'cargo'];
    protected $returnType = 'object';

    
}
