<form method='post' action='/controller/insert.php?table=teacher'>
    <p>
        <label for='name'>Nom :</label>
        <input class='control' id='name' name='name' type='text' placeholder='John Doe'/>
    </p>
    <p>
        <label for='name'>Taux horaire en €/hr :</label>
        <input class='control' id='salary' name='salary' type='number' placeholder='18'/>
    </p>
    <p>
        <button class="btn btn-primary">
            <i class="icon fas fa-plus"></i>
            <span>Ajouter un élément</span>
        </button>
    </p>
</form>