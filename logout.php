<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
      header('Location:http://localhost/blog/signin.php');
      exit;
    }
    else{
        unset($_SESSION['loggedin']);
        header('Location:http://localhost/blog/index.php');
  }
?>
  