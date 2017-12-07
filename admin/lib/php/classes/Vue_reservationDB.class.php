<?php
class Vue_reservationDB {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
    
    function getVue_reservationsId($id){
         try {            
            $query = "SELECT * FROM RESERVATION_VUE where ID=:id";
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
    
    
    
    function getVue_reservationProduit(){
         try {            
            $query = "SELECT * FROM RESERVATION_VUE";
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



