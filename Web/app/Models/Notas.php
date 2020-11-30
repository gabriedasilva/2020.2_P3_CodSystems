<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UsuarioMob;


class Notas extends Model
{

    protected $table = "notas";
    protected $primaryKey = "idAluno";
    protected $allowedFields = [
        'idTurma',
        'idAluno',
        'idDisciplina',
        'prova1bm',
        'prova2bm',
        'prova3bm',
        'prova4bm',
    ];
    /* protected $returnType = 'object'; */

    public function getNotasAlunos($idTurma, $idDisciplina)
    {
        $usuarioMobModel = new UsuarioMob();

        $alunos = $usuarioMobModel->where('turma', $idTurma)->select('id')->findAll();; //capturo os alunos da turma especifca
        foreach ($alunos as $alunos_item) { //capturo os ids dos alunos
            $idsAlunos[] = $alunos_item['id'];
        }

        //Inicio Bloco - Select dos alunos e suas notas da respectiva turma atráves dos ids capturados acima       
        $db = db_connect();
        $builder = $db->table('usuariomob u');
        $builder->whereIn('u.id', $idsAlunos);
        //$builder->where('n.idDisciplina', $idDisciplina); //adicionei essa comparação ao ON do join para que ela fosse feita somente dentro da tabela de notas
        $builder->select('u.id, u.nomeAluno, n.prova1bm, n.prova2bm, n.prova3bm, n.prova4bm');
        $builder->join('notas n', 'n.idAluno = u.id AND n.idDisciplina ='.$idDisciplina,'left');

        $query = $builder->get();
        //Fim Bloco

        if (sizeof($query->getResultArray()) > 0) {
            return $query->getResultArray();
        } else {
            $builder->resetQuery();
            $builder = $db->table('usuariomob u');
            $builder->whereIn('u.id', $idsAlunos);
            $builder->select('u.id, u.nomeAluno');
            $query = $builder->get();


            return $query->getResultArray();
        }
    }

    public function getNotas($idAluno, $idDisciplina = null)
    {
        if ($idDisciplina != null) {
            $db = db_connect();
            $builder = $db->table('notas');
            $builder->Where('idAluno', $idAluno);
            $builder->Where('idDisciplina', $idDisciplina);
            $query = $builder->get();

            return $query->getResultArray();
        } else {
            return $this->select('notas.prova1bm, notas.prova2bm, notas.prova3bm, notas.prova4bm, disciplinas.nome as nomeDisciplina')
                ->join('disciplinas', 'notas.idDisciplina = disciplinas.id')
                ->where('idAluno', $idAluno)
                ->orderBy('disciplinas.nome')
                ->findAll();
        }
    }
}
