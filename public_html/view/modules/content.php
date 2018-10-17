<?php
$URI = $_SERVER['REQUEST_URI'];
$REFERER = $_SERVER['HTTP_REFERER'];
if(preg_match('/^\/(index\.(php|html))?$/', $URI)){
    include "view/modules/home.php";
}else if(preg_match('/\/teacher/', $URI)){
    include "view/modules/teacher.php";
}else if(preg_match('/\/subject/', $URI)){
    include "view/modules/subject.php";
}
