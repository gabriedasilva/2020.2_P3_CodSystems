<?php

namespace App\Controllers;

use App\Models\Turma;

class Login extends BaseController
{
	public function index()
	{
		return view('login');
	}

	//--------------------------------------------------------------------

	public function login()
	{
		$email = $this->request->getPost('email');
		$senha = md5($this->request->getPost('senha'));

		helper('form');
		$loginModel = new \App\Models\Login();
		$rules = [
			'email' => 'required',
			'senha' => 'required',
		];

		if ($this->validate($rules)) {

			$userFound = $loginModel->find($email);

			if ($userFound !== null) {
				if ($userFound->email === $email) {

					if ($userFound->senha !== $senha) {
						$data['resultLogin'] = 'Senha incorreta! Tente novamente.';
						return view('Login', $data);
					} else {

						$this->setSession($userFound);

						if (session()->get('cargo') === "1") {
							return view('Home/home');
						} else {
							$turmaModel = new Turma();

							$data = [
								'horarioSeg' => $turmaModel->horarioSeg(session()->get('id')),
								'horarioTer' => $turmaModel->horarioTer(session()->get('id')),
								'horarioQua' => $turmaModel->horarioQua(session()->get('id')),
							];
							return view('Home/homeProfessor', $data);
						}
					}
				}
			} else {
				$data['resultLogin'] = 'Conta não encontrada! Tente novamente.';
				return view('Login', $data);
			}
		} else {
			$data['resultLogin'] = 'Preencha todos os campos corretamente!';
			return view('Login', $data);
		}
	}

	public function setSession($userMatch)
	{
		$data = [
			'id' => $userMatch->id,
			'nome' => $userMatch->nome,
			'email' => $userMatch->email,
			'cargo' => $userMatch->cargo,
			'telefone' => $userMatch->telefone,
			'isLoggedIn' => true
		];


		session()->set($data);
		return true;
	}

	public function logOut()
	{
		session()->destroy();
		return view('login');
	}
}
