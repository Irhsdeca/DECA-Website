<?php ob_start(); session_start(); require_once 'dbconnect.php'; $score = $_POST["score"]; $UID = $_POST['user']; $query = "UPDATE exams SET score_9='$score', cluster='Principles' WHERE userId=".$UID;$res = mysql_query($query); ?>
