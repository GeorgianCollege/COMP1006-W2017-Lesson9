<?php
if(isset($_POST["username"])){
    include_once('../Config/database.php');

    $username = $_POST["username"];
    // TODO: check for unique username

    try {
        $password = $_POST["password"];
        $displayName = $_POST["displayName"];
        $query = "INSERT INTO users (username, password, displayName) VALUES (:username, :password, :displayName)";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':displayName', $displayName);
        $statement->execute();
        $statement->closeCursor();

        // if everything good go to index page
        header('Location: ../index.php');
    }
    catch(Exception $e) {
        $messages = $e->getMessage();
    }
}
else {
    $messages = "";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="../Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../Content/app.css">
</head>
<body>

<!-- Render the Registration form  -->
	<main class="container">
	<!-- Display flash messages  -->
	<?php if ($messages != "") : ?>
        <div class="alert alert-danger"><?php echo $messages ?></div>
    <?php endif ?>

		<div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1>User Registration</h1>
                <form method="post" action="register.php">
                    <fieldset class="form-group">
                        <label for="username">Username: *</label>
                        <input name="username" type="text" class="form-control" required />
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="password">Password: *</label>
                        <input name="password" type="password" class="form-control" required />
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="displayName">Display Name: *</label>
                        <input name="displayName" type="text" class="form-control" required />
                    </fieldset>
                    <fieldset class="form-group text-right">
                        <input type="submit" class="btn btn-success" value="Submit"/>
                        <a href="/">
                            <input type="button" class="btn btn-warning" value="Cancel"/>
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
	</main>

<!-- JavaScript Section -->
<script src="../Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="../Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Scripts/app.js"></script>
</body>
</html>
