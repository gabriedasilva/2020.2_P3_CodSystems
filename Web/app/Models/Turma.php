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

    public function getDisciplinasProfessor($idProfessor)
    {
        $db = db_connect();

        $builder = $db->table('disciplinas');
        $builder->select('id');
        $builder->where('professor', $idProfessor);
        $query = $builder->get();



        foreach ($query->getResultArray() as $row) {
            $array[] = $row['id'];
        }

        if (!empty($array)) {
            return $array;
        } else {
            return;
        }
    }

    public function turmasProfessor($idProfessor)
    {


        $disciplinasDoProfessor = $this->getDisciplinasProfessor($idProfessor);
        $db = db_connect();
        if (!empty($disciplinasDoProfessor)) {
            $builder = $db->table('turma');
            $builder->select('*');
            $builder->whereIn('segA', $disciplinasDoProfessor);
            $builder->orWhereIn('segB', $disciplinasDoProfessor);
            $builder->orWhereIn('segC', $disciplinasDoProfessor);
            $builder->orWhereIn('segD', $disciplinasDoProfessor);
            $builder->orWhereIn('terA', $disciplinasDoProfessor);
            $builder->orWhereIn('terB', $disciplinasDoProfessor);
            $builder->orWhereIn('terC', $disciplinasDoProfessor);
            $builder->orWhereIn('terD', $disciplinasDoProfessor);
            $builder->orWhereIn('quaA', $disciplinasDoProfessor);
            $builder->orWhereIn('quaB', $disciplinasDoProfessor);
            $builder->orWhereIn('quaC', $disciplinasDoProfessor);
            $builder->orWhereIn('quaD', $disciplinasDoProfessor);
            $builder->orWhereIn('quiA', $disciplinasDoProfessor);
            $builder->orWhereIn('quiB', $disciplinasDoProfessor);
            $builder->orWhereIn('quiC', $disciplinasDoProfessor);
            $builder->orWhereIn('quiD', $disciplinasDoProfessor);
            $builder->orWhereIn('sexA', $disciplinasDoProfessor);
            $builder->orWhereIn('sexB', $disciplinasDoProfessor);
            $builder->orWhereIn('sexC', $disciplinasDoProfessor);
            $builder->orWhereIn('sexD', $disciplinasDoProfessor);

            $query = $builder->get();
            return $query->getResultArray();
        } else {
            return;
        }






        /* return $result = json_encode($query->getResult(), JSON_UNESCAPED_UNICODE); */
    }
}
