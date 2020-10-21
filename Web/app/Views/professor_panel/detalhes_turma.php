<?php echo $this->include('templates/headerProfessor') ?>

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
    <nav class="nav flex-column bg-dark h5 p-2" style="max-width:175px; min-width: 175px;">
        <a class="d-flex align-items-center nav-link text-light mt-1" href="#">
            <div class="d-flex flex-fill">
                <i class="fas fa-arrow-circle-left"></i>
            </div>
            <div>
                Voltar
            </div>
        </a>
    </nav>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 m-1 bg-white rounded">
            <h3>Turma:
                <?php if (isset($turma)) : ?>
                    <?php echo $turma['nome'] ?>
                <?php endif; ?>
            </h3>
        </div>
        <div class="m-1">
            <div class="d-flex flex-row justify-content-center shadow-sm p-3 bg-white rounded" style="width: auto; height: 510px; margin: auto; text-align:center;">
                <div class="border d-flex w-50 m-1" style="background-color: #ECEFF1;">
                    <!-- Alunos -->
                    <table class="table table-sm table-hover table-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Aluno</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col" class="text-center">Perfil Escolar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alunosTurma) && is_array($alunosTurma)) : ?>
                                <?php foreach ($alunosTurma as $alunosTurma_item) : ?>
                                    <tr class="">
                                        <td><?php echo $alunosTurma_item['id']; ?></td>
                                        <td><?php echo $alunosTurma_item['nomeAluno']; ?></td>
                                        <td><?php echo $alunosTurma_item['matricula']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a style="max-width: 50px;" class="btn btn-info btn-block" href="<?php echo base_url('Turma/perfil/' . $alunosTurma_item['id']) ?>">
                                                <i class="fas fa-address-card fa-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td COLSPAN="4">
                                        <div class="d-flex flex-column justify-content-center w-100" style="height: 425px; margin: auto; text-align:center;">
                                            <h3>Ops...</h3>
                                            <p>Por enquanto não há nenhum aluno cadastrado nessa turma.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="border d-flex w-50 m-1 flex-column" style="background-color: #ECEFF1;">
                    <div class="d-flex flex-column shadow-sm justify-content-center w-100 h-50 bg-light mb-1" style="text-align:center;">
                        <!-- Detalhes da turma -->
                        <h3 class="d-flex justify-content-center align-items-center w-100 h-25">Detalhes:</h3>
                        <div class="d-flex justify-content-center align-items-center w-100 h-75 ">
                            <div class="mb-5">
                                <span>Disciplina: </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column shadow-sm justify-content-center w-100 h-50 bg-light" style="text-align:center;">
                        <!-- Opções da turnma -->
                        <h3 class="d-flex justify-content-center align-items-center w-100 h-25">Ações:</h3>
                        <div class="d-flex justify-content-center align-items-center w-100 h-75 ">
                            <div class="d-flex justify-content-center mb-5">
                                <div class="m-2">
                                    <a class="btn btn-info btn-lg shadow-sm" href="#">
                                        <span>Atividades</span>
                                        <i class="fas fa-pencil-ruler"></i>
                                    </a>
                                </div>
                                <div class="m-2">
                                    <a class="btn btn-info btn-lg shadow-sm" href="#">
                                        <span>Frequência</span>
                                        <i class="fas fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FLEX footer -->
<div style="background-color: #2196F3;" class="d-flex">

</div>

<?php echo $this->include('templates/footer') ?>