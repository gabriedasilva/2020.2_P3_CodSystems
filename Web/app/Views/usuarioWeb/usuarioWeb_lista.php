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
    <?php echo $this->include('usuarioWeb/usuarioWeb_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Lista de Professores/Coordenadores</h3>
        </div>
        <div class="m-2">
            <table class="table table-sm table-hover table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($usuarioWeb) && is_array($usuarioWeb)) : ?>
                        <?php foreach ($usuarioWeb as $usuarioWeb_item) : ?>
                            <tr class="">
                                <td><?php echo $usuarioWeb_item['id']; ?></td>
                                <td><?php echo $usuarioWeb_item['nome']; ?></td>
                                <td><?php echo $usuarioWeb_item['email']; ?></td>
                                <td><?php echo $usuarioWeb_item['telefone']; ?></td>
                                <td>
                                    <?php if ($usuarioWeb_item['cargo'] === "0") : ?>
                                        <?php echo "Professor" ?>
                                    <?php else : ?>
                                        <?php echo "Administrador" ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a style="max-width: 50px;" class="btn btn-warning btn-sm btn-block" href="<?php echo base_url('ProfessoresECoordenadores/detalhes/' . $usuarioWeb_item['id']) ?>">
                                        <i class="fas fa-user-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a style="max-width: 50px;" class="btn btn-danger btn-sm btn-block" href="<?php echo base_url('ProfessoresECoordenadores/excluirCadastro/' . $usuarioWeb_item['id']) ?>" onclick="return excluirCadastro()">
                                        <i class="fas fa-user-times fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <?php if ($pager) : ?>
                <?= $pager->links() ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>