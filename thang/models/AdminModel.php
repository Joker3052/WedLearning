<?php

class AdminModel {

    function __construct() {
    }

    
    public function getList($args = []) {
        require('connect.php');

        $sql = "SELECT * FROM $dbname.adminpb"; 
        
        $arr = array();
        
        try {
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $element = array();
                    $element['id'] = $row['id'];
                    $element['username'] = $row['username'];
                    $element['password'] = $row['password'];
                    
                    $arr[] = $element;
                }
            } else {
                echo "0 results";
            }
        } catch (Exception $e) {
            echo "$sql; ";
            echo $e;
        }
        
        // Close connect      
        $conn->close();
        
        return $arr;
    }
    
    public function getDetail($id = 1) {
        require('connect.php');
        $sql = "SELECT * FROM $dbname.adminpb WHERE id = $id";

        $result = $conn->query($sql);
        $record = $result->fetch_assoc();
        
        // Close connect      
        $conn->close();

        return $record;
    }
}

?>