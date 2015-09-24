<?php
	error_reporting(-1);
    ini_set('display_errors', 'On');

    $databaseUser = 'root';
    $databasePassword = 'root';

    $connection = new mysqli('127.0.0.1', $databaseUser, $databasePassword);
	if ($connection->connect_error)
	{
    	die("Connection failed: " . $connection->connect_error);
	} 
	else
	{
		$queryString = file_get_contents('../MySQL/createWallDatabase.sql');
		$connection->query($queryString);
		$queryString = file_get_contents('../MySQL/createWallContentsTable.sql');
		$connection->query($queryString);
	}
?>