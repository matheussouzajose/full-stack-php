<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);
$event = new \Source\Inheritance\Event\Event(
    "Workshop FSPHP",
    new DateTime("2019-05-20 16:00"),
    2500,
    "4"
);

var_dump($event);

$event->register("Matheus Souza Jose", "matheus.jose@via.com.br");
$event->register("Jhuana Jose", "jhuana.jose@via.com.br");
$event->register("Aruquia Jose", "aruquia.jose@via.com.br");
$event->register("Igor Jose", "igor.jose@via.com.br");
$event->register("Welligton Jose", "welligton.jose@via.com.br");

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new \Source\Inheritance\Address("Rua dos eventos", "1287");
$eventLive = new \Source\Inheritance\Event\EventLive(
    "Workshop FSPHP",
    new DateTime("2019-05-20 16:00"),
    2500,
    "4",
    $address
);

echo "<h3>Data: {$eventLive->getDate()}</h3>";
echo "<h4>Endereço: {$eventLive->getAddress()->getStreet()}, Nº{$eventLive->getAddress()->getNumber()}</h4>";
echo "<h4>Evento: {$eventLive->getEvent()}</h4>";

$eventLive->register("Matheus Souza Jose", "matheus.jose@via.com.br");
$eventLive->register("Jhuana Jose", "jhuana.jose@via.com.br");
$eventLive->register("Aruquia Jose", "aruquia.jose@via.com.br");
$eventLive->register("Igor Jose", "igor.jose@via.com.br");
$eventLive->register("Welligton Jose", "welligton.jose@via.com.br");

var_dump($eventLive);

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$eventOnline = new \Source\Inheritance\Event\EventOnline(
    "Workshop FSPHP",
    new DateTime("2019-05-20 16:00"),
    197,
    "http://upinse.com.br/aovivo"
);

var_dump($eventOnline);

$eventOnline->register("Matheus Souza Jose", "matheus.jose@via.com.br");
$eventOnline->register("Jhuana Jose", "jhuana.jose@via.com.br");
$eventOnline->register("Aruquia Jose", "aruquia.jose@via.com.br");
$eventOnline->register("Igor Jose", "igor.jose@via.com.br");
$eventOnline->register("Welligton Jose", "welligton.jose@via.com.br");
