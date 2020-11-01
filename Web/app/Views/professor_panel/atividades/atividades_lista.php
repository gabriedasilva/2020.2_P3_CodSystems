<?php echo $this->include('templates/headerProfessor') ?>

<script>
    function excluirCadastro() {
        if (confirm('Deseja realmente exluir essa atividade?')) {
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
<div style="background-color: #EEEEEE; height: 100%;" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <?php echo $this->include('professor_panel/atividades/atividades_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE; overflow: auto;" class="flex-fill flex-grow-1">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Atividades da turma <?php echo $turma['nome'] ?> da disciplina <?php echo $disciplina['nome'] ?>
            </h3>
        </div>
        <?php if (!empty($atividades) && is_array($atividades)) : ?>
            <?php foreach ($atividades as $atividades_item) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="d-flex flex-row border flex-fill shadow-sm rounded p-2" style="min-height: 100px; background-color: #EEEEEE;">
                            <div class="d-flex flex-fill border-right">
                                <div class="m-1 mr-4"> # <?php echo $atividades_item['id']; ?></div>
                                <div class="m-1">
                                    Titulo:
                                    <h3> <?php echo $atividades_item['titulo']; ?></h3>
                                </div>
                            </div>
                            <div class="d-flex w-25">
                                <div class="d-flex flex-row" style="margin: auto;">
                                    <div class="m-2">
                                        <a class="btn btn-info btn-lg" href="#">Detalhes
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </div>
                                    <div class="m-2">
                                        <a class="btn btn-danger btn-lg" href="<?php echo base_url('Atividades/excluir/' . $atividades_item['id'] . '/' . $turma['id'] . '/' . $disciplina['id']) ?>" onclick="return excluirCadastro()">Excluir
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            <?php endforeach; ?>
        <?php else : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="d-flex flex-column justify-content-center" style="width: 700px; height: 450px; margin: auto; text-align:center;">
                        <h3>Ops...</h3>
                        <p>Por enquanto não há nenhuma atividade.</p>
                    </div>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<script src="http://localhost/2020.2_P3_CodSystems/Web/assets/js/atividade_excluir.js"></script>

<?php echo $this->include('templates/footer') ?>