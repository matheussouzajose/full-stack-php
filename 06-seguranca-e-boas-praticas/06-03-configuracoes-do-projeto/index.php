<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.03 - Configurações do projeto");

require __DIR__ . "/../source/autoload.php";

/*
 * [ configurações ] Um acesso global a tudo que pode ser configurado no projeto.
 */
fullStackPHPClassSession("configurações", __LINE__);

var_dump(get_defined_constants(true)["user"]);
/*
 * [ refatoramento ] Iniciando o desenvolvimento de uma arquitetura de projeto.
 */
fullStackPHPClassSession("refatoramento", __LINE__);

use Source\Core\Connect;

$read = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1,1");
$read->execute();

var_dump($read->fetchAll());

use Source\Models\User;

$user = (new User())->load(10);
var_dump($user);