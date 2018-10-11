<?
	$servername = "localhost";
	$username = "student2nd";
	$password = "mentorstudent123";
	$dbname = "mentor_program_db";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query("SET NAMES 'UTF8'");
	$conn->query("SET timezone = '+8:00'");

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}