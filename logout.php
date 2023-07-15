<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["pass"]);
unset($_SESSION["Id"]);
unset($_SESSION['user_type']);
echo "<script>window.location.href='login.php'</script>";
?>