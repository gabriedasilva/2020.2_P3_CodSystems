<?php echo $this->include('templates/header') ?>

<!-- FLEX for Errors -->
<div style="background-color: #FBC02D;">
    <?php if (isset($success)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif ?>
    test
</div>
<!-- FLEX body -->
<div style="background-color: #673AB7; height: 100%;" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <div style="background-color: #2E7D32;">
        <nav class="nav flex-column" style="max-width:175px; min-width: 175px">
            <a class="nav-link" href="<?php echo base_url('Professores/') ?>">Listar</a>
            <a class="nav-link" href="<?php echo base_url('Professores/cadastrar') ?>">Cadastrar</a>
        </nav>
    </div>
    <!-- FLEX Conteudo -->
    <div style="background-color: #D84315;" class="flex-fill flex-grow-1">
        
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>
