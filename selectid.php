<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json;charset=UTF-8');
header('Access-Control-Allow-Method:POST');
include_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $param = json_decode(file_get_contents("php://input"));

    $query = mysqli_query($connect, "select * from student where  id=$param->id");
    $item = mysqli_fetch_assoc($query);

    if (!empty($item)){
        http_response_code(200);
        echo json_encode([
            "status" => 1,
            "data" => $item
        ]);

    }
    else{
        http_response_code(400);
        echo json_encode([
            "status" => '0',
            'Message' => "Data is wrong"

        ]);
    }

} else {
    http_response_code(500);
    echo json_encode([
        "status" => '0',
        'Message' => "ACCESS DENIED"

    ]);
}