<?php

use Source\Models\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);

$model = new User();

$user = $model->load(1);
echo "<p>{$user->first_name} {$user->last_name}</p>";

/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

$model = new User();

$user = $model->find("alexandre27@email.com.br");
echo "<p>{$user->first_name} {$user->last_name}</p>";

/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

$all = $model->all(5);

/** @var User $user */
foreach ($all as $user) {
    echo "<p>{$user->first_name}</p>";
}