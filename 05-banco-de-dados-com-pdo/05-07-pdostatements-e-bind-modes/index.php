<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

$stmt = Connect::getInstace()->prepare("SELECT * FROM users LIMIT 1");
$stmt->execute();

var_dump(
    $stmt,
    $stmt->rowCount(),
    $stmt->columnCount(),
    $stmt->fetch()
);
/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

//$stmt = Connect::getInstace()->prepare("SELECT * FROM users WHERE id = :id");
//$stmt->bindValue(":id", 2, PDO::PARAM_INT);
//$stmt->execute();
//
//var_dump(
//    $stmt->fetch()
//);

$stmt = Connect::getInstace()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (?, ?)
");

$stmt->bindValue(1, 'Matheus', PDO::PARAM_STR);
$stmt->bindValue(2, 'Jose', PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstace()->lastInsertId());

$stmt = Connect::getInstace()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (':first_name', ':last_name')
");

$stmt->bindValue(':first_name', 'Matheus', PDO::PARAM_STR);
$stmt->bindValue(':last_name', 'Jose', PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstace()->lastInsertId());
/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

$stmt = Connect::getInstace()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (':first_name', ':last_name')
");

$firstName = "Matheus";
$lastName = "Jose";

$stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
$stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstace()->lastInsertId());

/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

$stmt = Connect::getInstace()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (':first_name', ':last_name')
");

$user = [
    "firstName" => "Matheus",
    "lastName" => "Jose"
];

$stmt->execute($user);

var_dump($stmt->rowCount(), Connect::getInstace()->lastInsertId());

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$stmt = Connect::getInstace()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();

$stmt->bindColumn('first_name', $name);
$stmt->bindColumn("email", $email);

while ($user = $stmt->fetchAll()) {
    echo "<p>O e-mail de {$name} é {$email}</p>";
}

//foreach ($stmt->fetchAll() as $user ) {
//    echo "<p>O e-mail de {$name} é {$email}</p>";
//}