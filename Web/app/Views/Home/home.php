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
    <?php // echo $this->include('Home/Home_menu') ?>
    <!-- FLEX Conteudo -->
    <div style="background-color: #EEEEEE;" class="flex-fill flex-grow-1">
        <div class="d-flex justify-content-center shadow-sm p-1 m-4 bg-white rounded">
            <h3>
                Seja bem vindo ao iClass!
            </h3>
        </div>
        <div class="d-flex flex-row justify-content-center w-auto shadow-sm bg-light h-75 p-1 m-4">
            <div class="d-flex flex-column justify-content-center w-100 h-100">
                <a href="<?php echo base_url('ProfessoresECoordenadores') ?>" class="btn btn-outline-primary d-flex align-items-center justify-content-center w-auto h-50 shadow-sm p-1 m-2 rounded">
                    <i class="fas fa-user-tie fa-3x"></i>
                    <div>
                        <h4 class="ml-2">Professores/</h4>
                        <h4 class="ml-2">Coordenadores</h4>
                    </div>
                </a>
                <a href="<?php echo base_url('Alunos') ?>" class="btn btn-outline-primary d-flex align-items-center justify-content-center w-auto h-50 shadow-sm p-1 m-2 rounded">
                    <i class="fas fa-user-graduate fa-3x"></i>
                    <h4 class="ml-2"> Alunos</h4>
                </a>
            </div>
            <div class="d-flex flex-column justify-content-center w-100 h-100">
                <a href="<?php echo base_url('Turmas') ?>" class="btn btn-outline-primary d-flex align-items-center justify-content-center w-auto h-50 shadow-sm p-1 m-2 rounded">
                    <i class="fas fa-chalkboard fa-3x"></i>
                    <h4 class="ml-2">Turmas</h4>
                </a>
                <a href="<?php echo base_url('Disciplinas') ?>" class="btn btn-outline-primary d-flex align-items-center justify-content-center w-auto h-50 shadow-sm p-1 m-2 rounded">
                    <i class="fas fa-chalkboard-teacher fa-3x"></i>
                    <h4 class="ml-2"> Disciplinas</h4>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>