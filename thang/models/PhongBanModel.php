<?php

class PhongBanModel {

    function __construct() {
    }
    
    public function getList($args = []) {
        require('connect.php');

        $information = $args['information'];

        $sql = "SELECT * FROM $dbname.phongban";
        if ($information || $information == 0) $sql .= " WHERE tenpb LIKE '%$information%'
        OR mota LIKE '%$information%'";
        $arr = array();
        
        try {
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $element = array();
                    $element['idpb'] = $row['idpb'];
                    $element['tenpb'] = $row['tenpb'];
                    $element['mota'] = $row['mota'];
                    
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
    
    public function getDetail($idpb = 1) {
        require('connect.php');
        $sql = "SELECT * FROM $dbname.nhanvien WHERE idpb=$idpb";

        $arr = array();
                
        try {
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $element = array();
                    $element['idnv'] = $row['idnv'];
                    $element['tennv'] = $row['tennv'];
                    $element['diachi'] = $row['diachi'];
                    
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
}
?>