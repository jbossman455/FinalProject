<?php
// Link to database.php
require_once (__DIR__ ."/database.php");
   session_start();
   session_regenerate_id(true);
   $path = "/DonutWebsite/";
   // Stating host information in Localhost.
   $host = "localhost";
   $username = "root";
   $password = "root";
   $database = "websitedb";
//    Asking if connection is set
   if (!isset($_SESSION["connection"])){
   $connection = new Database($host, $username, $password, $database);
   $_SESSION["connection"] = $connection;
   }
   