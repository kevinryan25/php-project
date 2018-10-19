<?php
require_once "includes/db.php";
$data = $DB->getData("SELECT teacher.name AS teacher, SUM(subject.hrs) AS horaire, SUM(subject.hrs*teacher.salary) AS salary FROM teacher INNER JOIN course on teacher.id = course.teacher INNER JOIN subject ON subject.id = course.subject WHERE year = 2018 GROUP BY teacher.name");
//var_dump($data);
echo json_encode($data);

