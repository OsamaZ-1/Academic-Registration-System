<?php
   if(!isset($_SESSION["email"]) || !isset($_SESSION["pass"]) || !isset($_SESSION["Id"])){
    echo "<script>window.location.href='login.php';</script>";
   }
?>