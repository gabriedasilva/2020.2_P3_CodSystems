<?php

namespace App\Controllers;

use App\Models\Atividade;
use App\Models\Disciplinas;
use App\Models\UsuarioWeb;

class AtividadeController extends BaseController
{
    public function index($idTurma, $idDisciplina)
    {

        $atividadeModel = new Atividade();

        $data = [
            'atividades' => $atividadeModel->getAtividadesTurma($idTurma, $idDisciplina),
            'idTurma' => $idTurma,
            'idDisciplina' => $idDisciplina,
        ];

        return view('professor_panel/atividades/atividades_lista', $data);
    }

    //--------------------------------------------------------------------

    public function cadastroForm($idTurma, $idDisciplina)
    {
        $data = [
            'professor' => session()->get('id'),
            'idTurma' => $idTurma,
            'idDisciplina' => $idDisciplina,
        ];

        return view('professor_panel/atividades/atividades_cadastro', $data);
    }

    public function realizarCadastro()
    {

        helper('form');
        $disciplinasModel = new Disciplinas();
        $rules = [
            'nome' => 'required',
            'professor' => 'required',
        ];

        if ($this->validate($rules)) {
            $disciplinasModel->save([
                'nome' => $this->request->getPost('nome'),
                'professor' => $this->request->getPost('professor'),
            ]);

            $professorModel = new UsuarioWeb();
            $data = [
                'success' => "Cadastro realizado com sucesso!",
                'professores' => $professorModel->getUsuarios(),
            ];
            return view('disciplinas/disciplinas_cadastro', $data);
        } else {
            $professorModel = new UsuarioWeb();
            $data = [
                'fail' => "Preencha os dados corretamente e tente de novo!",
                'professores' => $professorModel->getUsuarios(),
            ];
            return view('disciplinas/disciplinas_cadastro', $data);
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
