<?php

function controleurPrincipal($action){
    $lesActions = array();

    $lesActions["defaut"] = "controleur.session.php";
    $lesActions["session"] = "controleur.session.php";
    $lesActions["modifier"] = "controleur.modifier.php";
    $lesActions["participant"] = "controleur.participant.php";
 
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>