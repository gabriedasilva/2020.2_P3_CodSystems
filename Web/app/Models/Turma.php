<?php

namespace App\Models;

use CodeIgniter\Model;

class Turma extends Model
{

    protected $table = "turma";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'nome',
        'ultima_frequencia',
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
            return $this->paginate(4);
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function getDisciplinasProfessor($idProfessor)
    {
        $db = db_connect();

        $builder = $db->table('disciplinas');
        $builder->select('id,nome');
        $builder->where('professor', $idProfessor);
        $query = $builder->get();
        $ids = [];
        $nomes = [];

        foreach ($query->getResultArray() as $row) {

            $ids[] = $row['id']; //crio um array com os ids das disciplinas do professor

            $nomes[$row['id']] = $row['nome']; //crio um array de nome das disciplinas chave/valor utilizando o id da disciplina como chave e seu nome como valor

        }

        //abaixo coloco os dois arrays gerados acima em um para retorna-lo
        $array['ids'] = $ids;
        $array['nomes'] = $nomes;

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
        if (!empty($disciplinasDoProfessor['ids'])) {
            $builder = $db->table('turma');
            $builder->select('*');
            $builder->whereIn('segA', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('segB', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('segC', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('segD', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('terA', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('terB', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('terC', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('terD', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quaA', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quaB', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quaC', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quaD', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quiA', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quiB', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quiC', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('quiD', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('sexA', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('sexB', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('sexC', $disciplinasDoProfessor['ids']);
            $builder->orWhereIn('sexD', $disciplinasDoProfessor['ids']);

            $query = $builder->get();
            return $query->getResultArray();
        } else {
            return;
        }

        /* return $result = json_encode($query->getResult(), JSON_UNESCAPED_UNICODE); */
    }

    public function horarioSeg($idProfessor)
    {
        $disciplinas = $this->getDisciplinasProfessor($idProfessor); //recebo os ids das disciplinas que o professor ministra

        if (!empty($disciplinas['ids'])) {
            $db = db_connect();
            $builder = $db->table('turma');
            $builder->select('id, nome, segA, segB, segC, segD');
            $builder->whereIn('segA',  $disciplinas['ids']); //nesses próximos where's verifico se o id em cada horário corresponde a um nas disciplinas do professor
            $builder->orWhereIn('segB', $disciplinas['ids']);
            $builder->orWhereIn('segC', $disciplinas['ids']);
            $builder->orWhereIn('segD', $disciplinas['ids']);

            $query = $builder->get();


            foreach ($query->getResultArray() as $row) {
                if (in_array($row['segA'], $disciplinas['ids'])) { //mesma verificação do where acima
                    $result['segA'] = $row['nome']; //atribuo o nome da turma ao horário correspondente
                    $result['idA'] = $row['id']; //atribuo o id desta turma
                    $result['nomeDisA'] = $disciplinas['nomes'][$row['segA']]; //atribuo o nome da disciplina utilizando o id que consta no horario da turma como chave
                    $result['idDisA'] = $row['segA']; //atribuo o id da disciplina utilizando a chave que consta no horario da turma como valor
                }
                if (in_array($row['segB'], $disciplinas['ids'])) {
                    $result['segB'] = $row['nome'];
                    $result['idB'] = $row['id'];
                    $result['nomeDisB'] = $disciplinas['nomes'][$row['segB']];
                    $result['idDisB'] = $row['segB'];
                }
                if (in_array($row['segC'], $disciplinas['ids'])) {
                    $result['segC'] = $row['nome'];
                    $result['idC'] = $row['id'];
                    $result['nomeDisC'] = $disciplinas['nomes'][$row['segC']];
                    $result['idDisC'] = $row['segC'];
                }
                if (in_array($row['segD'], $disciplinas['ids'])) {
                    $result['segD'] = $row['nome'];
                    $result['idD'] = $row['id'];
                    $result['nomeDisD'] = $disciplinas['nomes'][$row['segD']];
                    $result['idDisD'] = $row['segD'];
                }
            }

            if (isset($result)) {
                return $result;
            } else {
                return $result = null;
            }
        } else {
            return;
        }
    }

    public function horarioTer($idProfessor)
    {
        $disciplinas = $this->getDisciplinasProfessor($idProfessor); //recebo os ids das disciplinas que o professor ministra

        if (!empty($disciplinas['ids'])) {
            $db = db_connect();
            $builder = $db->table('turma');
            $builder->select('id, nome, terA, terB, terC, terD');
            $builder->whereIn('terA',  $disciplinas['ids']); //nesses próximos where's verifico se o id em cada horário corresponde a um nas disciplinas do professor
            $builder->orWhereIn('terB', $disciplinas['ids']);
            $builder->orWhereIn('terC', $disciplinas['ids']);
            $builder->orWhereIn('terD', $disciplinas['ids']);

            $query = $builder->get();


            foreach ($query->getResultArray() as $row) {
                if (in_array($row['terA'], $disciplinas['ids'])) { //mesma verificação do where acima
                    $result['terA'] = $row['nome']; //atribuo o nome da turma ao horário correspondente
                    $result['idA'] = $row['id']; //atribuo o id desta turma
                    $result['nomeDisA'] = $disciplinas['nomes'][$row['terA']]; //atribuo o nome da disciplina utilizando o id que consta no horario da turma como chave
                    $result['idDisA'] = $row['terA'];
                }
                if (in_array($row['terB'], $disciplinas['ids'])) {
                    $result['terB'] = $row['nome'];
                    $result['idB'] = $row['id'];
                    $result['nomeDisB'] = $disciplinas['nomes'][$row['terB']];
                    $result['idDisB'] = $row['terB'];
                }
                if (in_array($row['terC'], $disciplinas['ids'])) {
                    $result['terC'] = $row['nome'];
                    $result['idC'] = $row['id'];
                    $result['nomeDisC'] = $disciplinas['nomes'][$row['terC']];
                    $result['idDisC'] = $row['terC'];
                }
                if (in_array($row['terD'], $disciplinas['ids'])) {
                    $result['terD'] = $row['nome'];
                    $result['idD'] = $row['id'];
                    $result['nomeDisD'] = $disciplinas['nomes'][$row['terD']];
                    $result['idDisD'] = $row['terD'];
                }
            }

            if (isset($result)) {
                return $result;
            } else {
                return $result = null;
            }
        } else {
            return;
        }
    }

    public function horarioQua($idProfessor)
    {
        $disciplinas = $this->getDisciplinasProfessor($idProfessor); //recebo os ids das disciplinas que o professor ministra

        if (!empty($disciplinas['ids'])) {
            $db = db_connect();
            $builder = $db->table('turma');
            $builder->select('id, nome, quaA, quaB, quaC, quaD');
            $builder->whereIn('quaA',  $disciplinas['ids']); //nesses próximos where's verifico se o id em cada horário corresponde a um nas disciplinas do professor
            $builder->orWhereIn('quaB', $disciplinas['ids']);
            $builder->orWhereIn('quaC', $disciplinas['ids']);
            $builder->orWhereIn('quaD', $disciplinas['ids']);

            $query = $builder->get();


            foreach ($query->getResultArray() as $row) {
                if (in_array($row['quaA'], $disciplinas['ids'])) { //mesma verificação do where acima
                    $result['quaA'] = $row['nome']; //atribuo o nome da turma ao horário correspondente
                    $result['idA'] = $row['id']; //atribuo o id desta turma
                    $result['nomeDisA'] = $disciplinas['nomes'][$row['quaA']]; //atribuo o nome da disciplina utilizando o id que consta no horario da turma como chave
                    $result['idDisA'] = $row['quaA'];
                }
                if (in_array($row['quaB'], $disciplinas['ids'])) {
                    $result['quaB'] = $row['nome'];
                    $result['idB'] = $row['id'];
                    $result['nomeDisB'] = $disciplinas['nomes'][$row['quaB']];
                    $result['idDisB'] = $row['quaB'];
                }
                if (in_array($row['quaC'], $disciplinas['ids'])) {
                    $result['quaC'] = $row['nome'];
                    $result['idC'] = $row['id'];
                    $result['nomeDisC'] = $disciplinas['nomes'][$row['quaC']];
                    $result['idDisC'] = $row['quaC'];
                }
                if (in_array($row['quaD'], $disciplinas['ids'])) {
                    $result['quaD'] = $row['nome'];
                    $result['idD'] = $row['id'];
                    $result['nomeDisD'] = $disciplinas['nomes'][$row['quaD']];
                    $result['idDisD'] = $row['quaD'];
                }
            }

            if (isset($result)) {
                return $result;
            } else {
                return $result = null;
            }
        } else {
            return;
        }
    }
    public function horarioQui($idProfessor)
    {
        $disciplinas = $this->getDisciplinasProfessor($idProfessor); //recebo os ids das disciplinas que o professor ministra

        if (!empty($disciplinas['ids'])) {
            $db = db_connect();
            $builder = $db->table('turma');
            $builder->select('id, nome, quiA, quiB, quiC, quiD');
            $builder->whereIn('quiA',  $disciplinas['ids']); //nesses próximos where's verifico se o id em cada horário corresponde a um nas disciplinas do professor
            $builder->orWhereIn('quiB', $disciplinas['ids']);
            $builder->orWhereIn('quiC', $disciplinas['ids']);
            $builder->orWhereIn('quiD', $disciplinas['ids']);

            $query = $builder->get();


            foreach ($query->getResultArray() as $row) {
                if (in_array($row['quiA'], $disciplinas['ids'])) { //mesma verificação do where acima
                    $result['quiA'] = $row['nome']; //atribuo o nome da turma ao horário correspondente
                    $result['idA'] = $row['id']; //atribuo o id desta turma
                    $result['nomeDisA'] = $disciplinas['nomes'][$row['quiA']]; //atribuo o nome da disciplina utilizando o id que consta no horario da turma como chave
                    $result['idDisA'] = $row['quiA'];
                }
                if (in_array($row['quiB'], $disciplinas['ids'])) {
                    $result['quiB'] = $row['nome'];
                    $result['idB'] = $row['id'];
                    $result['nomeDisB'] = $disciplinas['nomes'][$row['quiB']];
                    $result['idDisB'] = $row['quiB'];
                }
                if (in_array($row['quiC'], $disciplinas['ids'])) {
                    $result['quiC'] = $row['nome'];
                    $result['idC'] = $row['id'];
                    $result['nomeDisC'] = $disciplinas['nomes'][$row['quiC']];
                    $result['idDisC'] = $row['quiC'];
                }
                if (in_array($row['quiD'], $disciplinas['ids'])) {
                    $result['quiD'] = $row['nome'];
                    $result['idD'] = $row['id'];
                    $result['nomeDisD'] = $disciplinas['nomes'][$row['quiD']];
                    $result['idDisD'] = $row['quiD'];
                }
            }

            if (isset($result)) {
                return $result;
            } else {
                return $result = null;
            }
        } else {
            return;
        }
    }
    public function horarioSex($idProfessor)
    {
        $disciplinas = $this->getDisciplinasProfessor($idProfessor); //recebo os ids das disciplinas que o professor ministra

        if (!empty($disciplinas['ids'])) {
            $db = db_connect();
            $builder = $db->table('turma');
            $builder->select('id, nome, sexA, sexB, sexC, sexD');
            $builder->whereIn('sexA',  $disciplinas['ids']); //nesses próximos where's verifico se o id em cada horário corresponde a um nas disciplinas do professor
            $builder->orWhereIn('sexB', $disciplinas['ids']);
            $builder->orWhereIn('sexC', $disciplinas['ids']);
            $builder->orWhereIn('sexD', $disciplinas['ids']);

            $query = $builder->get();


            foreach ($query->getResultArray() as $row) {
                if (in_array($row['sexA'], $disciplinas['ids'])) { //mesma verificação do where acima
                    $result['sexA'] = $row['nome']; //atribuo o nome da turma ao horário correspondente
                    $result['idA'] = $row['id']; //atribuo o id desta turma
                    $result['nomeDisA'] = $disciplinas['nomes'][$row['sexA']]; //atribuo o nome da disciplina utilizando o id que consta no horario da turma como chave
                    $result['idDisA'] = $row['sexA'];
                }
                if (in_array($row['sexB'], $disciplinas['ids'])) {
                    $result['sexB'] = $row['nome'];
                    $result['idB'] = $row['id'];
                    $result['nomeDisB'] = $disciplinas['nomes'][$row['sexB']];
                    $result['idDisB'] = $row['sexB'];
                }
                if (in_array($row['sexC'], $disciplinas['ids'])) {
                    $result['sexC'] = $row['nome'];
                    $result['idC'] = $row['id'];
                    $result['nomeDisC'] = $disciplinas['nomes'][$row['sexC']];
                    $result['idDisC'] = $row['sexC'];
                }
                if (in_array($row['sexD'], $disciplinas['ids'])) {
                    $result['sexD'] = $row['nome'];
                    $result['idD'] = $row['id'];
                    $result['nomeDisD'] = $disciplinas['nomes'][$row['sexD']];
                    $result['idDisD'] = $row['sexD'];
                }
            }

            if (isset($result)) {
                return $result;
            } else {
                return $result = null;
            }
        } else {
            return;
        }
    }
}
