<?php
$entityManager=new RectangleManager();

/*requetes pour pr�-afficher les informations propres � un employ� dans les champs du formulaire
  de modification*/
$sql_sv="select * from employes";

//on r�cup�re le num�ro de l'employ� sous forme de $_GET pour l'afficher dans l'URL des pages
$no_emp=$_GET['no_employe'];

$sql_fiche="select * from employes where no_employe='$no_emp'";
$query_sv=$bdd->query($sql_sv);
if($query_sv->errorCode()!='0000'){
  echo"Une erreur s'est produite�: ".$query_sv->errorInfo();
}
$query_fiche=$bdd->query($sql_fiche);
if($query_fiche->errorCode()!='0000'){
  echo"Une erreur s'est produite�: ".$query_fiche->errorInfo();
}
$sql=$query_fiche->fetch(PDO::FETCH_OBJ);
?>           
 <?php


///session_destroy();



 if( isset($_POST['btn_submit'])){

     if($_POST['btn_submit']==="calcul"){

     $validator=new Validator();

     $longueur=$_POST['longueur'];
     $largeur=$_POST['largeur'];

      
         $validator->compare($longueur,$largeur,'longueur','largeur');
         if($validator->is_valid()){
                   $rectangle=new Rectangle();
                   $rectangle->setLongueur($longueur);
                   $rectangle->setLargeur($largeur);
                   $entityManager->create($rectangle);

         
      }
      $errors=$validator->getErrors();

         if(isset($errors['longueur'])){
             $longueur="";
         }
         if(isset($errors['largeur'])){
             $largeur="";
         }

     }else{
         session_destroy();
     }
 }


?>



      <div class="container mt-5">

      <?php if(isset($errors['all'])){
          $largeur="";
          $longueur="";

      ?>
      <div class="alert alert-danger col-4">
          <strong>Erreur</strong> <?php echo $errors['all'];?>
      </div>
     <?php
     }
     ?>
          <form method="post" action="">
              <div class="form-group row">
                  <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                  <div class="col-6 ml-2">
                      <input type="text" class="form-control" name="longueur" value="<?=$longueur?>" id="inputName" placeholder="">
                  </div>
         <?php if(isset($errors['longueur'])){


         ?>
                  <div class="alert alert-danger col-4">
                      <strong>Erreur</strong> <?php echo $errors['longueur'];?>
                  </div>
          <?php
         }
         ?>

              </div>
              <div class="form-group row">
                  <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                  <div class="col-6 ml-3">
                      <input type="text" class="form-control" name="largeur" value="<?=$largeur?>" id="inputName" placeholder="">
                  </div>

                  <?php if(isset($errors['largeur'])){

                 ?>
                 <div class="alert alert-danger col-4">
                     <strong>Erreur</strong> <?=$errors['largeur'];?>
                 </div>
              <?php
              }
             ?>
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
   $rectangles=$entityManager->findAll();

   if(count($rectangles)>0 ) {
?>
     <table class="table container table-bordered">
         <thead>
             <tr>
                 <th>Demi-Perimetre</th>
                 <th>Preimetre</th>
                 <th>Surface</th>
                 <th>Diagonale</th>
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
         <?php
             foreach ($rectangles as $key=> $rectangle) {
                 
         ?>
             <tr>
                 <td scope="row"><?=$rectangle->demiPerimetre()?></td>
                 <td><?=$rectangle->perimetre()?></td>
                 <td><?=$rectangle->surface()?></td>
                 <td><?=$rectangle->diagonale()?></td>
                 <td>
                 <form method="post" action="">
                 <a name="modifie" id="" class="btn btn-success" href="#" role="button">Edit</a>
                 <a name="supprime" id="" class="btn btn-danger" href="#" role="button" onclick="verif()">Delete</a>
                 </form>
                 </td>
             </tr>

             <?php
             
             }
             
             if(isset($_POST['supprime']) && isset($_POST['longueur']) && isset($_POST['largeur'])){
                 $entityManager->delete($rectangle->getId());                 
             }

             ?>
             
             
         </tbody>
     </table>

 <?php
    }
?>
