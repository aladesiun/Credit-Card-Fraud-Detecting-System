<?php
    // Clearing Transaction view
    session_start();
    unset($_SESSION["account"]);
    header("Location: ../index.php");
?>