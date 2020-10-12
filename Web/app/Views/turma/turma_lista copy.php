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
                        <div class="flex-column border flex-fill shadow-sm rounded p-2" style="min-height: 100px">
                            <div class="d-flex flex-row border-bottom">
                                <div class="m-1 mr-4"> # <?php echo $turmas_item['id']; ?></div>
                                <div class="m-1 mr-4"> Turma: <?php echo $turmas_item['nome']; ?></div>
                            </div>
                            <div class="d-flex flex-row">
                                <div>
                                    <label for="turnoA">TurnoA:</label>
                                    <input disabled name="turnoA" class="form-control" value="<?php echo $turmas_item['turnoA']; ?>">
                                </div>
                                <div>
                                    <label for="turnoB">TurnoB:</label>
                                    <input disabled name="turnoB" class="form-control" value="<?php echo $turmas_item['turnoB']; ?>">
                                </div>
                                <div>
                                    <label for="turnoC">TurnoC:</label>
                                    <input disabled name="turnoC" class="form-control" value="<?php echo $turmas_item['turnoC']; ?>">
                                </div>
                                <div>
                                    <label for="turnoD">TurnoD:</label>
                                    <input disabled name="turnoD" class="form-control" value="<?php echo $turmas_item['turnoD']; ?>">
                                </div>
                                <div class="d-flex" style="margin: auto;">
                                    <div class="m-2">
                                        <a class="btn btn-info btn-lg" href="<?php echo base_url('DisciplinasController/detalhes/' . $turmas_item['id']) ?>">
                                            <i class="fas fa-user-graduate"></i>
                                        </a>
                                    </div>
                                    <div class="m-2">
                                        <a class="btn btn-warning btn-lg" href="<?php echo base_url('DisciplinasController/detalhes/' . $turmas_item['id']) ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="m-2">
                                        <a class="btn btn-danger btn-lg" href="<?php echo base_url('DisciplinasController/excluirCadastro/' . $turmas_item['id']) ?>" onclick="return excluirCadastro()">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
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