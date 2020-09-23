<?php echo $this->include('templates/header') ?>

<!-- FLEX for Errors -->
<div style="background-color: #FBC02D;">
    <?php if (isset($success)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif ?>
    <?php echo session()->get('id') ?>
</div>
<!-- FLEX body -->
<div style="background-color: #673AB7;" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <?php echo $this->include('Home/Home_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #D84315;" class="flex-fill flex-grow-1">

    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">
    <form action="<?php echo base_url('Login/logOut')?>">
        <button type="submit" class="btn btn-outline-danger">Sair</button>
    </form>
</div>

<?php echo $this->include('templates/footer') ?>