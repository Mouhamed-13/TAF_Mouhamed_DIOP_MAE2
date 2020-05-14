<!--
   1) Saisir la longueur et largeur d'un Rectangle à partir d'un formulaire
         Longueur et Largueur doivent etre numeric(entier,reel)
         Longueur positif
         Largeur positif
         Longueur> Largeur

   2)Traitements=>U.C
      -Caluler le Dp
      -Calculer le P
      -Calculer la S
      -Calculer la Diagonale


      //Premire Heure
         1-Afficher les erreurs
         2-Garder les Bonnes Valeurs et effacer les Mauvaises Valeurs
         3-Session => $_SESSION
            //Ouvrir session_start()
            //Fermer la Session session_destroy()
            // $_SESSION est un tableau Associatif

      //Deuxieme Heure

      //POO en PHP=>Rectangle
         1-Classe(Concrete ou Abstraite ou Interface)
            a)Attribut(Instance ou Classe)
            a)Methode(Instance ou Classe)
         2-Objet

         //Nommination
           Classe => MaClasse
           methode=> maMethode
           attribut=> monattribut

 -->
 <?php

    $entityManager=new RectangleManager();
   ///session_destroy();

   /*if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    var_dump($entityManager->findById($id));
   
        /*$n = mysqli_fetch_array($record);
        $longueur = $n['longueur'];
        $largeur = $n['largeur'];
        //$entityManager->update($id); 
        $longueur = $_POST['longueur'];
        $largeur = $_POST['largeur'];
    
   header('location: index.php');
    }*/
    


 

    if (isset($_GET['delRec'])) {
        $id = $_GET['delRec'];
        $entityManager->delete($id); 
        header('location: index.php?url=rectangle');
    }


    if( isset($_POST['btn_submit'])){

        if($_POST['btn_submit']==="calcul"){

        $validator=new Validator();

        $longueur=$_POST['longueur'];
        $largeur=$_POST['largeur'];

         
            $validator->compare($longueur,$largeur,'longueur','largeur');
            if($validator->is_valid()){
                    /* 
                     $rectangle=new Rectangle();
                     $rectangle->setLongueur($longueur);
                     $rectangle->setLargeur($largeur);
                     */   
                      $rectangle=new Rectangle();
                      $id=$rectangle->getId();
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
      if(isset($_GET['editRec'])){
        foreach ($rectangles as $key=> $rectangle) {
      if($_GET['editRec'] === $rectangles[$key]->getId() ){ ?>

            <form action="" method="post">
            <input type="hidden" name="type" value="<?php echo $id; ?>" />
            
            <input type="text" name="longueur" value="<?= $rectangles[$key]->getLongueur() ?>" />
            <input type="text" name="largeur" value="<?= $rectangles[$key]->getLargeur() ?>" />
            <input type="submit" class="btn btn-success" value="valider" />
            <a href="index.php?url=rectangle" class=btn btn-danger>Annuler</a>
         
            </form> 
      <?php }
      }
    }

    if(isset($_POST['type'])){
        $id=$rectangles[$key]->getId();
        $entityManager->upda($id,$_POST['longueur'],$_POST['largeur']);


    }



      if(count($rectangles)>0 ) {
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
                foreach ($rectangles as $key=> $rectangle) {
                   
            ?>
                <tr>
                    <td scope="row"><?=$rectangle->demiPerimetre()?></td>
                    <td><?=$rectangle->perimetre()?></td>
                    <td><?=$rectangle->surface()?></td>
                    <td><?=$rectangle->diagonale()?></td>
                    <td>
                    <a name="modifie" id="" class="btn btn-success" href="index.php?editRec=<?php echo $rectangles[$key]->getId(); ?>" role="button">Edit</a>
                    <a name="supprime" id="" class="btn btn-danger" href="index.php?delRec=<?php echo $rectangles[$key]->getId(); ?>" role="button" onclick="verif()">Delete</a>
                    
                    </td>   
                </tr>

                <?php
                   /*<?= $rectangles[$key]->getId()  ?>*/
                
                   
                }
   
                ?>

            </tbody>
        </table>

    <?php
       }
 ?>
