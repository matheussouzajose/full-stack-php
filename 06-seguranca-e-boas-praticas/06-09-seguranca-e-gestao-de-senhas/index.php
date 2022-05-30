<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);

//$pass = password_hash(123456, PASSWORD_DEFAULT, ["cost" => 12]);
$pass = password_hash(123456, PASSWORD_DEFAULT);

var_dump([
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify(123456, $pass)
]);
echo message()->success($pass);

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);

$user = (new \Source\Models\User())->load(10);
$user->password = $pass;
$user->save();

var_dump(password_verify(123456, $user->password));

var_dump($user);
/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$user = new \Source\Models\User();
$login = $user->find("elton35@email.com.br");

if (!$login) {
    echo message()->error($user->message());
} elseif(!password_verify(123456, $login->password)) {
    var_dump($login->password);
    echo message()->error("Senha não confere");
} else {
    $login->password = password_hash(123456, PASSWORD_DEFAULT);
    $login->save();

    session()->set("login", $login->data());

    echo message()->success("Bem vindo(a) de volta {$login->first_name}");
    var_dump(session()->all()->login->first_name);
}
/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

$pass = 1234;

var_dump([
    $passwd = passwd($pass),
    passwd_verify(1234, $passwd),
    passwd_rehash($passwd)
]);