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
 * Only add database tables here
 */

$tables = [
    '
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        pic VARCHAR(200) DEFAULT "default.png",
        rank VARCHAR(100) DEFAULT "0"
    );
    '
];

/**
 * Only add default database Inserts Here
 */

$inserts = [
    ''
];

// Check if the tables array is not empty
if(!empty($table))
{
 // Loop the tables
 foreach($tables as $table)
 {
  // Query each table
  $db->query($table);
 }
}

// Check if the inserts array is not empty
if(!empty($inserts))
{
 // Loop the inserts
 foreach($inserts as $insert)
 {
  // Query the inserts
  $db->query($insert);
 }
}

?>