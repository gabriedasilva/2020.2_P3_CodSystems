<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>iClass</title>
    <meta name="description" content="Sua escola em casa!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="http://localhost/2020.2_P3_CodSystems/Web/assets/js/testAjax.js"></script>

</head>

<body>
    <!-- Container principal -->
    <div class="d-flex" style="background-color: #006064; height: 100vh">
        <!-- Container FLEX principal -->
        <div style="background-color: #0D47A1;" class="d-flex p-2 m-2 flex-column flex-fill">
            <!-- FLEX NAV -->
            <div style="background-color: #00897B;">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">
                        <img src="http://localhost/2020.2_P3_CodSystems/Web/assets/imgs/logoShape.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('Home/index') ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sala de Aula</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Alunos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('Professores/index') ?>">Professores</a>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-secondary">
                            <img src="http://localhost/2020.2_P3_CodSystems/Web/assets/imgs/perfilIcon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                        </button>
                    </div>
                </nav>
            </div>