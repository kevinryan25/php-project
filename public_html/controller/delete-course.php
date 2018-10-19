<?php
require_once "includes/db.php";
$teacher = $_GET['teacher'];
$subject = $_GET['subject'];
$year = $_GET['year'];

$sql = "DELETE FROM course WHERE id=";
$DB->query($sql);

echo $sql;
//header('Location: '.$_SERVER['HTTP_REFERER']);