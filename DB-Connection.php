<?php

  function db_connect()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "FacultyOfScience";

    return new mysqli($servername, $username, $password, $dbname);
  }
?>