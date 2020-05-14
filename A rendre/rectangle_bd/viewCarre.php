
 <?php

   $entityManager=new CarreManager();

   if (isset($_GET['delCar'])) {
    $id = $_GET['delCar'];
    $entityManager->delete($id); 
    header('location: index.php?url=carre');
}

    if( isset($_POST['btn_submit'])){

        if($_POST['btn_submit']==="calcul"){

        $validator=new Validator();

        $longueur=$_POST['longueur'];
      
         
                   $validator->is_positif( $longueur,'longueur');
                   if($validator->is_valid()){
                      $carre=new Carre();
                      $id=$carre->getId();
                      $carre->setLongueur($longueur);
                      $entityManager->create($carre);
                   
           
         }
         $errors=$validator->getErrors();

            if(isset($errors['longueur'])){
                $longueur="";
            }

        }else{
            session_destroy();
        }
    }


 ?>



         <div class="container mt-5">

        
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
    $carres=$entityManager->findAll();

    if(isset($_GET['editCar'])){
        foreach ($carres as $key=> $carre) {
      if($_GET['editCar'] === $carres[$key]->getId() ){ ?>

            <form action="" method="post">
            <input type="hidden" name="typeCar" value="<?php echo $id; ?>" />
            
            <input type="text" name="longueur" value="<?= $carres[$key]->getLongueur() ?>" />
            <input type="submit" class="btn btn-success" value="valider" />
            <a href="index.php?url=carre" class=btn btn-danger>Annuler</a>
         
            </form> 
      <?php }
      }
    }

    if(isset($_POST['typeCar'])){
        $id=$carres[$key]->getId();
        $entityManager->upda($id,$_POST['longueur']);


    }

  
      if(count($carres)>0 ) {
?>
        <table class="table container table-bordered">
            <thead>
                <tr>
                    <th>Demi-Perimetre</th>
                    <th>Perimetre</th>
                    <th>Surface</th>
                    <th>Diagonale</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($carres as $key=> $carre) {
                   
            ?>
                <tr>
                    <td scope="row"><?=$carre->demiPerimetre()?></td>
                    <td><?=$carre->perimetre()?></td>
                    <td><?=$carre->surface()?></td>
                    <td><?=$carre->diagonale()?></td>
                    <td>
                    <a name="modifi" id="" class="btn btn-success" href="index.php?editCar=<?php echo $carres[$key]->getId(); ?>" role="button">Edit</a>
                    <a name="supprim" id="" class="btn btn-danger" href="index.php?delCar=<?php echo $carres[$key]->getId(); ?>" role="button" onclick="verif()">Delete</a>
                    </td>
                </tr>

                <?php
              
                }
                ?>

            </tbody>
        </table>

    <?php
       }
 ?>
