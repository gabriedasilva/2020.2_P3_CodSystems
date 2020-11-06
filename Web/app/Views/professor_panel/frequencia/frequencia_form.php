<?php echo $this->include('templates/headerProfessor') ?>

<script>
    function confirmFrequencia() {
        if (confirm('Tem certeza que deseja continuar? Após enviada a frequência não será possível desfazer.')) {
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
        <a class="d-flex align-items-center nav-link text-light mt-1 mb-2" href="#">
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
            <h3>Frequencia da turma: <?php echo $turma['nome'] ?></h3>
        </div>
        <div class="d-flex justify-content-center">
            <div class="m-2 w-75">
                <form action="<?php echo base_url('Frequencia/salvar') ?>" method="POST">
                    <input type="hidden" name="idTurma" id="idTurma" value="<?php echo isset($turma['id']) ? $turma['id'] : set_value('idTurma') ?>" />
                    <table class="table table-sm table-hover table-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Aluno</th>
                                <th scope="col" class="text-center">Faltou</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alunos) && is_array($alunos)) : ?>
                                <?php foreach ($alunos as $alunos_item) : ?>
                                    <tr class="">
                                        <td><?php echo $alunos_item['id']; ?></td>
                                        <td><?php echo $alunos_item['nomeAluno']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="<?php echo $alunos_item['id']; ?>" aria-label="Checkbox for following text input" name="frequencia<?php echo $alunos_item['id']; ?>">
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
                    <?php if (!empty($alunos) && is_array($alunos)) : ?>
                        <div class="d-flex justify-content-end flex-fill">
                            <button type="submit" onclick="return confirmFrequencia()" class="btn btn-success text-right mr-3">Realizar Frequência <i class="fas fa-check-circle"></i></button>
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