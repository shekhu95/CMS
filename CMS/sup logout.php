<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: FNOL sup.php"); // Redirecting To Home Page
}
?>