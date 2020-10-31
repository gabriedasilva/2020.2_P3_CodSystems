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

    public function realizarCadastro()
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
                    'titulo' => $this->request->getPost('titulo'),
                    'descricao' => $this->request->getPost('descricao'),
                    'entrega' => $this->request->getPost('entrega'),
                    'idTurma' => $this->request->getPost('idTurma'),
                    'idDisciplina' => $this->request->getPost('idDisciplina'),
                ]);


                $data = [
                    'success' => "Cadastro realizado com sucesso!",
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

                return view('professor_panel/atividades/atividades_cadastro', $data);
            }
        } else {
            $turmaModel = new Turma();
            $disciplinasModel = new Disciplinas();

            $data = [
                'fail' => "Preencha os dados corretamente e tente de novo!",
                'turma' => $turmaModel->getTurmas($this->request->getPost('idTurma')),
                'disciplina' => $disciplinasModel->getDisciplinas($this->request->getPost('idDisciplina')),
            ];
            return view('professor_panel/atividades/atividades_cadastro', $data);
        }
    }

    public function detalhes($id)
    {
        $professorModel = new UsuarioWeb();
        $disciplinasModel = new Disciplinas();
        $disciplinasData = $disciplinasModel->find($id);

        $data = [
            'id' => $disciplinasData['id'],
            'nome' => $disciplinasData['nome'],
            'professor' => $disciplinasData['professor'],
            'professores' => $professorModel->getUsuarios(),
        ];
        return view('disciplinas/disciplinas_detalhes', $data);
    }

    public function atualizarCadastro()
    {
        helper('form');
        $disciplinasModel = new Disciplinas();
        $professorModel = new UsuarioWeb();

        $data = [
            'id' => $this->request->getPost('id'),
            'nome' => $this->request->getPost('nome'),
            'professor' => $this->request->getPost('professor'),
        ];
        $disciplinasModel->save($data);

        $data = [
            'success' => "Dados atualizados com sucesso!",
            'nome' => $this->request->getPost('nome'),
            'professor' => $this->request->getPost('professor'),
            'professores' => $professorModel->getUsuarios(),
        ];
        return view('disciplinas/disciplinas_detalhes', $data);
    }

    public function excluirCadastro($id)
    {
        $disciplinasModel = new Disciplinas();
        $disciplinasModel->delete($id);

        $db = db_connect();

        $builder = $db->table('disciplinas d');
        $builder->select('d.id, d.nome, u.nome as nomeP');
        $builder->join('usuarioweb u', 'd.professor = u.id');

        $query = $builder->get();

        $data = [
            'disciplinas' => $query->getResultArray(),
            'success' => "Cadastro excluído com sucesso!",
        ];
        return view('disciplinas/disciplinas_lista', $data);
    }
}
