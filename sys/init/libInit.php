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
 * Library loading file
 */

// Do some quick directory edit
$dir = __DIR__;
$dir = rtrim($dir, '/init');

// Load the files in the lib folder
$libs = glob($dir.'/lib/*.php');

// Loop the f**king libraries
foreach($libs as $lib)
{
 // Load them here
 require_once $lib;
}

// Test
// $t = sanitize_input("\"hello\"");
// echo $t;

?>