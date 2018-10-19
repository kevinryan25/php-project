<?php
$URI = $_SERVER['REQUEST_URI'];
$REFERER = $_SERVER['HTTP_REFERER'];
if(preg_match('/^\/(index\.(php|html))?$/', $URI)){
    header('Location: /about');
}else if(preg_match('/\/about/', $URI)){
    include "view/modules/about.php";
}else if(preg_match('/\/teacher/', $URI)){
    include "view/modules/teacher.php";
}else if(preg_match('/\/subject/', $URI)){
    include "view/modules/subject.php";
}else if(preg_match('/\/course/', $URI)){
    include "view/modules/course.php";
}
