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
    <?php echo $this->include('disciplinas/disciplinas_menu') ?>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Detalhes: <?php echo $nome ?></h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex justify-content-center">
            <div class="p-2" style="width: 450px;">
                <form class="p-1 m-1" action="<?php echo base_url('DisciplinasController/atualizarCadastro') ?>" method="POST">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : set_value('id') ?>" />
                        <div class="p-2 bd-highlight">
                            <label for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo isset($nome) ? $nome : set_value('nome') ?>"></input>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label for="professor">Professor:</label>
                            <select name="professor" class="custom-select" id="inputGroupSelect01">
                                <?php if (!empty($professores) && is_array($professores)) : ?>
                                    <?php foreach ($professores as $professores_item) : ?>
                                        <?php if ($professores_item['id'] !== $professor) : ?>
                                            <option value="<?php echo $professores_item['id']; ?>">
                                                <?php echo $professores_item['nome']; ?>
                                            </option>
                                        <?php else : ?>
                                            <option selected value="<?php echo isset($professor) ? $professor : set_value('professor') ?>">
                                                <?php echo isset($professores_item['nome']) ? $professores_item['nome'] : set_value('professor') ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end flex-fill">
                        <button type="submit" class="btn btn-success text-right">Salvar Alterações <i class="fas fa-save"></i></button>
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