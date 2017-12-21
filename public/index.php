<?php
// Composer autoload
define('BASE_URL', str_replace(basename(__dir__ ), '', __dir__ ));
require BASE_URL . '/public/autoload.php';
//use \Triptip as Triptip;
//require(BASE_URL . '/vendor/autoload.php');
//use \triptip\src\app\core\Trip;
try {
    $trip = new Trip(provider::jsonProvider());
    // Sort them
    $trip->sort();
    // Display
    $trip->tripString();
}
catch (exception $e) {
    echo $e->getmessage();
}
