<?php
ob_start();
session_start();
require_once 'dbconnect.php';

$score = $_POST["score"];
$UID = $_SESSION['user'];
$query = "INSERT INTO exams(userId, score_2, cluster) VALUES('$UID', '$score', 'Principles')";
$res = mysql_query($query);
?>
