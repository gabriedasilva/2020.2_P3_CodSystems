<?php echo $this->include('templates/headerProfessor') ?>

<script>
    function confirmFrequencia() {
        if (confirm('Tem certeza que deseja continuar? Após lançadas as notas, não será possível desfazer.')) {
            return true;
        }
        return false;
    }
</script>

<!-- FLEX for Errors -->
<div>
    <?php if (isset($success)) : ?>
        <div class="alert alert-success text-center mb-0" role="alert">
            <?php echo $success ?>
        </div>
    <?php elseif (isset($fail)) : ?>
        <div class="alert alert-danger text-center mb-0" role="alert">
            <?php echo $fail ?>
        </div>
    <?php else : ?>
    <?php endif ?>
</div>
<!-- FLEX body -->
<div style="background-color: #673AB7; height: 100%; max-height: 100%" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <nav class="nav flex-column bg-dark h5 p-2" style="max-width:175px; min-width: 175px;">
        <a class="d-flex align-items-center nav-link text-light mt-1 mb-2" href="<?php echo base_url('Detalhes/turma/' . $turma['id'] . '/' . $idDisciplina) ?>">
            <div class="d-flex flex-fill">
                Voltar
            </div>
            <div>
                <i class="fas fa-arrow-circle-left"></i>
            </div>
        </a>
    </nav>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Notas da turma: <?php echo $turma['nome'] ?></h3>
        </div>
        <div class="d-flex justify-content-center">
            <div class="m-2 w-75">
                <form action="<?php echo base_url('Notas/salvar') ?>" method="POST">
                    <input type="hidden" name="idTurma" id="idTurma" value="<?php echo isset($turma['id']) ? $turma['id'] : set_value('idTurma') ?>" />
                    <table class="table table-sm table-hover table-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th class="text-center" scope="col">Aluno</th>
                                <th class="text-center" scope="col">Prova 1-bm</th>
                                <th class="text-center" scope="col">Prova 2-bm</th>
                                <th class="text-center" scope="col">Prova 3-bm</th>
                                <th class="text-center" scope="col">Prova 4-bm</th>
                                <th class="text-center" scope="col">media</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alunos) && is_array($alunos)) : ?>
                                <?php foreach ($alunos as $alunos_item) : ?>
                                    <tr class="">
                                        <input type="hidden" name="idAluno<?php echo  $alunos_item['id'];  ?>" id="id" value="<?php echo  $alunos_item['id'];  ?>" />
                                        <td><?php echo $alunos_item['id']; ?></td>
                                        <td><?php echo $alunos_item['nomeAluno']; ?></td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <input style="max-width: 60px" class="form-control" type="text" name="prova1bm<?php echo $alunos_item['id']; ?>" value="<?php echo $alunos_item['prova1bm']; ?>"></input>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <input style="max-width: 60px" class="form-control" type="text" name="prova2bm<?php echo $alunos_item['id']; ?>" value="<?php echo $alunos_item['prova2bm']; ?>"></input>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <input style="max-width: 60px" class="form-control" type="text" name="prova3bm<?php echo $alunos_item['id']; ?>" value="<?php echo $alunos_item['prova3bm']; ?>"></input>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <input style="max-width: 60px" class="form-control" type="text" name="prova4bm<?php echo $alunos_item['id']; ?>" value="<?php echo $alunos_item['prova4bm']; ?>"></input>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <input style="max-width: 60px" class="form-control" type="text" name="media<?php echo $alunos_item['id']; ?>" value="<?php echo $alunos_item['media']; ?>"></input>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td COLSPAN="4">
                                        <div class="d-flex flex-column justify-content-center" style="width: 700px; height: 450px; margin: auto; text-align:center;">
                                            <h3>Ops...</h3>
                                            <p>Por enquanto não há nenhum aluno cadastrado nessa turma.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="idDisciplina" id="idDisciplina" value="<?php echo isset($idDisciplina) ? $idDisciplina : set_value('idDisciplina') ?>" />
                    <?php if (!empty($alunos) && is_array($alunos)) : ?>
                        <div class="d-flex justify-content-end flex-fill">
                            <button type="submit" onclick="return confirmFrequencia()" class="btn btn-success text-right mr-3">Lançar Notas <i class="fas fa-check-circle"></i></button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>