<?php

/**
 *
 * php-project-template
 *
 * @author João Pedro da Cruz Melo <joao.pedro6532@gmail.com>
 * @license Projeto open source disponível para qualquer desenvolvedor
 * @copyright 2018 | João Melo
 *
 **/

// Inicia uma sessão
session_start();

// Importa configurações do sistema
require_once 'config.php';

// Namespaces
use \Slim\Slim;
use \Template\Model\PageAdmin;

PRODUCTION_MODE === 'false' ? $app = new Slim(array('mode' => 'development', 'debug' => true)) : $app = new Slim(array('debug' => false));

// Funções úteis
require_once './functions.php';

// Redireciona para a página principal quando a rota não é encontrada
$app->notFound(function () use ($app) {
    $page = new PageAdmin();
    $page->setTpl('404');
});

// Redireciona da página raíz para a página de administração
$app->get('/', function() {
    header('Location: /admin');
    exit;
});

// Rotas de login, logout e recuperação de senha
// require_once './routes/user.php';

// Grupos de rotas administrativas
$app->group('/admin', function () use ($app) {

    // Rotas do módulo principal
    // require_once './routes/admin.php';

    // Rotas do módulo de perfil do usuário
    // require_once './routes/admin-user-profile.php';

    // Rotas do módulo de usuários
    // require_once './routes/admin-users.php';

});

// Inicia a API
$app->run();