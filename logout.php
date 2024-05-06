<?php

session_start();


session_destroy();


echo"<script>alert('Logout Successfuly');window.location.href='login.php';</script>";

?>