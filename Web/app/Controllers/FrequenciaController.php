<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Turma;
use App\Models\UsuarioMob;
use CodeIgniter\I18n\Time;
use DateTime;
use DateTimeZone;

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


        $rules['idTurma'] = 'required|is_natural_no_zero';
        $rules['idDisciplina'] = 'required|is_natural_no_zero';
        foreach ($inputFields as $input) { //atribuo a regras aos demais campos
            $rules[$input] = 'required|is_natural';
        }

        sort($post); //reindexo os indices para ex.: 0,1,2,3...

        if ($this->validate($rules)) {
            $turmaModel = new Turma();
            $turma = $turmaModel->where('id', $this->request->getPost('idTurma'))->first();

            //Configuração de datas
            $fuso = new DateTimeZone('America/Sao_Paulo');
            $hoje = new DateTime();
            $hoje->setTimezone($fuso);
            $ultima_frequencia = DateTime::createFromFormat('Y-m-d', $turma['ultima_frequencia']);

            if ($hoje->format('Y-m-d') > $ultima_frequencia->format('Y-m-d')) {
                $usuarioMobModel->whereIn('id', $post)
                    ->set('faltas', 'faltas+1', FALSE)
                    ->update();
                $turmaModel->where('id', $this->request->getPost('idTurma'))
                    ->set('ultima_frequencia', $hoje->format('Y-m-d'))
                    ->update();


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
                    'fail' => "A frequência dessa turma já foi enviada hoje!",
                    'alunos' => $usuarioMobModel->where('turma', $this->request->getPost('idTurma'))
                        ->findAll(),
                    'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                        ->first(),
                    'idDisciplina' => $this->request->getPost('idDisciplina'),
                ];

                return view('professor_panel/frequencia/frequencia_form', $data);
            }
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
