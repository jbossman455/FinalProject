<?php
// Link to config.php.
require_once(__DIR__ . "/../model/config.php");

// allows email,password, and username to be filtered and inserted.
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, "username" , FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password" , FILTER_SANITIZE_STRING);

// 
$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
// crypts passwword when typed.
$hashedPassword = crypt ($password, $salt);
// 
$query = $_SESSION["connection"]->query("INSERT INTO users SET " 
      . "email = '$email',"
      . "username = '$username',"
      . "password = '$hashedPassword',"
      . "salt  = '$salt'");
// echo's when user has succesfully created a username.
if($query) {
    echo "Successfully created user: $username";
}
// if not succesfully created page will say "User not successfully created."
else{
    echo "<p>" . $_SESSION["connection"]->error . " <p> User not successfully created.</p>";
}