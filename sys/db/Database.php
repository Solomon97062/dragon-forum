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
 * This is the class handling connection to database
 */

// Lets begin the database class
class Database
{
 /**
  * Property to store our connection resource
  */
 public $connection;

 /**
  * Class construct that connects to the database
  */
 public function __construct($host, $user, $pass, $name)
 {
  if(empty($host) || empty($user) || /* empty($pass)  || */ empty($name))
  {
   die("Please check your database connection configuration.");
  }
  else
  {
    $connection = mysqli_connect($host, $user, $pass, $name);
    if(mysqli_connect_errno())
    {
     die("Error (".mysqli_connect_errno()."): ".mysqli_connect_error());
    }
    else
    {
     $this->connection = $connection;
     return $this->connection;
    }
  }
 }

 /**
  * Method to run an sql query
  */
 public function query($q)
 {
  if(!empty($q))
  {
   $q = mysqli_query($this->connection, $q);
   
   // Return the query
   return $q;
  }
 }

 /**
  * Method to count number of rows
  */
 public function num_rows($q)
 {
  if(!empty($q))
  {
   $n = mysqli_num_rows($q);
   
   // Return the row count
   return $n;
  }
 }

 /**
  * Escape string method
  */
 public function escape_string($c)
 {
  if(!empty($c))
  {
   $es = mysqli_real_escape_string($this->connection, $c);
   
   // Return the escaped character
   return $es;
  }
 }

 /**
  * Fetch assoc method
  */
 public function fetch_assoc($q)
 {
  if(!empty($q))
  {
   $fa = mysqli_fetch_assoc($q);
   
   // return the result
   return $fa;
  }
 }

 /**
  * Database connection destroyer
  */
 public function __destruct()
 {
  // Close the database connection at the end of execution
  mysqli_close($this->connection);
 }
}

?>