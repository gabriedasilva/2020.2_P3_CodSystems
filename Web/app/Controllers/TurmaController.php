<?php

namespace App\Controllers;

use App\Models\Disciplinas;
use App\Models\Turma;
use App\Models\UsuarioMob;

class TurmaController extends BaseController
{
    public function index()
    {
        $turmaModel = new Turma();

        $data = [
            'turmas' => $turmaModel->getTurmas()
        ];
        return view('turma/turma_lista', $data);
    }

    //--------------------------------------------------------------------

    public function turmasProfessor()
    {
        $turmaModel = new Turma();



        $data = [
            'turmas' => $turmaModel->turmasProfessor(session()->get('id')),
        ];
        return view('professor_panel/professor_turmas', $data);
    }

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
                ->findAll(),
            'turma' => $turmaModel->where('id', $idTurma)
                ->first(),
        ];

        if ((session()->get('cargo')) === "1") {
            return view('turma/turma_alunos', $data);
        } else {
            return view('professor_panel/professor_turmaAlunos', $data);
        }
    }

    public function perfilEscolar($id)
    {

        $userMobModel = new UsuarioMob();
        $turmaModel = new Turma();
        $userData = $userMobModel->find($id);
        $turmaNome = $turmaModel->where('id', $userData['turma'])
            ->first();

        $data = [
            'id' => $userData['id'],
            'nomeAluno' => $userData['nomeAluno'],
            'matricula' => $userData['matricula'],
            'nomeResponsavel' => $userData['nomeResponsavel'],
            'turma' => $turmaNome,
            'telefone' => $userData['telefone'],
            'faltas' => $userData['faltas'],
            'notaParcial' => $userData['notaParcial'],
            'notaProva' => $userData['notaProva'],
            'notaMedia' => $userData['notaMedia'],
            'notaParcial2bm' => $userData['notaParcial2bm'],
            'notaProva2bm' => $userData['notaProva2bm'],
            'notaMedia2bm' => $userData['notaMedia2bm'],
        ];

        if ((session()->get('cargo')) === "1") {
            return view('turma/turma_alunoPerfil', $data);
        } else {
            return view('professor_panel/alunoPerfil', $data);
        }
    }

    public function realizarCadastro()
    {

        helper('form');
        $turmaModel = new Turma();

        $rules = [
            'nome' => 'required',
            'segA' => 'required|unico_entre_turmas[segA]',
            'segB' => 'required|unico_entre_turmas[segB]',
            'segC' => 'required|unico_entre_turmas[segC]',
            'segD' => 'required|unico_entre_turmas[segD]',
            'terA' => 'required|unico_entre_turmas[terA]',
            'terB' => 'required|unico_entre_turmas[terB]',
            'terC' => 'required|unico_entre_turmas[terC]',
            'terD' => 'required|unico_entre_turmas[terD]',
            'quaA' => 'required|unico_entre_turmas[quaA]',
            'quaB' => 'required|unico_entre_turmas[quaB]',
            'quaC' => 'required|unico_entre_turmas[quaC]',
            'quaD' => 'required|unico_entre_turmas[quaD]',
            'quiA' => 'required|unico_entre_turmas[quiA]',
            'quiB' => 'required|unico_entre_turmas[quiB]',
            'quiC' => 'required|unico_entre_turmas[quiC]',
            'quiD' => 'required|unico_entre_turmas[quiD]',
            'sexA' => 'required|unico_entre_turmas[sexA]',
            'sexB' => 'required|unico_entre_turmas[sexB]',
            'sexC' => 'required|unico_entre_turmas[sexC]',
            'sexD' => 'required|unico_entre_turmas[sexD]',
        ];

        if ($this->validate($rules)) {
            $turmaModel->save([
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

            $disciplinasModel = new Disciplinas();

            $data = [];

            $data = [
                'success' => "Cadastro realizado com sucesso!",
                'turmas' => $turmaModel->getTurmas()
            ];
            return view('turma/turma_lista', $data);
        } else {
            $disciplinasModel = new Disciplinas();

            $data = [
                'fail' => "Preencha os dados corretamente e tente de novo!",
                'disciplinas' => $disciplinasModel->getDisciplinas()
            ];
            return view('turma/turma_cadastro', $data);
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

    public function atualizarCadastro()
    {
        helper('form');
        $turmaModel = new Turma();
        $disciplinasModel = new Disciplinas();

        $data = [
            'disciplinas' => $disciplinasModel->getDisciplinas(),
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
        $turmaModel->save($data);

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
        return view('home/homeProfessor', $data);
    }

    //--------------------------------------------------------------------

    public function detalhesTurma($idTurma)
    {
        $turmaModel = new Turma();
        $usuarioMobModel = new UsuarioMob();
        $disciplinasModel = new Disciplinas();

        $data = [
            'alunosTurma' => $usuarioMobModel->where('turma', $idTurma)
                ->findAll(),
            'turma' => $turmaModel->getTurmas($idTurma),
        ];
        return view('professor_panel/detalhes_turma', $data);
    }
  
}
