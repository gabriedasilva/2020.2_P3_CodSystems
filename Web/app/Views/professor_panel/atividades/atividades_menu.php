<nav class="nav flex-column bg-dark h5 p-2" style="max-width:175px; min-width: 175px;">
    <a class="d-flex align-items-center nav-link text-light mt-1 mb-2" href="<?php echo base_url('Detalhes/turma/' . $turma['id'] . '/' . $disciplina['id']) ?>">
        <div class="d-flex flex-fill">
            Voltar
        </div>
        <div>
            <i class="fas fa-arrow-circle-left"></i>
        </div>
    </a>
    <a class="d-flex flex-row  d-flex align-items-center nav-link text-light" href="<?php echo base_url('Atividades/' . $turma['id']) . '/' . $disciplina['id'] ?>">Listar
        <div class="d-flex flex-fill flex-row-reverse">
            <i class="fas fa-list-ul"></i>
        </div>
    </a>
    <a class="d-flex flex-row  d-flex align-items-center nav-link text-light" href="<?php echo base_url('Atividades/cadastro/' . $turma['id'] . '/' . $disciplina['id']) ?>">Nova Atividade
        <div class="d-flex flex-fill flex-row-reverse">
            <i class="fas fa-plus-circle"></i>
        </div>
    </a>
</nav>