<h1>Matières</h1>
<nav class="topmenu">
    <ul>
        <li><button class="btn btn-light"><i class="icon fas fa-upload"></i><span>Importer</span></button></li>
        <li><button class="btn btn-light"><i class="icon fas fa-upload"></i><span>Exporter</span></button></li>
        <li>
            <form class="searchbar"><input class="control" type="search" placeholder="Rechercher par nom" /><button
                    class="btn"><i class="fas fa-search"></i></button></form>
        </li>
    </ul>
</nav>
<section>
    <div id="row-count">
        <p><span>Afficher</span><select>
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select><span>résultats</span></p>
    </div>
    <div id="pagination">
        <?php pagination("subject"); ?>
    </div>
    <div id="selection-controls"><button class="btn btn-tertiary"><i class="icon fas fa-trash-alt"></i><span>Supprimer
                la sélection</span></button><button class="btn btn-primary"><i class="icon fas fa-plus"></i><span>Ajouter
                un élément</span></button></div>
    <table>
        <thead>
            <tr>
                <td><input type="checkbox" /></td>
                <td>Id</td>
                <td>Nom</td>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <?php printSubjects(); ?>
        </tbody>
    </table>
    <div id="pagination">
        <div class="previous"><button class="btn btn-secondary"><i class="fas fa-angle-left"></i></button></div>
        <div class="pages"><span class="btn btn-secondary active">1</span><span class="btn btn-secondary">2</span><span
                class="btn btn-secondary">3</span><span class="btn btn-secondary disabled">...</span><span class="btn btn-secondary">23</span><span
                class="btn btn-secondary">24</span></div>
        <div class="next"><button class="btn btn-secondary"><i class="fas fa-angle-right"> </i></button></div>
    </div>
</section>