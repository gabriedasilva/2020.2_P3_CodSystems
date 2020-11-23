<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Notas;
use App\Models\Turma;
use App\Models\UsuarioMob;
use DateTime;
use DateTimeZone;

class TurmaController extends BaseController
{
    public function index()
    {
        $turmaModel = new Turma();

        $data = [
            'turmas' => $turmaModel->getTurmas(),
            'pager' => $turmaModel->pager
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

    public function turmaAlunos($idTurma)
    {

        $usuarioMobModel = new UsuarioMob();
        $turmaModel = new Turma();

        $data = [
            'alunosTurma' => $usuarioMobModel->where('turma', $idTurma)
                ->paginate(10),
            'turma' => $turmaModel->where('id', $idTurma)
                ->first(),
            'pager' => $usuarioMobModel->pager
        ];

        if ((session()->get('cargo')) === "1") {
            return view('turma/turma_alunos', $data);
        } else {
            return view('professor_panel/professor_turmaAlunos', $data);
        }
    }

    public function perfilEscolar($idAluno)
    {

        $userMobModel = new UsuarioMob();
        $turmaModel = new Turma();
        $notasModel = new Notas();
        $userData = $userMobModel->find($idAluno);
        $turmainfo = $turmaModel->where('id', $userData['turma'])
            ->first();

        $infoNotas = $notasModel->getNotas($idAluno);

        if (sizeof($infoNotas) > 0) {
            foreach ($infoNotas as $key => $infoNotas_item) {
                $infoNotas[$key]['media1periodo'] = ($infoNotas_item['prova1bm'] + $infoNotas_item['prova2bm']) / 2;
                $infoNotas[$key]['mediaFinal'] = ($infoNotas_item['prova1bm'] + $infoNotas_item['prova2bm'] + $infoNotas_item['prova3bm'] + $infoNotas_item['prova4bm']) / 4;
            }
        }
        $data = [
            'id' => $userData['id'],
            'nomeAluno' => $userData['nomeAluno'],
            'matricula' => $userData['matricula'],
            'nomeResponsavel' => $userData['nomeResponsavel'],
            'turma' => $turmainfo['nome'],
            'turmaId' => $userData['turma'],
            'telefone' => $userData['telefone'],
            'faltas' => $userData['faltas'],
            'notasAluno' => $infoNotas,
        ];

        return view('turma/turma_alunoPerfil', $data);
    }

    public function fichaEscolar($idAluno, $idDisciplina)
    {

        $userMobModel = new UsuarioMob();
        $turmaModel = new Turma();
        $notasModel = new Notas();
        $userData = $userMobModel->find($idAluno);
        $turmainfo = $turmaModel->where('id', $userData['turma'])
            ->first();

        $infoNotas = $notasModel->getNotas($idAluno, $idDisciplina);

        if (sizeof($infoNotas) > 0) {
            $notas['prova1bm'] = $infoNotas[0]['prova1bm'];
            $notas['prova2bm'] = $infoNotas[0]['prova2bm'];
            $notas['prova3bm'] = $infoNotas[0]['prova3bm'];
            $notas['prova4bm'] = $infoNotas[0]['prova4bm'];
            $notas['media1periodo'] = ($infoNotas[0]['prova1bm'] + $infoNotas[0]['prova2bm']) / 2;
            $notas['mediaFinal'] = ($infoNotas[0]['prova1bm'] + $infoNotas[0]['prova2bm'] + $infoNotas[0]['prova3bm'] + $infoNotas[0]['prova4bm']) / 4;
        } else {
            $notas['prova1bm'] = 0;
            $notas['prova2bm'] = 0;
            $notas['prova3bm'] = 0;
            $notas['prova4bm'] = 0;
            $notas['media1periodo'] = 0;
            $notas['mediaFinal'] = 0;
        }

        $data = [
            'id' => $userData['id'],
            'nomeAluno' => $userData['nomeAluno'],
            'matricula' => $userData['matricula'],
            'nomeResponsavel' => $userData['nomeResponsavel'],
            'turma' => $turmainfo['nome'],
            'turmaId' => $userData['turma'],
            'telefone' => $userData['telefone'],
            'faltas' => $userData['faltas'],
            'idDisciplina' => $idDisciplina,
            'notas' => $notas,
        ];

        return view('professor_panel/alunoPerfil', $data);
    }

    public function saveCadastro()
    {

        helper('form');
        $turmaModel = new Turma();
        $disciplinasModel = new Disciplinas();
        $turma_id = $this->request->getPost('id');


        $rules = [
            'nome' => 'required',
            'segA' => 'required|unico_entre_turmas[segA,' . $turma_id . ']',
            'segB' => 'required|unico_entre_turmas[segB,' . $turma_id . ']',
            'segC' => 'required|unico_entre_turmas[segC,' . $turma_id . ']',
            'segD' => 'required|unico_entre_turmas[segD,' . $turma_id . ']',
            'terA' => 'required|unico_entre_turmas[terA,' . $turma_id . ']',
            'terB' => 'required|unico_entre_turmas[terB,' . $turma_id . ']',
            'terC' => 'required|unico_entre_turmas[terC,' . $turma_id . ']',
            'terD' => 'required|unico_entre_turmas[terD,' . $turma_id . ']',
            'quaA' => 'required|unico_entre_turmas[quaA,' . $turma_id . ']',
            'quaB' => 'required|unico_entre_turmas[quaB,' . $turma_id . ']',
            'quaC' => 'required|unico_entre_turmas[quaC,' . $turma_id . ']',
            'quaD' => 'required|unico_entre_turmas[quaD,' . $turma_id . ']',
            'quiA' => 'required|unico_entre_turmas[quiA,' . $turma_id . ']',
            'quiB' => 'required|unico_entre_turmas[quiB,' . $turma_id . ']',
            'quiC' => 'required|unico_entre_turmas[quiC,' . $turma_id . ']',
            'quiD' => 'required|unico_entre_turmas[quiD,' . $turma_id . ']',
            'sexA' => 'required|unico_entre_turmas[sexA,' . $turma_id . ']',
            'sexB' => 'required|unico_entre_turmas[sexB,' . $turma_id . ']',
            'sexC' => 'required|unico_entre_turmas[sexC,' . $turma_id . ']',
            'sexD' => 'required|unico_entre_turmas[sexD,' . $turma_id . ']',
        ];

        if ($this->validate($rules)) {
            $turmaModel->save([
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
            ]);

            if ($this->request->getPost('id') !== null) {
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
            } else {
                $data = [
                    'success' => "Cadastro realizado com sucesso!",
                    'turmas' => $turmaModel->getTurmas()
                ];

                return view('turma/turma_lista', $data);
            }
        } else {
            $disciplinasModel = new Disciplinas();

            if ($this->request->getPost('id') !== null) {
                $data = [
                    'disciplinas' => $disciplinasModel->getDisciplinas(),
                    'fail' => "Preencha os dados corretamente e tente de novo!",
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
            } else {
                $data = [
                    'fail' => "Preencha os dados corretamente e tente de novo!",
                    'disciplinas' => $disciplinasModel->getDisciplinas()
                ];

                return view('turma/turma_cadastro', $data);
            }
        }
    }

    public function detalhes($id)
    {

        $turmaModel = new Turma();
        $turmaData = $turmaModel->find($id);
        $disciplinasModel = new Disciplinas();

        $data = [
            'disciplinas' => $disciplinasModel->getDisciplinas(),
            'id' => $turmaData['id'],
            'nome' => $turmaData['nome'],
            'segA' => $turmaData['segA'],
            'segB' => $turmaData['segB'],
            'segC' => $turmaData['segC'],
            'segD' => $turmaData['segD'],
            'terA' => $turmaData['terA'],
            'terB' => $turmaData['terB'],
            'terC' => $turmaData['terC'],
            'terD' => $turmaData['terD'],
            'quaA' => $turmaData['quaA'],
            'quaB' => $turmaData['quaB'],
            'quaC' => $turmaData['quaC'],
            'quaD' => $turmaData['quaD'],
            'quiA' => $turmaData['quiA'],
            'quiB' => $turmaData['quiB'],
            'quiC' => $turmaData['quiC'],
            'quiD' => $turmaData['quiD'],
            'sexA' => $turmaData['sexA'],
            'sexB' => $turmaData['sexB'],
            'sexC' => $turmaData['sexC'],
            'sexD' => $turmaData['sexD'],
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

    public function horarioProfessor()
    {
        $turmaModel = new Turma();

        $data = [
            'horarioSeg' => $turmaModel->horarioSeg(session()->get('id')),
            'horarioTer' => $turmaModel->horarioTer(session()->get('id')),
            'horarioQua' => $turmaModel->horarioQua(session()->get('id')),
            'horarioQui' => $turmaModel->horarioQui(session()->get('id')),
            'horarioSex' => $turmaModel->horarioSex(session()->get('id')),
        ];
        return view('Home/homeProfessor', $data);
    }

    //--------------------------------------------------------------------

    public function detalhesTurma($idTurma, $idDisciplina)
    {
        $turmaModel = new Turma();
        $usuarioMobModel = new UsuarioMob();
        $disciplinasModel = new Disciplinas();
        $turma = $turmaModel->getTurmas($idTurma);

        $fuso = new DateTimeZone('America/Sao_Paulo');
        $hoje = new DateTime();
        $hoje->setTimezone($fuso);
        $ultima_frequencia = DateTime::createFromFormat('Y-m-d', $turma['ultima_frequencia']);

        $data = [
            'alunosTurma' => $usuarioMobModel->where('turma', $idTurma)
                ->findAll(),
            'turma' => $turma,
            'idDisciplina' => $idDisciplina,
            'nomeDisciplina' => $disciplinasModel->select('nome')->where('id', $idDisciplina)->first(),
        ];

        if ($hoje->format('Y-m-d') > $ultima_frequencia->format('Y-m-d')) {
            $data['frequencia'] = true;
        } else {
            $data['frequencia'] = false;
        }

        return view('professor_panel/detalhes_turma', $data);
    }
}
