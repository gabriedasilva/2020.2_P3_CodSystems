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
        <a class="d-flex align-items-center nav-link text-light mt-1" href="#">
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
                        <div class="p-2 bd-highlight mt-3"  style="margin: auto;">
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
                                    <?php if (!empty($turma) && is_array($turma)) : ?>
                                        <input disabled class="form-control" type="text" name="turma" value="<?php echo isset($turma['nome']) ? $turma['nome'] : set_value('turma') ?>"></input>
                                    <?php else : ?>
                                        <input disabled class="form-control" type="text" name="turma" value="Turma Não encontrada!"></input>
                                    <?php endif; ?>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="telefone">Telefone:</label>
                                    <input disabled class="form-control" type="text" name="telefone" value="<?php echo isset($telefone) ? $telefone : set_value('telefone') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="faltas">% de faltas:</label>
                                    <input disabled class="form-control" type="text" name="faltas" value="<?php echo isset($faltas) ? $faltas : set_value('faltas') ?>"></input>
                                </div>
                            </div>
                            <h5 class="mt-5">Notas 1° Bimestre</h5>
                            <div class="d-flex flex-row">
                                <div class="p-2 bd-highlight">
                                    <label for="notaParcial">Parcial:</label>
                                    <input disabled class="form-control" type="text" name="notaParcial" value="<?php echo isset($notaParcial) ? $notaParcial : set_value('notaParcial') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="notaProva">Prova:</label>
                                    <input disabled class="form-control" type="text" name="notaProva" value="<?php echo isset($notaProva) ? $notaProva : set_value('notaProva') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="notaMedia">Média:</label>
                                    <input disabled class="form-control" type="text" name="notaMedia" value="<?php echo isset($notaMedia) ? $notaMedia : set_value('notaMedia') ?>"></input>
                                </div>
                            </div>
                            <h5>Notas 2° Bimestre</h5>
                            <div class="d-flex flex-row">
                                <div class="p-2 bd-highlight">
                                    <label for="notaParcial2bm">Parcial:</label>
                                    <input disabled class="form-control" type="text" name="notaParcial2bm" value="<?php echo isset($notaParcial2bm) ? $notaParcial2bm : set_value('notaParcial2bm') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="notaProva2bm">Prova:</label>
                                    <input disabled class="form-control" type="text" name="notaProva2bm" value="<?php echo isset($notaProva2bm) ? $notaProva2bm : set_value('notaProva2bm') ?>"></input>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <label for="notaMedia2bm">Média:</label>
                                    <input disabled class="form-control" type="text" name="notaMedia2bm" value="<?php echo isset($notaMedia2bm) ? $notaMedia2bm : set_value('notaMedia2bm') ?>"></input>
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