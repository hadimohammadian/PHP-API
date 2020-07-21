<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json;charset=UTF-8');
header('Access-Control-Allow-Method:POST');


include_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $param = json_decode(file_get_contents("php://input"));
    var_dump($param);

    if (!empty($param->firstname) && !empty($param->lastname) && !empty($param->fathername) && !empty($param->age) && !empty($param->email) && !empty($param->Address)) {

        http_response_code(200);

        mysqli_query($connect, "INSERT INTO `student` (  `firstname`, `lastname`, `fathername`, `age`, `email`, `address`,`Date`) values  
('$param->firstname','$param->lastname','$param->fathername','$param->age','$param->email','$param->Address',NOW())");

        echo json_encode(array(
            "Status" => 1,
            "Message" => "OK , Data inserted in  databases"
        ));

    } else {
        http_response_code(400);

        echo json_encode(array(
            "Status" => 0 ,
            "Message" => "Please Fill all parameters"
        ));
    }
} else {
    http_response_code(500);

    echo json_encode(array(
        "Status" => 0,
        "Message" => "Access Denied"
    ));
}