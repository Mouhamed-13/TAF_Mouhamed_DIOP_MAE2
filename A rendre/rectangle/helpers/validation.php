<?php

// longueur et largeur numerics(entier ou reel)
function is_number($nombre,$erroMessage="Veuiller saisir un nombre"){
    if (is_numeric($nombre)) {
        return true;
    }else {
        return $erroMessage;
    }

}
//longueur largeur positifs
function is_positif($nombre,$erroMessage="Veuiller saisir un nombre positif"){
    $result=is_number($nombre);
    if ($result===true) {
        if ($nombre>=0) {
            return true;
        }else {
            return $erroMessage;
        }
    }else {
        return $result;
    }
    
}
//longueur sup à largeur
function compare($nombre1,$nombre2,$erroMessage="Longueur doit être supérieur à la largeur"){
    $result1=is_positif($nombre1);
    $result2=is_positif($nombre2);
    $error=[];
    if ($result1!==true) {
        $error['longueur']=$result1;
    }
    if ($result2!==true) {
        $error['largeur']=$result2;
    }
    if (count($error)==0) {
        if ($nombre1>$nombre2) {
            return true;
        }else {
            $error['all']=$erroMessage;
        }
    }
    return $error;
}
function is_empty($nbre,$sms=null){
    if(empty($nbre)){
        if($sms==null){
        $sms="Le nombre est obligatoire";
    }
    return $sms;
}else {
    return true;
}
}

/*function is_positif($nbre, $msg = "Le nombre doit être positif ")
{
    return (is_numeric($nbre)) ? ($nbre >  0 ? $msg : null) : is_number($nbre);
}*/

function tableau(){
    ?>

    <table class="table container table-bordered">
            <thead>
                <tr>
                    <th>Demi-Permitre</th>
                    <th>Perimetre</th>
                    <th>Surface</th>
                    <th>Diagonale</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($_SESSION as $cle => $resultat ) {
                        if($cle !== "id"){
                          
                ?>
                <tr>
                        
                    <td><?php if (isset($resultat["demi_perimetre"])) {
                echo $resultat["demi_perimetre"] ;
            }     
            ?></td>
                        
                    <td><?php if (isset($resultat["perimetre"])) {
                echo $resultat["perimetre"] ;
            }     ?></td>
                    
                    <td><?php if (isset($resultat["surface"])) {
                echo $resultat["surface"] ;
            }     ?></td>
                    
                    <td><?php if (isset($resultat["diagonale"])) {
                echo $resultat["diagonale"] ;
            }     ?></td>
                  
                </tr>
                    <?php }  
                    }
                    ?>
            </tbody>
        </table>
<?php
}


?>