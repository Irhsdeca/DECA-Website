<?php
ob_start();
session_start();
require_once 'dbconnect.php';
$score = $_POST["score"];
$UID = $_SESSION['user'];
$query = "UPDATE exams SET score_7='$score', cluster='Business-Admin' WHERE userId=".$UID;
$res = mysql_query($query); ?>
