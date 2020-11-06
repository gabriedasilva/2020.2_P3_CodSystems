<?php

namespace App\Controllers;

use App\Models\Frequencia;
use App\Models\Disciplinas;
use App\Models\Turma;
use App\Models\UsuarioMob;
use CodeIgniter\I18n\Time;

class FrequenciaController extends BaseController
{
    public function index($idTurma)
    {

        $usuarioMobModel = new UsuarioMob();
        $turmaModel = new Turma();

        $data = [
            'alunos' => $usuarioMobModel->where('turma', $idTurma)
                ->findAll(),
            'turma' => $turmaModel->where('id', $idTurma)
                ->first(),
        ];

        return view('professor_panel/frequencia/frequencia_form', $data);
    }

    //--------------------------------------------------------------------

    public function saveFrequencia()
    {

        helper('form');
        $frequenciaModel = new Frequencia();

        $post = $this->request->getPost(); //coleta todo o post
        $inputFields = array_keys($this->request->getPost()); //coleta somente o nome dos campos vindos do post
        unset($post['idTurma']); //remove o input idTurma

        foreach ($inputFields as $input) { //gero o array de rules setando todos os campos com required
            $rules[$input] = 'required';
        }

        //dd($post);

        if ($this->validate($rules)) {
            $turmaModel = new Turma();
            $disciplinasModel = new Disciplinas();

            foreach ($post as $post_item) {
                
                $aluno = $frequenciaModel->where('idAluno', $post_item)->first();

                if ($aluno === null) {
                    $frequenciaModel->save([
                        'idAluno' => $post_item,
                        'frequencia' => '1',
                    ]);
                } else {
                    
                    $frequenciaModel->where('idAluno', $aluno['idAluno'])
                        ->set(['frequencia' => $aluno['frequencia']+1])
                        ->update();
                }
            }
           

            if ($this->request->getPost('id') !== null) {
                $msgSuccess = "Frequencia atualizada com sucesso!";
            } else {
                $msgSuccess = "Cadastro realizado com sucesso!";
            }

            dd("sucesso");

            return view('professor_panel/atividades/atividades_lista');
        } else {

            $usuarioMobModel = new UsuarioMob();
            $turmaModel = new Turma();

            $data = [
                'alunos' => $usuarioMobModel->where('turma', $this->request->getPost('idTurma'))
                    ->findAll(),
                'turma' => $turmaModel->where('id', $this->request->getPost('idTurma'))
                    ->first(),
            ];

            $inputs = array_keys($this->request->getPost());
            dd("Error");
            return view('professor_panel/frequencia/frequencia_form', $data);
        }
    }
}
