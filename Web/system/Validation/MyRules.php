<?php

namespace CodeIgniter\Validation;

use App\Models\Disciplinas;
use App\Models\Turma;

/**
 * Format validation Rules.
 *
 * @package CodeIgniter\Validation
 */

class MyRules
{
    public function unico_entre_turmas(string $str, string $field, array $data, string &$error = null): bool
    {

        $disciplinasModel = new Disciplinas();
        $turmaModel = new Turma();

        $professorDaDisciplina = $disciplinasModel->where('id', $str)->first();
        if (isset($professorDaDisciplina)) {
            $disciplinasProfessor = $turmaModel->getDisciplinasProfessor($professorDaDisciplina['professor']);
            

            $db = db_connect();
            $builder = $db->table('turma');
            $builder->select($field);
            $builder->whereIn($field,  $disciplinasProfessor['ids']);

            $query = $builder->get();

            if (empty($query->getResult())) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
