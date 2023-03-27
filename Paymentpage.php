<?php
require 'vendor/autoload.php'; // require the Paystack PHP library

$paystack = new Yabacon\Paystack('<sk_test_3b939b1b2573117ac10e08609fff4155a8a48e43>'); // initialize Paystack with your secret key

$email = $_POST['email'];
$amount = $_POST['amount'] * 100; // convert amount to kobo

$reference = "P1" . rand(1000000000, 9999999999); // generate a random reference

try {
    // initiate a new transaction
    $transaction = $paystack->transaction->initialize([
        'email' => $email,
        'amount' => $amount,
        'reference' => $reference
    ]);

    // redirect the user to the payment page
    header('Location: ' . $transaction->data->authorization_url);
} catch (Exception $e) {
    // handle any errors
    echo 'Error: ' . $e->getMessage();
}
?>
