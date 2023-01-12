<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { #$_SERVER est un tableau contenant des informations comme les en-têtes, dossiers et chemins du script.

    $task1 = $_POST["task1"];
    $alltasks = json_decode(file_get_contents("todo.json"), true); # prendre le contennu de todo.json
    $alltasks[] = $task1;

    file_put_contents("todo.json", json_encode($alltasks)); # Lorsque l'utilisateur soumet les tâches, le script PHP traitera les données et les ajoutera au fichier JSON en utilisant les fonctions json_encode() et file_put_contents(). 
}
$alltasks = json_decode(file_get_contents("todo.json"), true); #le script PHP permet de lier les données du fichier JSON et les affiche sur la page web en utilisant la fonction json_decode().
foreach ($alltasks as $task) {

    echo "$task<br>" . "<button>Supprimer</button>" . "<br>" . "<br>"; #afficher la tache

}


if(isset($_POST['reset'])){
    $alltasks= ""; #marche pas
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Todolist</title>
</head>
<body>

<form method="post">
    <label for="task1">Tâche</label>
    <textarea type="text" id="task1" name="task1" rows="10" cols="52"> </textarea>
    <br>
    <input type="submit"  name="submit_button" value="Enregistrer">
    <br>
    <br>
    <input type="reset"  name="reset" value="Tout supprimer">
</form>
</body>
</html>