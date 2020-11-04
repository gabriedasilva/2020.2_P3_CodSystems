<?php echo $this->include('templates/headerProfessor') ?>

<!-- FLEX for Errors -->
<div style="background-color: #FBC02D;">
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
<div style="background-color: #EEEEEE; height: 100%;" class="d-flex flex-row">
    <!-- FLEX menu lateral-->
    <?php echo $this->include('professor_panel/atividades/atividades_menu') ?>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 bg-white rounded">
            <h3>Detalhes da Atividade</h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex justify-content-center">
            <div class="p-2 m-1 w-100">
                <form class="p-1 m-1" action="<?php echo base_url('Atividades/atualizar') ?>" method="POST">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : set_value('id') ?>" />
                        <div class="p-2 bd-highlight">
                            <label class="h5" for="titulo">Titulo da Atividade:</label>
                            <input class="form-control" type="text" name="titulo" required value="<?php echo isset($titulo) ? $titulo : set_value('titulo') ?>"></input>
                        </div>
                        <div class="p-2 h-50 bd-highlight">
                            <label class="h5" for="descricao">Descrição da Atividade:</label>
                            <textarea class="form-control" aria-label="With textarea" style="resize:none;" maxlength="400" name="descricao" rows="8" cols="33" required>
                            <?php echo isset($descricao) ? $descricao : set_value('descricao') ?>
                            </textarea>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label class="h5" for="entrega">Data de entrega:</label>
                            <input class="form-control w-25" type="datetime-local" name="entrega" value="<?php echo (str_replace(' ', 'T', $entrega)); ?>"></input>
                        </div>

                        <input type="hidden" type="text" name="idTurma" value="<?php echo $turma['id'] ?>"></input>
                        <input type="hidden" type="text" name="idDisciplina" value="<?php echo $disciplina['id'] ?>"></input>

                        <div class="d-flex justify-content-end flex-fill">
                            <button type="submit" class="btn btn-success text-right mr-3">Cadastrar <i class="fas fa-plus-circle"></i></button>
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