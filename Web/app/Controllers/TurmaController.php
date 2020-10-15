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
            'turmas' => $turmaModel->turmasProfessor(),
        ];
        return view('home/homeProfessor', $data);
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

        /* $db = db_connect();
        $usuarioMobModel = new UsuarioMob();

        $builder = $db->table('usuariomob');
        $builder->select('usuariomob.id, usuariomob.nomeAluno, usuariomob.matricula, turma.nome');
        $builder->join('turma', 'usuariomob.turma = turma.id');

        $query = $builder->get(); */


        $data = [
            'alunosTurma' => $usuarioMobModel->where('turma', $idTurma)
                ->findAll(),
            'turma' => $turmaModel->where('id', $idTurma)
                ->first(),
        ];
        return view('turma/turma_alunos', $data);
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
        return view('turma/turma_alunoPerfil', $data);
    }

    public function realizarCadastro()
    {

        helper('form');
        $turmaModel = new Turma();

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
}
