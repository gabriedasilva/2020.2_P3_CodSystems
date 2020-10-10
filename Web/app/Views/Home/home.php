<?php echo $this->include('templates/header') ?>

<!-- FLEX for Errors -->
<div style="background-color: #FBC02D;">
    <?php if (isset($success)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif ?>
</div>
<!-- FLEX body -->
<div style="background-color: #EEEEEE; height: 100%;" class="d-flex flex-row flex-grow-1">
    <!-- FLEX menu lateral-->
    <?php echo $this->include('Home/Home_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE;" class="flex-fill flex-grow-1">

    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">
    
</div>

<?php echo $this->include('templates/footer') ?>