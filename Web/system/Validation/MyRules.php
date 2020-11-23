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
    public function unico_entre_turmas(string $str, string $fields, array $data, string &$error = null): bool
    {   
        //$str vem o id da disciplina
        //$fields vem o campo que contem o id e o id da turma caso esteja fazendo update

        $fields = explode(',', $fields); // separo os dados chegados como paramentros

        $disciplinasModel = new Disciplinas();
        $turmaModel = new Turma();

        $professorDaDisciplina = $disciplinasModel->where('id', $str)->first(); //recupero o id do professor daquela disciplina
        if (isset($professorDaDisciplina)) {
            $disciplinasProfessor = $turmaModel->getDisciplinasProfessor($professorDaDisciplina['professor']); //capturo as disciplinas daquele professor

            $db = db_connect();
            $builder = $db->table('turma');
            if (sizeof($fields) > 1) { //testo se o id da turma foi passado, para saber se é update ou insert 
                $where = "id != '" . $fields[1]."'";
                $builder->where($where); //caso sim(update) adiciono exceção na busca da turma que está sendo atualizada
            }
            $builder->select($fields[0]);
            $builder->whereIn($fields[0],  $disciplinasProfessor['ids']);

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
