<?php

$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

if($_SERVER['HTTP_HOST'] == "localhost") {
    $localRoot = $rootUrl . "comp1006/COMP1006-W2017-Lesson9/";
}
else {
    $localRoot = $rootUrl;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <!-- CSS Section -->
    <link rel="stylesheet" href=<?php echo $localRoot . "Scripts/lib/bootstrap/dist/css/bootstrap.min.css" ?>>
    <link rel="stylesheet" href=<?php echo $localRoot . "Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css" ?>>
    <link rel="stylesheet" href=<?php echo $localRoot . "Scripts/lib/font-awesome/css/font-awesome.css" ?>>
    <link rel="stylesheet" href=<?php echo $localRoot . "Content/app.css" ?>>
</head>
<body>