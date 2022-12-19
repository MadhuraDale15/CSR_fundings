<?php

    $username = $_POST['username']; 
    $Usubject = $_POST['Usubject']; 
    $Umessage = $_POST['Umessage'];  
    $Email = $_POST['Email'];  

    if (!empty($username) || !empty($Usubject) ||!empty(Email)) {
        $host = "localhost" ; 
        $dbUsername = "root" ; 
        $dbPassword = "" ; 
        $dbname = "MyDb" ;
        
        $conn = new mysqli($host , $dbUsername , $dbPassword , $dbname) ; 
        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error()) ; 
        }
        else {
            // $SELECT = "SELECT Email from hotelform Where Email = ? Limit 1 "; 
            $INSERT = "INSERT Into ContactForm(username , Usubject , Umessage ,Email) values( ? , ? , ? , ?) " ; 

            // $stmt = $conn->prepare($SELECT) ; 
            // $stmt->bind_param("s" , $Email);
            // $stmt->execute();
            // $stmt->bind_result($Email);
            // $stmt->store_result(); 
            
            // $rnum = $stmt->num_rows ; 
            // if($rnum == 0 ){
                // $stmt->close();
                
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssss" , $username , $Usubject , $Umessage ,$Email);  
                $stmt->execute();
                echo "Details Submitted Successfully ! " ;
                header("Refresh:3; URL=../index.html");  
            // }
            // else {
            //     echo "This Email is already registered" ; 
            // }
            $stmt->close() ; 
            $conn->close() ; 
        }
    }
    else{
        echo "Please fill all fields" ; 
        die() ; 
    }

?>