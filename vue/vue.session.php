<?php
include "./vue/entete.html.php";
date_default_timezone_set('Europe/Paris');
$date = date('d-m-Y');
?>
<div class="mb-3 centre">
    <h2>Formulaire session</h2>
    <div class="mb-3 centreElement">
        
        <form class="form_content" action="./?controleur=session&todo=enregistrer" method="POST">
            
            <div class="mb-3 container">
                <input class="zoneText form-control" type="text" required name="nomSession" placeholder="Saisir le nom de la session" value="<?= $c->post["nomSession"] ?>" /><br />
                <input class="zoneText form-control" type="date" required name="dateSession" value="<?= $c->post["dateSession"] ?>" /><br />
                <input class="zoneText form-control" type="time" required name="heureSession" value="<?= $c->post["heureSession"] ?>" /><br />
                <input class="zoneText form-control" type="text" required name="prixSession" placeholder="Saisir le prix de la session" value="<?= $c->post["prixSession"] ?>" /><br />
                <br>
                <input type="submit" class="btn btn-primary" name="todo" value="Enregistrer" />

            </div>
    </div>
    </form>

</div>

</form>

<?php
include "./vue/pied.html.php";
?>