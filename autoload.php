<?php
/**
 * AUTOLOAD DE CLASSES PARA O PACOTE 'Classes'
 * @param $classe
 */
function autoload($className) {
    $paths = [
        DIR_APP  . DS,
        DIR_GAMA . DS,
        DIR_MODULES . DS,
        // Adicione quantos caminhos forem necessários
    ];

    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register('autoload');