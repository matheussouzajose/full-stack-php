<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);

$message = new \Source\Core\Message();

$email = "matheus@gmail.com";
if (!is_email($email)) {
    echo $message->error("Email");
} else {
    echo $message->success("Email");
}

$passwd = 12345678;
if (!is_passwd($email)) {
    echo $message->error("SENHA");
} else {
    echo $message->success("SENHA");
}


/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump([
    url("/api"),
    url("api"),
]);

//if (empty($_GET)) {
//    redirect("?msg=ok");
//}
/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

var_dump(user()->load(10));

echo message()->success("Essa é uma messagem");

session()->set("user", user()->load(10));
