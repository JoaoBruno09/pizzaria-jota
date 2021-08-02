<?php

/** set your paypal credential **/

$config['client_id'] = 'AX2AUfkw2eE831dLOrqOjsiNB5yKeLAi7Cxwj7zlvA5C5p0b7aAVm_b4PBL-yVLLwQTLAhxx6WwlVfh9';
$config['secret'] = 'EBEGtQ8gGTWgUlcdW5e2ZfWIyBIsPBKeI7EnlKxVozuBcgmOO1lRoraBgh9Y15xb6bUvg9TBrhXs12rT';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);
