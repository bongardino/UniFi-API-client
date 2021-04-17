<?php
/**
 * PHP API usage example
 *
 * contributed by: Art of WiFi
 * description:    example to toggle the locate function (flashing LED) on an Access Point and
 *                 output the response in json format
 */

/**
 * include the config file (place your credentials etc. there if not already present)
 * see the config.template.php file for an example
 */
require_once 'config.php';
require_once 'client_loader.php';
require_once $client_path;

/**
 * initialize the UniFi API connection class and log in to the controller to do our thing
 */
$unifi_connection = new UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion); // initialize the class instance
$set_debug_mode   = $unifi_connection->set_debug($debug);
$loginresults     = $unifi_connection->login();

/**
 * use: <php led_on_off.php 'off'>
 * device ids stored in the config, dumped from API
 */
$led_state = $argv[1];
$device_id = $flexhd_id;

$data = $unifi_connection->led_override($device_id, $led_state);

if ($data) {
    /**
     * provide feedback in json format
     */
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    /**
     * method returned false so we display the raw results in json format
     */
    echo '<pre>';
    print_r($unifi_connection->get_last_results_raw(true));
    echo '</pre>';
}
