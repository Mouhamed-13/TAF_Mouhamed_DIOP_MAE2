<?php
session_start();
require_once("/helpers/validation.php");
require_once("/controllers/rectangleController.php");
if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']==="/A%20rendre/rectangle/rectangle.php"){
 // On écrit un cookie
$tabresult=tableau();
$tabresult_serialize = serialize($tabresult);
setcookie('Resultat',$tabresult_serialize, time() + 365*24*3600);
$tab_cookies = unserialize($_COOKIE['Resultat']);
}

// Et SEULEMENT MAINTENANT, on peut commencer à écrire du code html

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- 
    1) Saisir la longueur et la largeur d'un rectangle à partir d'un formulaire
        Longueur positive
        Largeur positive
        Longueur> Largeur
        Longueur et largeur doivent être numéric(entier,réel)
    2) Traitements
        -calculer led Dp
        -calculer le P
        -calculer la S
        -calculer la Diagonale 
        
        //Ouvrir session_start()
        //fermer session_destroy()
        //$_SESSION est un tableau associatif

        //Nomination
        Classe => MaClasse
        methode => maMethode
        attributs => monattribut
-->
        
<?php
    
    $errors=[];
    $resultat=[];
    $longueur="";
    $largeur="";
    
    //ouvrir la session
    /*echo '<pre>';
                var_dump($_SESSION);
                echo '</pre>';*/
    
    
    if (!isset($_SESSION['id'])) {
        $_SESSION['id']=0;
    }
    
    if( isset($_POST['btn_submit'])){

       if($_POST['btn_submit']==="calcul"){
        $longueur=$_POST['longueur'];
        $largeur=$_POST['largeur'];
        
       $result=is_empty($longueur);
       if ($result!==true) {
           $errors['longueur']=$result;
           
       }

       $result=is_empty($largeur);
       if ($result!==true) {
           $errors['largeur']=$result;
            

       }
       if (count($errors)==0) {
           $result=compare($longueur,$largeur);
           if($result===true){
                $resultat["demi_perimetre"]=demi_perimetre($longueur,$largeur);
                $resultat["perimetre"]=perimetre($longueur,$largeur);
                $resultat["surface"]=surface($longueur,$largeur);
                $resultat["diagonale"]=diagonale($longueur,$largeur);
                $id=$_SESSION['id'];
                $id++;
                $_SESSION["Resultat".$id]=$resultat;
                $_SESSION['id']=$id;
                

           }else{
                $errors=$result;
                
           }
           
       }
        if (isset($errors['longueur'])) {
        $longueur="";
        }
        if (isset($errors['largeur'])) {
            $largeur="";
        }
    }else{
        session_destroy();
    }
}
    
?>

<div class="container">
<?php  if (isset($errors['all'])) {
    $largeur="";
    $longueur="";
    
    
                ?> 
                    
                    
                      <div class="alert alert-danger col-6">
                          <strong>Erreur</strong> <?php echo $errors['all'];  ?>
                      </div>
                      
            <?php } ?>
          <form method="post" action=" " >
              <div class="form-group row">
                  <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                  <div class="col-6 ml-2">
                      <input type="text" class="form-control" name="longueur" value="<?=$longueur?>" id="inputName" placeholder="">
                  </div>
            <?php  if (isset($errors['longueur'])) {
                 
            ?> 
                
                
                  <div class="alert alert-danger col-4">
                      <strong>Erreur</strong> <?php echo $errors['longueur'];  ?>
                  </div>
                  
        <?php } ?>
              </div>
              <div class="form-group row">
                  <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                  <div class="col-6 ml-3">
                      <input type="text" class="form-control" name="largeur" value="<?=$largeur?>" id="inputName" placeholder="">
                  </div>
                  <?php  if (isset($errors['largeur'])) {
                
                ?> 
                      <div class="alert alert-danger col-4">
                          <strong>Erreur</strong> <?php echo $errors['largeur'];  ?>
                      </div>
            <?php } ?>
              </div>
              <div class="form-group row">
                  <div class="offset-sm-2 col-sm-2">
                      <button type="submit" name="btn_submit" value="calcul" class="btn btn-primary">Calculer</button>
                  </div>
                  <div class="col-sm-2">
                      <button type="submit" name="btn_submit" value="reinitialisation" class="btn btn-secondary">Reinitialiser</button>
                  </div>
              </div>
          </form>
      </div>
      <?php 
        if (isset($_POST['btn_submit']) && $_POST['btn_submit']==="calcul" && count($errors)===0) {

            tableau(); 
        
    }
      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  </body>
</html>