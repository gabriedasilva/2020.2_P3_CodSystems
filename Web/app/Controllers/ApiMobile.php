<?php

namespace App\Controllers;

use App\Models\UsuarioMob;

class ApiMobile extends BaseController
{
	public function index()
	{
		return "Helo World!";
	}

	//--------------------------------------------------------------------

	public function login()
	{
		helper('form');
		$usuarioMobModel = new UsuarioMob();

		if ($this->request->isAJAX()) {
            

			$userData['matricula'] = $this->request->getVar('matricula');
			$userData['senha'] = md5($this->request->getVar('senha'));


			$rules = [
				'matricula' => 'required',
				'senha' => 'required',
			];
			$validationMessages = [
				'matricula'        => [
					'required' => 'A matrícula é necessário.',
				],
				'senha'        => [
					'required' => 'A senha é necessária.'
				]
			];

			$validation =  \Config\Services::validation();
			$validation->setRules($rules, $validationMessages);

			if ($validation->run($userData)) {

				$userFound = $usuarioMobModel->where('matricula', $userData['matricula'])->first();

				if ($userFound !== null) {    
					if ($userFound['senha'] !== $userData['senha']) {
						$data = [
							'responseMessage' => 'Senha incorreta! Tente novamente.',
							'responseCode' => 3,
						];
						echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
					} else {
					    unset($userFound['senha']);
					    $data = [
						'responseMessage' => "Success!",
						'responseCode' => 2,
						'data' => $userFound,
					];
					echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
					}
				} else {
					$data = [
						'responseMessage' => "Nenhuma conta encontrada com esses dados!",
						'responseCode' => 2,
					];
					echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
				}
			} else {
				$data = [
					'responseMessage' => [
						'matriculaError' => $validation->getError('matricula'),
						'senhaError' => $validation->getError('senha'),
					],
					'responseCode' => 1,
				];
				echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
			}
		} else {
			echo json_encode(['content' => "Error", 'csrf' => csrf_hash()]); 
		}
	}
}
