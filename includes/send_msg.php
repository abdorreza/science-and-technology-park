<?php

header('Content-Type: text/html; charset=utf-8');

if ( isset($_POST["send"]) )
{

    require_once "functions.php";
    
    $conn=connect_to_database();
    
    switch ($_POST["what"])
    {
        case "send":
            $sql = "INSERT INTO `message` (`code_from`,`code_to`,`date`,`time`,`msg`,`visit`) VALUES (:code_from,:code_to,:date,:time,:msg,:vist)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':code_from', $_POST["from"]);
            $statement->bindValue(':code_to', $_POST["to"]);
            $statement->bindValue(':date', $_POST["date"]);
            $statement->bindValue(':time', $_POST["time"]);
            $statement->bindValue(':msg', $_POST["msg"]);
            $statement->bindValue(':vist', 0);
            $inserted = $statement->execute();
            break;
        case "read":
            $stmt = $conn->prepare("SELECT * FROM message WHERE code=:code");
            $stmt->execute(['code' => $_POST['code']]);
            $count = $stmt->rowCount();
            if ($count>0) 
            {
                $sql1 = "UPDATE message SET visit=:visit WHERE code=:code";
                $statement1 = $conn->prepare($sql1);
                $statement1->bindValue(':visit', '1');
                $statement1->bindValue(':code', $_POST['code']);
                $inserted1 = $statement1->execute();
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($user);
            } 
            else 
            {
                echo 0;
            }
            break;
        case "NewMessages":
            $stmt = $conn->prepare("SELECT * FROM message WHERE code_to=:code_user AND visit=0");
            $stmt->execute(['code_user' => $_POST['code-user']]);
            $count = $stmt->rowCount();
            echo $count;
            break;
        case "DeleteAll":
            $stmt = $conn->prepare("DELETE FROM message WHERE code_to=:code_user");
            $stmt->execute(['code_user' => $_POST['code-user']]);
            break;
        case "DeleteOne":
            $stmt = $conn->prepare("DELETE FROM message WHERE code=:code");
            $stmt->execute(['code' => $_POST['code']]);
            break;
        case "to-all":
            $stmt = $conn->prepare("SELECT * FROM corps".$_POST["filter"]);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $row)
            {
                $sql = "INSERT INTO `message` (`code_from`,`code_to`,`date`,`time`,`msg`,`visit`) VALUES (:code_from,:code_to,:date,:time,:msg,:vist)";
                $statement = $conn->prepare($sql);
                $statement->bindValue(':code_from', $_POST["from"]);
                $statement->bindValue(':code_to', $row["code_user"]);
                $statement->bindValue(':date', $_POST["date"]);
                $statement->bindValue(':time', $_POST["time"]);
                $statement->bindValue(':msg', $_POST["msg"]);
                $statement->bindValue(':vist', 0);
                $inserted = $statement->execute();
            }
            
            break;
    }        
    $conn = null;

}
?>
