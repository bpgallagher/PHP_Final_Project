<?php
//$servername = "mysqlsrv.dcs.bbk.ac.uk";
$servername = "localhost";
//$username = "bgalla03";
$username = "root";
//$password = "My5QL2019";
$password = "";
//$dbname = "bgalla03own";
$dbname = "mydbpdo";
$charset = 'utf8mb4';

try {
	// STEP 1: connect to mySQL
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// STEP 2: Create database
    //$sql = "CREATE DATABASE IF NOT EXISTS bgalla03own";
    $sql = "CREATE DATABASE IF NOT EXISTS myDBPDO";

    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Database created successfully<br>";
	echo "<script>console.log('PHP: Database created successfully!');</script>";
    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
	echo "<script>console.log('PHP: Error: ' " . $e->getMessage() . ");</script>";
    }

try {
	$sql = "DROP TABLE IF EXISTS airbnb";
	
	// STEP 1: connect to mySQL
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password );

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec($sql);
	// echo "Table airbnb dropped successfully<br>";
	echo "<script>console.log('PHP: Table airbnb dropped successfully!');</script>";
	}
catch(PDOException $e)
	{
	// echo $sql . "<br>" . $e->getMessage();
	echo "<script>console.log('PHP: Error: ' " . $e->getMessage() . ");</script>";
	}


try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS airbnb (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user VARCHAR(20),
    title VARCHAR(30),
    city VARCHAR(20),
    country VARCHAR(2),
    description VARCHAR(500),
	path VARCHAR(180)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Table airbnb created successfully<br>";
	echo "<script>console.log('PHP: Table airbnb created successfully!');</script>";
    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
	echo "<script>console.log('PHP: Error: ' " . $e->getMessage() . ");</script>";
    }

$conn = null;
