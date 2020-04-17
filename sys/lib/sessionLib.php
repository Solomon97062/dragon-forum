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

// All session libraries should be written here

// Session function
function admin_session_redirect($bol = false, $loc = null, $other = null)
{
 // Check for a go ahead :D
 if($bol === true)
 {
  if(!empty($loc) || !is_null($loc))
  {
   if(!(isset($_SESSION['username']) && isset($_SESSION['email'])))
   {
    header("Location: $loc");
   }
   else
   {
    if(!empty($other) || !is_null($other))
    {
     header("Location: $other");
    }
   }
  }
 }
}


?>