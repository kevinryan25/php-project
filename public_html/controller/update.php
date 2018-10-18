<?php
require_once "includes/db.php";
$table = $_GET['table'];
$id = $_GET['id'];

$sql = "UPDATE $table SET ";
$i = 0;
foreach($_GET as $key => $value){
    if($key == "id" || $key == "table") continue;
    $quotes = is_string($value)?'"':'';
    $sql.= ($i++>0?', ':'').$key."=".$quotes.$value.$quotes;
}
$DB->query($sql);
header('Location: '.$_SERVER['HTTP_REFERER']);