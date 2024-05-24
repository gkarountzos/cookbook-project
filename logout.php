<?php
session_start();
// unsets all session variables
session_unset();
// destroys the session
session_destroy();
// redirects the user to the homepage
header("location:homepage.php");
