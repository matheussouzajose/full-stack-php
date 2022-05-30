<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$email = (new \Source\Core\Email())->bootstrap(
    "Olá mundo, esse é meu e-email",
    "<h1>Olá Mundo!</h1><p>Essa é uma mensagem via rotina da aplicação</p>",
    "matheussouzajose97@gmail.com",
    "Matheus S. Jose"
);

if ($email->send()) {
    echo message()->success("E-mail enviado com sucesso");
} else {
    echo message()->info($email->message());
}