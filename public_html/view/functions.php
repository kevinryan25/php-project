<?php
function printTeachers(){
    global $DB;

    global $resultsPerPage;
    global $currentPage;


    $offset = $currentPage * $resultsPerPage;
    $limit = $resultsPerPage;
    $data = $DB->getData("SELECT * FROM teacher LIMIT $limit OFFSET $offset");
    foreach($data as $e){
    
    ?><tr>
        <td><input type="checkbox" /></td>
        <td class='id'><?php echo $e['id']; ?></td>
        <td class='name'><?php echo $e['name']; ?></td>
        <td class='salary'><?php echo $e['salary']; ?></td>
        <td class="controls">
            <a class="btn btn-tertiary btn-rounded" href='/controller/delete.php?table=teacher&id=<?php echo $e['id']; ?>'><i class="fas fa-trash-alt"></i></a>
            <button class="btn btn-quaternary btn-rounded edit"><i class="fas fa-edit"></i></button>
            <button class="btn btn-primary btn-rounded"><i class="fas fa-file-alt"></i></button>
            
        </td>
    </tr><?php

    }
}

function printSubjects(){
    global $DB;
    global $resultsPerPage;
    global $currentPage;

    $offset = $currentPage * $resultsPerPage;
    $limit = $resultsPerPage;
    $data = $DB->getData("SELECT * FROM subject LIMIT $limit OFFSET $offset");
    foreach($data as $e){
    
    ?><tr>
        <td><input type="checkbox" /></td>
        <td class='id'><?php echo $e['id']; ?></td>
        <td class='name'><?php echo utf8_encode($e['name']); ?></td>
        <td class='hrs'><?php echo $e['hrs']; ?></td>
        <td class="controls">
            <a class="btn btn-tertiary btn-rounded" href='/controller/delete.php?table=subject&id=<?php echo $e['id']; ?>'><i class="fas fa-trash-alt"></i></a>
            <button class="btn btn-quaternary btn-rounded edit"><i class="fas fa-edit"></i></button></td>
    </tr><?php

    }
}

function printCourse(){
    global $DB;
    global $resultsPerPage;
    global $currentPage;

    $offset = $currentPage * $resultsPerPage;
    $limit = $resultsPerPage;

    $data = $DB->query("SELECT teacher.name as teacher, teacher.id as teacherid, subject.name as subject, subject.id as subjectid, teacher.salary as salary, subject.hrs as hrs, teacher.salary * subject.hrs as payment, year FROM course INNER JOIN teacher ON course.teacher = teacher.id INNER JOIN subject ON course.subject = subject.id LIMIT $limit OFFSET $offset");
    foreach($data as $e){
        ?><tr>
            <td><input type="checkbox" /></td>
            <td class='teacher'><?php echo utf8_encode($e['teacher']); ?></td>
            <td class='subject'><?php echo utf8_encode($e['subject']); ?></td>
            <td class='salary'><?php echo $e['salary']; ?></td>
            <td class='hrs'><?php echo $e['hrs']; ?></td>
            <td class='payment'><?php echo $e['payment']; ?></td>
            <td class='year'><?php echo $e['year']; ?></td>
            <td class="controls">
                <a class="btn btn-tertiary btn-rounded" href='/controller/deleteCourse.php?teacher=<?php echo $e['teacherid']; ?>&subject=<?php echo $e['subjectid']; ?>&year=<?php echo $e['year']; ?>'><i class="fas fa-trash-alt"></i></a>
        </tr><?php
    }

}

$resultsPerPage;
function resultsPerPage(){
    global $resultsPerPage;
    $items = array(10, 25, 50, 100);
    $shown = isset($_GET['shown'])?$_GET['shown']:$items[0];
    $resultsPerPage = $shown;

    echo "<p><span>Afficher</span><select class='resultsperpage'>";
    foreach($items as $e){
        $attr = ($e == $shown)?'selected':'';
        echo "<option $attr>$e</option>";
    }
    echo "</select><span>résultats</span></p>";

}

/**
 * Afficher le menu de pagination (précédent - 12345 - suivant)
 */
$currentPage;
function pagination($table){
    global $DB;
    global $resultsPerPage;
    global $currentPage;

    $data = $DB->getData("SELECT COUNT(*) as len FROM $table");
    $len = $data[0][0];
    $pages = ($len / $resultsPerPage);
    $currentPage = isset($_GET['page'])?$_GET['page']:0;

    $dotted = false;
    echo '<div class="previous">';
    if($currentPage > 0)
        echo '<a class="btn btn-secondary" href="?page='.($currentPage-1).'&shown='.$resultsPerPage.'"><i class="fas fa-angle-left"></i></a>';
    echo '</div>';
    echo '<div class="pages">';
    for($i = 0; $i < $pages; $i++){
        $p = $i+1;
        if(abs($i - $currentPage) < 2){
            if($i == $currentPage){
                echo "<span class='btn btn-secondary active'>$p</span>";
            }else{
                echo "<a class='btn btn-secondary' href='?page=$i&shown=$resultsPerPage'>$p</a>";
            }
        }else if($i < 3){
            echo "<a class='btn btn-secondary' href='?page=$i&shown=$resultsPerPage'>$p</a>";
        }else if($i+2 >= $pages){
            echo "<a class='btn btn-secondary' href='?page=$i&shown=$resultsPerPage'>$p</a>";
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
        echo '<a class="btn btn-secondary" href="?page='.($currentPage+1).'&shown='.$resultsPerPage.'"><i class="fas fa-angle-right"></i></a>';
    echo '</div>';}