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
    <?php echo $this->include('usuarioMob/usuarioMob_menu') ?>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Detalhes: <?php echo $nomeAluno ?></h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex">
            <form class="p-1 m-1" action="<?php echo base_url('UsuarioMobController/atualizarCadastro') ?>" method="POST">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : set_value('id') ?>" />
                    <div class="p-2 bd-highlight">
                        <label for="nomeAluno">Nome:</label>
                        <input class="form-control" type="text" name="nomeAluno" value="<?php echo isset($nomeAluno) ? $nomeAluno : set_value('nomeAluno') ?>"></input>
                    </div>
                    <div class="p-2 bd-highlight">
                        <label for="matricula">Matrícula:</label>
                        <input class="form-control" type="text" name="matricula" value="<?php echo isset($matricula) ? $matricula : set_value('matricula') ?>"></input>
                    </div>
                    <div class="p-2 bd-highlight">
                        <label for="senha">Senha:</label>
                        <input class="form-control" type="password" name="senha"></input>
                    </div>
                    <div class="p-2 bd-highlight">
                        <label for="nomeResponsavel">Responsável:</label>
                        <input class="form-control" type="text" name="nomeResponsavel" value="<?php echo isset($nomeResponsavel) ? $nomeResponsavel : set_value('nomeResponsavel') ?>"></input>
                    </div>
                    <div class="p-2 bd-highlight">
                        <label for="turma">Turma:</label>
                        <select name="turma" class="custom-select" id="inputGroupSelect01">
                            <?php if ($turma === "1") : ?>
                                <option selected value="1">Infantil I</option>
                                <option value="2">Alfabetização</option>
                            <?php else : ?>
                                <option value="1">Infantil I</option>
                                <option selected value="2">Alfabetização</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="p-2 bd-highlight">
                        <label for="telefone">Telefone:</label>
                        <input class="form-control" type="text" name="telefone" value="<?php echo isset($telefone) ? $telefone : set_value('telefone') ?>"></input>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </form>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>