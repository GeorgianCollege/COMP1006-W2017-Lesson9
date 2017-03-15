<?php
include_once('Config/database.php');

$query = "SELECT * FROM games"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->execute(); // run on the db server
$games = $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMP1006</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Games List</h1>
            <a class="btn btn-primary" href="Game/game_details.php?gameID=0">
                <i class="fa fa-plus"></i> Add New Game</a>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th></th>
                    <th></th>
                </tr>
                    <?php foreach($games as $game) : ?>
                        <tr>
                            <td><?php echo $game['Id'] ?></td>
                            <td><?php echo $game['Name'] ?></td>
                            <td><?php echo $game['Cost'] ?></td>
                            <!-- This line sends the gameID to the game_details page -->

                            <td><a class="btn btn-primary" href="Game/game_details.php?gameID=<?php echo $game['Id'] ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>

                            <td><a class="btn btn-danger" href="Game/game_delete.php?gameID=<?php echo $game['Id'] ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>
                    <?php endforeach; ?>

            </table>

        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>
