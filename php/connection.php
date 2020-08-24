<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "cyber";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
//create database
/*$database = "CREATE DATABASE cyber";
$sqlexe = mysqli_query($conn,$sql);
if($sqlexe)
{
	echo "created";
}
else
{
	echo "not createde";
}
*/

// sql to create table
/*$sql = "CREATE TABLE registration
(id INT(6)AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30),
lastname VARCHAR(30),
email VARCHAR(50),
mobilenumber VARCHAR(12),
password VARCHAR(50))";
$sqlexe = mysqli_query($conn,$sql);

if ($sqlexe) 
{
  echo "Table created successfully";
 } 
 else 
 {
  		echo "Error creating table: ";
 }*/
?>