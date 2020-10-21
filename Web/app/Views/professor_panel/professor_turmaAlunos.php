<?php echo $this->include('templates/headerProfessor') ?>

<script>
    function excluirCadastro() {
        if (confirm('Deseja realmente exluir esse cadastro?')) {
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
    <?php endif ?>
</div>
<!-- FLEX body -->
<div style="background-color: #673AB7; height: 100%; max-height: 100%" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <?php echo $this->include('turma/turma_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Alunos da Turma <?php echo $turma['nome'] ?></h3>
        </div>
        <div class="m-2">
            <table class="table table-sm table-hover table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col" class="text-center">Perfil Escolar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($alunosTurma) && is_array($alunosTurma)) : ?>
                        <?php foreach ($alunosTurma as $alunosTurma_item) : ?>
                            <tr class="">
                                <td><?php echo $alunosTurma_item['id']; ?></td>
                                <td><?php echo $alunosTurma_item['nomeAluno']; ?></td>
                                <td><?php echo $alunosTurma_item['matricula']; ?></td>
                                <td class="d-flex justify-content-center">
                                    <a style="max-width: 50px;" class="btn btn-info btn-block" href="<?php echo base_url('Turma/perfil/' . $alunosTurma_item['id']) ?>">
                                        <i class="fas fa-address-card fa-lg"></i>
                                    </a>
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
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>