<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy(); 

header("Location: http://localhost/CS260_MiniProject/index.php");

?>