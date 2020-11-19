<?php

namespace App\Controllers;

use App\Models\UsuarioWeb;

class UsuarioWebController extends BaseController
{
    public function index()
    {
        $userWebModel = new UsuarioWeb();

        $data = [
            'usuarioWeb' => $userWebModel->getUsuarios()
        ];
        return view('usuarioWeb/usuarioWeb_lista', $data);
    }

    //--------------------------------------------------------------------

    public function cadastroForm()
    {
        $data = [
            'nome' => '',
            'cargo' => '',
            'email' => '',
            'telefone' => '',
        ];
        return view('usuarioWeb/usuarioWeb_cadastro', $data);
    }

    public function saveCadastro()
    {

        helper('form');
        $userWebModel = new UsuarioWeb();
        $rules = [
            'nome' => 'required',
            'email' => 'required|valid_email',
            'telefone' => 'required|max_length [14]',
            'cargo' => 'required|max_length[1]'
        ];
        if ($this->request->getPost('id') === null) {
            $rules['senha'] = 'required';
        }



        if ($this->validate($rules)) {
            if ($this->request->getPost('id') === null) {
                $emailNovo = $this->request->getPost('email');
                $emailExistente = $userWebModel->where('email', $emailNovo)
                    ->first();
                if (isset($emailExistente)) {

                    $data['fail'] = "E-mail já cadastrado, tente outro!";
                    return view('usuarioWeb/usuarioWeb_cadastro', $data);
                } else {
                    $userWebModel->save([
                        'nome' => $this->request->getPost('nome'),
                        'email' => $this->request->getPost('email'),
                        'senha' => md5($this->request->getPost('senha')),
                        'telefone' => $this->request->getPost('telefone'),
                        'cargo' => $this->request->getPost('cargo')
                    ]);

                    $data['success'] = "Cadastro realizado com sucesso!";
                    return view('usuarioWeb/usuarioWeb_cadastro', $data);
                }
            } else {
                $data = [
                    'id' => $this->request->getPost('id'),
                    'nome' => $this->request->getPost('nome'),
                    'email' => $this->request->getPost('email'),
                    'senha' => md5($this->request->getPost('senha')),
                    'telefone' => $this->request->getPost('telefone'),
                    'cargo' => $this->request->getPost('cargo')
                ];
                $userWebModel->save($data);

                unset($data['senha']);
                $data['success'] = "Dados atualizados com sucesso!";

                return view('usuarioWeb/usuarioWeb_detalhes', $data);
            }
        } else {

            if ($this->request->getPost('id') !== null) {
                $data = [
                    'fail' => "Preencha os dados corretamente e tente de novo!",
                    'id' => $this->request->getPost('id'),
                    'nome' => $this->request->getPost('nome'),
                    'email' => $this->request->getPost('email'),
                    'telefone' => $this->request->getPost('telefone'),
                    'cargo' => $this->request->getPost('cargo')
                ];
                return view('usuarioWeb/usuarioWeb_detalhes', $data); 
            }
            $data['fail'] = "Preencha os dados corretamente e tente de novo!";
            return view('usuarioWeb/usuarioWeb_cadastro', $data);
        }
    }

    public function detalhes($id)
    {

        $userWebModel = new UsuarioWeb();
        $userData = $userWebModel->find($id);

        $data = [
            'id' => $userData['id'],
            'nome' => $userData['nome'],
            'email' => $userData['email'],
            'cargo' => $userData['cargo'],
            'telefone' => $userData['telefone'],
        ];
        return view('usuarioWeb/usuarioWeb_detalhes', $data);
    }

    public function excluirCadastro($id)
    {
        $userWebModel = new UsuarioWeb();
        $userWebModel->delete($id);

        $data = [
            'usuarioWeb' => $userWebModel->getUsuarios(),
            'success' => "Cadastro excluído com sucesso!",
        ];
        return view('usuarioWeb/usuarioWeb_lista', $data);
    }
}
