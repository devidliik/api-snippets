<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once '/path/to/vendor/autoload.php'; // Loads the library

use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$accountSid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$authToken = "your_auth_token";
$workspaceSid = "WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$taskSid = "WTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$reservationSid = "WRXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

$client = new Client($accountSid, $authToken);

// Update a Reservation with a Conference instruction
$reservation = $client->taskrouter
    ->workspaces($workspaceSid)
    ->tasks($taskSid)
    ->reservations($reservationSid)
    ->fetch();

$reservation->update(
    array(
        'instruction' => 'conference',
        'dequeueFrom' => '+18001231234'
    )
);
