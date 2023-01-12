<?php

header('Content-Type: text/html; charset=utf-8');


if ( isset($_POST["del"]) )
{

    require_once "functions.php";
    $logo_name="";
       
    $conn=connect_to_database();
	
    switch ($_POST["what"]) 
    {
        case "state":
            $sql=$conn->prepare("SELECT * FROM states WHERE code=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
            
            $sql=$conn->prepare("DELETE FROM states WHERE code=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM centers WHERE state_code=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM corps WHERE code_state=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM emtiaz WHERE code_state=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM users WHERE state_code=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/states/".str_replace(' ', '', $logo_name));
            }
            break;
        case "center":
            $sql=$conn->prepare("SELECT * FROM centers WHERE code=:center_code");
            $sql->bindParam(":center_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
                
            $sql=$conn->prepare("DELETE FROM centers WHERE code=:center_code");
            $sql->bindParam(":center_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM corps WHERE code_center=:center_code");
            $sql->bindParam(":center_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM emtiaz WHERE code_center=:center_code");
            $sql->bindParam(":center_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM users WHERE center_code=:center_code");
            $sql->bindParam(":center_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/centers/".str_replace(' ', '', $logo_name));
            }
            break;
        case "admin_state":
            $sql=$conn->prepare("SELECT * FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
                
            $sql=$conn->prepare("DELETE FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/users/".str_replace(' ', '', $logo_name));
            }
            break;
        case "admin":
            $sql=$conn->prepare("SELECT * FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
                
            $sql=$conn->prepare("DELETE FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/users/".str_replace(' ', '', $logo_name));
            }
            break;
        case "nazer":
            $sql=$conn->prepare("SELECT * FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
                
            $sql=$conn->prepare("DELETE FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/users/".str_replace(' ', '', $logo_name));
            }
            break;
        case "mali":
            $sql=$conn->prepare("SELECT * FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
                
            $sql=$conn->prepare("DELETE FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/users/".str_replace(' ', '', $logo_name));
            }
            break;
        case "corp":
            $sql=$conn->prepare("SELECT * FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
                
            $sql=$conn->prepare("DELETE FROM users WHERE code=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM corps WHERE code_user=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM emtiaz WHERE code_user=:code");
            $sql->bindParam(":code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $sql=$conn->prepare("DELETE FROM message WHERE code_from=:code_from OR code_to=:code_to");
            $sql->bindParam(":code_from",$_POST["code"],PDO::PARAM_INT);
            $sql->bindParam(":code_to",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();

            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/users/".str_replace(' ', '', $logo_name));
            }
            break;
        case "state_logo":
            $sql=$conn->prepare("SELECT * FROM states WHERE code=:state_code");
            $sql->bindParam(":state_code",$_POST["code"],PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchAll();
            $logo_name=$result[0]["logo"];
            if ( $logo_name!="no-image.jpg" )
            {
                unlink("../images/states/".str_replace(' ', '', $logo_name));
                $sql = "UPDATE states SET logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute(["no-image.jpg",$_POST["code"]]);
            }
            break;
    } 
    
   $conn = null;

  
}

?>


