<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.05 - Interpretação e operações pt1");

require __DIR__ . "/source/autoload.php";

/*
 * [ construct ] Executado automaticamente por meio do operador new
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__construct", __LINE__);

$user = new \Source\Interpretation\User(
    "Matheus",
    "Jose",
    "matheus@email.com"
);

var_dump($user);

/*
 * [ clone ] Executado automaticamente quando um novo objeto é criado a partir do operador clone.
 * http://php.net/manual/pt_BR/language.oop5.cloning.php
 */
fullStackPHPClassSession("__clone", __LINE__);

$matheus = $user;

$kaue = $matheus;
$kaue->setFirstName("Kaue");
$kaue->setLastName("Cardoso");

$matheus->setFirstName("Matheus");
$matheus->setLastName("Souza");

$kaue = clone $matheus;
$kaue->setFirstName("Kaue");
$kaue->setLastName("Cardoso");

var_dump(
    $matheus,
    $kaue
);

/*
 * [ destruct ] Executado automaticamente quando o objeto é finalizado
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__destruct", __LINE__);