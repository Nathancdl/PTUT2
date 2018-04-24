<?php 
	session_start();
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=ptut;charset=utf8","root","");
	}
	catch (Exception $e)
	{
		die("erreur de connection");
	}
	

?>