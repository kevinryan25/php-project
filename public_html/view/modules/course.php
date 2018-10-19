<h1>Matières</h1>
<nav class="topmenu">

</nav>
<section>
    <div class="row-count">
        <?php resultsperPage(); ?>
    </div>
    <div class="pagination">
        <?php pagination("subject"); ?>
    </div>
    <div class="selection-controls">
        <?php include 'view/modules/insert-form.php'; ?>
    </div>

    <table>
        <thead>
            <tr>
                <td><input type="checkbox" /></td>
                <td>Professeur</td>
                <td>Matière</td>
                <td>Taux horaire</td>
                <td>Volume horaire</td>
                <td>Salaire</td>
                <td>Année</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php printCourse(); ?>
        </tbody>
    </table>

    <div class="pagination">    
        <?php pagination("subject"); ?>
    </div>
</section>