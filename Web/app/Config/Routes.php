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

$routes->get('ProfessoresECoordenadores', 'UsuarioWebController::index');
$routes->get('ProfessoresECoordenadores/cadastroForm', 'UsuarioWebController::cadastroForm');
$routes->post('ProfessoresECoordenadores/realizarCadastro', 'UsuarioWebController::saveCadastro');
$routes->get('ProfessoresECoordenadores/detalhes/(:num)', 'UsuarioWebController::detalhes/$1');
$routes->post('ProfessoresECoordenadores/atualizarCadastro', 'UsuarioWebController::saveCadastro');
$routes->get('ProfessoresECoordenadores/excluirCadastro/(:num)', 'UsuarioWebController::excluirCadastro/$1');

$routes->get('Alunos', 'UsuarioMobController::index');
$routes->get('Alunos/cadastroForm', 'UsuarioMobController::cadastroForm');
$routes->post('Alunos/realizarCadastro', 'UsuarioMobController::saveCadastro');
$routes->get('Alunos/detalhes/(:num)', 'UsuarioMobController::detalhes/$1');
$routes->post('Alunos/atualizarCadastro', 'UsuarioMobController::saveCadastro');
$routes->get('Alunos/excluirCadastro/(:num)', 'UsuarioMobController::excluirCadastro/$1');

$routes->get('Disciplinas', 'DisciplinasController::index');
$routes->get('Disciplinas/cadastroForm', 'DisciplinasController::cadastroForm');
$routes->post('Disciplinas/realizarCadastro', 'DisciplinasController::saveCadastro');
$routes->get('Disciplinas/detalhes/(:num)', 'DisciplinasController::detalhes/$1');
$routes->post('Disciplinas/atualizarCadastro', 'DisciplinasController::saveCadastro');
$routes->get('Disciplinas/excluirCadastro/(:num)', 'DisciplinasController::excluirCadastro/$1');

$routes->get('Turmas', 'TurmaController::index');
$routes->get('Turma/formulario', 'TurmaController::cadastroForm');
$routes->post('Turma/cadastrar', 'TurmaController::saveCadastro');
$routes->get('Turma/detalhes/(:num)', 'TurmaController::detalhes/$1');
$routes->post('Turma/atualizar', 'TurmaController::saveCadastro');
$routes->get('Turma/excluir/(:num)', 'TurmaController::excluirCadastro/$1');
$routes->get('Turma/alunos/(:num)', 'TurmaController::turmaAlunos/$1');
$routes->get('Turma/perfil/(:num)', 'TurmaController::perfilEscolar/$1');
$routes->get('Turma/ficha/(:num)/(:num)', 'TurmaController::fichaEscolar/$1/$2');
$routes->get('Home/professor', 'TurmaController::horarioProfessor');
$routes->get('MinhaTurma/detalhes/(:num)', 'TurmaController::detalhesTurmaProfessor/$1');
$routes->get('Detalhes/turma/(:num)/(:num)', 'TurmaController::detalhesTurma/$1/$2');

$routes->get('Atividades/(:num)/(:num)', 'AtividadeController::index/$1/$2');
$routes->get('Atividades/cadastro/(:num)/(:num)', 'AtividadeController::cadastroForm/$1/$2');
$routes->post('Atividades/cadastrar', 'AtividadeController::saveCadastro');
$routes->get('Atividades/excluir/(:num)/(:num)/(:num)', 'AtividadeController::excluirCadastro/$1/$2/$3');
$routes->get('Atividades/detalhes/(:num)', 'AtividadeController::detalhes/$1');
$routes->post('Atividades/atualizar', 'AtividadeController::saveCadastro');

$routes->get('Frequencia/formulario/(:num)/(:num)', 'FrequenciaController::index/$1/$2');
$routes->post('Frequencia/salvar', 'FrequenciaController::saveFrequencia');

$routes->get('Notas/form/(:num)/(:num)', 'NotasController::index/$1/$2');
$routes->post('Notas/salvar', 'NotasController::saveNotas');

//Rotas para requisições MOBILE
$routes->post('mob/signin', 'ApiMobile::login');
$routes->post('mob/homeAcc', 'ApiMobile::home');
$routes->post('mob/notas', 'ApiMobile::notas');

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
