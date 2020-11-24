<?php echo $this->include('templates/header') ?>

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
    <?php echo $this->include('usuarioMob/usuarioMob_menu') ?>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 bg-white rounded">
            <h3>Cadastro de Alunos</h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex justify-content-center">
            <div class="p-2" style="width: 450px;">
                <form class="p-1 m-1" action="<?php echo base_url('Alunos/realizarCadastro') ?>" method="POST">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <label for="nomeAluno">Nome:</label>
                            <input required class="form-control" placeholder="Ex.: Júlia da Silva" type="text" name="nomeAluno"></input>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label for="matricula">Matrícula:</label>
                            <input required class="form-control" type="text" name="matricula"></input>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label for="senha">Senha:</label>
                            <div class="d-flex align-items-center">
                                <input required class="form-control mr-3" id="senha" type="password" name="senha"></input>
                                <button type="button" id="setVisible" name="setVisible" class="btn btn-primary">
                                    <i id="iconVisible" class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label for="nomeResponsavel">Responsável:</label>
                            <input required placeholder="Ex.: Maria da Silva" class="form-control" type="text" name="nomeResponsavel"></input>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label for="turma">Turma:</label>
                            <select required name="turma" class="custom-select" id="inputGroupSelect01">
                                <?php if (!empty($turmas) && is_array($turmas)) : ?>
                                    <?php foreach ($turmas as $turmas_item) : ?>
                                        <option value="<?php echo $turmas_item['id']; ?>">
                                            <?php echo $turmas_item['nome']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="p-2 bd-highlight">
                            <label for="telefone">Telefone:</label>
                            <input required class="form-control" type="text" id="telefone" placeholder="Ex.: (99)99999-9999" name="telefone"></input>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end flex-fill">
                        <button type="submit" class="btn btn-success text-right">Cadastrar <i class="fas fa-plus-circle"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<!-- SCRIPTS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script src="<?php echo base_url('iclassweb.life/assets/js/usuarioWeb/cadastro.js') ?>"></script>
<!-- FIM -->

<?php echo $this->include('templates/footer') ?>