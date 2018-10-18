<h1>Matières</h1>
<nav class="topmenu">
    <ul>
        <li><button class="btn btn-light"><i class="icon fas fa-upload"></i><span>Importer</span></button></li>
        <li><button class="btn btn-light"><i class="icon fas fa-upload"></i><span>Exporter</span></button></li>
        <li>
            <form class="searchbar"><input class="control" type="search" placeholder="Rechercher par nom ou par matricule" /><button
                    class="btn"><i class="fas fa-search"></i></button></form>
        </li>
    </ul>
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
                <td>Id</td>
                <td>Nom</td>
                <td>Volume horaire</td>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <?php printSubjects(); ?>
        </tbody>
    </table>
    <div class="pagination">    
        <?php pagination("subject"); ?>
    </div>
</section>