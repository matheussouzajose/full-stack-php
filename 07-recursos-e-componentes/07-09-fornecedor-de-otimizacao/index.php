<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.09 - Fornecedor de otimização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ optimizer ] https://packagist.org/packages/coffeecode/optimizer
 */
fullStackPHPClassSession("optimizer", __LINE__);

$seo = new \Source\Support\Seo();
$seo->render(
    "Title",
    "Description",
    "https://www.upinside.com.br/fsphp",
    "https://www.upinside.com.br/fsphp/images/cover.jpg",
);

var_dump($seo->optmizer()->debug(), $seo->optmizer()->data());
