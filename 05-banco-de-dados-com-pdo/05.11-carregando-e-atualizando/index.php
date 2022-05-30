<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.11 - Carregando e atualizando");

require __DIR__ . "/../source/autoload.php";

/*
 * [ save update ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save update", __LINE__);

$model = new \Source\Models\User();

$user = $model->load(4);
$user->first_name = "Kaue";
$user->last_name = "Cardoso";
$user->email = "id2@email.com.br";

if ($user != $model->load(4)) {
    $user->save();
    echo "<p class='trigger warning'>Atualizado</p>";
} else {
    echo "<p class='trigger accept'>Já atualizado.</p>";
}

$user->save();

var_dump($user);


