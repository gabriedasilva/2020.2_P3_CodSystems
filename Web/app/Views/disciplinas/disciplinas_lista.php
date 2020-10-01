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
    <?php echo $this->include('disciplinas/disciplinas_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Lista de Disciplinas</h3>
        </div>
        <table class="table table-sm table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                    <?php foreach ($disciplinas as $disciplinas_item) : ?>
                        <tr class="">
                            <td><?php echo $disciplinas_item['id']; ?></td>
                            <td><?php echo $disciplinas_item['nome']; ?></td>
                            <td><?php echo $disciplinas_item['professor']; ?></td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm btn-block" href="<?php echo base_url('DisciplinasController/detalhes/' . $disciplinas_item['id']) ?>">Editar</a><br>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger btn-sm btn-block" href="<?php  echo base_url('DisciplinasController/excluirCadastro/' . $disciplinas_item['id']) ?>" onclick="return excluirCadastro()">Excluir</a>
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