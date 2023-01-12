<?php

    header('Content-Type: text/html; charset=utf-8');
    
    if ( isset($_POST["filter"]) )
    {
        require_once "functions.php";
        $conn=connect_to_database();
        
        $sth = $conn->prepare("SELECT * FROM centers WHERE state_code=:state_code");
        $sth->execute(['state_code' => $_POST['state']]);
        $count = $sth->rowCount();
        if ($count>0) 
        {
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } 
        else 
        {
            echo 0;
        }
        $conn = null;
    }
    
?>                                         
                                            

