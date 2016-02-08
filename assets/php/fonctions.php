<?php

/**
 * Permet d'afficher le contenu de n'importe quel type de variable
 *
 * @param $var
 */
function debug($var) {
    echo '<pre>', var_dump($var), '</pre>';
}