<?php

  $servername = "localhost";
  $username = "academy";
  $password = "academy";
  $dbname = "blog";

  try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

  