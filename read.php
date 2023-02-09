<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include('function.php');

$requestmethod = $_SERVER["REQUEST_METHOD"];

if( $requestmethod == "GET" ){
    $dataList = getDataList();
    echo $dataList;
}
else{
    $data = [
        'status' => 405,
        'message' => $requestmethod. 'method not allowed',
    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}