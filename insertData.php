<?php
//$servername = "mysqlsrv.dcs.bbk.ac.uk";
$servername = "localhost";
//$username = "bgalla03";
$username = "root";
//$password = "My5QL2019";
$password = "";
//$dbname = "bgalla03own";
$dbname = "myDBPDO";
$charset = 'utf8mb4';

try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// sql to insert data
    // begin the transaction
    $conn->beginTransaction();

    $conn->exec("INSERT INTO airbnb (user, title, city, country, description, path) 
	VALUES ($_POST['user'], $_POST['title'], $_POST['city'], $_POST['country'], $_POST['description'], basename($_FILES["fileToUpload"]["name"]) )");

    // use exec() because no results are returned
    $conn->commit();
    // echo "New records created successfully<br>";
	echo "<script>console.log('PHP: New records created successfully');</script>";
    }
catch(PDOException $e)
    {
    // echo "Error: " . $e->getMessage();
	echo "<script>console.log('PHP: Error: ' " . $e->getMessage() . ");</script>";
    // roll back the transaction if something failed
    //$conn->rollback();
    }

$conn = null;
