<?php

$servername="localhost";
$username="yana";
$password="kostyana1995";
$dbname="yana";

//Create Connection
$con=mysqli_connect($servername, $username, $password, $dbname);

//Check Connection
if(!$con){
	die('Connection fail:'.mysqli_connect_error());
}
