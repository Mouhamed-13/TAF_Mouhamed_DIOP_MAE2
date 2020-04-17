<?php
//Tester si un nombre est vide
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
function is_number($nombre,$erroMessage="Veuiller saisir un nombre"){
    $result=is_empty($nombre);
    if ($result===true) {
    if (is_numeric($nombre)) {
        return true;
    }else {
        return $erroMessage;
    }
    }else {
        return $result;
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



?>