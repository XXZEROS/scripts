<?php

session_start();

ob_start();

session_destroy();




echo "<script>location.href='index.php';</script>";
?>