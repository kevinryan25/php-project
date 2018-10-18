<?php
require_once "includes/db.php";
$table = $_GET['table'];
$data = $_POST;


$columnList = "";
$dataList = "";
$i = 0;
var_dump($data);
foreach($data as $key=>$value){
    $quotes = is_string($value)?'"':'';
    $columnList.= ($i>0?', ':'').$key;
    $dataList.= ($i++>0?', ':'').$quotes.$value.$quotes;
}

$sql = "INSERT INTO $table ($columnList) VALUES ($dataList);";
$DB->exec($sql);

header('Location: '.$_SERVER['HTTP_REFERER']);
