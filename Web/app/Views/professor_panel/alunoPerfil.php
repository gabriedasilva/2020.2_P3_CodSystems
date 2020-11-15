<?php echo $this->include('templates/headerProfessor') ?>

<!-- FLEX for Errors -->
<div>
    <?php if (isset($success)) : ?>
        <div class="alert alert-success text-center mb-0" role="alert">
            <?php echo $success ?>
        </div>
    <?php endif ?>
</div>
<!-- FLEX body -->
<div style="background-color: #EEEEEE; height: 100%;" class="d-flex flex-row">
    <!-- FLEX menu lateral-->
    <nav class="nav flex-column bg-dark h5 p-2" style="max-width:175px; min-width: 175px;">
        <a class="d-flex align-items-center nav-link text-light mt-1" href="<?php echo base_url('Detalhes/turma/' . $turmaId . '/' . $idDisciplina) ?>">
            <div class="d-flex flex-fill">
                <i class="fas fa-arrow-circle-left"></i>
            </div>
            <div>
                Voltar
            </div>
        </a>
    </nav>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Perfil: <?php echo $nomeAluno ?></h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex justify-content-center">
            <div class="p-2 shadow-sm bg-light " style="width: 80%; height:490px">
                <form class="p-1 m-1" action="<?php echo base_url('UsuarioMobController/atualizarCadastro') ?>" method="POST">
                    <div class="d-flex flex-rowbd-highlight mb-3">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : set_value('id') ?>" />
                        <div class="p-2 bd-highlight mt-3" style="margin: auto;">
                            <i class="fas fa-user-circle fa-5x"></i>
                        </div>
                        <div class="d-flex flex-column" style="margin: auto;">
                            <div class="d-flex flex-row">
                                <div class="p-2 bd-highlight">
                                    <label for="nomeAluno">Nome:</label>
                                    <input disabled class="form-control" type="text" name="nomeAluno" value="<?php echo isset($nomeAluno) ? $nomeAluno : set_value('nomeAluno') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="matricula">Matrícula:</label>
                                    <input disabled class="form-control" type="text" name="matricula" value="<?php echo isset($matricula) ? $matricula : set_value('matricula') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="nomeResponsavel">Responsável:</label>
                                    <input disabled class="form-control" type="text" name="nomeResponsavel" value="<?php echo isset($nomeResponsavel) ? $nomeResponsavel : set_value('nomeResponsavel') ?>"></input>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="p-2 bd-highlight">
                                    <label for="turma">Turma:</label>
                                    <input disabled class="form-control" type="text" name="turma" value="<?php echo isset($turma) ? $turma : set_value('turma') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="telefone">Telefone:</label>
                                    <input disabled class="form-control" type="text" name="telefone" value="<?php echo isset($telefone) ? $telefone : set_value('telefone') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="faltas">faltas:</label>
                                    <input disabled class="form-control" type="text" name="faltas" value="<?php echo isset($faltas) ? $faltas : set_value('faltas') ?>"></input>
                                </div>
                            </div>
                            <h5 class="mt-5">Notas 1° Periodo</h5>
                            <div class="d-flex flex-row">
                                <div class="p-2 bd-highlight">
                                    <label for="prova1bm">Prova 1 Bimestre:</label>
                                    <input disabled class="form-control" type="text" name="prova1bm" value="<?php echo $notas['prova1bm'] ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="prova2bm">Prova 2 Bimestre:</label>
                                    <input disabled class="form-control" type="text" name="prova2bm" value="<?php echo $notas['prova2bm'] ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="media1periodo">Média 1° Periodo:</label>
                                    <input disabled <?php echo ($notas['media1periodo']>=7) ? print 'class="form-control bg-success text-light"' : print 'class="form-control bg-danger text-light"'; ?> type="text" name="media1periodo" value="<?php echo $notas['media1periodo'] ?>"></input>
                                </div>
                            </div>
                            <h5>Notas 2° Periodo</h5>
                            <div class="d-flex flex-row">
                                <div class="p-2 bd-highlight">
                                    <label for="prova3bm">Prova 3 Bimestre:</label>
                                    <input disabled class="form-control" type="text" name="prova3bm" value="<?php echo $notas['prova3bm'] ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="prova4bm">Prova 4 Bimestre:</label>
                                    <input disabled class="form-control" type="text" name="prova4bm" value="<?php echo $notas['prova4bm'] ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="mediaFinal">Média Final:</label>
                                    <input disabled <?php echo ($notas['mediaFinal']>=7) ? print 'class="form-control bg-success text-light"' : print 'class="form-control bg-danger text-light"'; ?> type="text" name="mediaFinal" value="<?php echo $notas['mediaFinal'] ?>"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>