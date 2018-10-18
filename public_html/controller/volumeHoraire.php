<?php
require_once('includes/db.php');

$output = array();
$output = $DB->getData("SELECT teacher.name AS teacher, SUM(subject.hrs) AS horaire, SUM(subject.hrs*teacher.salary) AS salary FROM teacher INNER JOIN course on teacher.id = course.teacher INNER JOIN subject ON subject.id = course.subject WHERE year = ".$_POST['date']."GROUP BY teacher.name");
echo json_encode($output);