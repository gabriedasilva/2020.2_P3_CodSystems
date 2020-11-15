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

        $turmaModel = new Turma();
        $notasModel = new Notas();

        $data = [
            'alunos' => $notasModel->getNotasAlunos($idTurma, $idDisciplina),
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
        $post = $this->request->getPost(); //capturo todos os dados vindos do post para trata-los

        unset($post['idTurma']); //retiro o idTurma dele para que fique somente os dados dos alunos
        unset($post['idDisciplina']); //retiro o idDisciplinas dele para que fique somente os dados dos alunos

        $dados = array_chunk($post, 5); //reestruturo o array em sub-array's separando-os de 6 em 6

        //nesse foreach crio outro array com as mesmas informações mas chaveando-as de forma correta para inserilas no banco
        foreach ($dados as $key => $dados_item) {
            $dados_estruturados[$key]['idAluno'] = $dados_item[0];
            $dados_estruturados[$key]['idTurma'] = $this->request->getPost('idTurma');
            $dados_estruturados[$key]['idDisciplina'] = $this->request->getPost('idDisciplina');
            $dados_estruturados[$key]['prova1bm'] = $dados_item[1];
            $dados_estruturados[$key]['prova2bm'] = $dados_item[2];
            $dados_estruturados[$key]['prova3bm'] = $dados_item[3];
            $dados_estruturados[$key]['prova4bm'] = $dados_item[4];
        }

        $notasModel = new Notas();

        $validation =  \Config\Services::validation();
        //abaixo defino o conjunto de regras para atualização/inserção no banco
        $rules = [
            'idTurma' => 'required',
            'idDisciplina' => 'required',
            'prova1bm' => 'decimal|less_than_equal_to[10]',
            'prova2bm' => 'decimal|less_than_equal_to[10]',
            'prova3bm' => 'decimal|less_than_equal_to[10]',
            'prova4bm' => 'decimal|less_than_equal_to[10]',
        ];
        $validationMessages = [
            'idTurma'        => [
                'required' => 'A identificação da turma é necessária.'
            ],
            'idDisciplina'        => [
                'required' => 'A identificação da disciplina é necessária.'
            ],
            'prova1bm'        => [
                'decimal' => 'A nota do 1º bimestre deve conter um número decimal nesse formato: "00.00".',
                'less_than_equal_to' => 'A nota do 1º bimestre deve ser menor ou igual a 10.'
            ],
            'prova2bm'        => [
                'decimal' => 'A nota do 2º bimestre deve conter um número decimal nesse formato: "00.00".',
                'less_than_equal_to' => 'A nota do 2º bimestre deve ser menor ou igual a 10.'
            ],
            'prova3bm'        => [
                'decimal' => 'A nota do 3º bimestre deve conter um número decimal nesse formato: "00.00".',
                'less_than_equal_to' => 'A nota do 3º bimestre deve ser menor ou igual a 10.'
            ],
            'prova4bm'        => [
                'decimal' => 'A nota do 3º bimestre deve conter um número decimal nesse formato: "00.00".',
                'less_than_equal_to' => 'A nota do 3º bimestre deve ser menor ou igual a 10.'
            ],        
        ];

        foreach ($dados_estruturados as $dados_aluno) { //executo o processo de validação e atualização/inserção dos dados no banco
            $validation->reset();
            $validation->setRules($rules,$validationMessages);
            if (!sizeof($dados_aluno) < 5) { //teste se os sub-arrays estruturados possuem a quantidade de campos necessária
                if ($validation->run($dados_aluno)) { //valida os dados de cada sub-array
                    if ($notasModel->where('idAluno', $dados_aluno['idAluno'])->where('idDisciplina', $dados_aluno['idDisciplina'])->first() === null) {
                        $notasModel->insert($dados_aluno);
                    }else{
                        $notasModel->where('idAluno', $dados_aluno['idAluno'])->where('idDisciplina', $dados_aluno['idDisciplina'])->set($dados_aluno)->update();
                    }
                } else {
                    $turmaModel = new Turma();
                    $notasModel = new Notas();

                    $data = [
                        'fail' => $validation->listErrors(),
                        'alunos' => $notasModel->getNotasAlunos($this->request->getPost('idTurma'), $this->request->getPost('idDisciplina')),
                        'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                            ->first(),
                        'idDisciplina' => $this->request->getPost('idDisciplina'),
                    ];

                    return view('professor_panel/notas/notas_form', $data);
                }
            } else {

                $turmaModel = new Turma();
                $notasModel = new Notas();

                $data = [
                    'fail' => "Falha ao enviar notas, tente novamente!",
                    'alunos' => $notasModel->getNotasAlunos($this->request->getPost('idTurma'), $this->request->getPost('idDisciplina')),
                    'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                        ->first(),
                    'idDisciplina' => $this->request->getPost('idDisciplina'),
                ];

                return view('professor_panel/notas/notas_form', $data);
            }
        }

        $turmaModel = new Turma();
        $notasModel = new Notas();

        $data = [
            'success' => "Notas enviadas com sucesso!",
            'alunos' => $notasModel->getNotasAlunos($this->request->getPost('idTurma'), $this->request->getPost('idDisciplina')),
            'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                ->first(),
            'idDisciplina' => $this->request->getPost('idDisciplina'),
        ];

        return view('professor_panel/notas/notas_form', $data);

        /* if (1 === null) {
                $notasModel->save([
                    'idAluno' => 1,
                    'frequencia' => '1',
                ]);
            } else {

                $notasModel->where('idAluno', 6)
                    ->set(['frequencia' => 1 + 1])
                    ->update();
            } */
    }
}
