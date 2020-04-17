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
 * A file consisting a list of usefull functions used in user input/output
 */

/**
 * Function to sanitize user inputs
 */
function sanitize_input($input)
{
 // Check for HTML characters
 $input = htmlspecialchars($input);

 // Strip slashes
 $input = stripslashes($input);

 // Trim to remove whitespaces
 $input = trim($input);

 // Return the end result
 return $input;
}

?>