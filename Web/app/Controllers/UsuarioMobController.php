<?php

namespace App\Controllers;

use App\Models\Turma;
use App\Models\UsuarioMob;

class UsuarioMobController extends BaseController
{
    public function index()
    {
        $userMobModel = new UsuarioMob();

        $data = [
            'usuarioMob' => $userMobModel->getUsuariosTurma()
        ];
        return view('usuarioMob/usuarioMob_lista', $data);
    }

    //--------------------------------------------------------------------

    public function cadastroForm()
    {
        $turmasModel = new Turma();

        $data = [
            'turmas' => $turmasModel->getTurmas()
        ];
        return view('usuarioMob/usuarioMob_cadastro',$data);
    }

    public function realizarCadastro()
    {

        helper('form');
        $userMobModel = new UsuarioMob();
        $rules = [
            'nomeAluno' => 'required',
            'matricula' => 'required',
            'senha' => 'required',
            'nomeResponsavel' => 'required',
            'turma' => 'required',
            'telefone' => 'required'
        ];

        if ($this->validate($rules)) {
            $matriculaNovo = $this->request->getPost('matricula');
            $matriculaExistente = $userMobModel->where('matricula', $matriculaNovo)
                ->first();
            if (isset($matriculaExistente)) {

                $data['fail'] = "Matrícula já cadastrada, tente outra!";
                return view('usuarioMob/usuarioMob_cadastro', $data);
            } else {
                $userMobModel->save([
                    'nomeAluno' => $this->request->getPost('nomeAluno'),
                    'matricula' => $this->request->getPost('matricula'),
                    'senha' => md5($this->request->getPost('senha')),
                    'nomeResponsavel' => $this->request->getPost('nomeResponsavel'),
                    'turma' => $this->request->getPost('turma'),
                    'telefone' => $this->request->getPost('telefone'),
                ]);

                $data['success'] = "Cadastro realizado com sucesso!";
                return view('usuarioMob/usuarioMob_cadastro', $data);
            }
        } else {
            $data['fail'] = "Preencha os dados corretamente e tente de novo!";
            return view('usuarioMob/usuarioMob_cadastro', $data);
        }
    }

    public function detalhes($id)
    {

        $userMobModel = new UsuarioMob();
        $turmaModel = new Turma();
        $userData = $userMobModel->find($id);

        $data = [
            'id' => $userData['id'],
            'nomeAluno' => $userData['nomeAluno'],
            'matricula' => $userData['matricula'],
            'nomeResponsavel' => $userData['nomeResponsavel'],
            'turma' => $userData['turma'],
            'turmas' => $turmaModel->getTurmas(),
            'telefone' => $userData['telefone'],
        ];
        return view('usuarioMob/usuarioMob_detalhes', $data);
    }

    public function atualizarCadastro()
    {
        helper('form');
        $userMobModel = new UsuarioMob();
        $turmaModel = new Turma();

        $data = [
            'id' => $this->request->getPost('id'),
            'nomeAluno' => $this->request->getPost('nomeAluno'),
            'matricula' => $this->request->getPost('matricula'),
            'senha' => md5($this->request->getPost('senha')),
            'nomeResponsavel' => $this->request->getPost('nomeResponsavel'),
            'turma' => $this->request->getPost('turma'),
            'telefone' => $this->request->getPost('telefone'),
        ];
        $userMobModel->save($data);

        $data = [
            'success' => "Dados atualizados com sucesso!",
            'nomeAluno' => $this->request->getPost('nomeAluno'),
            'matricula' => $this->request->getPost('matricula'),
            'senha' => md5($this->request->getPost('senha')),
            'nomeResponsavel' => $this->request->getPost('nomeResponsavel'),
            'turma' => $this->request->getPost('turma'),
            'turmas' => $turmaModel->getTurmas(),
            'telefone' => $this->request->getPost('telefone'),
        ];
        return view('usuarioMob/usuarioMob_detalhes', $data);
    }

    public function excluirCadastro($id)
    {
        $userMobModel = new UsuarioMob();
        $userMobModel->delete($id);

        $data = [
            'usuarioMob' => $userMobModel->getUsuarios(),
            'success' => "Cadastro excluído com sucesso!",
        ];
        return view('usuarioMob/usuarioMob_lista', $data);
    }
}
