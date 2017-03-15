<?php

if(isset($_POST["username"])){
    include_once('../Config/database.php');
    try{
        $db = DBConnection();
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT id FROM users 
                  WHERE username = :username AND password = :password"; // SQL statement
        $statement = $db->prepare($query); // encapsulate the sql statement
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute(); // run on the db server
        if($statement->rowCount() == 1) {
            $statement->closeCursor(); // close the connection

            $_SESSION["is_logged_in"] = true;
            // if everything good go to index page
            header('Location: ../index.php');
        }
        else {
            $statement->closeCursor(); // close the connection
            $messages = "Invalid Username or Password";
        }
    }
    catch(Exception $e) {
        $messages = $e->getMessage();
    }
}
else {
    $messages = "";
}

$title = "Login";
?>

<?php include_once('../Views/partials/header.php'); ?>

<?php include_once('../Views/partials/navbar.php'); ?>

<main class="container">
    <?php if ($messages != "") : ?>
        <div class="alert alert-danger"><?php echo $messages ?></div>
    <?php endif ?>
      <div class="row">
        <div class="col-md-offset-4 col-md-4">
           <h1>Please Login</h1>
           <form method="post" action="login.php">
                <fieldset class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" required autofocus/>
                 </fieldset>
                 <fieldset class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" required/>
                    or <a href="register.php">Register</a>
                </fieldset>
                <fieldset class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Log In"/>
                    <a href=<?php echo $localRoot ?>>
                        <input type="button" class="btn btn-warning" value="Cancel"/>
                    </a>
               </fieldset>
            </form>
         </div>
      </div>
    </main>

<?php include_once('../Views/partials/footer.php'); ?>