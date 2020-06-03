<?php
include 'travel-data-classes.php';

asort($countries);
asort($continents);

$defaultId = 1;

// first find out which image was requested
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //if (! array_key_exists($id, $images)) {
    //    $id = $defaultId;
    //}
} else {
    $id = $defaultId;
}

echo "<script>console.log('PHP: id = $id');</script>";
//$requested = $images[$id - 1];

//$servername = "mysqlsrv.dcs.bbk.ac.uk";
//$username = "bgalla03";
//$password = "My5QL2019";
//$dbname = "bgalla03own";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";
$charset = 'utf8mb4';

$dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";

$opt = [ 

PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

PDO::ATTR_EMULATE_PREPARES => false

];

try {
    $conn = new PDO("$dsn", $username, $password, $opt);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM airbnb WHERE id=$id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records DELETED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

//header("Location: http://localhost/PHP_Final_Project/list.php");

//exit();

?> 