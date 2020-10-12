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
        $data =[
            'nome' => '',
            'cargo' => '',
            'email' => '',
            'telefone' => '',
        ];
        return view('usuarioWeb/usuarioWeb_cadastro',$data);
    }

    public function realizarCadastro()
    {

        helper('form');
        $userWebModel = new UsuarioWeb();
        $rules = [
            'nome' => 'required',
            'email' => 'required|valid_email',
            'senha' => 'required',
            'telefone' => 'required',
            'cargo' => 'required|max_length[1]'
        ];

        if ($this->validate($rules)) {
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

    public function atualizarCadastro()
    {
        helper('form');
        $userWebModel = new UsuarioWeb();

        $data = [
            'id' => $this->request->getPost('id'),
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'senha' => md5($this->request->getPost('senha')),
            'telefone' => $this->request->getPost('telefone'),
            'cargo' => $this->request->getPost('cargo')
        ];
        $userWebModel->save($data);

        $data = [
            'success' => "Dados atualizados com sucesso!",
            'id' => $this->request->getPost('id'),
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'cargo' => $this->request->getPost('cargo')
        ];
        return view('usuarioWeb/usuarioWeb_detalhes', $data);
    }

    public function excluirCadastro($id){
        $userWebModel = new UsuarioWeb();
        $userWebModel->delete($id);

        $data = [
            'usuarioWeb' => $userWebModel->getUsuarios(),
            'success' => "Cadastro excluído com sucesso!",
        ];
        return view('usuarioWeb/usuarioWeb_lista', $data);
    }
}
