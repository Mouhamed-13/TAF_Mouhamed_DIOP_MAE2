<?php
require_once("MysqlBd.php");
class CarreManager extends MysqlBd{

    public function __construct(){
        $this->classeName="Carre";
  }
    
    public function create($data){
        $sql="insert into carre (longueur) values (".$data->getLongueur().")";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;
    }

    public function upda($id,$longueur,$largeur=null){
        $sql="UPDATE `rectangle` SET `longueur` = '$longueur' WHERE `rectangle`.`id` = $id;";
        return $this->Update($sql)!=0;
    }
    public function delete($id){
        $sql="delete from carre WHERE id=$id";
        return $this->ExecuteUpdate($sql)!=0;
    }

    public function findAll(){
       $sql="select * from carre"; 
       return $this->ExecuteSelect($sql);
    }
    public function findById($id){
        $sql="select * from carre where id =$id"; 
        return  $this->ExecuteSelect($sql);
    }




}

?>