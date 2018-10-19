<?php
require_once "includes/db.php";
$teacher = $_GET['teacher'];
$subject = $_GET['subject'];
$year = $_GET['year'];

$sql = "DELETE FROM course WHERE teacher=$teacher AND subject=$subject AND year=$year";
$DB->query($sql);

//echo $sql;
header('Location: '.$_SERVER['HTTP_REFERER']);