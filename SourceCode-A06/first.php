<?php
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require __DIR__  . '/PayPal-PHP-SDK/autoload.php';
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AfJ-Ercf_k2psv4xL30tt2XGAQco2Z2yxceiHYd4PGyxjzdqcT1YTvAMysDPJEMkE0oeJ_5xkfWi0mdb',     // ClientID
        'EMcJQt1Dcb9UOnGZgLdvv6_yIxVI0fmtKdVep93shI-rO5WSn8qGTGoKt5n3bPQGdkkbVCmSAH0lb6L_'      // ClientSecret
    )
);
// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');
$amount = new \PayPal\Api\Amount();
$amount->setTotal('1.00');
$amount->setCurrency('USD');
$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);
$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
    ->setCancelUrl("https://example.com/your_cancel_url.html");
$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);
// 4. Make a Create Call and print the values
try {
    $payment->create($apiContext);
    echo $payment;
    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}