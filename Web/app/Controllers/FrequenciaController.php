<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Turma;
use App\Models\UsuarioMob;

class FrequenciaController extends BaseController
{
    public function index($idTurma, $idDisciplina)
    {

        $usuarioMobModel = new UsuarioMob();
        $turmaModel = new Turma();

        $data = [
            'alunos' => $usuarioMobModel->where('turma', $idTurma)
                ->findAll(),
            'turma' => $turmaModel->where('id', $idTurma)
                ->first(),
            'idDisciplina' => $idDisciplina,
        ];

        return view('professor_panel/frequencia/frequencia_form', $data);
    }

    //--------------------------------------------------------------------

    public function saveFrequencia()
    {

        helper('form');
        $usuarioMobModel = new UsuarioMob();

        $post = $this->request->getPost(); //coleta todo o post
        unset($post['idTurma']); //remove o input idTurma
        unset($post['idDisciplina']); //remove o input idDisciplina
        $inputFields = array_keys($post); //coleta somente o nome dos campos vindos do post


        $rules['idTurma'] = 'required|is_natural';
        $rules['idDisciplina'] = 'required|is_natural';
        foreach ($inputFields as $input) { //atribuo a regras aos demais campos
            $rules[$input] = 'required|is_natural';
        }

        sort($post); //reindexo os indices para ex.: 0,1,2,3...

        if ($this->validate($rules)) {
            $turmaModel = new Turma();

            $usuarioMobModel->whereIn('id', $post)
                ->set('faltas', 'faltas+1', FALSE)
                ->update();

            $turmaModel = new Turma();

            $data = [
                'success' => "Frequência atualizada!",
                'alunos' => $usuarioMobModel->where('turma', $this->request->getPost('idTurma'))
                    ->findAll(),
                'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                    ->first(),
                'idDisciplina' => $this->request->getPost('idDisciplina'),
            ];

            return view('professor_panel/frequencia/frequencia_form', $data);
        } else {

            $usuarioMobModel = new UsuarioMob();
            $turmaModel = new Turma();

            $data = [
                'fail' => "Algo deu errado :(",
                'alunos' => $usuarioMobModel->where('turma', $this->request->getPost('idTurma'))
                    ->findAll(),
                'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                    ->first(),
                'idDisciplina' => $this->request->getPost('idDisciplina'),
            ];

            return view('professor_panel/frequencia/frequencia_form', $data);
        }
    }
}
