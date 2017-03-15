<?php
include_once('../Users/is_authenticated.php');
include_once('../Config/database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$gameName = filter_input(INPUT_POST, "NameTextField"); //$_POST["NameTextField"];
$gameCost = filter_input(INPUT_POST, "CostTextField"); //$_POST["CostTextField"];

if($isAddition == "1") {
$query = "INSERT INTO games (Name, Cost) VALUES (:game_name, :game_cost)";
$statement = $db->prepare($query); // encapsulate the sql statement
}
else {
$gameID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
$query = "UPDATE games SET Name = :game_name, Cost = :game_cost WHERE Id = :game_id "; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':game_id', $gameID);

}

$statement->bindValue(':game_name', $gameName);
$statement->bindValue(':game_cost', $gameCost);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
header('Location: ../index.php');
?>
