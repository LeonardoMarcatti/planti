<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], 'cadastrar', 'ActionsController::cadastrar');
$routes->match(['get', 'post'], 'updatePlanta', 'ActionsController::updatePlanta');
$routes->match(['get', 'post'], 'confirmadeletar', 'ActionsController::confirmaDeletar');
$routes->match(['get', 'post'], 'cadastrarCuidado', 'ActionsController::cadastrarCuidado');
$routes->match(['get', 'post'], 'updateCuidado', 'ActionsController::updateCuidado');
$routes->match(['get', 'post'], 'cuidados', 'ActionsController::cuidadosTodas');
$routes->match(['get', 'post'], 'cadastrarTipo', 'ActionsController::cadastrarTipo');
$routes->match(['get', 'post'], 'cuidadosTipo', 'ActionsController::cuidadosTipo');

$routes->get('/', 'PagesController::home');
$routes->get('/tipos', 'PagesController::cadastroTipos');
$routes->get('cadastroPlanta', 'PagesController::cadastroPlanta');
$routes->get('planta', 'PagesController::verPlanta');
$routes->get('detalhes', 'PagesController::detalhes');
$routes->get('deletar', 'PagesController::deletar');
$routes->get('editar', 'PagesController::getPlanta');
$routes->get('adicionarCuidados', 'PagesController::adicionarCuidados');
$routes->get('editarCuidado', 'PagesController::editarCuidado');
$routes->get('deletarCuidado', 'PagesController::deletarCuidado');
$routes->get('cuidadosTodas', 'PagesController::cuidadosTodas');
$routes->get('cuidadosTipos', 'PagesController::cuidadosTipos');
$routes->get('/success', 'PagesController::success');
$routes->get('/successTipo', 'PagesController::successTipo');
$routes->get('/successAction', 'PagesController::successAction');

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
