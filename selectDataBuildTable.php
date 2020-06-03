<?php
include 'TravelPhoto.class.v2.php';

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>User</th><th>Title</th><th>City</th><th>Country</th><th>Filepath</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

//$servername = "mysqlsrv.dcs.bbk.ac.uk";
//$username = "bgalla03";
//$password = "My5QL2019";
//$dbname = "bgalla03own";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// select fields from database to be displayed in table
    $stmt = $conn->prepare("SELECT id, user, title, city, country, path FROM airbnb");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetchAll(PDO::FETCH_CLASS, "TravelPhoto");
    
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
    var_dump($result);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
	// echo "<script>console.log('PHP: Error: ' " . $e->getMessage() . ");</script>";
}
$conn = null;
echo "</table>";
?>
