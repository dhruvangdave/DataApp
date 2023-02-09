<?php

require 'index.php';

function getDataList(){
    global $conn;
    
    $query = "SELECT * FROM data";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        if(mysqli_num_rows($query_run) > 0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Data fetched',
            ];
            header("HTTP/1.0 200 OK");
            
            return json_encode($res);
        }else{
            $data = [
                'status' => 404,
                'message' => $requestmethod. 'method not allowed',
            ];
            header("HTTP/1.0 404 Data not found");
            
            return json_encode($data);
        }
        
    }
    else{
        $data = [
            'status' => 500,
            'message' => $requestmethod. 'method not allowed',
        ];
        header("HTTP/1.0 500 Internal server error");
        
        return json_encode($data);
    }
    
}

function getSingleDataList($emp_id){
    
    global $conn;
    $query =  "SELECT * FROM data WHERE id = {$emp_id}";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        if(mysqli_num_rows($query_run) > 0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Data fetched',
            ];
            header("HTTP/1.0 200 OK");
            
            return json_encode($res);
        }else{
            $data = [
                'status' => 404,
                'message' => $requestmethod. 'method not allowed',
            ];
            header("HTTP/1.0 404 Data not found");
            
            return json_encode($data);
        }
    }
    else{
        $data = [
            'status' => 500,
            'message' => $requestmethod. 'method not allowed',
        ];
        header("HTTP/1.0 500 Internal server error");
    
        return json_encode($data);
    }
}

function insertIntoDataList($emp_name, $emp_surname, $emp_address){
    global $conn;
    $query =  "INSERT INTO data(name, surname, address) VALUES ('{$emp_name}', '{$emp_surname}', '{$emp_address}');";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        return json_encode( array('message' => 'Success', 'status' => 200));
    }else{
        return json_encode( array('message' => 'Internal server error', 'status' => 500));
    }
}

function deleteData($emp_id){

    global $conn;
    $query =  "DELETE FROM data WHERE id = {$emp_id}";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        return json_encode( array('message' => 'Deleted', 'status' => 200));
    }else{
        return json_encode( array('message' => 'Internal server error', 'status' => 500));
    }
}

function updateDataList($emp_id, $emp_name, $emp_surname, $emp_address){

    global $conn;
    $query = "UPDATE data SET name = '{$emp_name}', surname = '{$emp_surname}', address = '{$emp_address}' WHERE id = {$emp_id}";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        echo "Done";
        if(mysqli_num_rows($query_run) > 0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Data Updated',
            ];
            header("HTTP/1.0 200 OK");
            
            return json_encode($res);
        }
        else{
            $data = [
                'status' => 404,
                'message' => $requestmethod. 'method not allowed',
            ];
            header("HTTP/1.0 404 Data not found");
            
            return json_encode($data);
        }
    }
    else{
        return json_encode( array('message' => 'Internal server error', 'status' => 500));
    }
}