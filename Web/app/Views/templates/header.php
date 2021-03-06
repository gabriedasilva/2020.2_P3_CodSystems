<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>iClass</title>
    <meta name="description" content="Sua escola em casa!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/logoShape.png" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5ae82b8da4.js" crossorigin="anonymous"></script>

</head>
<body class="d-flex flex-fill" style="background-color: #455A64;">
    <!-- Container FLEX principal -->
    <div style="background-color: #1E88E5; height: 100vh;" class="d-flex flex-column flex-grow-1 ">
        <!-- FLEX NAV -->
        <div style="background-color: #00897B;">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1565C0;">
                <a class="navbar-brand" href="<?php echo base_url('Home') ?>">
                    <img src="<?php echo base_url('iclassweb.life/assets/imgs/logoshapewhite.png')?>" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse h5" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('Home') ?>">Home <span class="sr-only">(current)</span> <i class="fas fa-home"></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('ProfessoresECoordenadores') ?>">Professores/Coordenadores <i class="fas fa-user-tie"></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('Disciplinas') ?>">Disciplinas <i class="fas fa-chalkboard-teacher"></i></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('Turmas') ?>">Turmas <i class="fas fa-chalkboard"></i></a>
                        </li>
                        <li class="nav-item pr-2">
                            <a class="nav-link" href="<?php echo base_url('Alunos') ?>">Alunos <i class="fas fa-user-graduate"></i></a>
                        </li>
                    </ul>
                    <div class="btn-group dropleft">
                        <button style="font-size: 20px" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                        </button>
                        <div class="dropdown-menu">
                            <div class="d-flex dropdown-item" style="margin: auto; font-size:50px;">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="dropdown-item" href="#">Nome: <?php echo session()->get('nome') ?></div>
                            <div class="dropdown-item" href="#">Email: <?php echo session()->get('email') ?></div>
                            <a class="dropdown-item text-danger" href="<?php echo base_url('Login/logOut') ?>">Sair <i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>