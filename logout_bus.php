<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
	header("Location: index_bus.php"); // Redirecting To Home Page
}
?>
