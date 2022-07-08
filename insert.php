<?php
    header('Content-type:application/json');
    header('Access-Content-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    $data=json_decode(file_get_contents("php://input"),true);

    $name=$data['sname'];
    $age=$data['sage'];
    $message=$data['smessage'];

    include "config.php";


    $sql =" INSERT INTO students(name,age,message) Values('{$name}',{$age},'{$message}')";


    if (mysqli_query($conn,$sql)) {
        echo json_encode(array('message'=>'Record Inserted','status'=>true));
    }else{
        echo json_encode(array('message'=>'not inserted','status'=>false));
    }

?>