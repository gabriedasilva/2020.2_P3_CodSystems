<?php

namespace App\Controllers;

use App\Models\Atividade;
use App\Models\Disciplinas;
use App\Models\Turma;
use App\Models\UsuarioWeb;
use CodeIgniter\I18n\Time;

class AtividadeController extends BaseController
{
    public function index($idTurma, $idDisciplina)
    {

        $atividadeModel = new Atividade();
        $turmaModel = new Turma();
        $disciplinasModel = new Disciplinas();

        $data = [
            'atividades' => $atividadeModel->getAtividadesTurma($idTurma, $idDisciplina),
            'turma' => $turmaModel->getTurmas($idTurma),
            'disciplina' => $disciplinasModel->getDisciplinas($idDisciplina),
        ];

        return view('professor_panel/atividades/atividades_lista', $data);
    }

    //--------------------------------------------------------------------

    public function cadastroForm($idTurma, $idDisciplina)
    {
        $turmaModel = new Turma();
        $disciplinasModel = new Disciplinas();

        $data = [
            'turma' => $turmaModel->getTurmas($idTurma),
            'disciplina' => $disciplinasModel->getDisciplinas($idDisciplina),
        ];

        return view('professor_panel/atividades/atividades_cadastro', $data);
    }

    public function saveCadastro()
    {

        helper('form');
        $atividadeModel = new Atividade();
        $rules = [
            'titulo' => 'required|max_length[40]',
            'descricao' => 'required|max_length[400]',
            'entrega' => 'required|valid_date',
            'idTurma' => 'required|integer',
            'idDisciplina' => 'required|integer',
        ];

        if ($this->validate($rules)) {
            $horarioAtual = new Time('now');
            $turmaModel = new Turma();
            $disciplinasModel = new Disciplinas();

            if ($horarioAtual->isBefore($this->request->getPost('entrega'))) {
                $atividadeModel->save([
                    'id' => $this->request->getPost('id'),
                    'titulo' => $this->request->getPost('titulo'),
                    'descricao' => $this->request->getPost('descricao'),
                    'entrega' => $this->request->getPost('entrega'),
                    'idTurma' => $this->request->getPost('idTurma'),
                    'idDisciplina' => $this->request->getPost('idDisciplina'),
                ]);

                if($this->request->getPost('id') !== null){
                    $msgSuccess = "Atividade atualizada com sucesso!";
                }else{
                    $msgSuccess = "Cadastro realizado com sucesso!";
                }
                $data = [
                    'success' => $msgSuccess,
                    'turma' => $turmaModel->getTurmas($this->request->getPost('idTurma')),
                    'disciplina' => $disciplinasModel->getDisciplinas($this->request->getPost('idDisciplina')),
                    'atividades' => $atividadeModel->getAtividadesTurma($this->request->getPost('idTurma'), $this->request->getPost('idDisciplina')),
                ];
               
                return view('professor_panel/atividades/atividades_lista', $data);
            } else {
                $data = [
                    'fail' => "A data/hora de entrega da atividade deve ser posterior a data/hora atual!",
                    'turma' => $turmaModel->getTurmas($this->request->getPost('idTurma')),
                    'disciplina' => $disciplinasModel->getDisciplinas($this->request->getPost('idDisciplina')),
                ];

                if($this->request->getPost('id') !== null){
                    return view('professor_panel/atividades/atividades_detalhes', $data);
                }else{
                    return view('professor_panel/atividades/atividades_cadastro', $data);
                }
            }
        } else {
            $turmaModel = new Turma();
            $disciplinasModel = new Disciplinas();

            $data = [
                'fail' => "Preencha os dados corretamente e tente de novo!",
                'turma' => $turmaModel->getTurmas($this->request->getPost('idTurma')),
                'disciplina' => $disciplinasModel->getDisciplinas($this->request->getPost('idDisciplina')),
            ];

            if($this->request->getPost('id') !== null){
                return view('professor_panel/atividades/atividades_detalhes', $data);
            }else{
                return view('professor_panel/atividades/atividades_cadastro', $data);
            }
        }
    }

    public function detalhes($id)
    {
        $disciplinasModel = new Disciplinas();
        $atividadeModel = new Atividade();
        $turmaModel = new Turma();
        $atividadeData = $atividadeModel->find($id);

        $data = [
            'id' => $atividadeData['id'],
            'titulo' => $atividadeData['titulo'],
            'descricao' => $atividadeData['descricao'],
            'entrega' => $atividadeData['entrega'],
            'turma' => $turmaModel->getTurmas($atividadeData['idTurma']),
            'disciplina' => $disciplinasModel->getDisciplinas($atividadeData['idDisciplina']),
        ];
        return view('professor_panel/atividades/atividades_detalhes', $data);
    }


    public function excluirCadastro($idAtividade, $idTurma, $idDisciplina)
    {
        $turmaModel = new Turma();
        $disciplinasModel = new Disciplinas();
        $atividadeModel = new Atividade();
        $atividadeModel->delete($idAtividade);

        $data = [
            'atividades' => $atividadeModel->getAtividadesTurma($idTurma, $idDisciplina),
            'turma' => $turmaModel->getTurmas($idTurma),
            'disciplina' => $disciplinasModel->getDisciplinas($idDisciplina),
            'success' => "Atividade excluída com sucesso!",
        ];
        return view('professor_panel/atividades/atividades_lista', $data);
    }
}
