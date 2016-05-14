<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: client login.php"); // Redirecting To Home Page
}
?>