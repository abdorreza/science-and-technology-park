<?php

header('Content-Type: text/html; charset=utf-8');

if ( isset($_POST["open"]) )
{

    require_once "functions.php";

    $conn=connect_to_database();

   
    switch ($_POST["what"]) 
    {
        case "open_report": 
            $sql = "UPDATE emtiaz SET send=:send WHERE code_user=:user_code AND year=:year";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':send', 0);
            $statement->bindValue(':user_code', $_POST["code"]);
            $statement->bindValue(':year', $_POST["year"]);
            $inserted = $statement->execute();
            $conn = null;
            break;
            
    }
}
?>
