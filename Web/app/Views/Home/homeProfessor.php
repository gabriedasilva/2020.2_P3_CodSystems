<?php echo $this->include('templates/headerProfessor') ?>

<!-- FLEX for Errors -->
<div style="background-color: #FBC02D;">
    <?php if (isset($success)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif ?>
</div>
<!-- FLEX body -->
<div style="background-color: #EEEEEE; height: 100%; max-height: 100%;" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <?php //echo $this->include('Home/Home_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-2 bg-white rounded">
            <h3>Meu Horário</h3>
        </div>
        <div class="m-1">
            <div class="d-flex flex-row justify-content-center shadow-sm p-3 bg-white rounded" style="width: auto; height: 510px; margin: auto; text-align:center;">
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Segunda-Feira</h5>
                    <?php if (isset($horarioSeg)) : ?>
                        <div class="m-1 mt-4">
                            <label for="segA">Horário A:</label>
                            <a name="segA" <?php isset($horarioSeg['segA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idA'] . '/' . $horarioSeg['idDisA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segA']) ? print $horarioSeg['segA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisA']) ? print " - " . $horarioSeg['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="segB">Horário B:</label>
                            <a name="segA" <?php isset($horarioSeg['segB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idB'] . '/' . $horarioSeg['idDisB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segB']) ? print $horarioSeg['segB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisB']) ? print " - " . $horarioSeg['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="segC">Horário C:</label>
                            <a name="segA" <?php isset($horarioSeg['segC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idC'] . '/' . $horarioSeg['idDisC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segC']) ? print $horarioSeg['segC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisC']) ? print " - " . $horarioSeg['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="segD">Horário D:</label>
                            <a name="segA" <?php isset($horarioSeg['segD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idD'] . '/' . $horarioSeg['idDisD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segD']) ? print $horarioSeg['segD'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisD']) ? print " - " . $horarioSeg['nomeDisD'] : print ""; ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex justify-content-center" style="height:80%; margin: auto;">
                            <strong class="align-self-center mb-6">Não há aulas para esse dia.</strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Terça-Feira</h5>
                    <?php if (isset($horarioTer)) : ?>
                        <div class="m-1 mt-4">
                            <label for="terA">Horário A:</label>
                            <a name="terA" <?php isset($horarioTer['terA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idA'] . '/' . $horarioTer['idDisA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terA']) ? print $horarioTer['terA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisA']) ? print " - " . $horarioTer['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="terB">Horário B:</label>
                            <a name="terB" <?php isset($horarioTer['terB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idB'] . '/' . $horarioTer['idDisB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terB']) ? print $horarioTer['terB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisB']) ? print " - " . $horarioTer['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="terC">Horário C:</label>
                            <a name="terC" <?php isset($horarioTer['terC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idC'] . '/' . $horarioTer['idDisC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terC']) ? print $horarioTer['terC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisC']) ? print " - " . $horarioTer['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="terD">Horário D:</label>
                            <a name="terA" <?php isset($horarioTer['terD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idD'] . '/' . $horarioTer['idDisD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terD']) ? print $horarioTer['terD'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisD']) ? print " - " . $horarioTer['nomeDisD'] : print ""; ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex justify-content-center" style="height:80%; margin: auto;">
                            <strong class="align-self-center mb-6">Não há aulas para esse dia.</strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Quarta-Feira</h5>
                    <?php if (isset($horarioQua)) : ?>
                        <div class="m-1 mt-4">
                            <label for="quaA">Horário A:</label>
                            <a name="quaA" <?php isset($horarioQua['quaA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idA'] . '/' . $horarioQua['idDisA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaA']) ? print $horarioQua['quaA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisA']) ? print " - " . $horarioQua['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quaB">Horário B:</label>
                            <a name="quaB" <?php isset($horarioQua['quaB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idB'] . '/' . $horarioQua['idDisB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaB']) ? print $horarioQua['quaB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisB']) ? print " - " . $horarioQua['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quaC">Horário C:</label>
                            <a name="quaC" <?php isset($horarioQua['quaC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idC'] . '/' . $horarioQua['idDisC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaC']) ? print $horarioQua['quaC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisC']) ? print " - " . $horarioQua['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quaD">Horário D:</label>
                            <a name="quaA" <?php isset($horarioQua['quaD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idD'] . '/' . $horarioQua['idDisD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaD']) ? print $horarioQua['quaD'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisD']) ? print " - " . $horarioQua['nomeDisD'] : print ""; ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex justify-content-center" style="height:80%; margin: auto;">
                            <strong class="align-self-center mb-6">Não há aulas para esse dia.</strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Quinta-Feira</h5>
                    <?php if (isset($horarioQui)) : ?>
                        <div class="m-1 mt-4">
                            <label for="quiA">Horário A:</label>
                            <a name="quiA" <?php isset($horarioQui['quiA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQui['idA'] . '/' . $horarioQui['idDisA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQui['quiA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQui['quiA']) ? print $horarioQui['quiA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQui['nomeDisA']) ? print " - " . $horarioQui['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quiB">Horário B:</label>
                            <a name="quiB" <?php isset($horarioQui['quiB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQui['idB'] . '/' . $horarioQui['idDisB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQui['quiB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQui['quiB']) ? print $horarioQui['quiB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQui['nomeDisB']) ? print " - " . $horarioQui['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quiC">Horário C:</label>
                            <a name="quiC" <?php isset($horarioQui['quiC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQui['idC'] . '/' . $horarioQui['idDisC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQui['quiC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQui['quiC']) ? print $horarioQui['quiC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQui['nomeDisC']) ? print " - " . $horarioQui['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quiD">Horário D:</label>
                            <a name="quiA" <?php isset($horarioQui['quiD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQui['idD'] . '/' . $horarioQui['idDisD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQui['quiD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQui['quiD']) ? print $horarioQui['quiD'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQui['nomeDisD']) ? print " - " . $horarioQui['nomeDisD'] : print ""; ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex justify-content-center" style="height:80%; margin: auto;">
                            <strong class="align-self-center mb-6">Não há aulas para esse dia.</strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Sexta-Feira</h5>
                    <?php if (isset($horarioSex)) : ?>
                        <div class="m-1 mt-4">
                            <label for="sexA">Horário A:</label>
                            <a name="sexA" <?php isset($horarioSex['sexA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSex['idA'] . '/' . $horarioSex['idDisA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSex['sexA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSex['sexA']) ? print $horarioSex['sexA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSex['nomeDisA']) ? print " - " . $horarioSex['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="sexB">Horário B:</label>
                            <a name="sexB" <?php isset($horarioSex['sexB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSex['idB'] . '/' . $horarioSex['idDisB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSex['sexB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSex['sexB']) ? print $horarioSex['sexB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSex['nomeDisB']) ? print " - " . $horarioSex['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="sexC">Horário C:</label>
                            <a name="sexC" <?php isset($horarioSex['sexC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSex['idC'] . '/' . $horarioSex['idDisC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSex['sexC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSex['sexC']) ? print $horarioSex['sexC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSex['nomeDisC']) ? print " - " . $horarioSex['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="sexD">Horário D:</label>
                            <a name="sexA" <?php isset($horarioSex['sexD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSex['idD'] . '/' . $horarioSex['idDisD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSex['sexD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSex['sexD']) ? print $horarioSex['sexD'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSex['nomeDisD']) ? print " - " . $horarioSex['nomeDisD'] : print ""; ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex justify-content-center" style="height:80%; margin: auto;">
                            <strong class="align-self-center mb-6">Não há aulas para esse dia.</strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>