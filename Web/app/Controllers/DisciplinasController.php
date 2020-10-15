<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\UsuarioWeb;

class DisciplinasController extends BaseController
{
    public function index()
    {

        $db = db_connect();

        $builder = $db->table('disciplinas d');
        $builder->select('d.id, d.nome, u.nome as nomeP');
        $builder->join('usuarioweb u', 'd.professor = u.id');

        $query = $builder->get();

        $data = [
            'disciplinas' => $query->getResultArray(),
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

            $data['success'] = "Cadastro realizado com sucesso!";
            return view('disciplinas/disciplinas_cadastro', $data);
        } else {
            $data['fail'] = "Preencha os dados corretamente e tente de novo!";
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
