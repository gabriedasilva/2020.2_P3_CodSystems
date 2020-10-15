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
    <?php echo $this->include('turma/turma_menu') ?>
    <!-- FLEX Conteudo -->
    <div class="m-1 flex-fill">
        <!-- Title of page -->
        <div class="d-flex justify-content-center shadow-sm p-1 bg-white rounded">
            <h3>Cadastro de Turmas</h3>
        </div>
        <!-- Form of page -->
        <div class="d-flex justify-content-center">
            <div class="p-2 m-2">
                <form class="p-1 m-1" action="<?php echo base_url('Turma/cadastrar') ?>" method="POST">
                    <div class="d-flex flex-column bd-highlight mb-3 align-items-center">
                        <div class="d-flex flex-row justify-content-between w-100">
                            <div class="p-2 bd-highlight" style="width: 250px;">
                                <label class="h5" for="nome">Nome:</label>
                                <input class="form-control" type="text" name="nome"></input>
                            </div>
                            <div class="align-self-center mr-2">
                                <button type="submit" class="btn btn-success text-right">Cadastrar <i class="fas fa-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2 flex-column bd-highlight">
                                <h5>Segunda-Feira</h5>
                                <label for="segA">Horário A:</label>
                                <select name="segA" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="segB">Horário B:</label>
                                <select name="segB" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="segC">Horário C:</label>
                                <select name="segC" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="segD">Horário D:</label>
                                <select name="segD" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Terça-Feira</h5>
                                <label for="terA">Horário A:</label>
                                <select name="terA" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="terB">Horário B:</label>
                                <select name="terB" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="terC">Horário C:</label>
                                <select name="terC" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="terD">Horário D:</label>
                                <select name="terD" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Quarta-Feira</h5>
                                <label for="quaA">Horário A:</label>
                                <select name="quaA" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quaB">Horário B:</label>
                                <select name="quaB" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quaC">Horário C:</label>
                                <select name="quaC" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quaD">Horário D:</label>
                                <select name="quaD" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Quinta-Feira</h5>
                                <label for="quiA">Horário A:</label>
                                <select name="quiA" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quiB">Horário B:</label>
                                <select name="quiB" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quiC">Horário C:</label>
                                <select name="quiC" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="quiD">Horário D:</label>
                                <select name="quiD" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h5>Sexta-Feira</h5>
                                <label for="sexA">Horário A:</label>
                                <select name="sexA" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="sexB">Horário B:</label>
                                <select name="sexB" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="sexC">Horário C:</label>
                                <select name="sexC" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <label for="sexD">Horário D:</label>
                                <select name="sexD" class="custom-select" id="inputGroupSelect01">
                                    <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>
                                        <option selected value="<?php echo "Não Haverá Aula"; ?>">
                                            <?php echo "Não Haverá Aula"; ?>
                                        </option>
                                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                                            <option value="<?php echo $disciplinas_item['id']; ?>">
                                                <?php echo $disciplinas_item['nome']; ?>
                                            </option>
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