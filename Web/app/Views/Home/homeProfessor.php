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
    <?php echo $this->include('Home/Home_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Meu Horário</h3>
        </div>
        <div class="m-1">
            <div class="d-flex flex-row justify-content-center shadow-sm p-3 bg-white rounded" style="width: auto; height: 510px; margin: auto; text-align:center;">
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Segunda-Feira</h5>
                    <?php if (isset($horarioSeg)) : ?>
                        <div class="m-1 mt-4">
                            <label for="segA">Horário A:</label>
                            <a name="segA" <?php isset($horarioSeg['segA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segA']) ? print $horarioSeg['segA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisA']) ? print " - " . $horarioSeg['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="segB">Horário B:</label>
                            <a name="segA" <?php isset($horarioSeg['segB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segB']) ? print $horarioSeg['segB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisB']) ? print " - " . $horarioSeg['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="segC">Horário C:</label>
                            <a name="segA" <?php isset($horarioSeg['segC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioSeg['segC']) ? print $horarioSeg['segC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioSeg['nomeDisC']) ? print " - " . $horarioSeg['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="segD">Horário D:</label>
                            <a name="segA" <?php isset($horarioSeg['segD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioSeg['idD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioSeg['segD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
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
                            <a name="terA" <?php isset($horarioTer['terA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terA']) ? print $horarioTer['terA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisA']) ? print " - " . $horarioTer['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="terB">Horário B:</label>
                            <a name="terB" <?php isset($horarioTer['terB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terB']) ? print $horarioTer['terB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisB']) ? print " - " . $horarioTer['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="terC">Horário C:</label>
                            <a name="terC" <?php isset($horarioTer['terC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioTer['terC']) ? print $horarioTer['terC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioTer['nomeDisC']) ? print " - " . $horarioTer['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="terD">Horário D:</label>
                            <a name="terA" <?php isset($horarioTer['terD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioTer['idD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioTer['terD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
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
                            <a name="quaA" <?php isset($horarioQua['quaA']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idA']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaA']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaA']) ? print $horarioQua['quaA'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisA']) ? print " - " . $horarioQua['nomeDisA'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quaB">Horário B:</label>
                            <a name="quaB" <?php isset($horarioQua['quaB']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idB']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaB']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaB']) ? print $horarioQua['quaB'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisB']) ? print " - " . $horarioQua['nomeDisB'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quaC">Horário C:</label>
                            <a name="quaC" <?php isset($horarioQua['quaC']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idC']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaC']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
                                <?php isset($horarioQua['quaC']) ? print $horarioQua['quaC'] : print "Nenhuma Turma"; ?>
                                <?php isset($horarioQua['nomeDisC']) ? print " - " . $horarioQua['nomeDisC'] : print ""; ?>
                            </a>
                        </div>
                        <div class="m-1">
                            <label for="quaD">Horário D:</label>
                            <a name="quaA" <?php isset($horarioQua['quaD']) ? print "href=" . base_url('Detalhes/turma/' . $horarioQua['idD']) : print "#" ?> class="btn btn-outline-primary btn-block <?php !isset($horarioQua['quaD']) ? print " disabled" : print ""; ?>" style="min-height: 38px;">
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
                </div>
                <div class="border m-1 p-1" style="background-color: #EEEEEE; width:220px;">
                    <h5 class="mt-3">Sexta-Feira</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>