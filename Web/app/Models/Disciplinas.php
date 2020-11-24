<?php

namespace App\Models;

use CodeIgniter\Model;

class Disciplinas extends Model
{

    protected $table = "disciplinas";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'nome',
        'professor',
    ];
    /* protected $returnType = 'object'; */

    public function getDisciplinas($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function disIndisponiveis()
    {
        $turmaModel = new Turma();
        $disIndisponiveis = [];

        $hSeg = $turmaModel->select('segA,segB,segC,segD')->findAll();
        foreach ($hSeg as $key => $item) {
            $hSeg['segA'][] = $item['segA'];
            unset($hSeg[$key]);
            $hSeg['segB'][] = $item['segB'];
            unset($hSeg[$key]);
            $hSeg['segC'][] = $item['segC'];
            unset($hSeg[$key]);
            $hSeg['segD'][] = $item['segD'];
            unset($hSeg[$key]);
        }
        $disIndisponiveis[] = $hSeg;

        $hTer = $turmaModel->select('terA,terB,terC,terD')->findAll();
        foreach ($hTer as $key => $item) {
            $hTer['terA'][] = $item['terA'];
            unset($hTer[$key]);
            $hTer['terB'][] = $item['terB'];
            unset($hTer[$key]);
            $hTer['terC'][] = $item['terC'];
            unset($hTer[$key]);
            $hTer['terD'][] = $item['terD'];
            unset($hTer[$key]);
        }
        $disIndisponiveis[] = $hTer;

        $hQua = $turmaModel->select('quaA,quaB,quaC,quaD')->findAll();
        foreach ($hQua as $key => $item) {
            $hQua['quaA'][] = $item['quaA'];
            unset($hQua[$key]);
            $hQua['quaB'][] = $item['quaB'];
            unset($hQua[$key]);
            $hQua['quaC'][] = $item['quaC'];
            unset($hQua[$key]);
            $hQua['quaD'][] = $item['quaD'];
            unset($hQua[$key]);
        }
        $disIndisponiveis[] = $hQua;

        $hQui = $turmaModel->select('quiA,quiB,quiC,quiD')->findAll();
        foreach ($hQui as $key => $item) {
            $hQui['quiA'][] = $item['quiA'];
            unset($hQui[$key]);
            $hQui['quiB'][] = $item['quiB'];
            unset($hQui[$key]);
            $hQui['quiC'][] = $item['quiC'];
            unset($hQui[$key]);
            $hQui['quiD'][] = $item['quiD'];
            unset($hQui[$key]);
        }
        $disIndisponiveis[] = $hQui;

        $hSex = $turmaModel->select('sexA,sexB,sexC,sexD')->findAll();
        foreach ($hSex as $key => $item) {
            $hSex['sexA'][] = $item['sexA'];
            unset($hSex[$key]);
            $hSex['sexB'][] = $item['sexB'];
            unset($hSex[$key]);
            $hSex['sexC'][] = $item['sexC'];
            unset($hSex[$key]);
            $hSex['sexD'][] = $item['sexD'];
            unset($hSex[$key]);
        }
        $disIndisponiveis[] = $hSex;

        return  $disIndisponiveis;
    }
}
