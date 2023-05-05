<div class="modif">
    <h2>Liste des sessions</h2>
    <form action="?controleur=modifier" method="POST">
        <table class="table  table-dark table-striped-columns">
            <tr class="Session">
                <td>Date de session</td>
                <td>Heure de Session</td>
                <td>Prix Session</td>
                <td>Nom Session</td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <?php
                foreach ($c->data["value"] as $uneSession) {

                ?>

                    <td><?php echo $uneSession->DATE_SESSION; ?></td>
                    <td><?php echo $uneSession->HEURE_SESSION; ?></td>
                    <td><?php echo $uneSession->PRIX_SESSION; ?></td>
                    <td><?php echo $uneSession->NOM_SESSION; ?></td>



                    <td><a class="btn" href="index.php?controleur=modifier&idSession=<?php echo $uneSession->NUM_SESSION; ?>">Supprimer</a></td>
                    <td><a class="btn" id="update" href="index.php?controleur=modifier&idSessionM=<?php echo $uneSession->NUM_SESSION; ?>">Modifier</a></td>
                    <br>
            </tr>
            <?php
                    if (isset($_GET['idSessionM'])) {
                        if ($_GET['idSessionM'] == $uneSession->NUM_SESSION) {



            ?>
                    <tr>
                        <input type="HIDDEN" name="numSession" value="<?php echo $uneSession->NUM_SESSION; ?>">
                        <td><input type="date" name="dateSession" value="<?php echo $uneSession->DATE_SESSION; ?>"></td>
                        <td><input type="time" name="heureSession" value="<?php echo $uneSession->HEURE_SESSION; ?>"></td>
                        <td><input type="text" name="prixSession" value="<?php echo $uneSession->PRIX_SESSION; ?>"></td>
                        <td><input type="text" name="nomSession" value="<?php echo $uneSession->NOM_SESSION; ?>"></td>
                        <td><input type="submit" class="btn btn-primary" name="todo" value="Sauvegarder" /></td>
                        <td></td>
                    </tr>

        <?php
                        }
                    }
                }
        ?>
    </form>
</div>
</table>