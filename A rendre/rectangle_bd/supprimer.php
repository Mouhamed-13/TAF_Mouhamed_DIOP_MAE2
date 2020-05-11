<?php
//on recupère le numero de l'employé qu'on veut supprimer et le mettre dans l'URL
require_once("RectangleManager.php");
$entityManager=new RectangleManager();


//$id=htmlspecialchars($_GET['rectangle']);

//requete pour supprimer un employé
$sql_supp=$entityManager->delete($id);

if($bdd->exec($sql_supp)){
    header("location:viewRectangle.php");
    exit();
}
else{
   echo "Une erreur s'est produite : ".$bdd->errorCode(); 
}

?>