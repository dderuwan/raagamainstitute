
<?php 
session_start();
include('../Databsase/connection.php');

    $query = "SELECT * FROM package_options";
    $result = mysqli_query($connection, $query);
    $data =array();
    if($result){
    foreach($result as $re){
        $data[] = $re;
            //   var_dump($result);          
    }
    }else{
        $error = "not found data";
        echo json_encode($error);
    }
   
    echo json_encode($data);


    // if ($result) {
    //     echo "<script>alert('Category Added Successfully');</script>";
    //     echo "<script>window.history.back()</script>";
    // } else {
    //     echo "<script>alert('Category Not Added');</script>";
    // }
        
   
