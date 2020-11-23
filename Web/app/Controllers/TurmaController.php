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
            'disciplinas' => $disciplinasModel->getDisciplinas(),
            'disIndisponiveis' => $disciplinasModel->disIndisponiveis(),
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

        $disIndisponiveis = $disciplinasModel->disIndisponiveis();
        $invalidHorario = false;
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('segA'),$disIndisponiveis[0]['segA']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('segB'),$disIndisponiveis[0]['segB']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('segC'),$disIndisponiveis[0]['segC']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('segD'),$disIndisponiveis[0]['segD']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('terA'),$disIndisponiveis[1]['terA']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('terB'),$disIndisponiveis[1]['terB']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('terC'),$disIndisponiveis[1]['terC']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('terD'),$disIndisponiveis[1]['terD']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quaA'),$disIndisponiveis[2]['quaA']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quaB'),$disIndisponiveis[2]['quaB']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quaC'),$disIndisponiveis[2]['quaC']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quaD'),$disIndisponiveis[2]['quaD']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quiA'),$disIndisponiveis[3]['quiA']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quiB'),$disIndisponiveis[3]['quiB']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quiC'),$disIndisponiveis[3]['quiC']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('quiD'),$disIndisponiveis[3]['quiD']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('sexA'),$disIndisponiveis[4]['sexA']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('sexB'),$disIndisponiveis[4]['sexB']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('sexC'),$disIndisponiveis[4]['sexC']);
        ($invalidHorario === false) ?: $invalidHorario = in_array($this->request->getPost('sexD'),$disIndisponiveis[4]['sexD']);

        if ($this->validate($rules) === true && $invalidHorario === false) {
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
                    'disIndisponiveis' => $disciplinasModel->disIndisponiveis(),
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
                    'disciplinas' => $disciplinasModel->getDisciplinas(),
                    'disIndisponiveis' => $disciplinasModel->disIndisponiveis(),
                ];

                return view('turma/turma_cadastro', $data);
            }
        } else {
            $disciplinasModel = new Disciplinas();

            if ($this->request->getPost('id') !== null) {
                $data = [
                    'disciplinas' => $disciplinasModel->getDisciplinas(),
                    'disIndisponiveis' => $disciplinasModel->disIndisponiveis(),
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
                    'disciplinas' => $disciplinasModel->getDisciplinas(),
                    'disIndisponiveis' => $disciplinasModel->disIndisponiveis(),
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
            'disIndisponiveis' => $disciplinasModel->disIndisponiveis(),
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
            'pager' => $turmaModel->pager,
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
