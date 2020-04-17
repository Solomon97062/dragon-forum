<?php

/**
 * 
 * @Author: titaro
 * @FB: facebook.com/tyroklonejr
 * @Twitter: twitter.com/tyroklonejnr
 * 
 * @License: FREE
 * @Aim: A forum for the dragon programming language
 */

/**
 * This file is the initialization file for database related stuff
 */

// Do some quick directory edit
$dir = __DIR__;
$dir = rtrim($dir, '/init');

// Start by loading the database file
require_once $dir.'/db/Database.php';

// Lets get the configuration settings from the config.ini file
$config = parse_ini_file($dir.'/config/Config.ini');
if($config)
{
 $user = $config['username'];
 $pass = $config['password'];
 $host = $config['host'];
 $name = $config['name'];
}

// Instantiate the db connection
$db = new Database($host, $user, $pass, $name);

// Check the db variable instance
if(!$db instanceof Database)
{
 // Throw an error and kill the script if someone changes the class
 die("Dragon Error: Database variable not using the dragon database class.");
}

// Lets load the database tables
require_once $dir.'/db/dbInserts.php';

?>