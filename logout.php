<?php
session_start(); //session starts
session_unset(); //unset all session variables
session_destroy(); // destroys current session
header("Location: index.php"); // redirect to any page

?>
