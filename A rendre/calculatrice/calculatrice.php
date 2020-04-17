<?php session_start();  ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
<?php
      require_once("/helpers/fonctions.php");
      require_once("/controllers/base.php");
      //var_dump($_POST);
			$errors=[];
      $resultat="";
      $nbre1="";
      $nbre2="";
      
      if (!isset($_SESSION['id'])) {
        $_SESSION['id']=0;
    }
			if(isset($_POST['btn_submit'])){

        if($_POST['btn_submit']==="calcul"){
					$nbre1=$_POST['nbre1'];
					$nbre2=$_POST['nbre2'];
          $op=$_POST['op'];	

          
          
          $result=is_empty($nbre1);
          if ($result!==true) {
              $errors['nbre1']=$result;
              
          }

          $result=is_empty($nbre2);
          if ($result!==true) {
              $errors['nbre2']=$result;
                

          }
          
          if (count($errors)==0) {
              $result1=is_number($nbre1);
              $result2=is_number($nbre2);
              if($result1===true && $result2===true){
              
                if ($op==="") {
                $errors['operat']="Veuiller selectionner un operateur";
              }else{

              
                $resultat=calculatrice($nbre1,$nbre2,$op);
                $id=$_SESSION['id'];
                $id++;
                $_SESSION["Resultat".$id]=$resultat;
                $_SESSION['id']=$id;
              }
                

           }else{
                $errors['nbre1']=$result1;
                $errors['nbre2']=$result2;

                
           }
           
       }
        if (isset($errors['nbre1'])) {
        $nbre1="";
        }
        if (isset($errors['nbre2'])) {
            $nbre2="";
        }
      }else{
        session_destroy();
    }

			}else{
				$errors[]="Veuillez cliquer sur le Bouton";
			}
?>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Boottrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="card m-5">

      <div class="card-body">
          <h4 class="card-title text-center">Calculatice</h4>
          <p class="card-text ">
                <div class="col-3"></div>
                <div class="col-6 pl-5">
                <form action="" method="post">

                        <div class="form-group">
                        <label for="">Nombre1</label>
                        <input type="text" class="form-control" name="nbre1" value="<?= $nbre1 ?>" id="" aria-describedby="helpId" placeholder="">
                        
                        <?php  if (isset($errors['nbre1'])) {
                 
                 ?> 
                     
                     
                       <div class="alert alert-danger col-6">
                           <strong>Erreur</strong> <?php echo $errors['nbre1'];  ?>
                       </div>
                       
                        <?php } ?>
                        </div>
                        <div class="form-group">
                        <label for="">Nombre2</label>
                        <input type="text" class="form-control" name="nbre2" value="<?= $nbre2 ?>" id="" aria-describedby="helpId" placeholder="">
                        
                        <?php  if (isset($errors['nbre2'])) {
                 
                 ?> 
                     
                     
                       <div class="alert alert-danger col-6">
                           <strong>Erreur</strong> <?php echo $errors['nbre2'];  ?>
                       </div>
                       
                       <?php } ?>
                        </div>

                        <div class="form-group">
                        <label for="">Operateur</label>
                        <select class="form-control" name="op" id="">
                            <option value="">Selectionner un Operateur</option>
                            <option value="+">Addition</option>
                            <option value="-">Soustraction</option>
                            <option value="*">Multiplication</option>
                            <option value="/">Division</option>
                        </select>
                        <?php  if (isset($errors['operat'])) {
                 
                       ?> 
                     
                     
                       <div class="alert alert-danger col-8">
                           <strong>Erreur</strong> <?php echo $errors['operat'];  ?>
                       </div>
                       
                       <?php } ?>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" value="calcul" name="btn_submit" class="btn btn-primary float-right">Calculer</button>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="btn_submit" value="reinitialisation" class="btn btn-secondary float-left">Reinitialiser</button>
                            </div>
                        </div>

                        </form>

                </div>
                <div class="col-3"></div>
          </p>
      </div>
  </div>

<div class="card text-left ml-5">

  <div class="card-body">
    <h4 class="card-title">Resultat:<?=$resultat;?> </h4>

  </div>
</div>
<?php 
        if (isset($_POST['btn_submit']) && $_POST['btn_submit']==="calcul" && count($errors)===0) {

          ?>

            <table class="table container table-bordered">
              <tbody>
                <tr>
                <?php 
                    foreach ($_SESSION as $cle => $resultat ) {
                        if($cle !== "id"){
                          
                ?>
                  <td><?php echo $cle ?></td>
                  <td><?=$resultat;?></td>

                  
                </tr>
                <?php }  
                    }
                    ?>
              </tbody>
            </table>
<?php        
    }
      ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>