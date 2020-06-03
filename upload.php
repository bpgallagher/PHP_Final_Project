<?php
include 'travel-data-classes.php';

$target_dir = "images/square/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
		echo "<br/><br/>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
		echo "<br/><br/>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
	echo "<br/><br/>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
	echo "<br/><br/>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	echo "<br/><br/>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	echo "<br/><br/>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<br/><br/>";
        
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

    } else {
        echo "Sorry, there was an error uploading your file.";
		echo "<br/><br/>";
    }
}


if(!isset($_POST['user']{0})) echo 'No new items to create';
// $images[11] = array("id"=>11, "title"=>$_POST['title'], "description"=>$_POST['description'], "country"=>"US", "city"=>$_POST['city'], "user"=>$_POST['user'], "path"=>$_POST['photoURL']);

// array_push($images, $images[11] );
$arrlength = count($images)-1;

// Appending data file with new airbnb created by user
$file = "travel-data-classes.php"; 
$Saved_File = fopen($file, 'a');

$newLine = PHP_EOL . '$images[] = ';
$newLine .= "new TravelPhoto('" . basename( $_FILES["fileToUpload"]["name"]) . "',";
$newLine .= " '" . $_POST['title'] . "',";
$newLine .= " '" . $_POST['description'] . "',";
$newLine .= " '" . $_POST['city'] . "',";
$newLine .= " '" . $_POST['country'] . "',";
$newLine .= " '" . $_POST['user'] . "');";
 
fwrite($Saved_File, $newLine); 
fclose($Saved_File);


// prints image array 
print_r($_FILES);
echo "<br />";
echo "<br />";

// prints user input
echo "Printing post array";
print_r($_POST);
echo "<br />";
echo "<br />";

// print images multidimensional array
print_r($images);


?>
