<?php
class Validator {
    
    private $errors=[];

    public function getErrors(){
           return $this->errors;
    }

    public function is_valid(){
       return count($this->errors)===0;
    }

    public function  is_empty($nbre,$key,$sms=null){
        if(empty($nbre)){
            if($sms===null){
                $sms="Le Champs est Obligatoire";
            }
            $this->errors[$key]= $sms;
    
            }
        }

 // Longueur et Largueur doivent etre numeric(entier,reel)
 public function is_number($nombre,$key,$errorMessage="Veuiller saisir un nombre"){
    $this->is_empty($nombre,$key);
    if($this->is_valid() || !isset($this->errors[$key])){
        if(!is_numeric($nombre)){
        $this->errors[$key]= $errorMessage;
        }
    }
}

/*
  Longueur positif
  Largeur positif
*/
public function is_positif($nombre,$key,$errorMessage="Veuiller saisir un nombre positif"){
                   $this->is_number($nombre,$key);
                   if($this->is_valid() || !isset($this->errors[$key])){
                      if($nombre<=0){
                        $this->errors[$key]= $errorMessage;
                      }
                    }
                   
}

/**
*   Longueur> Largeur
*/
//compare()
//Nbre1 =>plus grand
//Nbre2 =>plus petit
public function compare($nbre1,$nbre2,$key1,$key2,$errorMessage="Longueur doit superieur à la Largeur"){
    $this->is_positif($nbre1,$key1);
    $this->is_positif($nbre2,$key2);
   if($this->is_valid() && !isset($this->errors[$key1]) && !isset($this->errors[$key2])){
           if($nbre1<=$nbre2){
              $this->errors['all']=$errorMessage;
           }
   }

}


//Expressions Régulières
    public function  is_email($valeur,$key,$errorMessage="L'email saisi n'est pas valide"){
        $this->is_empty($valeur,$key);
        if($this->is_valid()){
            if(!(preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $valeur))){
  
                $this->errors[$key]= $errorMessage;
            }
            
            }
    }

    //9chiffres , commence par 77,78,75,76,70
    public function  is_telephone($valeur,$key,$errorMessage="Le téléphone saisi n'est pas valide"){
        $this->is_empty($valeur,$key);
        if($this->is_valid() || !isset($this->errors[$key])){
            $debut=substr($valeur, 0, 2);
            
            if(!($debut=="77" || $debut=="78" || $debut=="75" || $debut=="76" || $debut=="70")){
                    $this->errors[$key]= $errorMessage;
            }
            
            }
    
    }
}



/*Le contrôle accepte tous les types de format de téléphone :
    0477558899, 04-77-55-88-99, 04 77 55 88 99 ou 04/77/55/88/99
    
    $tel = "04-77-55-88-99";
    if ( preg_match ( " #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# " , $tel ) ){
        echo "Le téléphone est valide";

        Dans ce cas précis le point d’interrogation (?) signifie ou, donc les caractères autorisés ([-/ ])
         qui séparent les nombres ne sont pas obligatoires.*/



?>