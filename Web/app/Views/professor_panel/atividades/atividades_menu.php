<nav class="nav flex-column bg-dark h5 p-2" style="max-width:175px; min-width: 175px;">
    <a class="d-flex align-items-center nav-link text-light mt-1 mb-2" href="<?php echo base_url('Detalhes/turma/' . $idTurma . '/' . $idDisciplina) ?>">
        <div class="d-flex flex-fill">
            Voltar
        </div>
        <div>
            <i class="fas fa-arrow-circle-left"></i>
        </div>
    </a>
    <a class="d-flex flex-row  d-flex align-items-center nav-link text-light" href="#">Listar
        <div class="d-flex flex-fill flex-row-reverse">
            <i class="fas fa-list-ul"></i>
        </div>
    </a>
    <a class="d-flex flex-row  d-flex align-items-center nav-link text-light" href="#">Cadastrar
        <div class="d-flex flex-fill flex-row-reverse">
            <i class="fas fa-plus-circle"></i>
        </div>
    </a>
</nav>