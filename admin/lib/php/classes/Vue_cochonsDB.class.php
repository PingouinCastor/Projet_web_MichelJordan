<?php
class Vue_cochonsDB {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
   
    function getVue_cochonsId($id){
         try {            
            $query = "SELECT * FROM VUE_COCHONS where ID=:id";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue('id',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    function getVue_cochons(){
         try {
            $query = "SELECT * FROM VUE_COCHONS order by TYPE_COCHON,NOM_COCHON";
            $resultset = $this->_db->prepare($query);  
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    function getVue_cochonProduit(){
         try {            
            $query = "SELECT * FROM VUE_COCHONS";
            $resultset = $this->_db->prepare($query);  
            
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
}



