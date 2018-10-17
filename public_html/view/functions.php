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
    $currentPage = isset($_GET['page'])?$_GET['page']:0;

    $dotted = false;
    echo '<div class="previous">';
    if($currentPage > 0)
        echo '<a class="btn btn-secondary" href="?page='.($currentPage-1).'"><i class="fas fa-angle-left"></i></a>';
    echo '</div>';
    echo '<div class="pages">';
    for($i = 0; $i < $pages; $i++){
        $p = $i+1;
        if(abs($i - $currentPage) < 2){
            if($i == $currentPage){
                echo "<span class='btn btn-secondary active'>$p</span>";
            }else{
                echo "<a class='btn btn-secondary' href='?page=$i'>$p</a>";
            }
        }else if($i < 3){
            echo "<a class='btn btn-secondary' href='?page=$i'>$p</a>";
        }else if($i+2 >= $pages){
            echo "<a class='btn btn-secondary' href='?page=$i'>$p</a>";
        }else{
            if($dotted) continue;
            echo "<span class='btn btn-secondary btn-disabled'>...</span>";
            $dotted = true;
            continue;
        }
        $dotted = false;
    }
    echo '</div>';

    echo '<div class="next">';
    if($currentPage+1 < $pages)
        echo '<a class="btn btn-secondary" href="?page='.($currentPage+1).'"><i class="fas fa-angle-right"></i></a>';
    echo '</div>';}