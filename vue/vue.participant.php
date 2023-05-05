<?php
include "./vue/entete.html.php";
?>


<div class="form_inscription">
    <h3>Inscription aux sessions</h3>
    <form class="form_content" method="POST">

        <div class="container_congressiste">
            <select class="zoneText form-control" required name="congressiste">
                <option selected value="">Saisissez un congressiste</option>
                <?php
                foreach ($c->data["liste"] as $ligne) {
                ?>
                    <option value=<?php echo $ligne->NUM_CONGRESSISTE; ?>>
                        <?php echo  $ligne->PRENOM_CONGRESSISTE, " ", $ligne->NOM_CONGRESSISTE; ?></option>
                <?php
                }
                ?>
            </select><br />

            <select class="zoneText form-control" required name="session">
                <option selected value="">Saisissez une session</option>
                <?php
                foreach ($c->data["value"] as $ligne) {
                ?>
                    <option value=<?php echo $ligne->NUM_SESSION; ?>><?php echo $ligne->NOM_SESSION; ?></option>
                <?php
                }
                ?>
            </select><br />


            <br>
            <input type="submit" class="btn btn-primary" name="todo" value="Enregistrer" />
        </div>
</div>
</form>
<br />

<form class="form_session" method="POST">
    <h3>Visualiser les sessions d'un participant</h3>
    <div class="container_session">
        <select class="zoneText form-control" required name="congressiste2">
            <option selected value="">Saisissez un congressiste</option>
            <?php
            //parcours du tableau d'objets
            foreach ($c->data["liste"] as $ligne) {

            ?>
                <!--affichage des données-->
                <option value=<?php echo $ligne->NUM_CONGRESSISTE; ?>>
                    <?php echo  $ligne->PRENOM_CONGRESSISTE, " ", $ligne->NOM_CONGRESSISTE; ?></option>
            <?php

            }
            ?>
            
        </select>
</form>      
        <br>
        <td>
            <br>
                
         
            <input type="submit" class="btn btn-primary" name="todo" value="Rechercher" />
        </td>

        <br>
        <br>
        </br>

        <?php
        //si le bouton rechercher est cliqué
        if (isset($_POST['congressiste2'])) {



        ?>
        <form>
            //affichage des données
            <table class="table table-striped table-hover">
                <tr class="table-active">


                    <td>Nom session</td>
                    <td></td>
                </tr>

                <?php
                //parcours du tableau d'objets
                foreach ($c->data["listeCongressisteParticipe"] as $ligne) {

                ?>

                    <tr>
                        <!--affichage des données-->
                        <td><?php echo $ligne->NOM_SESSION; ?></td>
                        <td><a class="btn" id="update" href="index.php?controleur=participant&idSuppr=<?php echo $ligne->NUM_SESSION; ?>">ANNULER</a></td>
                    <?php
                }
                    ?>
                    </tr>
            </table>

</form>

<?php
        }
        include "./vue/pied.html.php";
?>