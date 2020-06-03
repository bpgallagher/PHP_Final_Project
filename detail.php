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

$requested = $images[$id - 1];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Airbnb Detail Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <?php include 'header.inc.php'; ?>



    <!-- Page Content -->
    <main class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">

                        <img class="img-responsive" src="images/square/<?php echo $requested->path(); ?>" alt="<?php echo $requested->title(); ?>">

                        <p class="description"><?php echo $requested->description(); ?></p>

                    </div>

                    <div class="col-md-4">
                        <h2><?php echo $requested->title(); ?></h2>
                        <h3><?php echo $requested->city(); ?><?php echo " " . $requested->country(); ?></h3>
                        <h4><?php echo "Owned by: " . $requested->user(); ?></h4>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="details-list">

                                </ul>
                            </div>
                        </div>

                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="deleteItem.php?id=<?php echo $requested->id(); ?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
                            </div>
                        </div>

                        <h4>Tags</h4>
                        <div class="panel panel-default">
                            <div class="panel-body" id="tags">


                            </div>
                        </div>

                    </div> <!-- end right-info column -->
                </div> <!-- end row -->



                <!-- Related Projects Row -->

                <!-- /.row -->


            </div> <!-- end main content area -->
        </div>
    </main>

    <footer class="w3-red">
        <div class="container-fluid class=" w3-red"">
            <div class="row final w3-red">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>
        </div>


    </footer>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>