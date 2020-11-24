<?php echo $this->include('templates/header') ?>

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
        <a class="d-flex align-items-center nav-link text-light mt-1" href="<?php echo base_url('Turma/alunos/' . $turmaId) ?>">
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
                                    <input disabled class="form-control" type="text" name="turma" value="<?php echo ($turma) ?>"></input>
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
                            <div class="d-flex flex-row" style="overflow:scroll; height:290px;">

                                <table class="table table-sm table-hover table-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">Disciplina</th>
                                            <th scope="col">Prova 1ºBM</th>
                                            <th scope="col">Prova 1ºBM</th>
                                            <th scope="col">Media 1º Período</th>
                                            <th scope="col">Prova 1ºBM</th>
                                            <th scope="col">Prova 1ºBM</th>
                                            <th scope="col">Média Final</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($notasAluno) && is_array($notasAluno)) : ?>
                                            <?php foreach ($notasAluno as $notasAluno_item) : ?>
                                                <tr class="text-center">
                                                    <td><?php echo $notasAluno_item['nomeDisciplina']; ?></td>
                                                    <td><?php echo $notasAluno_item['prova1bm']; ?></td>
                                                    <td><?php echo $notasAluno_item['prova2bm']; ?></td>
                                                    <td <?php echo ($notasAluno_item['media1periodo'] >= 7) ? print 'class="text-success"' : print 'class="text-danger"'; ?>><?php echo $notasAluno_item['media1periodo']; ?></td>
                                                    <td><?php echo $notasAluno_item['prova3bm']; ?></td>
                                                    <td><?php echo $notasAluno_item['prova4bm']; ?></td>
                                                    <td <?php echo ($notasAluno_item['mediaFinal'] >= 7) ? print 'class="text-success"' : print 'class="text-danger"'; ?>><?php echo $notasAluno_item['mediaFinal']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td COLSPAN="8">
                                                    <div class="d-flex flex-column justify-content-center" style="height:210px; margin: auto; text-align:center;">
                                                        <h3>Ops...</h3>
                                                        <p>Por enquanto não há nenhuma nota lançada para este aluno.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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