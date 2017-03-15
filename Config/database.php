<?php
// connection string
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// cleardb access
//$dsn = 'mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=videogamesdb';
//$Username = 'b6ee96bd470785';
//$Password = 'dc381279';

//local db access
$dsn = 'mysql:host=localhost;dbname=gamedb';
$Username = 'dasha';
$Password = '12345';

// exception handling - use a try / catch
try {
// instantiates a new pdo - an db object
$db = new PDO($dsn, $Username, $Password);

}
catch(PDOException $e) {
$message = $e->getMessage();
echo "An error occurred: " . $message;
}

?>