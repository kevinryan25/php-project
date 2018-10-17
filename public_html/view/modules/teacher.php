<h1>Professeur</h1>
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
        <?php pagination("teacher"); ?>
    </div>
    <div class="selection-controls"><button class="btn btn-tertiary"><i class="icon fas fa-trash-alt"></i><span>Supprimer
                la sélection</span></button><button class="btn btn-primary"><i class="icon fas fa-plus"></i><span>Ajouter
                un élément</span></button></div>
    <table>
        <thead>
            <tr>
                <td><input type="checkbox" /></td>
                <td>Id</td>
                <td>Nom</td>
                <td>Taux horaires</td>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <?php printTeachers(); ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php pagination("teacher"); ?>
    </div>
</section>