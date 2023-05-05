<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css" type="text/css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ANABASE</title>
</head>

<body>



    <?php
    include "./controleur/controleurPrincipal.php";
    include "./vue/vue.menu.php";

    //--- controleur
    if (isset($_REQUEST["controleur"])) {
        $controleur = $_REQUEST["controleur"];
    } else {
        $controleur = "defaut";
    }

    // -- controleur principal
    $fichier = controleurPrincipal($controleur);
    include "./controleur/$fichier";

    // -- extraction du nom du controleur
    $pos1 = strpos($fichier, ".");
    $pos2 = strpos($fichier, ".", $pos1 + 1);
    $controleur = substr($fichier, $pos1 + 1, $pos2 - $pos1 - 1);

    // -- instanciation du controleur 
    //    (par exemple : $class = "Controleur_hello" )
    $class = "Controleur_" . $controleur;
    $c = new $class();

    // -- renseigne le champ post du controleur instancié	
    $c->post = $_POST;
    $c->get = $_GET;
    //--- todo : callback
    //    (par exemple : $callback = "todo_hello" )
    if (isset($_REQUEST["todo"])) {
        $todo = $_REQUEST["todo"];
    } else {

        $todo = "initialiser";
    }

    // -- appel de la méthode todo du controleur
    $callback = "todo_" . $todo;
    $call = call_user_func_array(array($c, $callback), array());

    include("./vue/vue." . $c->vue . ".php");
    ?>
</body>

</html>