<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('Login', 'Login::index');
$routes->post('Login/login', 'Login::login');
$routes->get('Login/logOut', 'Login::logOut');

$routes->get('Home', 'Home::index');

$routes->get('UsuarioWebController', 'UsuarioWebController::index');
$routes->get('UsuarioWebController/cadastroForm', 'UsuarioWebController::cadastroForm');
$routes->post('UsuarioWebController/realizarCadastro', 'UsuarioWebController::realizarCadastro');
$routes->get('UsuarioWebController/detalhes/(:num)', 'UsuarioWebController::detalhes/$1');
$routes->post('UsuarioWebController/atualizarCadastro', 'UsuarioWebController::atualizarCadastro');
$routes->get('UsuarioWebController/excluirCadastro/(:num)', 'UsuarioWebController::excluirCadastro/$1');

$routes->get('UsuarioMobController', 'UsuarioMobController::index');
$routes->get('UsuarioMobController/cadastroForm', 'UsuarioMobController::cadastroForm');
$routes->post('UsuarioMobController/realizarCadastro', 'UsuarioMobController::realizarCadastro');
$routes->get('UsuarioMobController/detalhes/(:num)', 'UsuarioMobController::detalhes/$1');
$routes->post('UsuarioMobController/atualizarCadastro', 'UsuarioMobController::atualizarCadastro');
$routes->get('UsuarioMobController/excluirCadastro/(:num)', 'UsuarioMobController::excluirCadastro/$1');

$routes->get('DisciplinasController', 'DisciplinasController::index');
$routes->get('DisciplinasController/cadastroForm', 'DisciplinasController::cadastroForm');
$routes->post('DisciplinasController/realizarCadastro', 'DisciplinasController::realizarCadastro');
$routes->get('DisciplinasController/detalhes/(:num)', 'DisciplinasController::detalhes/$1');
$routes->post('DisciplinasController/atualizarCadastro', 'DisciplinasController::atualizarCadastro');
$routes->get('DisciplinasController/excluirCadastro/(:num)', 'DisciplinasController::excluirCadastro/$1');

$routes->get('Turmas', 'TurmaController::index');
$routes->get('MinhasTurmas', 'TurmaController::turmasProfessor');
$routes->get('Turma/formulario', 'TurmaController::cadastroForm');
$routes->post('Turma/cadastrar', 'TurmaController::realizarCadastro');
$routes->get('Turma/detalhes/(:num)', 'TurmaController::detalhes/$1');
$routes->post('Turma/atualizar', 'TurmaController::atualizarCadastro');
$routes->get('Turma/excluir/(:num)', 'TurmaController::excluirCadastro/$1');
$routes->get('Turma/alunos/(:num)', 'TurmaController::turmaAlunos/$1');
$routes->get('Turma/perfil/(:num)', 'TurmaController::perfilEscolar/$1');
$routes->get('Home/professor', 'TurmaController::horarioProfessor');
$routes->get('MinhaTurma/detalhes/(:num)', 'TurmaController::detalhesTurmaProfessor/$1');
$routes->get('Detalhes/turma/(:num)', 'TurmaController::detalhesTurma/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
