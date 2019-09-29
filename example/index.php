<?php

include __DIR__ . "/../vendor/autoload.php";

/**
 * Lista de codigo de errores https://docs.paycomet.com/en/documentacion/codigos-de-error
 * Lista de codigo divisas https://docs.paycomet.com/en/documentacion/monedas
 */

use leifermendez\sabadell\Paycomet;

$merchantCode = "2uh4zgqe";
$password = "w5qhsnv63hcdw88e2vxy";
$terminal = "8460";
$jetid = NULL; // Opcional si no se utiliza BankStore JET

$bank = new Paycomet($merchantCode, $terminal, $password, $jetid);

$card = array(
    'card_number' => '4539232076648253', // Número de tarjeta, sin espacios ni guiones
    'card_exp' => '0520',  // expresada como “mmyy” (mes en dos cifras y año en dos cifras)
    'card_cvv' => '123' // $cvv Código CVC2 de la tarjeta
);

//$response = $bank->BS_addCard($card);

$user = array(
    'user_id' => '0',
    'user_token' => '0'
);

//$response = $bank->BS_addUser();
//$response = $bank->BS_infoUser($user);

$payUrl = array(
    'id_operation' => time(),
    "amount" => "111",
    "currency" => "EUR",
    "language" => "ES",
    "description" => NULL,
    "secure3d" => NULL,
    "scoring" => NULL,
    "url_success" => "http://localhost",
    "url_error" => "http://localhost?error"
);

$response = $bank->BS_executeUrl($payUrl);

var_dump($response);