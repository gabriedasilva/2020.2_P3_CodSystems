<?php echo $this->include('templates/header') ?>

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
    <?php echo $this->include('usuarioMob/usuarioMob_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Lista de Alunos</h3>
        </div>
        <table class="table table-sm table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarioMob) && is_array($usuarioMob)) : ?>
                    <?php foreach ($usuarioMob as $usuarioMob_item) : ?>
                        <tr class="">
                            <td><?php echo $usuarioMob_item['id']; ?></td>
                            <td><?php echo $usuarioMob_item['nomeAluno']; ?></td>
                            <td><?php echo $usuarioMob_item['turma']; ?></td>
                            <td><?php echo $usuarioMob_item['matricula']; ?></td>
                            <td><?php echo $usuarioMob_item['nomeResponsavel']; ?></td>
                            <td>
                                <a style="max-width: 50px;" class="btn btn-warning btn-sm btn-block" href="<?php echo base_url('UsuarioMobController/detalhes/' . $usuarioMob_item['id']) ?>">
                                    <i class="fas fa-user-edit fa-lg"></i>
                                </a>
                            </td>
                            <td>
                                <a style="max-width: 50px;" class="btn btn-danger btn-sm btn-block" href="<?php echo base_url('UsuarioMobController/excluirCadastro/' . $usuarioMob_item['id']) ?>" onclick="return excluirCadastro()">
                                    <i class="fas fa-user-times fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>