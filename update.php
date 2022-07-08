<?php
    header('Content-type:application/json');
    header('Access-Content-Allow-Origin:*');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    $data=json_decode(file_get_contents("php://input"),true);

    $id=$data['sid'];
    $name=$data['sname'];
    $age=$data['sage'];
    $message=$data['smessage'];

    include "config.php";


    $sql =" UPDATE students SET name='{$name}', age={$age}, message='{$message}' WHERE id={$id} ";


    if (mysqli_query($conn,$sql)) {
        echo json_encode(array('message'=>'Record updated','status'=>true));
    }else{
        echo json_encode(array('message'=>'not updated','status'=>false));
    }

?>