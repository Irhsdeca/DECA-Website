<?php ob_start(); session_start(); require_once 'dbconnect.php'; $score = $_POST["score"]; $UID = $_POST['user']; $query = "UPDATE exams SET score_13='$score', cluster='Hospitality' WHERE userId=".$UID;$res = mysql_query($query); ?>
