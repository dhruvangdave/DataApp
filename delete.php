<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');

include('function.php');

$data = json_decode(file_get_contents("php://input"), true);
$emp_id = $data["eid"];

    $dataList = deleteData($emp_id);
    echo $dataList;

?>