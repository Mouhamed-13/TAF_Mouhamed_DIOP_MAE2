<?php
require_once("MysqlBd.php");

class RectangleManager extends MysqlBd{

    public function __construct(){
          $this->classeName="Rectangle";
    }

    public function create($data){
        $sql="insert into rectangle (longueur,largeur) values (".$data->getLongueur().",".$data->getLargeur().")";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;
        
    }

    public function upda($id,$longueur,$largeur){
        $sql="UPDATE `rectangle` SET `longueur` = '$longueur', `largeur` = '$largeur' WHERE `rectangle`.`id` = $id;";
        return $this->Update($sql)!=0;
    }
    public function delete($id){
        $sql="delete from rectangle WHERE id=$id";
        return $this->ExecuteUpdate($sql)!=0;
    }

    public function findAll(){
       $sql="select * from rectangle";
       return  $this->ExecuteSelect($sql); 
    }
    public function findById($id){
        $sql="select * from rectangle where id =$id"; 
        return  $this->ExecuteSelect($sql); 
    }


}


?>