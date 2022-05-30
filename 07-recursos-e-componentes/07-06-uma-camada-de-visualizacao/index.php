<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.06 - Uma camada de visualização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ plates ] https://packagist.org/packages/league/plates
 */
fullStackPHPClassSession("plates", __LINE__);

$plates = League\Plates\Engine::create(__DIR__ . "/../assets/views", "php");
var_dump(get_class_methods($plates));

//$plates->addFolder("test", "test");
//
//if (empty($_GET["id"])) {
//    echo $plates->render("test::list", [
//        "title" => "Usuário do sistema",
//        "list" => (new \Source\Models\User())->all(5)
//    ]);
//} else {
//    echo $plates->render("test::user", [
//        "title" => "Editar usuário",
//        "user" => (new \Source\Models\User())->findById($_GET["id"])
//
//    ]);
//}

/*
 * [ synthesize ] Sintetizando rotina e abstraíndo o recurso (componente)
 */
fullStackPHPClassSession("synthesize", __LINE__);

$view = new \Source\Core\View();
$view->path("test", "test");

if (empty($_GET["id"])) {
    echo $view->render("test::list", [
        "title" => "Usuário do sistema",
        "list" => (new \Source\Models\User())->all(5)
    ]);
} else {
    echo $view->render("test::user", [
        "title" => "Editar usuário",
        "user" => (new \Source\Models\User())->findById($_GET["id"])

    ]);
}
