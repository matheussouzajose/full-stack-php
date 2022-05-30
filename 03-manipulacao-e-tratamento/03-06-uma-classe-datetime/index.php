<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);
define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1997-10-26");
$dateStatic = DateTime::createFromFormat(DATE_BR, "10/03/2010 12:00:00");

echo "<pre>";
var_dump(
    $dateNow,
    $dateBirth,
    $dateStatic
);

var_dump([
    $dateNow->format(DATE_BR),
    $dateNow->format("d")
]);
echo "</pre>";

echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de {$dateNow->format("Y")}</p>";

$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTimeZone = new DateTime("now", $newTimeZone);

echo "<pre>";
var_dump([
    $newTimeZone,
    $newDateTimeZone,
    $dateNow
]);
echo "</pre>";


/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

$dateTime = new DateTime("now");
$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

$birth = new DateTime(date("Y") . "-10-26");
$dateNow = new DateTime("now");

$diff = $dateNow->diff($birth);
echo "<pre>";
var_dump([
    $dateInterval,
    $dateTime,
    $birth,
    $diff
]);
echo "</pre>";

if ($diff->invert) {
    echo "<p>Seu aniversário foi a {$diff->days} dias.</p>";
} else {
    echo "<p>Faltam {$diff->days} para o seu aniversário.</p>";
}

$dateResources = new DateTime("now");
echo "<pre>";
var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("20days"))->format(DATE_BR)
]);
echo "</pre>";

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2025-01-01");

$period = new DatePeriod($start, $interval, $end);
echo "<pre>";
var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR)
], $period, get_class_methods($period));
echo "</pre>";

echo "<h1>Sua Assinatura</h1>";
foreach ($period as $recurrences) {
    echo "<p>Próximo vencimento {$recurrences->format(DATE_BR)}</p>";
}