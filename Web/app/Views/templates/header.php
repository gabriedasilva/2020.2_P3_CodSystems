<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>iClass</title>
    <meta name="description" content="Sua escola em casa!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/logoShape.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5ae82b8da4.js" crossorigin="anonymous"></script>

</head>
<!-- Container principal -->

<body class="d-flex flex-fill" style="background-color: #455A64;">
    <!-- Container FLEX principal -->
    <div style="background-color: #1E88E5; height: 100vh;" class="d-flex flex-column flex-grow-1">
        <!-- FLEX NAV -->
        <div style="background-color: #00897B;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">
                    <img src="http://localhost/2020.2_P3_CodSystems/Web/assets/imgs/logoshapewhite.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse h5" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('Home/index') ?>">Home <span class="sr-only">(current)</span> <i class="fas fa-home"></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="#">Turmas <i class="fas fa-chalkboard"></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('DisciplinasController/index') ?>">Disciplinas <i class="fas fa-chalkboard-teacher"></i></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('UsuarioMobController/index') ?>">Alunos <i class="fas fa-user-graduate"></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('UsuarioWebController/index') ?>">Professores/Coordenadores <i class="fas fa-user-tie"></i></a>
                        </li>
                    </ul>
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="http://localhost/2020.2_P3_CodSystems/Web/assets/imgs/perfilIcon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Nome: <?php echo session()->get('nome') ?></a>
                            <a class="dropdown-item" href="#">Email: <?php echo session()->get('email') ?></a>
                            <a class="dropdown-item text-danger" href="<?php echo base_url('Login/logOut') ?>">Sair <i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>