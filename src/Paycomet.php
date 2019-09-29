<?php


namespace leifermendez\sabadell;

use leifermendez\sabadell\BancoSabadell;
use leifermendez\sabadell\Helpers as H;

class Paycomet extends BancoSabadell
{
    private $response;

    public function __construct($arg1, $arg2, $arg3, $arg4 = NULL)
    {
        parent::__construct($arg1, $arg2, $arg3, $arg4);
        $this->response = new Helpers();
    }

    public function BS_addCard($opt)
    {
        /*
         * @param int $pan Número de tarjeta, sin espacios ni guiones
         * @param string $expdate Fecha de caducidad de la tarjeta, expresada como “mmyy” (mes en dos cifras y año en dos cifras)
         * @param string $cvv Código CVC2 de la tarjeta
         *
         * Tarjetas de prueba https://docs.paycomet.com/es/cards/testcards
         * */

        $pan = $opt['card_number']; // Número de tarjeta, sin espacios ni guiones
        $expdate = $opt['card_exp']; // expresada como “mmyy” (mes en dos cifras y año en dos cifras)
        $cvv = $opt['card_cvv']; // $cvv Código CVC2 de la tarjeta

        $response = $this->AddUser($pan, $expdate, $cvv);
        $response = $this->response->json($response, '');

        return $response;
    }

    public function BS_infoUser($opt)
    {
        $response = $this->InfoUser($opt['user_id'], $opt['user_token']);
        $response = $this->response->json($response, '');

        return $response;
    }

    public function BS_addUser()
    {
        $response = $this->AddUserToken('1111');
        $response = $this->response->json($response, '');

        return $response;
    }

    public function BS_purchase()
    {

        // $response = $this->ExecutePurchase($opt);
    }

    public function BS_executeUrl($opt)
    {
        $response = $this->ExecutePurchaseUrl(
            $opt['id_operation'],
            floatval($opt['amount']),
            $opt['currency'],
            $opt['language'],
            $opt['description'],
            $opt['secure3d'],
            $opt['scoring'],
            $opt['url_success'],
            $opt['url_error']
        );

        return $response;
    }
}