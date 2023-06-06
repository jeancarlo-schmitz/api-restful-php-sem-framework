<?php

date_default_timezone_set('America/Sao_Paulo');
use system\CorsHandler;

//se você está debugando o projeto, lembrese de colocar no arquivo de constantes IS_DEV = true;
require_once 'constants.php';
require_once 'App/utils/debugger.php';
require_once 'autoload.php';

$corsHandler = new CorsHandler();
$corsHandler->handleCors();

$app = new App();
$app->handleRequest();

