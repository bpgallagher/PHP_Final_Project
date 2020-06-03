<?php
// open xampp and start apache and mysql
// open browser and at home use http://localhost/PHP%20Final%20Project/list.php
// which should be saved in c:\xampp\htdocs folder

//include 'createMySQLtableUsingPDO.php';
//include 'insertDataMySQLusingPDO.php';
//include 'TravelPhoto.class.v2.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Airbnb</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.css" />
  <link rel="stylesheet" href="css/captions.css" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="bootstrap3_travelTheme/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap3_travelTheme/theme.css" rel="stylesheet">
</head>

<body>
  <?php include 'header.inc.php'; ?>

  <!-- Page Content -->
  <main class="container">

    <!--  Display database table -->
    <div class="w3-container" style="position:relative;left:50%;">
      <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black" style="display:none;">Display Data Table</button>

      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
          <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>Database table airbnb displayed</h2>
          </header>
          <div class="w3-container">
            <?= include 'selectDataBuildTable.php'; ?>
          </div>
          <footer class="w3-container w3-teal">
            <p>By Roselyne</p>
          </footer>
        </div>
      </div>
    </div>
    <br>
    <br>
    <?php
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
      //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //var_dump($result);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      // echo "<script>console.log('PHP: Error: ' " . $e->getMessage() . ");</script>";
    }
    $conn = null;


    for ($i = 0; $i < sizeof($result); $i++) {
      echo '<div class="col-md-3" id="' . $result[$i]["id"] . '"><a href="detail.php?id=' . $result[$i]["id"] . '" class="thumbnail"><img src="images/square/' . $result[$i]['path'] . '" title="' . $result[$i]['title'] . '" alt="' . $result[$i]['title'] . '" style="width:150px;height:150px;">
      <h5 class="caption">' . $result[$i]['title'] . '</h5></a></div>';
    }

    ?>

    <br>
    <br>
  </main>

  <!--  Add a new airbnb button -->
  <br>
  <br>
  <div class="w3-container" style="position:relative;left:50%;">
    <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-red">Add an Airbnb</button>

    <div id="id02" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-teal">
          <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h2>Airbnb upload new home</h2>
        </header>
        <div class="w3-container">

          <form class="modal-content animate" action="upload.php" enctype="multipart/form-data" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container" style="display:block;">
              <label for="user"><b>Users<sup>*</sup></b></label>
              <input type="text" placeholder="Enter home owner name" name="user" required>
              <br>

              <label for="title"><b>Title of Airbnb<sup>*</sup></b></label>
              <input type="text" placeholder="Title for property" name="title" required>
              <br>

              <label for="city"><b>City<sup>*</sup></b></label>
              <input type="text" placeholder="City" name="city" required>
              <br>

              <label for="country"><b>Country</b></label><br>
              <select id="country" name="country">
                <option value="USA">USA</option>
                <option value="canada">Canada</option>
                <option value="Germany">Australia</option>
                <option value="Ghana">Ghana</option>
                <option value="UK">UK</option>
              </select>

              <br>
              <br>

              <label for="description">Description<sup>*</sup></label><br>
              <textarea id="description" name="description" placeholder="Write something.." style="height:200px;width:100%;"></textarea>
              <br>

              <p>Add your photo URL:<sup>*</sup></p>
              <input type="url" name="photoURL"><br>
              <br>

              <p>Upload picture of your new AirBnB</p>

              <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="submit" value="Upload Image" name="submit">
              <br>

            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
          </form>

        </div>
        <footer class="w3-container w3-teal">
          <p></p>
        </footer>
      </div>
    </div>
  </div>
  <br>
  <br>


  <footer class="w3-red">
    <div class="container-fluid w3-red">
      <div class="row final w3-red">
        <p></p>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>
