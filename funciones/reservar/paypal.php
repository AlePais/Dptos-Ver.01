<?php
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
// Used for composer based installation
require __DIR__  . '\..\e-commerce\PayPal\vendor\autoload.php';

// $id_reserva=1;
// $compara="http://mercadoempresa.com";
// $elemento['n3_nombre'] = "Mendoza 1";
// $precio = 100;
// $pago_correcto = $compara."/funciones/reservar/pago_correcto.php?id_reserva=".$id_reserva;
// $pago_incorrecto = $compara."/funciones/reservar/pago_incorrecto.php?id_reserva=".$id_reserva;
// $medios_pago['client_id_paypal'] = "Af0vVVlBU1BjQ5zpcKpicclAFFm4IH-eYoO_6u3HVOdBh8nRT_pfb5BusqWH9u6xtyaisXJqV3mk3MGe";
// $medios_pago['client_secret_paypal'] = "EK-lEzz6DBPWZT8i--7omG06te6p_OuFLtUaBw3dL02NAOHpyag88bxUCfkiQYTfl2uzKig-UKeSovmB";


// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $medios_pago['client_id_paypal'], // ClientID
        $medios_pago['client_secret_paypal'] // ClientSecret
    )
);
    $apiContext->setConfig(
        array(
            'mode' => 'live',
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
            'cache.enabled' => true,
            //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
            // 'http.CURLOPT_CONNECTTIMEOUT' => 30
            // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
            //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
        )
    );
	
	// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');
$amount = new \PayPal\Api\Amount();
$amount->setCurrency('USD');
$amount->setTotal($precio);

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);
$transaction->setDescription($elemento['n3_nombre']);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl($pago_correcto)
    ->setCancelUrl($pago_incorrecto);
$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);
// 4. Make a Create Call and print the values

try
{
    $payment->create($apiContext);
    // echo $payment;
    header("location:".$payment->getApprovalLink());
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    // echo $ex->getData();
}