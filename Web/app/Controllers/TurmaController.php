<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Turma;

class TurmaController extends BaseController
{
    public function index()
    {
        $turmaModel = new Turma();

        $data = [
            'turmas' => $turmaModel->getTurmas()
        ];
        return view('turma/turma_lista', $data);
    }

    //--------------------------------------------------------------------

    public function cadastroForm()
    {
        $disciplinasModel = new Disciplinas();

        $data = [
            'disciplinas' => $disciplinasModel->getDisciplinas()
        ];
        return view('turma/turma_cadastro', $data);
    }

    public function realizarCadastro()
    {

        helper('form');
        $turmaModel = new Turma();

        $rules = [
            'nome' => 'required',
            'segA' => 'required',
            'segB' => 'required',
            'segC' => 'required',
            'segD' => 'required',
            'terA' => 'required',
            'terB' => 'required',
            'terC' => 'required',
            'terD' => 'required',
            'quaA' => 'required',
            'quaB' => 'required',
            'quaC' => 'required',
            'quaD' => 'required',
            'quiA' => 'required',
            'quiB' => 'required',
            'quiC' => 'required',
            'quiD' => 'required',
            'sexA' => 'required',
            'sexB' => 'required',
            'sexC' => 'required',
            'sexD' => 'required',
        ];

        if ($this->validate($rules)) {
            $turmaModel->save([
                'nome' => $this->request->getPost('nome'),
                'segA' => $this->request->getPost('segA'),
                'segB' => $this->request->getPost('segB'),
                'segC' => $this->request->getPost('segC'),
                'segD' => $this->request->getPost('segD'),
                'terA' => $this->request->getPost('terA'),
                'terB' => $this->request->getPost('terB'),
                'terC' => $this->request->getPost('terC'),
                'terD' => $this->request->getPost('terD'),
                'quaA' => $this->request->getPost('quaA'),
                'quaB' => $this->request->getPost('quaB'),
                'quaC' => $this->request->getPost('quaC'),
                'quaD' => $this->request->getPost('quaD'),
                'quiA' => $this->request->getPost('quiA'),
                'quiB' => $this->request->getPost('quiB'),
                'quiC' => $this->request->getPost('quiC'),
                'quiD' => $this->request->getPost('quiD'),
                'sexA' => $this->request->getPost('sexA'),
                'sexB' => $this->request->getPost('sexB'),
                'sexC' => $this->request->getPost('sexC'),
                'sexD' => $this->request->getPost('sexD'),
            ]);

            $disciplinasModel = new Disciplinas();

            $data = [];

            $data = [
                'success' => "Cadastro realizado com sucesso!",
                'turmas' => $turmaModel->getTurmas()
            ];
            return view('turma/turma_lista', $data);
        } else {
            $disciplinasModel = new Disciplinas();

            $data = [
                'fail' => "Preencha os dados corretamente e tente de novo!",
                'disciplinas' => $disciplinasModel->getDisciplinas()
            ];
            return view('turma/turma_cadastro', $data);
        }
    }

    public function detalhes($id)
    {

        $turmaModel = new Turma();
        $userData = $turmaModel->find($id);
        $disciplinasModel = new Disciplinas();

        $data = [
            'disciplinas' => $disciplinasModel->getDisciplinas(),
            'id' => $userData['id'],
            'nome' => $userData['nome'],
            'segA' => $userData['segA'],
            'segB' => $userData['segB'],
            'segC' => $userData['segC'],
            'segD' => $userData['segD'],
            'terA' => $userData['terA'],
            'terB' => $userData['terB'],
            'terC' => $userData['terC'],
            'terD' => $userData['terD'],
            'quaA' => $userData['quaA'],
            'quaB' => $userData['quaB'],
            'quaC' => $userData['quaC'],
            'quaD' => $userData['quaD'],
            'quiA' => $userData['quiA'],
            'quiB' => $userData['quiB'],
            'quiC' => $userData['quiC'],
            'quiD' => $userData['quiD'],
            'sexA' => $userData['sexA'],
            'sexB' => $userData['sexB'],
            'sexC' => $userData['sexC'],
            'sexD' => $userData['sexD'],
        ];
        return view('turma/turma_detalhes', $data);
    }

    public function atualizarCadastro()
    {
        helper('form');
        $turmaModel = new Turma();
        $disciplinasModel = new Disciplinas();

        $data = [
            'disciplinas' => $disciplinasModel->getDisciplinas(),
            'id' => $this->request->getPost('id'),
            'nome' => $this->request->getPost('nome'),
            'segA' => $this->request->getPost('segA'),
            'segB' => $this->request->getPost('segB'),
            'segC' => $this->request->getPost('segC'),
            'segD' => $this->request->getPost('segD'),
            'terA' => $this->request->getPost('terA'),
            'terB' => $this->request->getPost('terB'),
            'terC' => $this->request->getPost('terC'),
            'terD' => $this->request->getPost('terD'),
            'quaA' => $this->request->getPost('quaA'),
            'quaB' => $this->request->getPost('quaB'),
            'quaC' => $this->request->getPost('quaC'),
            'quaD' => $this->request->getPost('quaD'),
            'quiA' => $this->request->getPost('quiA'),
            'quiB' => $this->request->getPost('quiB'),
            'quiC' => $this->request->getPost('quiC'),
            'quiD' => $this->request->getPost('quiD'),
            'sexA' => $this->request->getPost('sexA'),
            'sexB' => $this->request->getPost('sexB'),
            'sexC' => $this->request->getPost('sexC'),
            'sexD' => $this->request->getPost('sexD'),
        ];
        $turmaModel->save($data);

        $data = [
            'disciplinas' => $disciplinasModel->getDisciplinas(),
            'success' => "Dados atualizados com sucesso!",
            'id' => $this->request->getPost('id'),
            'nome' => $this->request->getPost('nome'),
            'segA' => $this->request->getPost('segA'),
            'segB' => $this->request->getPost('segB'),
            'segC' => $this->request->getPost('segC'),
            'segD' => $this->request->getPost('segD'),
            'terA' => $this->request->getPost('terA'),
            'terB' => $this->request->getPost('terB'),
            'terC' => $this->request->getPost('terC'),
            'terD' => $this->request->getPost('terD'),
            'quaA' => $this->request->getPost('quaA'),
            'quaB' => $this->request->getPost('quaB'),
            'quaC' => $this->request->getPost('quaC'),
            'quaD' => $this->request->getPost('quaD'),
            'quiA' => $this->request->getPost('quiA'),
            'quiB' => $this->request->getPost('quiB'),
            'quiC' => $this->request->getPost('quiC'),
            'quiD' => $this->request->getPost('quiD'),
            'sexA' => $this->request->getPost('sexA'),
            'sexB' => $this->request->getPost('sexB'),
            'sexC' => $this->request->getPost('sexC'),
            'sexD' => $this->request->getPost('sexD'),
        ];
        return view('turma/turma_detalhes', $data);
    }

    public function excluirCadastro($id)
    {
        $turmaModel = new Turma();
        $turmaModel->delete($id);

        $data = [
            'turmas' => $turmaModel->getTurmas(),
            'success' => "Cadastro excluído com sucesso!",
        ];
        return view('turma/turma_lista', $data);
    }
}
