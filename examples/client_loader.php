<?php

/**
 * dynamic client path. wow!
 */

// find the current user
$uid = posix_getuid();
$shell_user = posix_getpwuid($uid);
// print_r($shell_user);  // will show an array and key 'dir' is the home dir

// not owner of running script process but script file owner
$home_dir = posix_getpwuid(getmyuid())['dir'];
// var_dump($home_dir);

$client_path = "$home_dir/src/UniFi-API-client/src/Client.php";
