<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$client = new \Source\App\User("Matheus", "Souza");
//$account = new \Source\Bank\Account(
//    "1600",
//    "22345",
//    $client,
//    "1000"
//);
//
var_dump(
//    $account,
    $client
);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new \Source\Bank\AccountSaving(
    "1655",
    "22345",
    $client,
    "0"
);

$saving->extract();
$saving->deposit(1000);
$saving->extract();
$saving->withdrawal(999);
$saving->extract();
$saving->deposit(60);
$saving->extract();

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new \Source\Bank\AccountCurrent(
  "1655",
  "22346",
  $client,
  "1000",
  "1000"
);

$current->deposit(1000);
$current->withdrawal(2000);

$current->withdrawal(999);

$current->extract();