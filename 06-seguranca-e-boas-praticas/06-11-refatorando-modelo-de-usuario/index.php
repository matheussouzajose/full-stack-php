<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);

$model = new \Source\Models\User();
$user = $model->find("id = :id", "id=10");
var_dump($user);
/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$user = $model->findById(10);
var_dump($user);

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$user = $model->findByEmail("elton35@email.com.br");
var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$user = $model->all(2, 5);
var_dump($user);

/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = $model->bootstrap(
    "Matheus",
    "Jose",
    "matheus.jose",
    "123456",
    "123456789"
);

if ($user->save()) {
    echo message()->success("Cadastro realizado com sucesso");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);

$user = (new \Source\Models\User())->findById(141);

$user->first_name = "Alter first_name";
$user->last_name = "Alter last_name";
$user->password = passwd("123456");

if ($user->save()) {
    echo message()->success("Dados atualizado com sucesso");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());
}