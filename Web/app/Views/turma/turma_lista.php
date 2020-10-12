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
    <?php echo $this->include('turma/turma_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Lista de Turmas</h3>
        </div>
        <?php if (!empty($turmas) && is_array($turmas)) : ?>
            <?php foreach ($turmas as $turmas_item) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="d-flex flex-row border flex-fill shadow-sm rounded p-2" style="min-height: 100px; background-color: #EEEEEE;">
                            <div class="d-flex flex-fill border-right">
                                <div class="m-1 mr-4"> # <?php echo $turmas_item['id']; ?></div>
                                <div class="m-1">
                                    Turma:
                                    <h1> <?php echo $turmas_item['nome']; ?></h1>
                                </div>
                            </div>
                            <div class="d-flex" style="margin: auto;">
                                <div class="m-2">
                                    <a class="btn btn-info btn-lg" href="<?php echo base_url('DisciplinasController/detalhes/' . $turmas_item['id']) ?>">
                                        <i class="fas fa-user-graduate"></i>
                                    </a>
                                </div>
                                <div class="m-2">
                                    <a class="btn btn-warning btn-lg" href="<?php echo base_url('Turma/detalhes/' . $turmas_item['id']) ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div class="m-2">
                                    <a class="btn btn-danger btn-lg" href="<?php echo base_url('Turma/excluir/' . $turmas_item['id']) ?>" onclick="return excluirCadastro()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>