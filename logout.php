<?php
require_once('funcs.php');
session_start();
$_SESSION['family'] = null;
$_SESSION['grade'] = null;
$_SESSION['sid'] = null;
redirect("login.php");
?>