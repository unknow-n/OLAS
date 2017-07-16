<?php
    $con = mysqli_connect("my_host", "my_user", "my_password", "my_database");
    
    $district1 = $_POST["district"];
    
    
    $statement = mysqli_prepare($con, "SELECT * FROM provider_details WHERE district = ? ");
    mysqli_stmt_bind_param($statement, "s", $district1);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$company, $owner, $number, $street, $district, $state);
    
    $data= array();

    while($row = mysqli_stmt_fetch($statement)){
      
        // $data[] = " mai chl gya ";
        $data[] = $company." ".$owner." ".$number;
    }
    echo json_encode(array("response"=>$data));
?>