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
            <?php echo \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php else : ?>
    <?php endif ?>
</div>
<!-- FLEX body -->
<div style="background-color: #EEEEEE; height: 100%;" class="d-flex flex-row">
    <!-- FLEX menu lateral-->
    <?php echo $this->include('turma/turma_menu') ?>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 bg-white rounded">
            <h3>Detalhes da Turma <?php echo $nome ?></h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex justify-content-center">
            <div class="p-2 m-2">
                <form class="p-1 m-1" action="<?php echo base_url('Turma/atualizar') ?>" method="POST">
                    <div class="d-flex flex-column bd-highlight mb-3 align-items-center">
                        <div class="d-flex flex-row justify-content-between w-100">
                            <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : set_value('id') ?>" />
                            <div class="p-2 bd-highlight" style="width: 250px;">
                                <label class="h5" for="nome">Nome:</label>
                                <input class="form-control" type="text" placeholder="Nome da Turma" name="nome" value="<?php echo isset($nome) ? $nome : set_value('nome') ?>"></input>
                            </div>
                            <div class="align-self-center mr-2">
                                <button type="submit" class="btn btn-success text-right">Salvar Alterações <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2 flex-column bd-highlight">
                                <h5>Segunda-Feira</h5>
                                <label for="segA">Horário A:</label>
                                <select name="segA" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $segA) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[0]['segA'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($segA) ? $segA : set_value('segA') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('segA') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="segB">Horário B:</label>
                                <select name="segB" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $segB) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[0]['segB'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($segB) ? $segB : set_value('segB') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('segB') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="segC">Horário C:</label>
                                <select name="segC" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $segC) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[0]['segC'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($segC) ? $segC : set_value('segC') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('segC') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="segD">Horário D:</label>
                                <select name="segD" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $segD) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[0]['segD'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($segD) ? $segD : set_value('segD') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('segD') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Terça-Feira</h5>
                                <label for="terA">Horário A:</label>
                                <select name="terA" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $terA) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[1]['terA'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($terA) ? $terA : set_value('terA') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('terA') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="terB">Horário B:</label>
                                <select name="terB" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $terB) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[1]['terB'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($terB) ? $terB : set_value('terB') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('terB') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="terC">Horário C:</label>
                                <select name="terC" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $terC) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[1]['terC'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($terC) ? $terC : set_value('terC') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('terC') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="terD">Horário D:</label>
                                <select name="terD" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $terD) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[1]['terD'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($terD) ? $terD : set_value('terD') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('terD') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Quarta-Feira</h5>
                                <label for="quaA">Horário A:</label>
                                <select name="quaA" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quaA) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[2]['quaA'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quaA) ? $quaA : set_value('quaA') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quaA') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quaB">Horário B:</label>
                                <select name="quaB" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quaB) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[2]['quaB'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quaB) ? $quaB : set_value('quaB') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quaB') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quaC">Horário C:</label>
                                <select name="quaC" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quaC) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[2]['quaC'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quaC) ? $quaC : set_value('quaC') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quaC') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quaD">Horário D:</label>
                                <select name="quaD" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quaD) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[2]['quaD'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quaD) ? $quaD : set_value('quaD') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quaD') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Quinta-Feira</h5>
                                <label for="quiA">Horário A:</label>
                                <select name="quiA" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quiA) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[3]['quiA'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quiA) ? $quiA : set_value('quiA') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quiA') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quiB">Horário B:</label>
                                <select name="quiB" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quiB) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[3]['quiB'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quiB) ? $quiB : set_value('quiB') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quiB') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quiC">Horário C:</label>
                                <select name="quiC" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quiC) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[3]['quiC'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quiC) ? $quiC : set_value('quiC') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quiC') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quiD">Horário D:</label>
                                <select name="quiD" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $quiD) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[3]['quiD'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($quiD) ? $quiD : set_value('quiD') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('quiD') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Sexta-Feira</h5>
                                <label for="sexA">Horário A:</label>
                                <select name="sexA" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $sexA) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[4]['sexA'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($sexA) ? $sexA : set_value('sexA') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('sexA') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="sexB">Horário B:</label>
                                <select name="sexB" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $sexB) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[4]['sexB'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($sexB) ? $sexB : set_value('sexB') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('sexB') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="sexC">Horário C:</label>
                                <select name="sexC" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $sexC) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[4]['sexC'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($sexC) ? $sexC : set_value('sexC') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('sexC') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="sexD">Horário D:</label>
                                <select name="sexD" class="custom-select" id="inputGroupSelect01">
                                    <option value="<?php echo "Não Haverá Aula"; ?>">
                                        <?php echo "Não Haverá Aula"; ?>
                                    </option>
                                    <?php if (!empty($disciplinas) && !empty($disIndisponiveis) && is_array($disciplinas)) : ?>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <?php if ($disciplinas_item['id'] !== $sexD) : ?>
                                                <?php if (!in_array($disciplinas_item['id'], $disIndisponiveis[4]['sexD'])) : ?>
                                                    <option value="<?php echo $disciplinas_item['id']; ?>">
                                                        <?php echo $disciplinas_item['nome']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option selected value="<?php echo isset($sexD) ? $sexD : set_value('sexD') ?>">
                                                    <?php echo isset($disciplinas_item['nome']) ? $disciplinas_item['nome'] : set_value('sexD') ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
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