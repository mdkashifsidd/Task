<?php
    header('Content-type:application/json');
    header('Access-Content-Allow-Origin:*');
    include "config.php";


    $sql ="SELECT * FROM students";
    $result=mysqli_query($conn,$sql) or die ("sql query failed");
    if (mysqli_num_rows($result) > 0) {
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        echo json_encode($output);
        
        
    }else{
        echo json_encode(array('message'=>'no record found','status'=>'false'));
    }

?>