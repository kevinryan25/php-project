<h1>Bulletin de paie</h1>
<?php
$teacher = $_GET['teacher'];
if(empty($_GET['year'])) :
?>
    <div>
        <p>Sélectionnez une année :</p>
        <a class='btn btn-secondary' href='?teacher=<?php echo $teacher; ?>&year=2015'>2015</a>
        <a class='btn btn-secondary' href='?teacher=<?php echo $teacher; ?>&year=2016'>2016</a>
        <a class='btn btn-secondary' href='?teacher=<?php echo $teacher; ?>&year=2017'>2017</a>
        <a class='btn btn-secondary' href='?teacher=<?php echo $teacher; ?>&year=2018'>2018</a>
    </div>
<?php
else :
    $year = $_GET['year'];
?>
<h2><?php printTeacherName($teacher); ?></h2>
<h2><?php echo $year; ?></h2>
<br/><br/><br/><br/><br/>
<table>
    <thead>
        <th>Matière</th>
        <th>Volume horaire</th>
        <th>Salaire</th>
    </thead>
    <tbody>
<?php
    printSalaryTable($teacher);
?>
    </tbody>
</table>

<?php
endif;

