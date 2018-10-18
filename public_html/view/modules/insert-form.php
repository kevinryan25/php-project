<form method='post' action='/controller/insert.php?table=<?php
        if(preg_match('/\/teacher/', $URI)){
            echo "teacher";
        }else if(preg_match('/\/subject/', $URI)){
            echo "subject";
        }
    ?>'>
    <?php if(preg_match('/\/teacher/', $URI)) : ?>
        <p>
            <label for='name'>Nom :</label>
            <input class='control' id='name' name='name' type='text' placeholder='John Doe'/>
        </p>
        <p>
            <label for='name'>Taux horaire en €/hr :</label>
            <input class='control' id='salary' name='salary' type='number' placeholder='18'/>
        </p>
    <?php elseif(preg_match('/\/subject/', $URI)) : ?>
        <p>
            <label for='name'>Matière :</label>
            <input class='control' id='name' name='name' type='text' placeholder='Nom de la matière'/>
        </p>
        <p>
            <label for='name'>Volume horaire :</label>
            <input class='control' id='hrs' name='hrs' type='number' placeholder='8'/>
        </p>
    <?php endif; ?>

    <p>
        <button class="btn btn-primary">
            <i class="icon fas fa-plus"></i>
            <span>Ajouter un élément</span>
        </button>
    </p>
</form>