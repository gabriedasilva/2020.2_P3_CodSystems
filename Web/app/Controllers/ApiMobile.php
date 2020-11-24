<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Notas;
use App\Models\Turma;
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

	public function home()
	{

		helper('form');
		$usuarioMobModel = new UsuarioMob();

		if ($this->request->isAJAX()) {


			$userRequest['id'] = $this->request->getVar('id');
			$userRequest['matricula'] = $this->request->getVar('matricula');

			$userData = $usuarioMobModel->where('matricula', $userRequest['matricula'])->first();

			if ($userData !== null) {

				if ($userData['id'] === $userRequest['id']) {

					$turmaModel = new Turma();
					$disciplinasModel = new Disciplinas();
					$dadosTurma = $turmaModel->where('id', $userData['turma'])->first();
					$horarioTurma = $dadosTurma;

					unset($horarioTurma['id']); //remove o id
					unset($horarioTurma['nome']); //remove o nome
					unset($horarioTurma['ultima_frequencia']); //remove ultima_frequencia
					//sort($horarioTurma);
					$idsDisciplinas = array_unique($horarioTurma); //retira valores repetidos do array
					sort($idsDisciplinas); //retira as chaves do array para que possa usar os valores como parametros de busca abaixo

					//Nesa próxima seção capturo do banco as disciplinas correspondentes a turma que estou tratando
					$db = db_connect();
					$builder = $db->table('disciplinas');
					$builder->select('*');
					$builder->whereIn('id', $idsDisciplinas);
					$query = $builder->get();
					$disciplinasDados = $query->getResultArray();

					//Nesse foreach reestruturo o array para que o id da disciplina 
					//corresponda como chave ao nome dela como valor
					//para que eu possa usar com mais facilidade no próximo foreach
					foreach ($disciplinasDados as $key => $item) {
						$disciplinasDados[$item['id']] = $item['nome'];
						unset($disciplinasDados[$key]);
					}

					//Nesse foreach troco os id's dos campos de cada horario 
					//por seu nome correspondente no array gerado acima
					foreach ($horarioTurma as $key => $horario) {
						if (array_key_exists($horario, $disciplinasDados)) {
							$horarioTurma[$key] = $disciplinasDados[$horario];
						}
					}

					$data = [
						'responseMessage' => "Success!",
						'responseCode' => 3,
						'horario' => $horarioTurma,
						'turmaNome' => $dadosTurma['nome'],
					];
					echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
				} else {
					$data = [
						'responseMessage' => 'Error',
						'responseCode' => 2
					];
					echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
				}
			} else {
				$data = [
					'responseMessage' => 'Error',
					'responseCode' => 1,
				];
				echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
			}
		}
	}

	public function notas()
	{
		helper('form');
		$notasModel = new Notas();

		if ($this->request->isAJAX()) {

			$notasData = $notasModel->select('d.nome, notas.prova1bm, notas.prova2bm, notas.prova3bm, notas.prova4bm')
				->join('disciplinas d', 'd.id = notas.idDisciplina')
				->where('idAluno', $this->request->getVar('id'))
				->findAll();



			if ($notasData !== null) {
				$data = [
					'responseMessage' => 'Notas encontradas!',
					'responseCode' => 2,
					'notas' => $notasData,
				];
				echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
			} else {
				$data = [
					'responseMessage' => 'Notas não encontradas!',
					'responseCode' => 1,
				];
				echo json_encode(['content' => $data, 'csrf' => csrf_hash()]);
			}
		}
	}
}
