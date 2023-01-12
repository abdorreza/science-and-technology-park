<?php

header('Content-Type: text/html; charset=utf-8');

$UinqFileName=uniqid().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ( isset($_POST["edit"]) )
{

    require_once "functions.php";
    
   
    $conn=connect_to_database();
			
    /*if ( $_POST["what"]=="center" )
    {
        if ( empty($_FILES['file']['name']) )
        {
            $sql = "UPDATE centers SET name=? WHERE code=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$_POST["name"],$_POST["code"]]);
        }
        else
        {
            $sql = "UPDATE centers SET name=?, logo=? WHERE code=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$_POST["name"],$UinqFileName,$_POST["code"]]);
        }
        $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
        if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
        {
            echo "false";
            return;
        }
        move_uploaded_file($_FILES['file']['tmp_name'], "../images/centers/".$UinqFileName);
    }
    else
    if ( $_POST["what"]=="admin" )
    {
        if ( empty($_FILES['file']['name']) )
        {
            if ( $_POST["password"]=="" )
            {
                $sql = "UPDATE users SET username=?,center_code=?,name=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
            }
            else
            {
                $sql = "UPDATE users SET username=?,password=?,center_code=?,name=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["center_code"],$_POST["name"],$_POST["code"]]);
            }
        }
        else
        {
            if ( $_POST["password"]=="" )
            {
                $sql = "UPDATE users SET username=?,center_code=?,name=?,logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
            }
            else
            {
                $sql = "UPDATE users SET username=?,password=?,center_code=?,name=?,logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
            }
        }
        $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
        if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
        {
            echo "false";
            return;
        }
        move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
    }
    else
    if ( $_POST["what"]=="nazer" )
    {
        if ( empty($_FILES['file']['name']) )
        {
            if ( $_POST["password"]=="" )
            {
                $sql = "UPDATE users SET username=?,center_code=?,name=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
            }
            else
            {
                $sql = "UPDATE users SET username=?,password=?,center_code=?,name=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["center_code"],$_POST["name"],$_POST["code"]]);
            }
        }
        else
        {
            if ( $_POST["password"]=="" )
            {
                $sql = "UPDATE users SET username=?,center_code=?,name=?,logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
            }
            else
            {
                $sql = "UPDATE users SET username=?,password=?,center_code=?,name=?,logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
            }
        }
        $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
        if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
        {
            echo "false";
            return;
        }
        move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
    }*/
    
    
    switch ($_POST["what"]) 
    {
        case "state":
            if ( empty($_FILES['file']['name']) )
            {
                $sql = "UPDATE states SET name=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["name"],$_POST["code"]]);
            }
            else
            {
                $sql = "UPDATE states SET name=?, logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["name"],$UinqFileName,$_POST["code"]]);
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/states/".$UinqFileName);
            break;
        case "center":
            if ( empty($_FILES['file']['name']) )
            {
                $sql = "UPDATE centers SET state_code=?, name=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["state"],$_POST["name"],$_POST["code"]]);
            }
            else
            {
                $sql = "UPDATE centers SET state_code=?, name=?, logo=? WHERE code=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$_POST["state"],$_POST["name"],$UinqFileName,$_POST["code"]]);
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/centers/".$UinqFileName);
            break;
        case "admin_state":
            if ( empty($_FILES['file']['name']) )
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["name"],$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["name"],$_POST["code"]]);
                }
            }
            else
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "admin":
            if ( empty($_FILES['file']['name']) )
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
            }
            else
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "nazer":
            if ( empty($_FILES['file']['name']) )
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
            }
            else
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "mali":
            if ( empty($_FILES['file']['name']) )
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
            }
            else
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "corp":
            if ( empty($_FILES['file']['name']) )
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$_POST["code"]]);
                }
            }
            else
            {
                if ( $_POST["password"]=="" )
                {
                    $sql = "UPDATE users SET username=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
                else
                {
                    $sql = "UPDATE users SET username=?,password=?,state_code=?,center_code=?,name=?,logo=? WHERE code=?";
                    $statement = $conn->prepare($sql);
                    $statement->execute([$_POST["username"],md5($_POST["password"]),$_POST["state_code"],$_POST["center_code"],$_POST["name"],$UinqFileName,$_POST["code"]]);
                }
            }
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
            {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
    }
    
    
    $conn = null;
  
    
}
?>


