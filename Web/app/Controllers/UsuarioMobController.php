<?php

namespace App\Controllers;

use App\Models\Turma;
use App\Models\UsuarioMob;
use App\Models\Notas;

class UsuarioMobController extends BaseController
{
    public function index()
    {
        $userMobModel = new UsuarioMob();

        $data = [
            'usuarioMob' => $userMobModel->getUsuariosTurma(),
            'pager' => $userMobModel->pager
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
        return view('usuarioMob/usuarioMob_cadastro', $data);
    }

    public function saveCadastro()
    {

        helper('form');
        $userMobModel = new UsuarioMob();
        $turmaModel = new Turma();

        $rules = [
            'nomeAluno' => 'required',
            'matricula' => 'required|is_natural',
            'nomeResponsavel' => 'required',
            'turma' => 'required|is_natural_no_zero',
            'telefone' => 'required|max_length[14]'
        ];
        if ($this->request->getPost('id') === null) {
            $rules['senha'] = 'required';
        }

        if ($this->validate($rules)) {
            if ($this->request->getPost('id') === null) {
                $matriculaNovo = $this->request->getPost('matricula');
                $matriculaExistente = $userMobModel->where('matricula', $matriculaNovo)
                    ->first();
                if (isset($matriculaExistente)) {
                    $data['turmas'] = $turmaModel->getTurmas();
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
                        'turmas' => $turmaModel->getTurmas(),
                    ]);

                    $data['success'] = "Cadastro realizado com sucesso!";
                    return view('usuarioMob/usuarioMob_cadastro', $data);
                }
            } else {
                $data = [
                    'id' => $this->request->getPost('id'),
                    'nomeAluno' => $this->request->getPost('nomeAluno'),
                    'matricula' => $this->request->getPost('matricula'),
                    'nomeResponsavel' => $this->request->getPost('nomeResponsavel'),
                    'turma' => $this->request->getPost('turma'),
                    'telefone' => $this->request->getPost('telefone'),
                    'turmas' => $turmaModel->getTurmas(),
                ];
                if($this->request->getPost('senha') !== null && $this->request->getPost('senha') !== "")
                {
                  $data['senha'] = md5($this->request->getPost('senha'));
                }
                $userMobModel->save($data);

                $data['success'] = "Dados atualizados com sucesso!";
                $data['turmas'] = $turmaModel->getTurmas();

                return view('usuarioMob/usuarioMob_detalhes', $data);
            }
        } else {

            if ($this->request->getPost('id') !== null) {
                $data = [
                    'fail' => "Preencha os dados corretamente e tente de novo!",
                    'id' => $this->request->getPost('id'),
                    'nomeAluno' => $this->request->getPost('nomeAluno'),
                    'matricula' => $this->request->getPost('matricula'),
                    'nomeResponsavel' => $this->request->getPost('nomeResponsavel'),
                    'turmas' => $turmaModel->getTurmas(),
                    'turma' => $this->request->getPost('turma'),
                    'telefone' => $this->request->getPost('telefone'),
                ];
                return view('usuarioMob/usuarioMob_detalhes', $data);
            }

            $data['turmas'] = $turmaModel->getTurmas();
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

    public function excluirCadastro($id)
    {
        $userMobModel = new UsuarioMob();
        $notasModel = new Notas();
        
        $userMobModel->delete($id);
        $notasModel->where('idAluno', $id)->delete();

        $data = [
            'usuarioMob' => $userMobModel->getUsuariosTurma(),
            'success' => "Cadastro excluído com sucesso!",
            'pager' => $userMobModel->pager
        ];
        return view('usuarioMob/usuarioMob_lista', $data);
    }
}
