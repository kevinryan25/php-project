<?php
require_once "includes/db.php";
$table = $_GET['table'];
$id = $_GET['id'];

$sql = "DELETE FROM $table WHERE id=$id";
$DB->query($sql);
header('Location: '.$_SERVER['HTTP_REFERER']);