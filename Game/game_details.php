<?php
include_once('../Users/is_authenticated.php');
include_once('../Config/database.php'); // include the database connection file

$gameID = $_GET["gameID"]; // assigns the gameID from the URL

if($gameID == 0) {
    $game = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
$query = "SELECT * FROM games WHERE Id = :game_id "; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':game_id', $gameID);
$statement->execute(); // run on the db server
$game = $statement->fetch(); // returns only one record
$statement->closeCursor(); // close the connection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Details</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="../Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../Content/app.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Game Details</h1>
            <form action="update_database.php" method="post">
                <div class="form-group">
                    <label for="IDTextField" hidden>Game ID</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="Game ID" value="<?php echo $game['Id']; ?>">
                </div>
                <div class="form-group">
                    <label for="NameTextField">Game Name</label>
                    <input type="text" class="form-control" id="NameTextField"  name="NameTextField"
                           placeholder="Game Name" required  value="<?php echo $game['Name']; ?>">
                </div>
                <div class="form-group">
                    <label for="CostTextField">Game Cost</label>
                    <input type="text" class="form-control" id="CostTextField" name="CostTextField"
                           placeholder="Game Cost" required  value="<?php echo $game['Cost']; ?>">
                </div>
                    <input type="hidden" name="isAddition" value="<?php echo $isAddition; ?>">
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="../Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="../Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Scripts/app.js"></script>
</body>
</html>

