<?php
    header('Content-type:application/json');
    header('Access-Content-Allow-Origin:*');

    $data=json_decode(file_get_contents("php://input"),true);

    $search_value=$data["search"];

    include "config.php";


    $sql =" SELECT * FROM students WHERE name LIKE '%{$search_value}%' ";

    $result=mysqli_query($conn,$sql) or die ("sql query failed");

    if (mysqli_num_rows($result) > 0) {
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(array('message'=>'no result found','status'=>false));
    }

?>