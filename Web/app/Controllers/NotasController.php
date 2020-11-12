<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Notas;
use App\Models\Turma;
use App\Models\UsuarioMob;
use CodeIgniter\I18n\Time;

class NotasController extends BaseController
{
    public function index($idTurma, $idDisciplina)
    {

        $usuarioMobModel = new UsuarioMob();
        $turmaModel = new Turma();

        $alunos = $usuarioMobModel->where('turma', $idTurma)->select('id')->findAll();; //capturo os alunos da turma especifca
        foreach ($alunos as $alunos_item) { //capturo os ids dos alunos
            $idsAlunos[] = $alunos_item['id'];
        }

        //Inicio Bloco - Select dos alunos e suas notas da respectiva turma atráves dos ids capturados acima
        $db = db_connect();
        $builder = $db->table('usuariomob u');
        $builder->orWhereIn('u.id', $idsAlunos);
        $builder->select('u.id, u.nomeAluno, n.prova1bm, n.prova2bm, n.prova3bm, n.prova4bm, n.media');
        $builder->join('notas n', 'n.idAluno = u.id', 'left');

        $query = $builder->get();
        //Fim Bloco

        $data = [
            'alunos' => $query->getResultArray(),
            'turma' => $turmaModel->where('id', $idTurma)
                ->first(),
            'idDisciplina' => $idDisciplina,
        ];

        return view('professor_panel/notas/notas_form', $data);
    }

    //--------------------------------------------------------------------

    public function saveNotas()
    {

        helper('form');

        $notasModel = new Notas();
        $post = $this->request->getPost();

        unset($post['idTurma']);
        unset($post['idDisciplina']);

        $dados = array_chunk($post, 6);

        foreach ($dados as $k => $d) {
            $dados2[$k]['idAluno'] = $d[0];
            $dados2[$k]['idTurma'] = $this->request->getPost('idTurma');
            $dados2[$k]['idDisciplina'] = $this->request->getPost('idDisciplina');
            $dados2[$k]['prova1bm'] = $d[1];
            $dados2[$k]['prova2bm'] = $d[2];
            $dados2[$k]['prova3bm'] = $d[3];
            $dados2[$k]['prova4bm'] = $d[4];
            $dados2[$k]['media'] = $d[5];
        }

        $notasModel = new Notas();


        foreach ($dados2 as $data) {
            $notasModel->save($data);
        }

        dd('success');


        $rules = [
            'idTurma' => 'required',
            'idDisciplina' => 'required',
            'prova1bm' => 'decimal',
            'prova2bm' => 'decimal',
            'prova3bm' => 'decimal',
            'prova4bm' => 'decimal',
            'media' => 'decimal'
        ];

        if ($this->validate($rules)) {
            $turmaModel = new Turma();
            $disciplinasModel = new Disciplinas();


            $aluno = $notasModel->where('idAluno', 1)->first();

            if ($aluno === null) {
                $notasModel->save([
                    'idAluno' => 1,
                    'frequencia' => '1',
                ]);
            } else {

                $notasModel->where('idAluno', $aluno['idAluno'])
                    ->set(['frequencia' => $aluno['frequencia'] + 1])
                    ->update();
            }



            if ($this->request->getPost('id') !== null) {
                $msgSuccess = "Notas atualizada com sucesso!";
            } else {
                $msgSuccess = "Cadastro realizado com sucesso!";
            }

            dd("sucesso");

            return view('professor_panel/atividades/atividades_lista');
        } else {

            $usuarioMobModel = new UsuarioMob();
            $turmaModel = new Turma();

            $data = [
                'alunos' => $usuarioMobModel->where('turma', $this->request->getPost('idTurma'))
                    ->findAll(),
                'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                    ->first(),
            ];

            $inputs = array_keys($this->request->getPost());
            dd("Error");
            return view('professor_panel/frequencia/frequencia_form', $data);
        }
    }
}
