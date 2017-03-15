<?php
require_once('Controllers/games.php');

$games = ReadGames();

$title = "Home";
?>

<?php include_once('Views/partials/header.php'); ?>

<?php include_once ('Views/partials/navbar.php'); ?>

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

<?php include_once ('Views/partials/footer.php');
