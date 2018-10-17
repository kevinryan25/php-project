<?php
function printTeachers(){
    global $DB;

    $data = $DB->getData("SELECT * FROM teacher");
    foreach($data as $e){
    
    ?><tr>
        <td><input type="checkbox" /></td>
        <td> <?php echo $e['id']; ?></td>
        <td> <?php echo utf8_encode($e['name']); ?></td>
        <td> <?php echo $e['salary']; ?> €/hr</td>
        <td class="controls"><button class="btn btn-tertiary btn-rounded"><i class="fas fa-trash-alt"></i></button><button
                class="btn btn-quaternary btn-rounded"><i class="fas fa-edit"></i></button><button class="btn btn-primary btn-rounded"><i
                    class="fas fa-file-alt"></i></button></td>
    </tr><?php

    }
}

function printSubjects(){
    global $DB;

    $data = $DB->getData("SELECT * FROM subject");
    foreach($data as $e){
    
    ?><tr>
        <td><input type="checkbox" /></td>
        <td> <?php echo $e['id']; ?></td>
        <td> <?php echo utf8_encode($e['name']); ?></td>
        <td class="controls"><button class="btn btn-tertiary btn-rounded"><i class="fas fa-trash-alt"></i></button><button
                class="btn btn-quaternary btn-rounded"><i class="fas fa-edit"></i></button></td>
    </tr><?php

    }
}

function resultsPerPage($table){
    $resultsPerPage = 10;
}

/**
 * Afficher le menu de pagination (précédent - 12345 - suivant)
 */
function pagination($table){
    global $DB;
    $resultsPerPage = 10;

    $data = $DB->getData("SELECT COUNT(*) as len FROM $table");
    $len = $data[0][0];
    $pages = ($len / $resultsPerPage);
    $currentPage = ($_GET['page'])
}