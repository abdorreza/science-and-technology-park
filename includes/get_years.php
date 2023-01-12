<?php

header('Content-Type: text/html; charset=utf-8');

if ( isset($_POST["get_years"]) )
{

        require_once "functions.php";

        $conn=connect_to_database();

        $stmt = $conn->prepare("SELECT * FROM emtiaz WHERE code_user=:code ORDER BY year DESC");   //code_user == code_corp == user_code
        $stmt->execute(['code' => $_POST['code']]);
        $count = $stmt->rowCount();
        if ($count>0) 
        {
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($user);
        } 
        else 
        {
            echo 0;
        }

    
}