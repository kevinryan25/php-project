<?php
require_once('includes/db.php');

$q = $_GET['q'];
$column = $_GET['column'];
$table = $_GET['table'];

$output = [];
$items = $DB->getData("SELECT * FROM $table");
foreach($items as $e){
    if(preg_match("/$q/i", $e[$column])){
        foreach($e as $k => $v){
            $e[$k] = utf8_encode($v);
        }
        $output[count($output)] = $e;
    }
}
echo json_encode($output);