<?php
session_start();
unset($_SESSION["email_login"]);
header("Location: LoginPdo.php");
