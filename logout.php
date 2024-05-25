<?php
session_start();
session_unset(); // unsets all session variables
session_destroy(); // destroys the session 
header("location:homepage.php"); // redirects the user to the homepage
