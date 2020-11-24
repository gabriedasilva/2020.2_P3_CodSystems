<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\UsuarioWeb;

class DisciplinasController extends BaseController
{
    public function index()
    {

        $disciplinasModel = new Disciplinas();

        $data = [
            'disciplinas' => $disciplinasModel->select('disciplinas.id, disciplinas.nome, u.nome as nomeP')
                ->join('usuarioweb u', 'disciplinas.professor = u.id', 'left')
                ->paginate(10),
            'pager' => $disciplinasModel->pager
        ];
        return view('disciplinas/disciplinas_lista', $data);
    }

    //--------------------------------------------------------------------

    public function cadastroForm()
    {
        $professorModel = new UsuarioWeb();
        $data = [
            'professores' => $professorModel->getUsuarios(),
        ];

        return view('disciplinas/disciplinas_cadastro', $data);
    }

    public function saveCadastro()
    {

        helper('form');
        $disciplinasModel = new Disciplinas();
        $professorModel = new UsuarioWeb();

        $rules = [
            'nome' => 'required|alpha_space',
            'professor' => 'required|is_natural_no_zero',
        ];

        if ($this->validate($rules)) {
            $disciplinasModel->save([ //esse metodo realiza tanto insert como update dependendo se ele receber o id
                'id' => $this->request->getPost('id'),
                'nome' => $this->request->getPost('nome'),
                'professor' => $this->request->getPost('professor'),
            ]);

            if ($this->request->getPost('id') !== null) { //teste para identififacar se é um insert ou update
                $data = [
                    'success' => "Dados atualizados com sucesso!",
                    'nome' => $this->request->getPost('nome'),
                    'professor' => $this->request->getPost('professor'),
                    'professores' => $professorModel->getUsuarios(),
                ];
                return view('disciplinas/disciplinas_detalhes', $data);
            } else {
                $data = [
                    'success' => "Cadastro realizado com sucesso!",
                    'professores' => $professorModel->getUsuarios(),
                ];
                return view('disciplinas/disciplinas_cadastro', $data);
            }
        } else {

            if ($this->request->getPost('id') !== null) {
                $data = [
                    'fail' => "Preencha os dados corretamente e tente de novo!",
                    'nome' => $this->request->getPost('nome'),
                    'professor' => $this->request->getPost('professor'),
                    'professores' => $professorModel->getUsuarios(),
                ];
                return view('disciplinas/disciplinas_detalhes', $data);
            } else {
                $data = [
                    'fail' => "Preencha os dados corretamente e tente de novo!",
                    'professores' => $professorModel->getUsuarios(),
                ];
                return view('disciplinas/disciplinas_cadastro', $data);
            }
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

    public function excluirCadastro($id)
    {
        $disciplinasModel = new Disciplinas();
        $disciplinasModel->delete($id);

        $data = [
            'disciplinas' => $disciplinasModel->select('disciplinas.id, disciplinas.nome, u.nome as nomeP')
                ->join('usuarioweb u', 'disciplinas.professor = u.id', 'left')
                ->paginate(10),
            'pager' => $disciplinasModel->pager,
            'success' => "Cadastro excluído com sucesso!",
        ];
        return view('disciplinas/disciplinas_lista', $data);
    }
}
