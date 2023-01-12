<?php

header('Content-Type: text/html; charset=utf-8');

//if ( isset($_POST["import"]) )
//{

        /*$UinqFileName="no-image.jpg";
        $UinqFileMali1_1=array();
        $UinqFileMali1_2=array();
        $UinqFileMali1_3=array();
        $UinqFileMali1_4=array();
        $UinqFileMali2_1=array();
        $UinqFileMali2_2=array();
        $UinqFileMali2_3=array();
        $UinqFileMali2_4=array();
        $UinqFileMali3_1=array();
        $UinqFileMali3_2=array();
        $UinqFileMali3_3=array();
        $UinqFileMali3_4=array();
        $UinqFileMali4_1=array();
        $UinqFileMali4_2=array();
        $UinqFileMali4_3=array();
        $UinqFileMali4_4=array();
        $UinqFileDast=array();
        $UinqFileNiroo=array();
        $UinqFileBazar1_1=array();
        $UinqFileBazar1_2=array();
        $UinqFileBazar1_3=array();
        $UinqFileBazar1_4=array();
        $UinqFileBazar2_1=array();
        $UinqFileBazar2_2=array();
        $UinqFileBazar2_3=array();
        $UinqFileBazar2_4=array();
        $UinqFileBazar3_1=array();
        $UinqFileBazar3_2=array();
        $UinqFileBazar3_3=array();
        $UinqFileBazar3_4=array();
        $UinqFileBazar4_1=array();
        $UinqFileBazar4_2=array();
        $UinqFileBazar4_3=array();
        $UinqFileBazar4_4=array();
        $UinqFileBazar2=array();
        $UinqFileBazar3=array();
        $UinqFileBazar4=array();
        $UinqFileAmoozeshi1_1=array();
        $UinqFileAmoozeshi1_2=array();
        $UinqFileAmoozeshi1_3=array();
        $UinqFileAmoozeshi1_4=array();
        $UinqFileAmoozeshi2_1=array();
        $UinqFileAmoozeshi2_2=array();
        $UinqFileAmoozeshi2_3=array();
        $UinqFileAmoozeshi2_4=array();
        $UinqFileDast1_1=array();
        $UinqFileDast1_2=array();
        $UinqFileDast1_3=array();
        $UinqFileDast1_4=array();
        $UinqFileDast2_1=array();
        $UinqFileDast2_2=array();
        $UinqFileDast2_3=array();
        $UinqFileDast2_4=array();
        $UinqFileDast3_1=array();
        $UinqFileDast3_2=array();
        $UinqFileDast3_3=array();
        $UinqFileDast3_4=array();
        $UinqFileDast4_1=array();
        $UinqFileDast4_2=array();
        $UinqFileDast4_3=array();
        $UinqFileDast4_4=array();
        $UinqFileDast5_1=array();
        $UinqFileDast5_2=array();
        $UinqFileDast5_3=array();
        $UinqFileDast5_4=array();
        $UinqFileDast6_1=array();
        $UinqFileDast6_2=array();
        $UinqFileDast6_3=array();
        $UinqFileDast6_4=array();
        $UinqPI1=array();
        $UinqPI2=array();
        $UinqPI3=array();
        $UinqPI4=array();
        $UinqPI5=array();
        $UinqPI6=array();*/


    require_once "functions.php";
    
    //if ( $_POST["what"]=="center" || $_POST["what"]=="admin" || $_POST["what"]=="nazer" || $_POST["what"]=="mali" || $_POST["what"]=="corp" )
    //{
        $UinqFileName=uniqid().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);  // Generate Random and Uniq FileName
    
        if ( empty($_FILES['file']['name']) )
        {
            $UinqFileName="no-image.jpg";
        }
    //}
    
    //if ( $_POST["what"]=="corp-info" )
    //{
        $UinqModirPic=array();
        for ($i=0;$i<count($_POST['fileModirPIC']);$i++)
        {
            $UinqModirPic[$i]=$_POST['fileModirPIC'][$i];
        }

        $UinqPI1=array();
        $UinqPI2=array();
        $UinqPI3=array();
        $UinqPI4=array();
        $UinqPI5=array();
        $UinqPI6=array();
        
        for ($i=0;$i<count($_POST['filePI1']);$i++)
        {
            $UinqPI1[$i]=$_POST['filePI1'][$i];
        }
        for ($i=0;$i<count($_POST['filePI2']);$i++)
        {
            $UinqPI2[$i]=$_POST['filePI2'][$i];
        }
        for ($i=0;$i<count($_POST['filePI3']);$i++)
        {
            $UinqPI3[$i]=$_POST['filePI3'][$i];
        }
        for ($i=0;$i<count($_POST['filePI4']);$i++)
        {
            $UinqPI4[$i]=$_POST['filePI4'][$i];
        }
        for ($i=0;$i<count($_POST['filePI5']);$i++)
        {
            $UinqPI5[$i]=$_POST['filePI5'][$i];
        }
        for ($i=0;$i<count($_POST['filePI6']);$i++)
        {
            $UinqPI6[$i]=$_POST['filePI6'][$i];
        }
    //}

    
    //if ( $_POST["what"]=="corp-report" )
    //{    

        $UinqFileMali1_1=array();
        $UinqFileMali1_2=array();
        $UinqFileMali1_3=array();
        $UinqFileMali1_4=array();
        for ($i=0;$i<count($_POST['fileMali1-1']);$i++)
        {
            $UinqFileMali1_1[$i]=$_POST['fileMali1-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali1-2']);$i++)
        {
            $UinqFileMali1_2[$i]=$_POST['fileMali1-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali1-3']);$i++)
        {
            $UinqFileMali1_3[$i]=$_POST['fileMali1-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali1-4']);$i++)
        {
            $UinqFileMali1_4[$i]=$_POST['fileMali1-4'][$i];
        }
        
        $UinqFileMali2_1=array();
        $UinqFileMali2_2=array();
        $UinqFileMali2_3=array();
        $UinqFileMali2_4=array();
        for ($i=0;$i<count($_POST['fileMali2-1']);$i++)
        {
            $UinqFileMali2_1[$i]=$_POST['fileMali2-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali2-2']);$i++)
        {
            $UinqFileMali2_2[$i]=$_POST['fileMali2-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali2-3']);$i++)
        {
            $UinqFileMali2_3[$i]=$_POST['fileMali2-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali2-4']);$i++)
        {
            $UinqFileMali2_4[$i]=$_POST['fileMali2-4'][$i];
        }

        $UinqFileMali3_1=array();
        $UinqFileMali3_2=array();
        $UinqFileMali3_3=array();
        $UinqFileMali3_4=array();
        for ($i=0;$i<count($_POST['fileMali3-1']);$i++)
        {
            $UinqFileMali3_1[$i]=$_POST['fileMali3-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali3-2']);$i++)
        {
            $UinqFileMali3_2[$i]=$_POST['fileMali3-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali3-3']);$i++)
        {
            $UinqFileMali3_3[$i]=$_POST['fileMali3-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali3-4']);$i++)
        {
            $UinqFileMali3_4[$i]=$_POST['fileMali3-4'][$i];
        }

        $UinqFileMali4_1=array();
        $UinqFileMali4_2=array();
        $UinqFileMali4_3=array();
        $UinqFileMali4_4=array();
        for ($i=0;$i<count($_POST['fileMali4-1']);$i++)
        {
            $UinqFileMali4_1[$i]=$_POST['fileMali4-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali4-2']);$i++)
        {
            $UinqFileMali4_2[$i]=$_POST['fileMali4-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali4-3']);$i++)
        {
            $UinqFileMali4_3[$i]=$_POST['fileMali4-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileMali4-4']);$i++)
        {
            $UinqFileMali4_4[$i]=$_POST['fileMali4-4'][$i];
        }


        $UinqFileDast1_1=array();
        $UinqFileDast1_2=array();
        $UinqFileDast1_3=array();
        $UinqFileDast1_4=array();
        for ($i=0;$i<count($_POST['fileDast1-1']);$i++)
        {
            $UinqFileDast1_1[$i]=$_POST['fileDast1-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast1-2']);$i++)
        {
            $UinqFileDast1_2[$i]=$_POST['fileDast1-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast1-3']);$i++)
        {
            $UinqFileDast1_3[$i]=$_POST['fileDast1-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast1-4']);$i++)
        {
            $UinqFileDast1_4[$i]=$_POST['fileDast1-4'][$i];
        }
        $UinqFileDast2_1=array();
        $UinqFileDast2_2=array();
        $UinqFileDast2_3=array();
        $UinqFileDast2_4=array();
        for ($i=0;$i<count($_POST['fileDast2-1']);$i++)
        {
            $UinqFileDast2_1[$i]=$_POST['fileDast2-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast2-2']);$i++)
        {
            $UinqFileDast2_2[$i]=$_POST['fileDast2-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast2-3']);$i++)
        {
            $UinqFileDast2_3[$i]=$_POST['fileDast2-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast2-4']);$i++)
        {
            $UinqFileDast2_4[$i]=$_POST['fileDast2-4'][$i];
        }
        $UinqFileDast3_1=array();
        $UinqFileDast3_2=array();
        $UinqFileDast3_3=array();
        $UinqFileDast3_4=array();
        for ($i=0;$i<count($_POST['fileDast3-1']);$i++)
        {
            $UinqFileDast3_1[$i]=$_POST['fileDast3-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast3-2']);$i++)
        {
            $UinqFileDast3_2[$i]=$_POST['fileDast3-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast3-3']);$i++)
        {
            $UinqFileDast3_3[$i]=$_POST['fileDast3-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast3-4']);$i++)
        {
            $UinqFileDast3_4[$i]=$_POST['fileDast3-4'][$i];
        }
        $UinqFileDast4_1=array();
        $UinqFileDast4_2=array();
        $UinqFileDast4_3=array();
        $UinqFileDast4_4=array();
        for ($i=0;$i<count($_POST['fileDast4-1']);$i++)
        {
            $UinqFileDast4_1[$i]=$_POST['fileDast4-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast4-2']);$i++)
        {
            $UinqFileDast4_2[$i]=$_POST['fileDast4-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast4-3']);$i++)
        {
            $UinqFileDast4_3[$i]=$_POST['fileDast4-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast4-4']);$i++)
        {
            $UinqFileDast4_4[$i]=$_POST['fileDast4-4'][$i];
        }
        $UinqFileDast5_1=array();
        $UinqFileDast5_2=array();
        $UinqFileDast5_3=array();
        $UinqFileDast5_4=array();
        for ($i=0;$i<count($_POST['fileDast5-1']);$i++)
        {
            $UinqFileDast5_1[$i]=$_POST['fileDast5-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast5-2']);$i++)
        {
            $UinqFileDast5_2[$i]=$_POST['fileDast5-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast5-3']);$i++)
        {
            $UinqFileDast5_3[$i]=$_POST['fileDast5-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast5-4']);$i++)
        {
            $UinqFileDast5_4[$i]=$_POST['fileDast5-4'][$i];
        }
        $UinqFileDast6_1=array();
        $UinqFileDast6_2=array();
        $UinqFileDast6_3=array();
        $UinqFileDast6_4=array();
        for ($i=0;$i<count($_POST['fileDast6-1']);$i++)
        {
            $UinqFileDast6_1[$i]=$_POST['fileDast6-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast6-2']);$i++)
        {
            $UinqFileDast6_2[$i]=$_POST['fileDast6-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast6-3']);$i++)
        {
            $UinqFileDast6_3[$i]=$_POST['fileDast6-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileDast6-4']);$i++)
        {
            $UinqFileDast6_4[$i]=$_POST['fileDast6-4'][$i];
        }


        $UinqFileNiroo=array();
        for ($i=0;$i<count($_POST['fileNiroo']);$i++)
        {
            $UinqFileNiroo[$i]=$_POST['fileNiroo'][$i];
        }
        
        $UinqFileBazar1_1=array();
        $UinqFileBazar1_2=array();
        $UinqFileBazar1_3=array();
        $UinqFileBazar1_4=array();
        for ($i=0;$i<count($_POST['fileBazar1-1']);$i++)
        {
            $UinqFileBazar1_1[$i]=$_POST['fileBazar1-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar1-2']);$i++)
        {
            $UinqFileBazar1_2[$i]=$_POST['fileBazar1-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar1-3']);$i++)
        {
            $UinqFileBazar1_3[$i]=$_POST['fileBazar1-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar1-4']);$i++)
        {
            $UinqFileBazar1_4[$i]=$_POST['fileBazar1-4'][$i];
        }
        
        
        $UinqFileBazar2=array();
        for ($i=0;$i<count($_POST['fileBazar2']);$i++)
        {
            $UinqFileBazar2[$i]=$_POST['fileBazar2'][$i];
        }
        
        $UinqFileBazar3_1=array();
        $UinqFileBazar3_2=array();
        $UinqFileBazar3_3=array();
        $UinqFileBazar3_4=array();
        for ($i=0;$i<count($_POST['fileBazar3-1']);$i++)
        {
            $UinqFileBazar3_1[$i]=$_POST['fileBazar3-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar3-2']);$i++)
        {
            $UinqFileBazar3_2[$i]=$_POST['fileBazar3-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar3-3']);$i++)
        {
            $UinqFileBazar3_3[$i]=$_POST['fileBazar3-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar3-4']);$i++)
        {
            $UinqFileBazar3_4[$i]=$_POST['fileBazar3-4'][$i];
        }

        $UinqFileBazar4_1=array();
        $UinqFileBazar4_2=array();
        $UinqFileBazar4_3=array();
        $UinqFileBazar4_4=array();
        for ($i=0;$i<count($_POST['fileBazar4-1']);$i++)
        {
            $UinqFileBazar4_1[$i]=$_POST['fileBazar4-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar4-2']);$i++)
        {
            $UinqFileBazar4_2[$i]=$_POST['fileBazar4-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar4-3']);$i++)
        {
            $UinqFileBazar4_3[$i]=$_POST['fileBazar4-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileBazar4-4']);$i++)
        {
            $UinqFileBazar4_4[$i]=$_POST['fileBazar4-4'][$i];
        }
        
        $UinqFileAmoozeshi1_1=array();
        $UinqFileAmoozeshi1_2=array();
        $UinqFileAmoozeshi1_3=array();
        $UinqFileAmoozeshi1_4=array();
        for ($i=0;$i<count($_POST['fileAmoozeshi1-1']);$i++)
        {
            $UinqFileAmoozeshi1_1[$i]=$_POST['fileAmoozeshi1-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileAmoozeshi1-2']);$i++)
        {
            $UinqFileAmoozeshi1_2[$i]=$_POST['fileAmoozeshi1-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileAmoozeshi1-3']);$i++)
        {
            $UinqFileAmoozeshi1_3[$i]=$_POST['fileAmoozeshi1-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileAmoozeshi1-4']);$i++)
        {
            $UinqFileAmoozeshi1_4[$i]=$_POST['fileAmoozeshi1-4'][$i];
        }


        $UinqFileAmoozeshi2_1=array();
        $UinqFileAmoozeshi2_2=array();
        $UinqFileAmoozeshi2_3=array();
        $UinqFileAmoozeshi2_4=array();
        for ($i=0;$i<count($_POST['fileAmoozeshi2-1']);$i++)
        {
            $UinqFileAmoozeshi2_1[$i]=$_POST['fileAmoozeshi2-1'][$i];
        }
        for ($i=0;$i<count($_POST['fileAmoozeshi2-2']);$i++)
        {
            $UinqFileAmoozeshi2_2[$i]=$_POST['fileAmoozeshi2-2'][$i];
        }
        for ($i=0;$i<count($_POST['fileAmoozeshi2-3']);$i++)
        {
            $UinqFileAmoozeshi2_3[$i]=$_POST['fileAmoozeshi2-3'][$i];
        }
        for ($i=0;$i<count($_POST['fileAmoozeshi2-4']);$i++)
        {
            $UinqFileAmoozeshi2_4[$i]=$_POST['fileAmoozeshi2-4'][$i];
        }
    //}
    /********************************************/    

    $conn=connect_to_database();
    
    switch ($_POST["what"])
    {
        case "state":
            $sql = "INSERT INTO `states` (`name`,`logo`) VALUES (:state_name,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':state_name', $_POST["state"]);
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/states/".$UinqFileName);
            break;
        case "center":
            $sql = "INSERT INTO `centers` (`state_code`,`name`,`logo`) VALUES (:state_code,:center_name,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':state_code', $_POST["state"]);
            $statement->bindValue(':center_name', $_POST["center"]);
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/centers/".$UinqFileName);
            break;
        case "admin_state":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', 0);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'admin_state');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "admin":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', $_POST["center_code"]);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'admin');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "nazer":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', $_POST["center_code"]);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'nazer');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "mali":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', $_POST["center_code"]);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'mali');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "corp":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', $_POST["center_code"]);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'corp');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "sarmaye":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', $_POST["center_code"]);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'sarmaye');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "moshaver":
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(['username' => $_POST['username']]);
            $count = $stmt->rowCount();
            if ($count>0)
            {
                echo "exist_username";
                return;
            }
            $sql = "INSERT INTO `users` (`username`,`password`,`state_code`,`center_code`,`name`,`tel`,`email`,`user_type`,`logo`) VALUES (:username,:password,:state_code,:center_code,:name,:tel,:email,:user_type,:logo)";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':password', md5($_POST["password"]));
            $statement->bindValue(':state_code', $_POST["state_code"]);
            $statement->bindValue(':center_code', $_POST["center_code"]);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':tel', "");
            $statement->bindValue(':email', "");
            $statement->bindValue(':user_type', 'moshaver');
            $statement->bindValue(':logo', $UinqFileName);
            $inserted = $statement->execute();
            $conn = null;
            $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
                echo "false";
                return;
            }
            move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            break;
        case "corp-info":
            if ( $_POST["NewEdit"]=="NEW" )
            {
                $sql = "SET SQL_MODE = '';INSERT INTO `corps` (`code_state`,`code_center`,`code_user`,`name`,`shomare_sabt`,`date_sabt`,`type`,`shenase_melli`,";
                $sql.="`code_eghtesadi`,`tel`,`fax`,`email`,`website`,`mobile`,`pic`,`address`,`semat1`,`semat2`,`semat3`,`semat4`,`semat5`,`semat6`,`semat7`,`semat8`,`semat9`,`semat10`,`semat11`,`semat12`,";
                $sql.="sex1,sex2,sex3,sex4,sex5,sex6,sex7,sex8,sex9,sex10,sex11,sex12,name1,name2,name3,name4,name5,name6,name7,name8,name9,name10,name11,name12,";
                $sql.="father1,father2,father3,father4,father5,father6,father7,father8,father9,father10,father11,father12,";
                $sql.="bdate1,bdate2,bdate3,bdate4,bdate5,bdate6,bdate7,bdate8,bdate9,bdate10,bdate11,bdate12,";
                $sql.="code_melli1,code_melli2,code_melli3,code_melli4,code_melli5,code_melli6,code_melli7,code_melli8,code_melli9,code_melli10,code_melli11,code_melli12,";
                $sql.="madrak1,madrak2,madrak3,madrak4,madrak5,madrak6,madrak7,madrak8,madrak9,madrak10,madrak11,madrak12,";
                $sql.="gerayesh1,gerayesh2,gerayesh3,gerayesh4,gerayesh5,gerayesh6,gerayesh7,gerayesh8,gerayesh9,gerayesh10,gerayesh11,gerayesh12,";
                $sql.="takhasos1,takhasos2,takhasos3,takhasos4,takhasos5,takhasos6,takhasos7,takhasos8,takhasos9,takhasos10,takhasos11,takhasos12,";
                $sql.="nezam1,nezam2,nezam3,nezam4,nezam5,nezam6,nezam7,nezam8,nezam9,nezam10,nezam11,nezam12,";
                $sql.="hamkari1,hamkari2,hamkari3,hamkari4,hamkari5,hamkari6,hamkari7,hamkari8,hamkari9,hamkari10,hamkari11,hamkari12,";
                $sql.="note1,note2,note3,note4,note5,note6,note7,note8,note9,note10,note11,note12,";
                $sql.="logo,hoze,zamine,idea,moshavere,product1,product2,product3,product4,product5,product6,";
                $sql.="product_img1,product_img2,product_img3,product_img4,product_img5,product_img6,";
                $sql.="faaliat1,faaliat2,faaliat3,faaliat4,vaziat1,vaziat2,vaziat3,vaziat4,zaman1,zaman2,zaman3,zaman4,et1,et2,et3,et4,karfarma1,karfarma2,karfarma3,karfarma4,dastavard1,dastavard2,dastavard3,dastavard4,";
                $sql.="mojri1,mojri2,mojri3,mojri4,note_faaliat1,note_faaliat2,note_faaliat3,note_faaliat4,onvan1,onvan2,onvan3,onvan4,nasher1,nasher2,nasher3,nasher4,";
                $sql.="writer1,writer2,writer3,writer4,date1,date2,date3,date4,note_enteshar1,note_enteshar2,note_enteshar3,note_enteshar4,date_esteghrar,date_end,";
                $sql.="esteghrar1,esteghrar2,esteghrar3,esteghrar4,room1,room2,room3,room4,nazer,etebar,date_etebar,note_etebar,";
                $sql.="etebar1,etebar2,etebar3,date_etebar1,date_etebar2,date_etebar3,note_etebar1,note_etebar2,note_etebar3,bedehi,note_bedehi)";
                
                
                $sql.=" VALUES (:code_state,:code_center,:code_user,:name,:shomare_sabt,:date_sabt,:type,:shenase_melli,:code_eghtesadi,:tel,:fax,:email,:website,:mobile,:pic,:address,";
                $sql.=":semat1,:semat2,:semat3,:semat4,:semat5,:semat6,:semat7,:semat8,:semat9,:semat10,:semat11,:semat12,";
                $sql.=":sex1,:sex2,:sex3,:sex4,:sex5,:sex6,:sex7,:sex8,:sex9,:sex10,:sex11,:sex12,:name1,:name2,:name3,:name4,:name5,:name6,:name7,:name8,:name9,:name10,:name11,:name12,";
                $sql.=":father1,:father2,:father3,:father4,:father5,:father6,:father7,:father8,:father9,:father10,:father11,:father12,";
                $sql.=":bdate1,:bdate2,:bdate3,:bdate4,:bdate5,:bdate6,:bdate7,:bdate8,:bdate9,:bdate10,:bdate11,:bdate12,";
                $sql.=":code_melli1,:code_melli2,:code_melli3,:code_melli4,:code_melli5,:code_melli6,:code_melli7,:code_melli8,:code_melli9,:code_melli10,:code_melli11,:code_melli12,";
                $sql.=":madrak1,:madrak2,:madrak3,:madrak4,:madrak5,:madrak6,:madrak7,:madrak8,:madrak9,:madrak10,:madrak11,:madrak12,";
                $sql.=":gerayesh1,:gerayesh2,:gerayesh3,:gerayesh4,:gerayesh5,:gerayesh6,:gerayesh7,:gerayesh8,:gerayesh9,:gerayesh10,:gerayesh11,:gerayesh12,";
                $sql.=":takhasos1,:takhasos2,:takhasos3,:takhasos4,:takhasos5,:takhasos6,:takhasos7,:takhasos8,:takhasos9,:takhasos10,:takhasos11,:takhasos12,";
                $sql.=":nezam1,:nezam2,:nezam3,:nezam4,:nezam5,:nezam6,:nezam7,:nezam8,:nezam9,:nezam10,:nezam11,:nezam12,";
                $sql.=":hamkari1,:hamkari2,:hamkari3,:hamkari4,:hamkari5,:hamkari6,:hamkari7,:hamkari8,:hamkari9,:hamkari10,:hamkari11,:hamkari12,";
                $sql.=":note1,:note2,:note3,:note4,:note5,:note6,:note7,:note8,:note9,:note10,:note11,:note12,";
                $sql.=":logo,:hoze,:zamine,:idea,:moshavere,:product1,:product2,:product3,:product4,:product5,:product6,";
                $sql.=":product_img1,:product_img2,:product_img3,:product_img4,:product_img5,:product_img6,";
                $sql.=":faaliat1,:faaliat2,:faaliat3,:faaliat4,:vaziat1,:vaziat2,:vaziat3,:vaziat4,:zaman1,:zaman2,:zaman3,:zaman4,:et1,:et2,:et3,:et4,:karfarma1,:karfarma2,:karfarma3,:karfarma4,:dastavard1,:dastavard2,:dastavard3,:dastavard4,";
                $sql.=":mojri1,:mojri2,:mojri3,:mojri4,:note_faaliat1,:note_faaliat2,:note_faaliat3,:note_faaliat4,:onvan1,:onvan2,:onvan3,:onvan4,:nasher1,:nasher2,:nasher3,:nasher4,";
                $sql.=":writer1,:writer2,:writer3,:writer4,:date1,:date2,:date3,:date4,:note_enteshar1,:note_enteshar2,:note_enteshar3,:note_enteshar4,:date_esteghrar,:date_end,";
                $sql.=":esteghrar1,:esteghrar2,:esteghrar3,:esteghrar4,:room1,:room2,:room3,:room4,:nazer,:etebar,:date_etebar,:note_etebar,";
                $sql.=":etebar1,:etebar2,:etebar3,:date_etebar1,:date_etebar2,:date_etebar3,:note_etebar1,:note_etebar2,:note_etebar3,:bedehi,:note_bedehi)";
    
        
                $statement = $conn->prepare($sql);
                
                $statement->bindValue(':code_state', $_POST["state-code"]);
                $statement->bindValue(':code_center', $_POST["center-code"]);
                $statement->bindValue(':code_user', $_POST["user-code"]);
                $statement->bindValue(':name', $_POST["name-sherkat"]);
                $statement->bindValue(':shomare_sabt', $_POST["shomare-sabt"]);
                $statement->bindValue(':date_sabt', $_POST["date-sabt"]);
                $statement->bindValue(':type', $_POST["sherkat-type"]);
                $statement->bindValue(':shenase_melli', $_POST["shenase-melli"]);
                $statement->bindValue(':code_eghtesadi', $_POST["code-eghtesadi"]);
                $statement->bindValue(':tel', $_POST["tel"]);
                $statement->bindValue(':fax', $_POST["fax"]);
                $statement->bindValue(':email', $_POST["email"]);
                $statement->bindValue(':website', $_POST["website"]);
                $statement->bindValue(':mobile', $_POST["mobile"]);
                $statement->bindValue(':pic', implode(",", $UinqModirPic));
                $statement->bindValue(':address', $_POST["address"]);
                $statement->bindValue(':semat1', $_POST["semat1"]);
                $statement->bindValue(':semat2', $_POST["semat2"]);
                $statement->bindValue(':semat3', $_POST["semat3"]);
                $statement->bindValue(':semat4', $_POST["semat4"]);
                $statement->bindValue(':semat5', $_POST["semat5"]);
                $statement->bindValue(':semat6', $_POST["semat6"]);
                $statement->bindValue(':semat7', $_POST["semat7"]);
                $statement->bindValue(':semat8', $_POST["semat8"]);
                $statement->bindValue(':semat9', $_POST["semat9"]);
                $statement->bindValue(':semat10', $_POST["semat10"]);
                $statement->bindValue(':semat11', $_POST["semat11"]);
                $statement->bindValue(':semat12', $_POST["semat12"]);
                $statement->bindValue(':sex1', $_POST["sex1"]);
                $statement->bindValue(':sex2', $_POST["sex2"]);
                $statement->bindValue(':sex3', $_POST["sex3"]);
                $statement->bindValue(':sex4', $_POST["sex4"]);
                $statement->bindValue(':sex5', $_POST["sex5"]);
                $statement->bindValue(':sex6', $_POST["sex6"]);
                $statement->bindValue(':sex7', $_POST["sex7"]);
                $statement->bindValue(':sex8', $_POST["sex8"]);
                $statement->bindValue(':sex9', $_POST["sex9"]);
                $statement->bindValue(':sex10', $_POST["sex10"]);
                $statement->bindValue(':sex11', $_POST["sex11"]);
                $statement->bindValue(':sex12', $_POST["sex12"]);
                $statement->bindValue(':name1', $_POST["name1"]);
                $statement->bindValue(':name2', $_POST["name2"]);
                $statement->bindValue(':name3', $_POST["name3"]);
                $statement->bindValue(':name4', $_POST["name4"]);
                $statement->bindValue(':name5', $_POST["name5"]);
                $statement->bindValue(':name6', $_POST["name6"]);
                $statement->bindValue(':name7', $_POST["name7"]);
                $statement->bindValue(':name8', $_POST["name8"]);
                $statement->bindValue(':name9', $_POST["name9"]);
                $statement->bindValue(':name10', $_POST["name10"]);
                $statement->bindValue(':name11', $_POST["name11"]);
                $statement->bindValue(':name12', $_POST["name12"]);
                $statement->bindValue(':father1', $_POST["father1"]);
                $statement->bindValue(':father2', $_POST["father2"]);
                $statement->bindValue(':father3', $_POST["father3"]);
                $statement->bindValue(':father4', $_POST["father4"]);
                $statement->bindValue(':father5', $_POST["father5"]);
                $statement->bindValue(':father6', $_POST["father6"]);
                $statement->bindValue(':father7', $_POST["father7"]);
                $statement->bindValue(':father8', $_POST["father8"]);
                $statement->bindValue(':father9', $_POST["father9"]);
                $statement->bindValue(':father10', $_POST["father10"]);
                $statement->bindValue(':father11', $_POST["father11"]);
                $statement->bindValue(':father12', $_POST["father12"]);
                $statement->bindValue(':bdate1', $_POST["bdate1"]);
                $statement->bindValue(':bdate2', $_POST["bdate2"]);
                $statement->bindValue(':bdate3', $_POST["bdate3"]);
                $statement->bindValue(':bdate4', $_POST["bdate4"]);
                $statement->bindValue(':bdate5', $_POST["bdate5"]);
                $statement->bindValue(':bdate6', $_POST["bdate6"]);
                $statement->bindValue(':bdate7', $_POST["bdate7"]);
                $statement->bindValue(':bdate8', $_POST["bdate8"]);
                $statement->bindValue(':bdate9', $_POST["bdate9"]);
                $statement->bindValue(':bdate10', $_POST["bdate10"]);
                $statement->bindValue(':bdate11', $_POST["bdate11"]);
                $statement->bindValue(':bdate12', $_POST["bdate12"]);
                $statement->bindValue(':code_melli1', $_POST["code-melli1"]);
                $statement->bindValue(':code_melli2', $_POST["code-melli2"]);
                $statement->bindValue(':code_melli3', $_POST["code-melli3"]);
                $statement->bindValue(':code_melli4', $_POST["code-melli4"]);
                $statement->bindValue(':code_melli5', $_POST["code-melli5"]);
                $statement->bindValue(':code_melli6', $_POST["code-melli6"]);
                $statement->bindValue(':code_melli7', $_POST["code-melli7"]);
                $statement->bindValue(':code_melli8', $_POST["code-melli8"]);
                $statement->bindValue(':code_melli9', $_POST["code-melli9"]);
                $statement->bindValue(':code_melli10', $_POST["code-melli10"]);
                $statement->bindValue(':code_melli11', $_POST["code-melli11"]);
                $statement->bindValue(':code_melli12', $_POST["code-melli12"]);
                $statement->bindValue(':madrak1', $_POST["madrak1"]);
                $statement->bindValue(':madrak2', $_POST["madrak2"]);
                $statement->bindValue(':madrak3', $_POST["madrak3"]);
                $statement->bindValue(':madrak4', $_POST["madrak4"]);
                $statement->bindValue(':madrak5', $_POST["madrak5"]);
                $statement->bindValue(':madrak6', $_POST["madrak6"]);
                $statement->bindValue(':madrak7', $_POST["madrak7"]);
                $statement->bindValue(':madrak8', $_POST["madrak8"]);
                $statement->bindValue(':madrak9', $_POST["madrak9"]);
                $statement->bindValue(':madrak10', $_POST["madrak10"]);
                $statement->bindValue(':madrak11', $_POST["madrak11"]);
                $statement->bindValue(':madrak12', $_POST["madrak12"]);
                $statement->bindValue(':gerayesh1', $_POST["gerayesh1"]);
                $statement->bindValue(':gerayesh2', $_POST["gerayesh2"]);
                $statement->bindValue(':gerayesh3', $_POST["gerayesh3"]);
                $statement->bindValue(':gerayesh4', $_POST["gerayesh4"]);
                $statement->bindValue(':gerayesh5', $_POST["gerayesh5"]);
                $statement->bindValue(':gerayesh6', $_POST["gerayesh6"]);
                $statement->bindValue(':gerayesh7', $_POST["gerayesh7"]);
                $statement->bindValue(':gerayesh8', $_POST["gerayesh8"]);
                $statement->bindValue(':gerayesh9', $_POST["gerayesh9"]);
                $statement->bindValue(':gerayesh10', $_POST["gerayesh10"]);
                $statement->bindValue(':gerayesh11', $_POST["gerayesh11"]);
                $statement->bindValue(':gerayesh12', $_POST["gerayesh12"]);
                $statement->bindValue(':takhasos1', $_POST["takhasos1"]);
                $statement->bindValue(':takhasos2', $_POST["takhasos2"]);
                $statement->bindValue(':takhasos3', $_POST["takhasos3"]);
                $statement->bindValue(':takhasos4', $_POST["takhasos4"]);
                $statement->bindValue(':takhasos5', $_POST["takhasos5"]);
                $statement->bindValue(':takhasos6', $_POST["takhasos6"]);
                $statement->bindValue(':takhasos7', $_POST["takhasos7"]);
                $statement->bindValue(':takhasos8', $_POST["takhasos8"]);
                $statement->bindValue(':takhasos9', $_POST["takhasos9"]);
                $statement->bindValue(':takhasos10', $_POST["takhasos10"]);
                $statement->bindValue(':takhasos11', $_POST["takhasos11"]);
                $statement->bindValue(':takhasos12', $_POST["takhasos12"]);
                $statement->bindValue(':nezam1', $_POST["nezam1"]);
                $statement->bindValue(':nezam2', $_POST["nezam2"]);
                $statement->bindValue(':nezam3', $_POST["nezam3"]);
                $statement->bindValue(':nezam4', $_POST["nezam4"]);
                $statement->bindValue(':nezam5', $_POST["nezam5"]);
                $statement->bindValue(':nezam6', $_POST["nezam6"]);
                $statement->bindValue(':nezam7', $_POST["nezam7"]);
                $statement->bindValue(':nezam8', $_POST["nezam8"]);
                $statement->bindValue(':nezam9', $_POST["nezam9"]);
                $statement->bindValue(':nezam10', $_POST["nezam10"]);
                $statement->bindValue(':nezam11', $_POST["nezam11"]);
                $statement->bindValue(':nezam12', $_POST["nezam12"]);
                $statement->bindValue(':hamkari1', $_POST["hamkari1"]);
                $statement->bindValue(':hamkari2', $_POST["hamkari2"]);
                $statement->bindValue(':hamkari3', $_POST["hamkari3"]);
                $statement->bindValue(':hamkari4', $_POST["hamkari4"]);
                $statement->bindValue(':hamkari5', $_POST["hamkari5"]);
                $statement->bindValue(':hamkari6', $_POST["hamkari6"]);
                $statement->bindValue(':hamkari7', $_POST["hamkari7"]);
                $statement->bindValue(':hamkari8', $_POST["hamkari8"]);
                $statement->bindValue(':hamkari9', $_POST["hamkari9"]);
                $statement->bindValue(':hamkari10', $_POST["hamkari10"]);
                $statement->bindValue(':hamkari11', $_POST["hamkari11"]);
                $statement->bindValue(':hamkari12', $_POST["hamkari12"]);
                
                $statement->bindValue(':note1', $_POST["note1"]);
                $statement->bindValue(':note2', $_POST["note2"]);
                $statement->bindValue(':note3', $_POST["note3"]);
                $statement->bindValue(':note4', $_POST["note4"]);
                $statement->bindValue(':note5', $_POST["note5"]);
                $statement->bindValue(':note6', $_POST["note6"]);
                $statement->bindValue(':note7', $_POST["note7"]);
                $statement->bindValue(':note8', $_POST["note8"]);
                $statement->bindValue(':note9', $_POST["note9"]);
                $statement->bindValue(':note10', $_POST["note10"]);
                $statement->bindValue(':note11', $_POST["note11"]);
                $statement->bindValue(':note12', $_POST["note12"]);
                
                //$statement->bindValue(':logo', $UinqFileName);
                $statement->bindValue(':logo', "");
                $statement->bindValue(':hoze', $_POST["hoze"]);
                $statement->bindValue(':zamine', $_POST["zamine"]);
                $statement->bindValue(':idea', $_POST["idea"]);
                $statement->bindValue(':moshavere', $_POST["moshavere"]);
                $statement->bindValue(':product1', $_POST["product1"]);
                $statement->bindValue(':product2', $_POST["product2"]);
                $statement->bindValue(':product3', $_POST["product3"]);
                $statement->bindValue(':product4', $_POST["product4"]);
                $statement->bindValue(':product5', $_POST["product5"]);
                $statement->bindValue(':product6', $_POST["product6"]);
                
                $statement->bindValue(':product_img1', implode(",", $UinqPI1));
                $statement->bindValue(':product_img2', implode(",", $UinqPI2));
                $statement->bindValue(':product_img3', implode(",", $UinqPI3));
                $statement->bindValue(':product_img4', implode(",", $UinqPI4));
                $statement->bindValue(':product_img5', implode(",", $UinqPI5));
                $statement->bindValue(':product_img6', implode(",", $UinqPI6));
                
                $statement->bindValue(':faaliat1', $_POST["faaliat1"]);
                $statement->bindValue(':faaliat2', $_POST["faaliat2"]);
                $statement->bindValue(':faaliat3', $_POST["faaliat3"]);
                $statement->bindValue(':faaliat4', $_POST["faaliat4"]);
                $statement->bindValue(':vaziat1', $_POST["vaziat1"]);
                $statement->bindValue(':vaziat2', $_POST["vaziat2"]);
                $statement->bindValue(':vaziat3', $_POST["vaziat3"]);
                $statement->bindValue(':vaziat4', $_POST["vaziat4"]);
                $statement->bindValue(':zaman1', $_POST["zaman1"]);
                $statement->bindValue(':zaman2', $_POST["zaman2"]);
                $statement->bindValue(':zaman3', $_POST["zaman3"]);
                $statement->bindValue(':zaman4', $_POST["zaman4"]);
                $statement->bindValue(':et1', $_POST["etb1"]);
                $statement->bindValue(':et2', $_POST["etb2"]);
                $statement->bindValue(':et3', $_POST["etb3"]);
                $statement->bindValue(':et4', $_POST["etb4"]);
                $statement->bindValue(':karfarma1', $_POST["karfarma1"]);
                $statement->bindValue(':karfarma2', $_POST["karfarma2"]);
                $statement->bindValue(':karfarma3', $_POST["karfarma3"]);
                $statement->bindValue(':karfarma4', $_POST["karfarma4"]);
                $statement->bindValue(':dastavard1', $_POST["dastavard1"]);
                $statement->bindValue(':dastavard2', $_POST["dastavard2"]);
                $statement->bindValue(':dastavard3', $_POST["dastavard3"]);
                $statement->bindValue(':dastavard4', $_POST["dastavard4"]);
                $statement->bindValue(':mojri1', $_POST["mojri1"]);
                $statement->bindValue(':mojri2', $_POST["mojri2"]);
                $statement->bindValue(':mojri3', $_POST["mojri3"]);
                $statement->bindValue(':mojri4', $_POST["mojri4"]);
                $statement->bindValue(':note_faaliat1', $_POST["note-faaliat1"]);
                $statement->bindValue(':note_faaliat2', $_POST["note-faaliat2"]);
                $statement->bindValue(':note_faaliat3', $_POST["note-faaliat3"]);
                $statement->bindValue(':note_faaliat4', $_POST["note-faaliat4"]);
                $statement->bindValue(':onvan1', $_POST["onvan1"]);
                $statement->bindValue(':onvan2', $_POST["onvan2"]);
                $statement->bindValue(':onvan3', $_POST["onvan3"]);
                $statement->bindValue(':onvan4', $_POST["onvan4"]);
                $statement->bindValue(':nasher1', $_POST["nasher1"]);
                $statement->bindValue(':nasher2', $_POST["nasher2"]);
                $statement->bindValue(':nasher3', $_POST["nasher3"]);
                $statement->bindValue(':nasher4', $_POST["nasher4"]);
                $statement->bindValue(':writer1', $_POST["writer1"]);
                $statement->bindValue(':writer2', $_POST["writer2"]);
                $statement->bindValue(':writer3', $_POST["writer3"]);
                $statement->bindValue(':writer4', $_POST["writer4"]);
                $statement->bindValue(':date1', $_POST["date-e1"]);
                $statement->bindValue(':date2', $_POST["date-e2"]);
                $statement->bindValue(':date3', $_POST["date-e3"]);
                $statement->bindValue(':date4', $_POST["date-e4"]);
                $statement->bindValue(':note_enteshar1', $_POST["note-enteshar1"]);
                $statement->bindValue(':note_enteshar2', $_POST["note-enteshar2"]);
                $statement->bindValue(':note_enteshar3', $_POST["note-enteshar3"]);
                $statement->bindValue(':note_enteshar4', $_POST["note-enteshar4"]);
                $statement->bindValue(':date_esteghrar', $_POST["date-esteghrar"]);
                $statement->bindValue(':date_end', $_POST["date-end"]);
                $statement->bindValue(':esteghrar1', $_POST["esteghrar1"]);
                $statement->bindValue(':esteghrar2', $_POST["esteghrar2"]);
                $statement->bindValue(':esteghrar3', $_POST["esteghrar3"]);
                $statement->bindValue(':esteghrar4', $_POST["esteghrar4"]);
                $statement->bindValue(':room1', $_POST["room1"]);
                $statement->bindValue(':room2', $_POST["room2"]);
                $statement->bindValue(':room3', $_POST["room3"]);
                $statement->bindValue(':room4', $_POST["room4"]);
                $statement->bindValue(':nazer', $_POST["nazer"]);
                $statement->bindValue(':etebar', $_POST["etebar"]);
                $statement->bindValue(':date_etebar', $_POST["date-etebar"]);
                $statement->bindValue(':note_etebar', $_POST["note-etebar"]);
    
                $statement->bindValue(':etebar1', $_POST["etebar1"]);
                $statement->bindValue(':etebar2', $_POST["etebar2"]);
                $statement->bindValue(':etebar3', $_POST["etebar3"]);
                $statement->bindValue(':date_etebar1', $_POST["date-etebar1"]);
                $statement->bindValue(':date_etebar2', $_POST["date-etebar2"]);
                $statement->bindValue(':date_etebar3', $_POST["date-etebar3"]);
                $statement->bindValue(':note_etebar1', $_POST["note-etebar1"]);
                $statement->bindValue(':note_etebar2', $_POST["note-etebar2"]);
                $statement->bindValue(':note_etebar3', $_POST["note-etebar3"]);
    
                $statement->bindValue(':bedehi', $_POST["bedehi"]);
                $statement->bindValue(':note_bedehi', $_POST["note-bedehi"]);
    
                $inserted = $statement->execute();
                $conn = null;
            }
            else
            if ( $_POST["NewEdit"]=="EDIT" )
            {
                $sql = "UPDATE corps SET name=:name,shomare_sabt=:shomare_sabt,date_sabt=:date_sabt,type=:type,shenase_melli=:shenase_melli,";
                $sql.="code_eghtesadi=:code_eghtesadi,tel=:tel,fax=:fax,email=:email,website=:website,mobile=:mobile,pic=:pic,address=:address,";
                $sql.="semat1=:semat1,semat2=:semat2,semat3=:semat3,semat4=:semat4,semat5=:semat5,semat6=:semat6,semat7=:semat7,semat8=:semat8,semat9=:semat9,semat10=:semat10,semat11=:semat11,semat12=:semat12,";
                $sql.="sex1=:sex1,sex2=:sex2,sex3=:sex3,sex4=:sex4,sex5=:sex5,sex6=:sex6,sex7=:sex7,sex8=:sex8,sex9=:sex9,sex10=:sex10,sex11=:sex11,sex12=:sex12,";
                $sql.="name1=:name1,name2=:name2,name3=:name3,name4=:name4,name5=:name5,name6=:name6,name7=:name7,name8=:name8,name9=:name9,name10=:name10,name11=:name11,name12=:name12,";
                $sql.="father1=:father1,father2=:father2,father3=:father3,father4=:father4,father5=:father5,father6=:father6,father7=:father7,father8=:father8,father9=:father9,father10=:father10,father11=:father11,father12=:father12,";
                $sql.="bdate1=:bdate1,bdate2=:bdate2,bdate3=:bdate3,bdate4=:bdate4,bdate5=:bdate5,bdate6=:bdate6,bdate7=:bdate7,bdate8=:bdate8,bdate9=:bdate9,bdate10=:bdate10,bdate11=:bdate11,bdate12=:bdate12,";
                $sql.="code_melli1=:code_melli1,code_melli2=:code_melli2,code_melli3=:code_melli3,code_melli4=:code_melli4,code_melli5=:code_melli5,code_melli6=:code_melli6,code_melli7=:code_melli7,code_melli8=:code_melli8,code_melli9=:code_melli9,code_melli10=:code_melli10,code_melli11=:code_melli11,code_melli12=:code_melli12,";
                $sql.="madrak1=:madrak1,madrak2=:madrak2,madrak3=:madrak3,madrak4=:madrak4,madrak5=:madrak5,madrak6=:madrak6,madrak7=:madrak7,madrak8=:madrak8,madrak9=:madrak9,madrak10=:madrak10,madrak11=:madrak11,madrak12=:madrak12,";
                $sql.="gerayesh1=:gerayesh1,gerayesh2=:gerayesh2,gerayesh3=:gerayesh3,gerayesh4=:gerayesh4,gerayesh5=:gerayesh5,gerayesh6=:gerayesh6,gerayesh7=:gerayesh7,gerayesh8=:gerayesh8,gerayesh9=:gerayesh9,gerayesh10=:gerayesh10,gerayesh11=:gerayesh11,gerayesh12=:gerayesh12,";
                $sql.="takhasos1=:takhasos1,takhasos2=:takhasos2,takhasos3=:takhasos3,takhasos4=:takhasos4,takhasos5=:takhasos5,takhasos6=:takhasos6,takhasos7=:takhasos7,takhasos8=:takhasos8,takhasos9=:takhasos9,takhasos10=:takhasos10,takhasos11=:takhasos11,takhasos12=:takhasos12,";
                $sql.="nezam1=:nezam1,nezam2=:nezam2,nezam3=:nezam3,nezam4=:nezam4,nezam5=:nezam5,nezam6=:nezam6,nezam7=:nezam7,nezam8=:nezam8,nezam9=:nezam9,nezam10=:nezam10,nezam11=:nezam11,nezam12=:nezam12,";
                $sql.="hamkari1=:hamkari1,hamkari2=:hamkari2,hamkari3=:hamkari3,hamkari4=:hamkari4,hamkari5=:hamkari5,hamkari6=:hamkari6,hamkari7=:hamkari7,hamkari8=:hamkari8,hamkari9=:hamkari9,hamkari10=:hamkari10,hamkari11=:hamkari11,hamkari12=:hamkari12,";
                $sql.="note1=:note1,note2=:note2,note3=:note3,note4=:note4,note5=:note5,note6=:note6,note7=:note7,note8=:note8,note9=:note9,note10=:note10,note11=:note11,note12=:note12,";
                $sql.="logo=:logo,hoze=:hoze,zamine=:zamine,idea=:idea,moshavere=:moshavere,";
                $sql.="product1=:product1,product2=:product2,product3=:product3,product4=:product4,product5=:product5,product6=:product6,";
                //if ( count($UinqPI1)>0 )
                //{
                $sql.="product_img1=:product_img1,";
                //}
                $sql.="product_img2=:product_img2,";
                $sql.="product_img3=:product_img3,";
                $sql.="product_img4=:product_img4,";
                $sql.="product_img5=:product_img5,";
                $sql.="product_img6=:product_img6,";

                $sql.="faaliat1=:faaliat1,faaliat2=:faaliat2,faaliat3=:faaliat3,faaliat4=:faaliat4,vaziat1=:vaziat1,vaziat2=:vaziat2,vaziat3=:vaziat3,vaziat4=:vaziat4,zaman1=:zaman1,zaman2=:zaman2,zaman3=:zaman3,zaman4=:zaman4,et1=:et1,et2=:et2,et3=:et3,et4=:et4,";
                $sql.="karfarma1=:karfarma1,karfarma2=:karfarma2,karfarma3=:karfarma3,karfarma4=:karfarma4,dastavard1=:dastavard1,dastavard2=:dastavard2,dastavard3=:dastavard3,dastavard4=:dastavard4,";
                $sql.="mojri1=:mojri1,mojri2=:mojri2,mojri3=:mojri3,mojri4=:mojri4,note_faaliat1=:note_faaliat1,note_faaliat2=:note_faaliat2,note_faaliat3=:note_faaliat3,note_faaliat4=:note_faaliat4,";
                $sql.="onvan1=:onvan1,onvan2=:onvan2,onvan3=:onvan3,onvan4=:onvan4,nasher1=:nasher1,nasher2=:nasher2,nasher3=:nasher3,nasher4=:nasher4,";
                $sql.="writer1=:writer1,writer2=:writer2,writer3=:writer3,writer4=:writer4,date1=:date1,date2=:date2,date3=:date3,date4=:date4,note_enteshar1=:note_enteshar1,note_enteshar2=:note_enteshar2,note_enteshar3=:note_enteshar3,note_enteshar4=:note_enteshar4,";
                $sql.="date_esteghrar=:date_esteghrar,date_end=:date_end,esteghrar1=:esteghrar1,esteghrar2=:esteghrar2,esteghrar3=:esteghrar3,esteghrar4=:esteghrar4,room1=:room1,room2=:room2,room3=:room3,room4=:room4,";
                $sql.="nazer=:nazer,etebar=:etebar,date_etebar=:date_etebar,note_etebar=:note_etebar,";
                $sql.="etebar1=:etebar1,etebar2=:etebar2,etebar3=:etebar3,date_etebar1=:date_etebar1,date_etebar2=:date_etebar2,date_etebar3=:date_etebar3,note_etebar1=:note_etebar1,note_etebar2=:note_etebar2,note_etebar3=:note_etebar3,";
                $sql.="bedehi=:bedehi,note_bedehi=:note_bedehi WHERE code=:corp_code";
                
                $statement = $conn->prepare($sql);

                $statement->bindValue(':name', $_POST["name-sherkat"]);
                $statement->bindValue(':shomare_sabt', $_POST["shomare-sabt"]);
                $statement->bindValue(':date_sabt', $_POST["date-sabt"]);
                $statement->bindValue(':type', $_POST["sherkat-type"]);
                $statement->bindValue(':shenase_melli', $_POST["shenase-melli"]);
                $statement->bindValue(':code_eghtesadi', $_POST["code-eghtesadi"]);
                $statement->bindValue(':tel', $_POST["tel"]);
                $statement->bindValue(':fax', $_POST["fax"]);
                $statement->bindValue(':email', $_POST["email"]);
                $statement->bindValue(':website', $_POST["website"]);
                $statement->bindValue(':mobile', $_POST["mobile"]);
                $statement->bindValue(':pic', implode(",", $UinqModirPic));
                $statement->bindValue(':address', $_POST["address"]);
                $statement->bindValue(':semat1', $_POST["semat1"]);
                $statement->bindValue(':semat2', $_POST["semat2"]);
                $statement->bindValue(':semat3', $_POST["semat3"]);
                $statement->bindValue(':semat4', $_POST["semat4"]);
                $statement->bindValue(':semat5', $_POST["semat5"]);
                $statement->bindValue(':semat6', $_POST["semat6"]);
                $statement->bindValue(':semat7', $_POST["semat7"]);
                $statement->bindValue(':semat8', $_POST["semat8"]);
                $statement->bindValue(':semat9', $_POST["semat9"]);
                $statement->bindValue(':semat10', $_POST["semat10"]);
                $statement->bindValue(':semat11', $_POST["semat11"]);
                $statement->bindValue(':semat12', $_POST["semat12"]);
                $statement->bindValue(':sex1', $_POST["sex1"]);
                $statement->bindValue(':sex2', $_POST["sex2"]);
                $statement->bindValue(':sex3', $_POST["sex3"]);
                $statement->bindValue(':sex4', $_POST["sex4"]);
                $statement->bindValue(':sex5', $_POST["sex5"]);
                $statement->bindValue(':sex6', $_POST["sex6"]);
                $statement->bindValue(':sex7', $_POST["sex7"]);
                $statement->bindValue(':sex8', $_POST["sex8"]);
                $statement->bindValue(':sex9', $_POST["sex9"]);
                $statement->bindValue(':sex10', $_POST["sex10"]);
                $statement->bindValue(':sex11', $_POST["sex11"]);
                $statement->bindValue(':sex12', $_POST["sex12"]);
                $statement->bindValue(':name1', $_POST["name1"]);
                $statement->bindValue(':name2', $_POST["name2"]);
                $statement->bindValue(':name3', $_POST["name3"]);
                $statement->bindValue(':name4', $_POST["name4"]);
                $statement->bindValue(':name5', $_POST["name5"]);
                $statement->bindValue(':name6', $_POST["name6"]);
                $statement->bindValue(':name7', $_POST["name7"]);
                $statement->bindValue(':name8', $_POST["name8"]);
                $statement->bindValue(':name9', $_POST["name9"]);
                $statement->bindValue(':name10', $_POST["name10"]);
                $statement->bindValue(':name11', $_POST["name11"]);
                $statement->bindValue(':name12', $_POST["name12"]);
                $statement->bindValue(':father1', $_POST["father1"]);
                $statement->bindValue(':father2', $_POST["father2"]);
                $statement->bindValue(':father3', $_POST["father3"]);
                $statement->bindValue(':father4', $_POST["father4"]);
                $statement->bindValue(':father5', $_POST["father5"]);
                $statement->bindValue(':father6', $_POST["father6"]);
                $statement->bindValue(':father7', $_POST["father7"]);
                $statement->bindValue(':father8', $_POST["father8"]);
                $statement->bindValue(':father9', $_POST["father9"]);
                $statement->bindValue(':father10', $_POST["father10"]);
                $statement->bindValue(':father11', $_POST["father11"]);
                $statement->bindValue(':father12', $_POST["father12"]);
                $statement->bindValue(':bdate1', $_POST["bdate1"]);
                $statement->bindValue(':bdate2', $_POST["bdate2"]);
                $statement->bindValue(':bdate3', $_POST["bdate3"]);
                $statement->bindValue(':bdate4', $_POST["bdate4"]);
                $statement->bindValue(':bdate5', $_POST["bdate5"]);
                $statement->bindValue(':bdate6', $_POST["bdate6"]);
                $statement->bindValue(':bdate7', $_POST["bdate7"]);
                $statement->bindValue(':bdate8', $_POST["bdate8"]);
                $statement->bindValue(':bdate9', $_POST["bdate9"]);
                $statement->bindValue(':bdate10', $_POST["bdate10"]);
                $statement->bindValue(':bdate11', $_POST["bdate11"]);
                $statement->bindValue(':bdate12', $_POST["bdate12"]);
                $statement->bindValue(':code_melli1', $_POST["code-melli1"]);
                $statement->bindValue(':code_melli2', $_POST["code-melli2"]);
                $statement->bindValue(':code_melli3', $_POST["code-melli3"]);
                $statement->bindValue(':code_melli4', $_POST["code-melli4"]);
                $statement->bindValue(':code_melli5', $_POST["code-melli5"]);
                $statement->bindValue(':code_melli6', $_POST["code-melli6"]);
                $statement->bindValue(':code_melli7', $_POST["code-melli7"]);
                $statement->bindValue(':code_melli8', $_POST["code-melli8"]);
                $statement->bindValue(':code_melli9', $_POST["code-melli9"]);
                $statement->bindValue(':code_melli10', $_POST["code-melli10"]);
                $statement->bindValue(':code_melli11', $_POST["code-melli11"]);
                $statement->bindValue(':code_melli12', $_POST["code-melli12"]);
                $statement->bindValue(':madrak1', $_POST["madrak1"]);
                $statement->bindValue(':madrak2', $_POST["madrak2"]);
                $statement->bindValue(':madrak3', $_POST["madrak3"]);
                $statement->bindValue(':madrak4', $_POST["madrak4"]);
                $statement->bindValue(':madrak5', $_POST["madrak5"]);
                $statement->bindValue(':madrak6', $_POST["madrak6"]);
                $statement->bindValue(':madrak7', $_POST["madrak7"]);
                $statement->bindValue(':madrak8', $_POST["madrak8"]);
                $statement->bindValue(':madrak9', $_POST["madrak9"]);
                $statement->bindValue(':madrak10', $_POST["madrak10"]);
                $statement->bindValue(':madrak11', $_POST["madrak11"]);
                $statement->bindValue(':madrak12', $_POST["madrak12"]);
                $statement->bindValue(':gerayesh1', $_POST["gerayesh1"]);
                $statement->bindValue(':gerayesh2', $_POST["gerayesh2"]);
                $statement->bindValue(':gerayesh3', $_POST["gerayesh3"]);
                $statement->bindValue(':gerayesh4', $_POST["gerayesh4"]);
                $statement->bindValue(':gerayesh5', $_POST["gerayesh5"]);
                $statement->bindValue(':gerayesh6', $_POST["gerayesh6"]);
                $statement->bindValue(':gerayesh7', $_POST["gerayesh7"]);
                $statement->bindValue(':gerayesh8', $_POST["gerayesh8"]);
                $statement->bindValue(':gerayesh9', $_POST["gerayesh9"]);
                $statement->bindValue(':gerayesh10', $_POST["gerayesh10"]);
                $statement->bindValue(':gerayesh11', $_POST["gerayesh11"]);
                $statement->bindValue(':gerayesh12', $_POST["gerayesh12"]);
                $statement->bindValue(':takhasos1', $_POST["takhasos1"]);
                $statement->bindValue(':takhasos2', $_POST["takhasos2"]);
                $statement->bindValue(':takhasos3', $_POST["takhasos3"]);
                $statement->bindValue(':takhasos4', $_POST["takhasos4"]);
                $statement->bindValue(':takhasos5', $_POST["takhasos5"]);
                $statement->bindValue(':takhasos6', $_POST["takhasos6"]);
                $statement->bindValue(':takhasos7', $_POST["takhasos7"]);
                $statement->bindValue(':takhasos8', $_POST["takhasos8"]);
                $statement->bindValue(':takhasos9', $_POST["takhasos9"]);
                $statement->bindValue(':takhasos10', $_POST["takhasos10"]);
                $statement->bindValue(':takhasos11', $_POST["takhasos11"]);
                $statement->bindValue(':takhasos12', $_POST["takhasos12"]);
                $statement->bindValue(':nezam1', $_POST["nezam1"]);
                $statement->bindValue(':nezam2', $_POST["nezam2"]);
                $statement->bindValue(':nezam3', $_POST["nezam3"]);
                $statement->bindValue(':nezam4', $_POST["nezam4"]);
                $statement->bindValue(':nezam5', $_POST["nezam5"]);
                $statement->bindValue(':nezam6', $_POST["nezam6"]);
                $statement->bindValue(':nezam7', $_POST["nezam7"]);
                $statement->bindValue(':nezam8', $_POST["nezam8"]);
                $statement->bindValue(':nezam9', $_POST["nezam9"]);
                $statement->bindValue(':nezam10', $_POST["nezam10"]);
                $statement->bindValue(':nezam11', $_POST["nezam11"]);
                $statement->bindValue(':nezam12', $_POST["nezam12"]);
                $statement->bindValue(':hamkari1', $_POST["hamkari1"]);
                $statement->bindValue(':hamkari2', $_POST["hamkari2"]);
                $statement->bindValue(':hamkari3', $_POST["hamkari3"]);
                $statement->bindValue(':hamkari4', $_POST["hamkari4"]);
                $statement->bindValue(':hamkari5', $_POST["hamkari5"]);
                $statement->bindValue(':hamkari6', $_POST["hamkari6"]);
                $statement->bindValue(':hamkari7', $_POST["hamkari7"]);
                $statement->bindValue(':hamkari8', $_POST["hamkari8"]);
                $statement->bindValue(':hamkari9', $_POST["hamkari9"]);
                $statement->bindValue(':hamkari10', $_POST["hamkari10"]);
                $statement->bindValue(':hamkari11', $_POST["hamkari11"]);
                $statement->bindValue(':hamkari12', $_POST["hamkari12"]);
                
                $statement->bindValue(':note1', $_POST["note1"]);
                $statement->bindValue(':note2', $_POST["note2"]);
                $statement->bindValue(':note3', $_POST["note3"]);
                $statement->bindValue(':note4', $_POST["note4"]);
                $statement->bindValue(':note5', $_POST["note5"]);
                $statement->bindValue(':note6', $_POST["note6"]);
                $statement->bindValue(':note7', $_POST["note7"]);
                $statement->bindValue(':note8', $_POST["note8"]);
                $statement->bindValue(':note9', $_POST["note9"]);
                $statement->bindValue(':note10', $_POST["note10"]);
                $statement->bindValue(':note11', $_POST["note11"]);
                $statement->bindValue(':note12', $_POST["note12"]);

                //$statement->bindValue(':logo', $UinqFileName);
                $statement->bindValue(':logo', "");
                $statement->bindValue(':hoze', (int)$_POST["hoze"]);
                $statement->bindValue(':zamine', (int)$_POST["zamine"]);
                $statement->bindValue(':idea', $_POST["idea"]);
                $statement->bindValue(':moshavere', $_POST["moshavere"]);
                
                $statement->bindValue(':product1', $_POST["product1"]);
                $statement->bindValue(':product2', $_POST["product2"]);
                $statement->bindValue(':product3', $_POST["product3"]);
                $statement->bindValue(':product4', $_POST["product4"]);
                $statement->bindValue(':product5', $_POST["product5"]);
                $statement->bindValue(':product6', $_POST["product6"]);
                
                //if ( count($UinqPI1)>0 )
                //{
                $statement->bindValue(':product_img1', implode(",", $UinqPI1));
                //}
                $statement->bindValue(':product_img2', implode(",", $UinqPI2));
                $statement->bindValue(':product_img3', implode(",", $UinqPI3));
                $statement->bindValue(':product_img4', implode(",", $UinqPI4));
                $statement->bindValue(':product_img5', implode(",", $UinqPI5));
                $statement->bindValue(':product_img6', implode(",", $UinqPI6));
                             
                $statement->bindValue(':faaliat1', $_POST["faaliat1"]);
                $statement->bindValue(':faaliat2', $_POST["faaliat2"]);
                $statement->bindValue(':faaliat3', $_POST["faaliat3"]);
                $statement->bindValue(':faaliat4', $_POST["faaliat4"]);
                $statement->bindValue(':vaziat1', $_POST["vaziat1"]);
                $statement->bindValue(':vaziat2', $_POST["vaziat2"]);
                $statement->bindValue(':vaziat3', $_POST["vaziat3"]);
                $statement->bindValue(':vaziat4', $_POST["vaziat4"]);
                $statement->bindValue(':zaman1', $_POST["zaman1"]);
                $statement->bindValue(':zaman2', $_POST["zaman2"]);
                $statement->bindValue(':zaman3', $_POST["zaman3"]);
                $statement->bindValue(':zaman4', $_POST["zaman4"]);
                $statement->bindValue(':et1', $_POST["etb1"]);
                $statement->bindValue(':et2', $_POST["etb2"]);
                $statement->bindValue(':et3', $_POST["etb3"]);
                $statement->bindValue(':et4', $_POST["etb4"]);
                $statement->bindValue(':karfarma1', $_POST["karfarma1"]);
                $statement->bindValue(':karfarma2', $_POST["karfarma2"]);
                $statement->bindValue(':karfarma3', $_POST["karfarma3"]);
                $statement->bindValue(':karfarma4', $_POST["karfarma4"]);
                $statement->bindValue(':dastavard1', $_POST["dastavard1"]);
                $statement->bindValue(':dastavard2', $_POST["dastavard2"]);
                $statement->bindValue(':dastavard3', $_POST["dastavard3"]);
                $statement->bindValue(':dastavard4', $_POST["dastavard4"]);
                $statement->bindValue(':mojri1', $_POST["mojri1"]);
                $statement->bindValue(':mojri2', $_POST["mojri2"]);
                $statement->bindValue(':mojri3', $_POST["mojri3"]);
                $statement->bindValue(':mojri4', $_POST["mojri4"]);
                $statement->bindValue(':note_faaliat1', $_POST["note-faaliat1"]);
                $statement->bindValue(':note_faaliat2', $_POST["note-faaliat2"]);
                $statement->bindValue(':note_faaliat3', $_POST["note-faaliat3"]);
                $statement->bindValue(':note_faaliat4', $_POST["note-faaliat4"]);
                $statement->bindValue(':onvan1', $_POST["onvan1"]);
                $statement->bindValue(':onvan2', $_POST["onvan2"]);
                $statement->bindValue(':onvan3', $_POST["onvan3"]);
                $statement->bindValue(':onvan4', $_POST["onvan4"]);
                $statement->bindValue(':nasher1', $_POST["nasher1"]);
                $statement->bindValue(':nasher2', $_POST["nasher2"]);
                $statement->bindValue(':nasher3', $_POST["nasher3"]);
                $statement->bindValue(':nasher4', $_POST["nasher4"]);
                $statement->bindValue(':writer1', $_POST["writer1"]);
                $statement->bindValue(':writer2', $_POST["writer2"]);
                $statement->bindValue(':writer3', $_POST["writer3"]);
                $statement->bindValue(':writer4', $_POST["writer4"]);
                $statement->bindValue(':date1', $_POST["date-e1"]);
                $statement->bindValue(':date2', $_POST["date-e2"]);
                $statement->bindValue(':date3', $_POST["date-e3"]);
                $statement->bindValue(':date4', $_POST["date-e4"]);
                $statement->bindValue(':note_enteshar1', $_POST["note-enteshar1"]);
                $statement->bindValue(':note_enteshar2', $_POST["note-enteshar2"]);
                $statement->bindValue(':note_enteshar3', $_POST["note-enteshar3"]);
                $statement->bindValue(':note_enteshar4', $_POST["note-enteshar4"]);
                $statement->bindValue(':date_esteghrar', $_POST["date-esteghrar"]);
                $statement->bindValue(':date_end', $_POST["date-end"]);
                $statement->bindValue(':esteghrar1', $_POST["esteghrar1"]);
                $statement->bindValue(':esteghrar2', $_POST["esteghrar2"]);
                $statement->bindValue(':esteghrar3', $_POST["esteghrar3"]);
                $statement->bindValue(':esteghrar4', $_POST["esteghrar4"]);
                $statement->bindValue(':room1', $_POST["room1"]);
                $statement->bindValue(':room2', $_POST["room2"]);
                $statement->bindValue(':room3', $_POST["room3"]);
                $statement->bindValue(':room4', $_POST["room4"]);
                $statement->bindValue(':nazer', (int)$_POST["nazer"]);
                $statement->bindValue(':etebar', $_POST["etebar"]);
                $statement->bindValue(':date_etebar', $_POST["date-etebar"]);
                $statement->bindValue(':note_etebar', $_POST["note-etebar"]);
    
                $statement->bindValue(':etebar1', $_POST["etebar1"]);
                $statement->bindValue(':etebar2', $_POST["etebar2"]);
                $statement->bindValue(':etebar3', $_POST["etebar3"]);
                $statement->bindValue(':date_etebar1', $_POST["date-etebar1"]);
                $statement->bindValue(':date_etebar2', $_POST["date-etebar2"]);
                $statement->bindValue(':date_etebar3', $_POST["date-etebar3"]);
                $statement->bindValue(':note_etebar1', $_POST["note-etebar1"]);
                $statement->bindValue(':note_etebar2', $_POST["note-etebar2"]);
                $statement->bindValue(':note_etebar3', $_POST["note-etebar3"]);
                
                $statement->bindValue(':bedehi', $_POST["bedehi"]);
                $statement->bindValue(':note_bedehi', $_POST["note-bedehi"]);

                $statement->bindValue(':corp_code', $_POST["CorpCode"]);
    
    
                $inserted = $statement->execute();
                $conn = null;
            }
            break;
        case "profile":
            $sql = "UPDATE users SET name=:name,";
            if ( $_POST["password"]!="" )
            {
                $sql.="password=:password,";
            } 
            if ( !empty($_FILES['file']['name']) )
            {
                $sql.="logo=:logo,";
            } 
            $sql.="tel=:tel,email=:email,username=:username WHERE code=:code";
             
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(':name', $_POST["name"]);
            if ( $_POST["password"]!="" )
            {
                $statement->bindValue(':password', md5($_POST["password"]));
            }
            if ( !empty($_FILES['file']['name']) )
            {
                $statement->bindValue(':logo', $UinqFileName);
            }
            $statement->bindValue(':tel', $_POST["tel"]);
            $statement->bindValue(':email', $_POST["email"]);
            $statement->bindValue(':username', $_POST["username"]);
            $statement->bindValue(':code', $_POST["code"]);
            
            $inserted = $statement->execute();
            //$conn = null;

            if ( !empty($_FILES['file']['name']) )
            {
                $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
                if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
                {
                    echo "false";
                    return;
                }
                move_uploaded_file($_FILES['file']['tmp_name'], "../images/users/".$UinqFileName);
            }
            

            $sql = "UPDATE corps SET name=:name WHERE code_user=:code";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':name', $_POST["name"]);
            $statement->bindValue(':code', $_POST["code"]);
            $inserted = $statement->execute();
            $conn = null;

            break;
        case "corp-report":
                if ( $_POST["NewEdit"]=="NEW" )
                {
                    $sql = "INSERT INTO `emtiaz` (`code_user`,`code_state`,`code_center`,`year`,`onvan_mali1_1`,`mahal_mali1_1`,`karfarma_mali1_1`,`mablagh_mali1_1`,`emtiaz_mali1_1`,";
                    $sql.= "`onvan_mali1_2`,`mahal_mali1_2`,`karfarma_mali1_2`,`mablagh_mali1_2`,`emtiaz_mali1_2`,`onvan_mali1_3`,`mahal_mali1_3`,`karfarma_mali1_3`,`mablagh_mali1_3`,`emtiaz_mali1_3`,";
                    $sql.= "`onvan_mali1_4`,`mahal_mali1_4`,`karfarma_mali1_4`,`mablagh_mali1_4`,`emtiaz_mali1_4`,`note_mali1`,";
                    $sql.= "`files_mali1_1`,`files_mali1_2`,`files_mali1_3`,`files_mali1_4`,";
                    $sql.= "`onvan_mali2_1`,`mahal_mali2_1`,`karfarma_mali2_1`,`mablagh_mali2_1`,`emtiaz_mali2_1`,`darsad_mali2_1`,";
                    $sql.= "`onvan_mali2_2`,`mahal_mali2_2`,`karfarma_mali2_2`,`mablagh_mali2_2`,`emtiaz_mali2_2`,`darsad_mali2_2`,";
                    $sql.= "`onvan_mali2_3`,`mahal_mali2_3`,`karfarma_mali2_3`,`mablagh_mali2_3`,`emtiaz_mali2_3`,`darsad_mali2_3`,";
                    $sql.= "`onvan_mali2_4`,`mahal_mali2_4`,`karfarma_mali2_4`,`mablagh_mali2_4`,`emtiaz_mali2_4`,`darsad_mali2_4`,`note_mali2`,";
                    $sql.= "`files_mali2_1`,`files_mali2_2`,`files_mali2_3`,`files_mali2_4`,";
                    $sql.= "`onvan_mali3_1`,`mahal_mali3_1`,`karfarma_mali3_1`,`mablagh_mali3_1`,`emtiaz_mali3_1`,`darsad_mali3_1`,";
                    $sql.= "`onvan_mali3_2`,`mahal_mali3_2`,`karfarma_mali3_2`,`mablagh_mali3_2`,`emtiaz_mali3_2`,`darsad_mali3_2`,";
                    $sql.= "`onvan_mali3_3`,`mahal_mali3_3`,`karfarma_mali3_3`,`mablagh_mali3_3`,`emtiaz_mali3_3`,`darsad_mali3_3`,";
                    $sql.= "`onvan_mali3_4`,`mahal_mali3_4`,`karfarma_mali3_4`,`mablagh_mali3_4`,`emtiaz_mali3_4`,`darsad_mali3_4`,`note_mali3`,";
                    $sql.= "`files_mali3_1`,`files_mali3_2`,`files_mali3_3`,`files_mali3_4`,";
                    $sql.= "`onvan_mali4_1`,`mablagh_mali4_1`,`emtiaz_mali4_1`,";
                    $sql.= "`onvan_mali4_2`,`mablagh_mali4_2`,`emtiaz_mali4_2`,";
                    $sql.= "`onvan_mali4_3`,`mablagh_mali4_3`,`emtiaz_mali4_3`,";
                    $sql.= "`onvan_mali4_4`,`mablagh_mali4_4`,`emtiaz_mali4_4`,`note_mali4`,";
                    $sql.= "`files_mali4_1`,`files_mali4_2`,`files_mali4_3`,`files_mali4_4`,";
                    $sql.= "`onvan_dast1_1`,`marja_dast1_1`,`date_dast1_1`,`emtiaz_dast1_1`,`emtiazm_dast1_1`,`files_dast1_1`,";
                    $sql.= "`onvan_dast1_2`,`marja_dast1_2`,`date_dast1_2`,`emtiaz_dast1_2`,`emtiazm_dast1_2`,`files_dast1_2`,";
                    $sql.= "`onvan_dast1_3`,`marja_dast1_3`,`date_dast1_3`,`emtiaz_dast1_3`,`emtiazm_dast1_3`,`files_dast1_3`,";
                    $sql.= "`onvan_dast1_4`,`marja_dast1_4`,`date_dast1_4`,`emtiaz_dast1_4`,`emtiazm_dast1_4`,`files_dast1_4`,";
                    $sql.= "`onvan_dast2_1`,`marja_dast2_1`,`date_dast2_1`,`emtiaz_dast2_1`,`emtiazm_dast2_1`,`files_dast2_1`,";
                    $sql.= "`onvan_dast2_2`,`marja_dast2_2`,`date_dast2_2`,`emtiaz_dast2_2`,`emtiazm_dast2_2`,`files_dast2_2`,";
                    $sql.= "`onvan_dast2_3`,`marja_dast2_3`,`date_dast2_3`,`emtiaz_dast2_3`,`emtiazm_dast2_3`,`files_dast2_3`,";
                    $sql.= "`onvan_dast2_4`,`marja_dast2_4`,`date_dast2_4`,`emtiaz_dast2_4`,`emtiazm_dast2_4`,`files_dast2_4`,";
                    $sql.= "`onvan_dast3_1`,`marja_dast3_1`,`date_dast3_1`,`emtiaz_dast3_1`,`emtiazm_dast3_1`,`files_dast3_1`,";
                    $sql.= "`onvan_dast3_2`,`marja_dast3_2`,`date_dast3_2`,`emtiaz_dast3_2`,`emtiazm_dast3_2`,`files_dast3_2`,";
                    $sql.= "`onvan_dast3_3`,`marja_dast3_3`,`date_dast3_3`,`emtiaz_dast3_3`,`emtiazm_dast3_3`,`files_dast3_3`,";
                    $sql.= "`onvan_dast3_4`,`marja_dast3_4`,`date_dast3_4`,`emtiaz_dast3_4`,`emtiazm_dast3_4`,`files_dast3_4`,";
                    $sql.= "`onvan_dast4_1`,`marja_dast4_1`,`date_dast4_1`,`emtiaz_dast4_1`,`emtiazm_dast4_1`,`files_dast4_1`,";
                    $sql.= "`onvan_dast4_2`,`marja_dast4_2`,`date_dast4_2`,`emtiaz_dast4_2`,`emtiazm_dast4_2`,`files_dast4_2`,";
                    $sql.= "`onvan_dast4_3`,`marja_dast4_3`,`date_dast4_3`,`emtiaz_dast4_3`,`emtiazm_dast4_3`,`files_dast4_3`,";
                    $sql.= "`onvan_dast4_4`,`marja_dast4_4`,`date_dast4_4`,`emtiaz_dast4_4`,`emtiazm_dast4_4`,`files_dast4_4`,";
                    $sql.= "`onvan_dast5_1`,`marja_dast5_1`,`date_dast5_1`,`emtiaz_dast5_1`,`emtiazm_dast5_1`,`files_dast5_1`,";
                    $sql.= "`onvan_dast5_2`,`marja_dast5_2`,`date_dast5_2`,`emtiaz_dast5_2`,`emtiazm_dast5_2`,`files_dast5_2`,";
                    $sql.= "`onvan_dast5_3`,`marja_dast5_3`,`date_dast5_3`,`emtiaz_dast5_3`,`emtiazm_dast5_3`,`files_dast5_3`,";
                    $sql.= "`onvan_dast5_4`,`marja_dast5_4`,`date_dast5_4`,`emtiaz_dast5_4`,`emtiazm_dast5_4`,`files_dast5_4`,";
                    $sql.= "`onvan_dast6_1`,`marja_dast6_1`,`date_dast6_1`,`emtiaz_dast6_1`,`emtiazm_dast6_1`,`files_dast6_1`,";
                    $sql.= "`onvan_dast6_2`,`marja_dast6_2`,`date_dast6_2`,`emtiaz_dast6_2`,`emtiazm_dast6_2`,`files_dast6_2`,";
                    $sql.= "`onvan_dast6_3`,`marja_dast6_3`,`date_dast6_3`,`emtiaz_dast6_3`,`emtiazm_dast6_3`,`files_dast6_3`,";
                    $sql.= "`onvan_dast6_4`,`marja_dast6_4`,`date_dast6_4`,`emtiaz_dast6_4`,`emtiazm_dast6_4`,`files_dast6_4`,";
                    $sql.= "`onvan_niroo1`,`tahsil_niroo1`,`hamkari_niroo1`,`sabeghe_niroo1`,`bime_niroo1`,`emtiaz_niroo1`,";
                    $sql.= "`onvan_niroo2`,`tahsil_niroo2`,`hamkari_niroo2`,`sabeghe_niroo2`,`bime_niroo2`,`emtiaz_niroo2`,";
                    $sql.= "`onvan_niroo3`,`tahsil_niroo3`,`hamkari_niroo3`,`sabeghe_niroo3`,`bime_niroo3`,`emtiaz_niroo3`,";
                    $sql.= "`onvan_niroo4`,`tahsil_niroo4`,`hamkari_niroo4`,`sabeghe_niroo4`,`bime_niroo4`,`emtiaz_niroo4`,";
                    $sql.= "`onvan_niroo5`,`tahsil_niroo5`,`hamkari_niroo5`,`sabeghe_niroo5`,`bime_niroo5`,`emtiaz_niroo5`,";
                    $sql.= "`onvan_niroo6`,`tahsil_niroo6`,`hamkari_niroo6`,`sabeghe_niroo6`,`bime_niroo6`,`emtiaz_niroo6`,";
                    $sql.= "`onvan_niroo7`,`tahsil_niroo7`,`hamkari_niroo7`,`sabeghe_niroo7`,`bime_niroo7`,`emtiaz_niroo7`,";
                    $sql.= "`onvan_niroo8`,`tahsil_niroo8`,`hamkari_niroo8`,`sabeghe_niroo8`,`bime_niroo8`,`emtiaz_niroo8`,";
                    $sql.= "`onvan_niroo9`,`tahsil_niroo9`,`hamkari_niroo9`,`sabeghe_niroo9`,`bime_niroo9`,`emtiaz_niroo9`,";
                    $sql.= "`onvan_niroo10`,`tahsil_niroo10`,`hamkari_niroo10`,`sabeghe_niroo10`,`bime_niroo10`,`emtiaz_niroo10`,`files_niroo`,";
                    $sql.= "`onvan_bazar1_1`,`mahal_bazar1_1`,`date_bazar1_1`,`type_bazar1_1`,`emtiaz_bazar1_1`,";
                    $sql.= "`onvan_bazar1_2`,`mahal_bazar1_2`,`date_bazar1_2`,`type_bazar1_2`,`emtiaz_bazar1_2`,";
                    $sql.= "`onvan_bazar1_3`,`mahal_bazar1_3`,`date_bazar1_3`,`type_bazar1_3`,`emtiaz_bazar1_3`,";
                    $sql.= "`onvan_bazar1_4`,`mahal_bazar1_4`,`date_bazar1_4`,`type_bazar1_4`,`emtiaz_bazar1_4`,`note_bazar1`,";
                    $sql.= "`files_bazar1_1`,`files_bazar1_2`,`files_bazar1_3`,`files_bazar1_4`,";
                    $sql.= "`onvan_bazar2`,`files_bazar2`,";
                    $sql.= "`onvan_bazar3_1`,`date_bazar3_1`,`bargozar_bazar3_1`,`mahal_bazar3_1`,`emtiaz_bazar3_1`,";
                    $sql.= "`onvan_bazar3_2`,`date_bazar3_2`,`bargozar_bazar3_2`,`mahal_bazar3_2`,`emtiaz_bazar3_2`,";
                    $sql.= "`onvan_bazar3_3`,`date_bazar3_3`,`bargozar_bazar3_3`,`mahal_bazar3_3`,`emtiaz_bazar3_3`,";
                    $sql.= "`onvan_bazar3_4`,`date_bazar3_4`,`bargozar_bazar3_4`,`mahal_bazar3_4`,`emtiaz_bazar3_4`,`note_bazar3`,";
                    $sql.= "`files_bazar3_1`,`files_bazar3_2`,`files_bazar3_3`,`files_bazar3_4`,";
                    $sql.= "`onvan_bazar4_1`,`date_bazar4_1`,`mahal_bazar4_1`,`naghsh_bazar4_1`,`emtiaz_bazar4_1`,";
                    $sql.= "`onvan_bazar4_2`,`date_bazar4_2`,`mahal_bazar4_2`,`naghsh_bazar4_2`,`emtiaz_bazar4_2`,";
                    $sql.= "`onvan_bazar4_3`,`date_bazar4_3`,`mahal_bazar4_3`,`naghsh_bazar4_3`,`emtiaz_bazar4_3`,";
                    $sql.= "`onvan_bazar4_4`,`date_bazar4_4`,`mahal_bazar4_4`,`naghsh_bazar4_4`,`emtiaz_bazar4_4`,`note_bazar4`,";
                    $sql.= "`files_bazar4_1`,`files_bazar4_2`,`files_bazar4_3`,`files_bazar4_4`,";
                    $sql.= "`onvan_amoozeshi1_1`,`date_amoozeshi1_1`,`bargozar_amoozeshi1_1`,`mahal_amoozeshi1_1`,`emtiaz_amoozeshi1_1`,";
                    $sql.= "`onvan_amoozeshi1_2`,`date_amoozeshi1_2`,`bargozar_amoozeshi1_2`,`mahal_amoozeshi1_2`,`emtiaz_amoozeshi1_2`,";
                    $sql.= "`onvan_amoozeshi1_3`,`date_amoozeshi1_3`,`bargozar_amoozeshi1_3`,`mahal_amoozeshi1_3`,`emtiaz_amoozeshi1_3`,";
                    $sql.= "`onvan_amoozeshi1_4`,`date_amoozeshi1_4`,`bargozar_amoozeshi1_4`,`mahal_amoozeshi1_4`,`emtiaz_amoozeshi1_4`,`note_amoozeshi1`,";
                    $sql.= "`files_amoozeshi1_1`,`files_amoozeshi1_2`,`files_amoozeshi1_3`,`files_amoozeshi1_4`,";
                    $sql.= "`onvan_amoozeshi2_1`,`date_amoozeshi2_1`,`mahal_amoozeshi2_1`,`naghsh_amoozeshi2_1`,`emtiaz_amoozeshi2_1`,";
                    $sql.= "`onvan_amoozeshi2_2`,`date_amoozeshi2_2`,`mahal_amoozeshi2_2`,`naghsh_amoozeshi2_2`,`emtiaz_amoozeshi2_2`,";
                    $sql.= "`onvan_amoozeshi2_3`,`date_amoozeshi2_3`,`mahal_amoozeshi2_3`,`naghsh_amoozeshi2_3`,`emtiaz_amoozeshi2_3`,";
                    $sql.= "`onvan_amoozeshi2_4`,`date_amoozeshi2_4`,`mahal_amoozeshi2_4`,`naghsh_amoozeshi2_4`,`emtiaz_amoozeshi2_4`,`note_amoozeshi2`,";
                    $sql.= "`files_amoozeshi2_1`,`files_amoozeshi2_2`,`files_amoozeshi2_3`,`files_amoozeshi2_4`,";
                    $sql.= "`emtiaz_taamolp1`,`emtiaz_taamolp2`,`emtiaz_taamolp3`,`emtiaz_taamolp4`,`emtiaz_taamolp5`,";
                    $sql.= "`emtiaz_taamols1`,`emtiaz_taamols2`,";
                    $sql.= "`nazar_sanji1`,`nazar_sanji2`,`nazar_sanji3`,`nazar_sanji4`,`nazar_sanji5`,`nazar_sanji6`,`nazar_sanji7`,`nazar_sanji8`,`nazar_sanji9`,`nazar_sanji10`,`nazar_sanji11`,`nazar_sanji12`,`nazar_sanji13`,`nazar_sanji14`,";
                    $sql.= "`emtiazm_mali1_1`,`emtiazm_mali1_2`,`emtiazm_mali1_3`,`emtiazm_mali1_4`,`emtiazm_mali2_1`,`emtiazm_mali2_2`,`emtiazm_mali2_3`,`emtiazm_mali2_4`,`emtiazm_mali3_1`,`emtiazm_mali3_2`,`emtiazm_mali3_3`,`emtiazm_mali3_4`,";
                    $sql.= "`emtiazm_mali4_1`,`emtiazm_mali4_2`,`emtiazm_mali4_3`,`emtiazm_mali4_4`,`emtiazm_niroo1`,`emtiazm_niroo2`,`emtiazm_niroo3`,`emtiazm_niroo4`,`emtiazm_niroo5`,`emtiazm_niroo6`,`emtiazm_niroo7`,`emtiazm_niroo8`,`emtiazm_niroo9`,`emtiazm_niroo10`,";
                    $sql.= "`emtiazm_bazar1_1`,`emtiazm_bazar1_2`,`emtiazm_bazar1_3`,`emtiazm_bazar1_4`,`emtiaz_bazar2`,`emtiazm_bazar2`,`emtiazm_bazar3_1`,`emtiazm_bazar3_2`,`emtiazm_bazar3_3`,`emtiazm_bazar3_4`,`emtiazm_bazar4_1`,`emtiazm_bazar4_2`,`emtiazm_bazar4_3`,`emtiazm_bazar4_4`,";
                    $sql.= "`emtiazm_amoozeshi1_1`,`emtiazm_amoozeshi1_2`,`emtiazm_amoozeshi1_3`,`emtiazm_amoozeshi1_4`,`emtiazm_amoozeshi2_1`,`emtiazm_amoozeshi2_2`,`emtiazm_amoozeshi2_3`,`emtiazm_amoozeshi2_4`,";
                    $sql.= "`emtiazm_taamolp1`,`emtiazm_taamolp2`,`emtiazm_taamolp3`,`emtiazm_taamolp4`,`emtiazm_taamolp5`,`emtiazm_taamols1`,`emtiazm_taamols2`,";
                    $sql.= "`report`,`send`)";
    
                    $sql.=" VALUES (:code_user,:code_state,:code_center,:year,:onvan_mali1_1,:mahal_mali1_1,:karfarma_mali1_1,:mablagh_mali1_1,:emtiaz_mali1_1,";
                    $sql.=":onvan_mali1_2,:mahal_mali1_2,:karfarma_mali1_2,:mablagh_mali1_2,:emtiaz_mali1_2,:onvan_mali1_3,:mahal_mali1_3,:karfarma_mali1_3,:mablagh_mali1_3,:emtiaz_mali1_3,";
                    $sql.=":onvan_mali1_4,:mahal_mali1_4,:karfarma_mali1_4,:mablagh_mali1_4,:emtiaz_mali1_4,:note_mali1,:files_mali1_1,:files_mali1_2,:files_mali1_3,:files_mali1_4,";
                    $sql.=":onvan_mali2_1,:mahal_mali2_1,:karfarma_mali2_1,:mablagh_mali2_1,:emtiaz_mali2_1,:darsad_mali2_1,";
                    $sql.=":onvan_mali2_2,:mahal_mali2_2,:karfarma_mali2_2,:mablagh_mali2_2,:emtiaz_mali2_2,:darsad_mali2_2,";
                    $sql.=":onvan_mali2_3,:mahal_mali2_3,:karfarma_mali2_3,:mablagh_mali2_3,:emtiaz_mali2_3,:darsad_mali2_3,";
                    $sql.=":onvan_mali2_4,:mahal_mali2_4,:karfarma_mali2_4,:mablagh_mali2_4,:emtiaz_mali2_4,:darsad_mali2_4,:note_mali2,:files_mali2_1,:files_mali2_2,:files_mali2_3,:files_mali2_4,";
                    $sql.=":onvan_mali3_1,:mahal_mali3_1,:karfarma_mali3_1,:mablagh_mali3_1,:emtiaz_mali3_1,:darsad_mali3_1,";
                    $sql.=":onvan_mali3_2,:mahal_mali3_2,:karfarma_mali3_2,:mablagh_mali3_2,:emtiaz_mali3_2,:darsad_mali3_2,";
                    $sql.=":onvan_mali3_3,:mahal_mali3_3,:karfarma_mali3_3,:mablagh_mali3_3,:emtiaz_mali3_3,:darsad_mali3_3,";
                    $sql.=":onvan_mali3_4,:mahal_mali3_4,:karfarma_mali3_4,:mablagh_mali3_4,:emtiaz_mali3_4,:darsad_mali3_4,:note_mali3,:files_mali3_1,:files_mali3_2,:files_mali3_3,:files_mali3_4,";
                    $sql.=":onvan_mali4_1,:mablagh_mali4_1,:emtiaz_mali4_1,";
                    $sql.=":onvan_mali4_2,:mablagh_mali4_2,:emtiaz_mali4_2,";
                    $sql.=":onvan_mali4_3,:mablagh_mali4_3,:emtiaz_mali4_3,";
                    $sql.=":onvan_mali4_4,:mablagh_mali4_4,:emtiaz_mali4_4,:note_mali4,:files_mali4_1,:files_mali4_2,:files_mali4_3,:files_mali4_4,";
                    $sql.=":onvan_dast1_1,:marja_dast1_1,:date_dast1_1,:emtiaz_dast1_1,:emtiazm_dast1_1,:files_dast1_1,";
                    $sql.=":onvan_dast1_2,:marja_dast1_2,:date_dast1_2,:emtiaz_dast1_2,:emtiazm_dast1_2,:files_dast1_2,";
                    $sql.=":onvan_dast1_3,:marja_dast1_3,:date_dast1_3,:emtiaz_dast1_3,:emtiazm_dast1_3,:files_dast1_3,";
                    $sql.=":onvan_dast1_4,:marja_dast1_4,:date_dast1_4,:emtiaz_dast1_4,:emtiazm_dast1_4,:files_dast1_4,";
                    $sql.=":onvan_dast2_1,:marja_dast2_1,:date_dast2_1,:emtiaz_dast2_1,:emtiazm_dast2_1,:files_dast2_1,";
                    $sql.=":onvan_dast2_2,:marja_dast2_2,:date_dast2_2,:emtiaz_dast2_2,:emtiazm_dast2_2,:files_dast2_2,";
                    $sql.=":onvan_dast2_3,:marja_dast2_3,:date_dast2_3,:emtiaz_dast2_3,:emtiazm_dast2_3,:files_dast2_3,";
                    $sql.=":onvan_dast2_4,:marja_dast2_4,:date_dast2_4,:emtiaz_dast2_4,:emtiazm_dast2_4,:files_dast2_4,";
                    $sql.=":onvan_dast3_1,:marja_dast3_1,:date_dast3_1,:emtiaz_dast3_1,:emtiazm_dast3_1,:files_dast3_1,";
                    $sql.=":onvan_dast3_2,:marja_dast3_2,:date_dast3_2,:emtiaz_dast3_2,:emtiazm_dast3_2,:files_dast3_2,";
                    $sql.=":onvan_dast3_3,:marja_dast3_3,:date_dast3_3,:emtiaz_dast3_3,:emtiazm_dast3_3,:files_dast3_3,";
                    $sql.=":onvan_dast3_4,:marja_dast3_4,:date_dast3_4,:emtiaz_dast3_4,:emtiazm_dast3_4,:files_dast3_4,";
                    $sql.=":onvan_dast4_1,:marja_dast4_1,:date_dast4_1,:emtiaz_dast4_1,:emtiazm_dast4_1,:files_dast4_1,";
                    $sql.=":onvan_dast4_2,:marja_dast4_2,:date_dast4_2,:emtiaz_dast4_2,:emtiazm_dast4_2,:files_dast4_2,";
                    $sql.=":onvan_dast4_3,:marja_dast4_3,:date_dast4_3,:emtiaz_dast4_3,:emtiazm_dast4_3,:files_dast4_3,";
                    $sql.=":onvan_dast4_4,:marja_dast4_4,:date_dast4_4,:emtiaz_dast4_4,:emtiazm_dast4_4,:files_dast4_4,";
                    $sql.=":onvan_dast5_1,:marja_dast5_1,:date_dast5_1,:emtiaz_dast5_1,:emtiazm_dast5_1,:files_dast5_1,";
                    $sql.=":onvan_dast5_2,:marja_dast5_2,:date_dast5_2,:emtiaz_dast5_2,:emtiazm_dast5_2,:files_dast5_2,";
                    $sql.=":onvan_dast5_3,:marja_dast5_3,:date_dast5_3,:emtiaz_dast5_3,:emtiazm_dast5_3,:files_dast5_3,";
                    $sql.=":onvan_dast5_4,:marja_dast5_4,:date_dast5_4,:emtiaz_dast5_4,:emtiazm_dast5_4,:files_dast5_4,";
                    $sql.=":onvan_dast6_1,:marja_dast6_1,:date_dast6_1,:emtiaz_dast6_1,:emtiazm_dast6_1,:files_dast6_1,";
                    $sql.=":onvan_dast6_2,:marja_dast6_2,:date_dast6_2,:emtiaz_dast6_2,:emtiazm_dast6_2,:files_dast6_2,";
                    $sql.=":onvan_dast6_3,:marja_dast6_3,:date_dast6_3,:emtiaz_dast6_3,:emtiazm_dast6_3,:files_dast6_3,";
                    $sql.=":onvan_dast6_4,:marja_dast6_4,:date_dast6_4,:emtiaz_dast6_4,:emtiazm_dast6_4,:files_dast6_4,";
                    $sql.=":onvan_niroo1,:tahsil_niroo1,:hamkari_niroo1,:sabeghe_niroo1,:bime_niroo1,:emtiaz_niroo1,";
                    $sql.=":onvan_niroo2,:tahsil_niroo2,:hamkari_niroo2,:sabeghe_niroo2,:bime_niroo2,:emtiaz_niroo2,";
                    $sql.=":onvan_niroo3,:tahsil_niroo3,:hamkari_niroo3,:sabeghe_niroo3,:bime_niroo3,:emtiaz_niroo3,";
                    $sql.=":onvan_niroo4,:tahsil_niroo4,:hamkari_niroo4,:sabeghe_niroo4,:bime_niroo4,:emtiaz_niroo4,";
                    $sql.=":onvan_niroo5,:tahsil_niroo5,:hamkari_niroo5,:sabeghe_niroo5,:bime_niroo5,:emtiaz_niroo5,";
                    $sql.=":onvan_niroo6,:tahsil_niroo6,:hamkari_niroo6,:sabeghe_niroo6,:bime_niroo6,:emtiaz_niroo6,";
                    $sql.=":onvan_niroo7,:tahsil_niroo7,:hamkari_niroo7,:sabeghe_niroo7,:bime_niroo7,:emtiaz_niroo7,";
                    $sql.=":onvan_niroo8,:tahsil_niroo8,:hamkari_niroo8,:sabeghe_niroo8,:bime_niroo8,:emtiaz_niroo8,";
                    $sql.=":onvan_niroo9,:tahsil_niroo9,:hamkari_niroo9,:sabeghe_niroo9,:bime_niroo9,:emtiaz_niroo9,";
                    $sql.=":onvan_niroo10,:tahsil_niroo10,:hamkari_niroo10,:sabeghe_niroo10,:bime_niroo10,:emtiaz_niroo10,:files_niroo,";
                    $sql.=":onvan_bazar1_1,:mahal_bazar1_1,:date_bazar1_1,:type_bazar1_1,:emtiaz_bazar1_1,";
                    $sql.=":onvan_bazar1_2,:mahal_bazar1_2,:date_bazar1_2,:type_bazar1_2,:emtiaz_bazar1_2,";
                    $sql.=":onvan_bazar1_3,:mahal_bazar1_3,:date_bazar1_3,:type_bazar1_3,:emtiaz_bazar1_3,";
                    $sql.=":onvan_bazar1_4,:mahal_bazar1_4,:date_bazar1_4,:type_bazar1_4,:emtiaz_bazar1_4,:note_bazar1,";
                    $sql.=":files_bazar1_1,:files_bazar1_2,:files_bazar1_3,:files_bazar1_4,";
                    $sql.=":onvan_bazar2,:files_bazar2,";
                    $sql.=":onvan_bazar3_1,:date_bazar3_1,:bargozar_bazar3_1,:mahal_bazar3_1,:emtiaz_bazar3_1,";
                    $sql.=":onvan_bazar3_2,:date_bazar3_2,:bargozar_bazar3_2,:mahal_bazar3_2,:emtiaz_bazar3_2,";
                    $sql.=":onvan_bazar3_3,:date_bazar3_3,:bargozar_bazar3_3,:mahal_bazar3_3,:emtiaz_bazar3_3,";
                    $sql.=":onvan_bazar3_4,:date_bazar3_4,:bargozar_bazar3_4,:mahal_bazar3_4,:emtiaz_bazar3_4,:note_bazar3,";
                    $sql.=":files_bazar3_1,:files_bazar3_2,:files_bazar3_3,:files_bazar3_4,";
                    $sql.=":onvan_bazar4_1,:date_bazar4_1,:mahal_bazar4_1,:naghsh_bazar4_1,:emtiaz_bazar4_1,";
                    $sql.=":onvan_bazar4_2,:date_bazar4_2,:mahal_bazar4_2,:naghsh_bazar4_2,:emtiaz_bazar4_2,";
                    $sql.=":onvan_bazar4_3,:date_bazar4_3,:mahal_bazar4_3,:naghsh_bazar4_3,:emtiaz_bazar4_3,";
                    $sql.=":onvan_bazar4_4,:date_bazar4_4,:mahal_bazar4_4,:naghsh_bazar4_4,:emtiaz_bazar4_4,:note_bazar4,";
                    $sql.=":files_bazar4_1,:files_bazar4_2,:files_bazar4_3,:files_bazar4_4,";
                    $sql.=":onvan_amoozeshi1_1,:date_amoozeshi1_1,:bargozar_amoozeshi1_1,:mahal_amoozeshi1_1,:emtiaz_amoozeshi1_1,";
                    $sql.=":onvan_amoozeshi1_2,:date_amoozeshi1_2,:bargozar_amoozeshi1_2,:mahal_amoozeshi1_2,:emtiaz_amoozeshi1_2,";
                    $sql.=":onvan_amoozeshi1_3,:date_amoozeshi1_3,:bargozar_amoozeshi1_3,:mahal_amoozeshi1_3,:emtiaz_amoozeshi1_3,";
                    $sql.=":onvan_amoozeshi1_4,:date_amoozeshi1_4,:bargozar_amoozeshi1_4,:mahal_amoozeshi1_4,:emtiaz_amoozeshi1_4,:note_amoozeshi1,";
                    $sql.=":files_amoozeshi1_1,:files_amoozeshi1_2,:files_amoozeshi1_3,:files_amoozeshi1_4,";
                    $sql.=":onvan_amoozeshi2_1,:date_amoozeshi2_1,:mahal_amoozeshi2_1,:naghsh_amoozeshi2_1,:emtiaz_amoozeshi2_1,";
                    $sql.=":onvan_amoozeshi2_2,:date_amoozeshi2_2,:mahal_amoozeshi2_2,:naghsh_amoozeshi2_2,:emtiaz_amoozeshi2_2,";
                    $sql.=":onvan_amoozeshi2_3,:date_amoozeshi2_3,:mahal_amoozeshi2_3,:naghsh_amoozeshi2_3,:emtiaz_amoozeshi2_3,";
                    $sql.=":onvan_amoozeshi2_4,:date_amoozeshi2_4,:mahal_amoozeshi2_4,:naghsh_amoozeshi2_4,:emtiaz_amoozeshi2_4,:note_amoozeshi2,";
                    $sql.=":files_amoozeshi2_1,:files_amoozeshi2_2,:files_amoozeshi2_3,:files_amoozeshi2_4,";
                    $sql.=":emtiaz_taamolp1,:emtiaz_taamolp2,:emtiaz_taamolp3,:emtiaz_taamolp4,:emtiaz_taamolp5,";
                    $sql.=":emtiaz_taamols1,:emtiaz_taamols2,";
                    $sql.=":nazar_sanji1,:nazar_sanji2,:nazar_sanji3,:nazar_sanji4,:nazar_sanji5,:nazar_sanji6,:nazar_sanji7,:nazar_sanji8,:nazar_sanji9,:nazar_sanji10,:nazar_sanji11,:nazar_sanji12,:nazar_sanji13,:nazar_sanji14,";
                    $sql.=":emtiazm_mali1_1,:emtiazm_mali1_2,:emtiazm_mali1_3,:emtiazm_mali1_4,:emtiazm_mali2_1,:emtiazm_mali2_2,:emtiazm_mali2_3,:emtiazm_mali2_4,:emtiazm_mali3_1,:emtiazm_mali3_2,:emtiazm_mali3_3,:emtiazm_mali3_4,";
                    $sql.=":emtiazm_mali4_1,:emtiazm_mali4_2,:emtiazm_mali4_3,:emtiazm_mali4_4,:emtiazm_niroo1,:emtiazm_niroo2,:emtiazm_niroo3,:emtiazm_niroo4,:emtiazm_niroo5,:emtiazm_niroo6,:emtiazm_niroo7,:emtiazm_niroo8,:emtiazm_niroo9,:emtiazm_niroo10,";
                    $sql.=":emtiazm_bazar1_1,:emtiazm_bazar1_2,:emtiazm_bazar1_3,:emtiazm_bazar1_4,:emtiaz_bazar2,:emtiazm_bazar2,:emtiazm_bazar3_1,:emtiazm_bazar3_2,:emtiazm_bazar3_3,:emtiazm_bazar3_4,:emtiazm_bazar4_1,:emtiazm_bazar4_2,:emtiazm_bazar4_3,:emtiazm_bazar4_4,";
                    $sql.=":emtiazm_amoozeshi1_1,:emtiazm_amoozeshi1_2,:emtiazm_amoozeshi1_3,:emtiazm_amoozeshi1_4,:emtiazm_amoozeshi2_1,:emtiazm_amoozeshi2_2,:emtiazm_amoozeshi2_3,:emtiazm_amoozeshi2_4,";
                    $sql.=":emtiazm_taamolp1,:emtiazm_taamolp2,:emtiazm_taamolp3,:emtiazm_taamolp4,:emtiazm_taamolp5,:emtiazm_taamols1,:emtiazm_taamols2,";
                    $sql.=":report,:send)";
    
    
                    $statement = $conn->prepare($sql);
                    
                    $statement->bindValue(':code_user', $_POST["user-code"]);
                    $statement->bindValue(':code_state', $_POST["state-code"]);
                    $statement->bindValue(':code_center', $_POST["center-code"]);
                    $statement->bindValue(':year', $_POST["year"]);
                    
                    $statement->bindValue(':onvan_mali1_1', $_POST["onvan-mali1-1"]);
                    $statement->bindValue(':mahal_mali1_1', $_POST["mahal-mali1-1"]);
                    $statement->bindValue(':karfarma_mali1_1', $_POST["karfarma-mali1-1"]);
                    $statement->bindValue(':mablagh_mali1_1', (int)$_POST["mablagh-mali1-1"]);
                    $statement->bindValue(':emtiaz_mali1_1', (int)$_POST["emtiaz-mali1-1"]);
                    $statement->bindValue(':onvan_mali1_2', $_POST["onvan-mali1-2"]);
                    $statement->bindValue(':mahal_mali1_2', $_POST["mahal-mali1-2"]);
                    $statement->bindValue(':karfarma_mali1_2', $_POST["karfarma-mali1-2"]);
                    $statement->bindValue(':mablagh_mali1_2', (int)$_POST["mablagh-mali1-2"]);
                    $statement->bindValue(':emtiaz_mali1_2', (int)$_POST["emtiaz-mali1-2"]);
                    $statement->bindValue(':onvan_mali1_3', $_POST["onvan-mali1-3"]);
                    $statement->bindValue(':mahal_mali1_3', $_POST["mahal-mali1-3"]);
                    $statement->bindValue(':karfarma_mali1_3', $_POST["karfarma-mali1-3"]);
                    $statement->bindValue(':mablagh_mali1_3', (int)$_POST["mablagh-mali1-3"]);
                    $statement->bindValue(':emtiaz_mali1_3', (int)$_POST["emtiaz-mali1-3"]);
                    $statement->bindValue(':onvan_mali1_4', $_POST["onvan-mali1-4"]);
                    $statement->bindValue(':mahal_mali1_4', $_POST["mahal-mali1-4"]);
                    $statement->bindValue(':karfarma_mali1_4', $_POST["karfarma-mali1-4"]);
                    $statement->bindValue(':mablagh_mali1_4', (int)$_POST["mablagh-mali1-4"]);
                    $statement->bindValue(':emtiaz_mali1_4', (int)$_POST["emtiaz-mali1-4"]);
                    $statement->bindValue(':note_mali1', $_POST["note-mali1"]);
                    $statement->bindValue(':files_mali1_1', implode(",", $UinqFileMali1_1));
                    $statement->bindValue(':files_mali1_2', implode(",", $UinqFileMali1_2));
                    $statement->bindValue(':files_mali1_3', implode(",", $UinqFileMali1_3));
                    $statement->bindValue(':files_mali1_4', implode(",", $UinqFileMali1_4));
                    $statement->bindValue(':onvan_mali2_1', $_POST["onvan-mali2-1"]);
                    $statement->bindValue(':mahal_mali2_1', $_POST["mahal-mali2-1"]);
                    $statement->bindValue(':karfarma_mali2_1', $_POST["karfarma-mali2-1"]);
                    $statement->bindValue(':mablagh_mali2_1', (int)$_POST["mablagh-mali2-1"]);
                    $statement->bindValue(':emtiaz_mali2_1', (int)$_POST["emtiaz-mali2-1"]);
                    $statement->bindValue(':darsad_mali2_1', (int)$_POST["darsad-mali2-1"]);
                    $statement->bindValue(':onvan_mali2_2', $_POST["onvan-mali2-2"]);
                    $statement->bindValue(':mahal_mali2_2', $_POST["mahal-mali2-2"]);
                    $statement->bindValue(':karfarma_mali2_2', $_POST["karfarma-mali2-2"]);
                    $statement->bindValue(':mablagh_mali2_2', (int)$_POST["mablagh-mali2-2"]);
                    $statement->bindValue(':emtiaz_mali2_2', (int)$_POST["emtiaz-mali2-2"]);
                    $statement->bindValue(':darsad_mali2_2', (int)$_POST["darsad-mali2-2"]);
                    $statement->bindValue(':onvan_mali2_3', $_POST["onvan-mali2-3"]);
                    $statement->bindValue(':mahal_mali2_3', $_POST["mahal-mali2-3"]);
                    $statement->bindValue(':karfarma_mali2_3', $_POST["karfarma-mali2-3"]);
                    $statement->bindValue(':mablagh_mali2_3', (int)$_POST["mablagh-mali2-3"]);
                    $statement->bindValue(':emtiaz_mali2_3', (int)$_POST["emtiaz-mali2-3"]);
                    $statement->bindValue(':darsad_mali2_3', (int)$_POST["darsad-mali2-3"]);
                    $statement->bindValue(':onvan_mali2_4', $_POST["onvan-mali2-4"]);
                    $statement->bindValue(':mahal_mali2_4', $_POST["mahal-mali2-4"]);
                    $statement->bindValue(':karfarma_mali2_4', $_POST["karfarma-mali2-4"]);
                    $statement->bindValue(':mablagh_mali2_4', (int)$_POST["mablagh-mali2-4"]);
                    $statement->bindValue(':emtiaz_mali2_4', (int)$_POST["emtiaz-mali2-4"]);
                    $statement->bindValue(':darsad_mali2_4', (int)$_POST["darsad-mali2-4"]);
                    $statement->bindValue(':note_mali2', $_POST["note-mali2"]);
                    $statement->bindValue(':files_mali2_1', implode(",", $UinqFileMali2_1));
                    $statement->bindValue(':files_mali2_2', implode(",", $UinqFileMali2_2));
                    $statement->bindValue(':files_mali2_3', implode(",", $UinqFileMali2_3));
                    $statement->bindValue(':files_mali2_4', implode(",", $UinqFileMali2_4));
                    $statement->bindValue(':onvan_mali3_1', $_POST["onvan-mali3-1"]);
                    $statement->bindValue(':mahal_mali3_1', $_POST["mahal-mali3-1"]);
                    $statement->bindValue(':karfarma_mali3_1', $_POST["karfarma-mali3-1"]);
                    $statement->bindValue(':mablagh_mali3_1', (int)$_POST["mablagh-mali3-1"]);
                    $statement->bindValue(':emtiaz_mali3_1', (int)$_POST["emtiaz-mali3-1"]);
                    $statement->bindValue(':darsad_mali3_1', (int)$_POST["darsad-mali3-1"]);
                    $statement->bindValue(':onvan_mali3_2', $_POST["onvan-mali3-2"]);
                    $statement->bindValue(':mahal_mali3_2', $_POST["mahal-mali3-2"]);
                    $statement->bindValue(':karfarma_mali3_2', $_POST["karfarma-mali3-2"]);
                    $statement->bindValue(':mablagh_mali3_2', (int)$_POST["mablagh-mali3-2"]);
                    $statement->bindValue(':emtiaz_mali3_2', (int)$_POST["emtiaz-mali3-2"]);
                    $statement->bindValue(':darsad_mali3_2', (int)$_POST["darsad-mali3-2"]);
                    $statement->bindValue(':onvan_mali3_3', $_POST["onvan-mali3-3"]);
                    $statement->bindValue(':mahal_mali3_3', $_POST["mahal-mali3-3"]);
                    $statement->bindValue(':karfarma_mali3_3', $_POST["karfarma-mali3-3"]);
                    $statement->bindValue(':mablagh_mali3_3', (int)$_POST["mablagh-mali3-3"]);
                    $statement->bindValue(':emtiaz_mali3_3', (int)$_POST["emtiaz-mali3-3"]);
                    $statement->bindValue(':darsad_mali3_3', (int)$_POST["darsad-mali3-3"]);
                    $statement->bindValue(':onvan_mali3_4', $_POST["onvan-mali3-4"]);
                    $statement->bindValue(':mahal_mali3_4', $_POST["mahal-mali3-4"]);
                    $statement->bindValue(':karfarma_mali3_4', $_POST["karfarma-mali3-4"]);
                    $statement->bindValue(':mablagh_mali3_4', (int)$_POST["mablagh-mali3-4"]);
                    $statement->bindValue(':emtiaz_mali3_4', (int)$_POST["emtiaz-mali3-4"]);
                    $statement->bindValue(':darsad_mali3_4', (int)$_POST["darsad-mali3-4"]);
                    $statement->bindValue(':note_mali3', $_POST["note-mali3"]);
                    $statement->bindValue(':files_mali3_1', implode(",", $UinqFileMali3_1));
                    $statement->bindValue(':files_mali3_2', implode(",", $UinqFileMali3_2));
                    $statement->bindValue(':files_mali3_3', implode(",", $UinqFileMali3_3));
                    $statement->bindValue(':files_mali3_4', implode(",", $UinqFileMali3_4));
                    $statement->bindValue(':onvan_mali4_1', $_POST["onvan-mali4-1"]);
                    $statement->bindValue(':mablagh_mali4_1', (int)$_POST["mablagh-mali4-1"]);
                    $statement->bindValue(':emtiaz_mali4_1', (int)$_POST["emtiaz-mali4-1"]);
                    $statement->bindValue(':onvan_mali4_2', $_POST["onvan-mali4-2"]);
                    $statement->bindValue(':mablagh_mali4_2', (int)$_POST["mablagh-mali4-2"]);
                    $statement->bindValue(':emtiaz_mali4_2', (int)$_POST["emtiaz-mali4-2"]);
                    $statement->bindValue(':onvan_mali4_3', $_POST["onvan-mali4-3"]);
                    $statement->bindValue(':mablagh_mali4_3', (int)$_POST["mablagh-mali4-3"]);
                    $statement->bindValue(':emtiaz_mali4_3', (int)$_POST["emtiaz-mali4-3"]);
                    $statement->bindValue(':onvan_mali4_4', $_POST["onvan-mali4-4"]);
                    $statement->bindValue(':mablagh_mali4_4', (int)$_POST["mablagh-mali4-4"]);
                    $statement->bindValue(':emtiaz_mali4_4', (int)$_POST["emtiaz-mali4-4"]);
                    $statement->bindValue(':note_mali4', $_POST["note-mali4"]);
                    $statement->bindValue(':files_mali4_1', implode(",", $UinqFileMali4_1));
                    $statement->bindValue(':files_mali4_2', implode(",", $UinqFileMali4_2));
                    $statement->bindValue(':files_mali4_3', implode(",", $UinqFileMali4_3));
                    $statement->bindValue(':files_mali4_4', implode(",", $UinqFileMali4_4));
                    
                    /*$statement->bindValue(':onvan_dast1', $_POST["onvan-dast1"]);
                    $statement->bindValue(':marja_dast1', $_POST["marja-dast1"]);
                    $statement->bindValue(':date_dast1', $_POST["date-dast1"]);
                    $statement->bindValue(':emtiaz_dast1', $_POST["emtiaz-dast1"]);
                    $statement->bindValue(':onvan_dast2', $_POST["onvan-dast2"]);
                    $statement->bindValue(':marja_dast2', $_POST["marja-dast2"]);
                    $statement->bindValue(':date_dast2', $_POST["date-dast2"]);
                    $statement->bindValue(':emtiaz_dast2', $_POST["emtiaz-dast2"]);
                    $statement->bindValue(':onvan_dast3', $_POST["onvan-dast3"]);
                    $statement->bindValue(':marja_dast3', $_POST["marja-dast3"]);
                    $statement->bindValue(':date_dast3', $_POST["date-dast3"]);
                    $statement->bindValue(':emtiaz_dast3', $_POST["emtiaz-dast3"]);
                    $statement->bindValue(':onvan_dast4', $_POST["onvan-dast4"]);
                    $statement->bindValue(':marja_dast4', $_POST["marja-dast4"]);
                    $statement->bindValue(':date_dast4', $_POST["date-dast4"]);
                    $statement->bindValue(':emtiaz_dast4', $_POST["emtiaz-dast4"]);
                    $statement->bindValue(':onvan_dast5', $_POST["onvan-dast5"]);
                    $statement->bindValue(':marja_dast5', $_POST["marja-dast5"]);
                    $statement->bindValue(':date_dast5', $_POST["date-dast5"]);
                    $statement->bindValue(':emtiaz_dast5', $_POST["emtiaz-dast5"]);
                    $statement->bindValue(':onvan_dast6', $_POST["onvan-dast6"]);
                    $statement->bindValue(':marja_dast6', $_POST["marja-dast6"]);
                    $statement->bindValue(':date_dast6', $_POST["date-dast6"]);
                    $statement->bindValue(':emtiaz_dast6', $_POST["emtiaz-dast6"]);
                    $statement->bindValue(':note_dast', $_POST["note-dast"]);
                    $statement->bindValue(':files_dast', implode(",", $UinqFileDast));*/
                    $statement->bindValue(':onvan_dast1_1', $_POST["onvan-dast1-1"]);
                    $statement->bindValue(':marja_dast1_1', $_POST["marja-dast1-1"]);
                    $statement->bindValue(':date_dast1_1', $_POST["date-dast1-1"]);
                    $statement->bindValue(':emtiaz_dast1_1', (int)$_POST["emtiaz-dast1-1"]);
                    $statement->bindValue(':emtiazm_dast1_1', (int)$_POST["emtiazm-dast1-1"]);
                    $statement->bindValue(':files_dast1_1', implode(",", $UinqFileDast1_1));
                    $statement->bindValue(':onvan_dast1_2', $_POST["onvan-dast1-2"]);
                    $statement->bindValue(':marja_dast1_2', $_POST["marja-dast1-2"]);
                    $statement->bindValue(':date_dast1_2', $_POST["date-dast1-2"]);
                    $statement->bindValue(':emtiaz_dast1_2', (int)$_POST["emtiaz-dast1-2"]);
                    $statement->bindValue(':emtiazm_dast1_2', (int)$_POST["emtiazm-dast1-2"]);
                    $statement->bindValue(':files_dast1_2', implode(",", $UinqFileDast1_2));
                    $statement->bindValue(':onvan_dast1_3', $_POST["onvan-dast1-3"]);
                    $statement->bindValue(':marja_dast1_3', $_POST["marja-dast1-3"]);
                    $statement->bindValue(':date_dast1_3', $_POST["date-dast1-3"]);
                    $statement->bindValue(':emtiaz_dast1_3', (int)$_POST["emtiaz-dast1-3"]);
                    $statement->bindValue(':emtiazm_dast1_3', (int)$_POST["emtiazm-dast1-3"]);
                    $statement->bindValue(':files_dast1_3', implode(",", $UinqFileDast1_3));
                    $statement->bindValue(':onvan_dast1_4', $_POST["onvan-dast1-4"]);
                    $statement->bindValue(':marja_dast1_4', $_POST["marja-dast1-4"]);
                    $statement->bindValue(':date_dast1_4', $_POST["date-dast1-4"]);
                    $statement->bindValue(':emtiaz_dast1_4', (int)$_POST["emtiaz-dast1-4"]);
                    $statement->bindValue(':emtiazm_dast1_4', (int)$_POST["emtiazm-dast1-4"]);
                    $statement->bindValue(':files_dast1_4', implode(",", $UinqFileDast1_4));
                    $statement->bindValue(':onvan_dast2_1', $_POST["onvan-dast2-1"]);
                    $statement->bindValue(':marja_dast2_1', $_POST["marja-dast2-1"]);
                    $statement->bindValue(':date_dast2_1', $_POST["date-dast2-1"]);
                    $statement->bindValue(':emtiaz_dast2_1', (int)$_POST["emtiaz-dast2-1"]);
                    $statement->bindValue(':emtiazm_dast2_1', (int)$_POST["emtiazm-dast2-1"]);
                    $statement->bindValue(':files_dast2_1', implode(",", $UinqFileDast2_1));
                    $statement->bindValue(':onvan_dast2_2', $_POST["onvan-dast2-2"]);
                    $statement->bindValue(':marja_dast2_2', $_POST["marja-dast2-2"]);
                    $statement->bindValue(':date_dast2_2', $_POST["date-dast2-2"]);
                    $statement->bindValue(':emtiaz_dast2_2', (int)$_POST["emtiaz-dast2-2"]);
                    $statement->bindValue(':emtiazm_dast2_2', (int)$_POST["emtiazm-dast2-2"]);
                    $statement->bindValue(':files_dast2_2', implode(",", $UinqFileDast2_2));
                    $statement->bindValue(':onvan_dast2_3', $_POST["onvan-dast2-3"]);
                    $statement->bindValue(':marja_dast2_3', $_POST["marja-dast2-3"]);
                    $statement->bindValue(':date_dast2_3', $_POST["date-dast2-3"]);
                    $statement->bindValue(':emtiaz_dast2_3', (int)$_POST["emtiaz-dast2-3"]);
                    $statement->bindValue(':emtiazm_dast2_3', (int)$_POST["emtiazm-dast2-3"]);
                    $statement->bindValue(':files_dast2_3', implode(",", $UinqFileDast2_3));
                    $statement->bindValue(':onvan_dast2_4', $_POST["onvan-dast2-4"]);
                    $statement->bindValue(':marja_dast2_4', $_POST["marja-dast2-4"]);
                    $statement->bindValue(':date_dast2_4', $_POST["date-dast2-4"]);
                    $statement->bindValue(':emtiaz_dast2_4', (int)$_POST["emtiaz-dast2-4"]);
                    $statement->bindValue(':emtiazm_dast2_4', (int)$_POST["emtiazm-dast2-4"]);
                    $statement->bindValue(':files_dast2_4', implode(",", $UinqFileDast2_4));
                    $statement->bindValue(':onvan_dast3_1', $_POST["onvan-dast3-1"]);
                    $statement->bindValue(':marja_dast3_1', $_POST["marja-dast3-1"]);
                    $statement->bindValue(':date_dast3_1', $_POST["date-dast3-1"]);
                    $statement->bindValue(':emtiaz_dast3_1', (int)$_POST["emtiaz-dast3-1"]);
                    $statement->bindValue(':emtiazm_dast3_1', (int)$_POST["emtiazm-dast3-1"]);
                    $statement->bindValue(':files_dast3_1', implode(",", $UinqFileDast3_1));
                    $statement->bindValue(':onvan_dast3_2', $_POST["onvan-dast3-2"]);
                    $statement->bindValue(':marja_dast3_2', $_POST["marja-dast3-2"]);
                    $statement->bindValue(':date_dast3_2', $_POST["date-dast3-2"]);
                    $statement->bindValue(':emtiaz_dast3_2', (int)$_POST["emtiaz-dast3-2"]);
                    $statement->bindValue(':emtiazm_dast3_2', (int)$_POST["emtiazm-dast3-2"]);
                    $statement->bindValue(':files_dast3_2', implode(",", $UinqFileDast3_2));
                    $statement->bindValue(':onvan_dast3_3', $_POST["onvan-dast3-3"]);
                    $statement->bindValue(':marja_dast3_3', $_POST["marja-dast3-3"]);
                    $statement->bindValue(':date_dast3_3', $_POST["date-dast3-3"]);
                    $statement->bindValue(':emtiaz_dast3_3', (int)$_POST["emtiaz-dast3-3"]);
                    $statement->bindValue(':emtiazm_dast3_3', (int)$_POST["emtiazm-dast3-3"]);
                    $statement->bindValue(':files_dast3_3', implode(",", $UinqFileDast3_3));
                    $statement->bindValue(':onvan_dast3_4', $_POST["onvan-dast3-4"]);
                    $statement->bindValue(':marja_dast3_4', $_POST["marja-dast3-4"]);
                    $statement->bindValue(':date_dast3_4', $_POST["date-dast3-4"]);
                    $statement->bindValue(':emtiaz_dast3_4', (int)$_POST["emtiaz-dast3-4"]);
                    $statement->bindValue(':emtiazm_dast3_4', (int)$_POST["emtiazm-dast3-4"]);
                    $statement->bindValue(':files_dast3_4', implode(",", $UinqFileDast3_4));
                    $statement->bindValue(':onvan_dast4_1', $_POST["onvan-dast4-1"]);
                    $statement->bindValue(':marja_dast4_1', $_POST["marja-dast4-1"]);
                    $statement->bindValue(':date_dast4_1', $_POST["date-dast4-1"]);
                    $statement->bindValue(':emtiaz_dast4_1', (int)$_POST["emtiaz-dast4-1"]);
                    $statement->bindValue(':emtiazm_dast4_1', (int)$_POST["emtiazm-dast4-1"]);
                    $statement->bindValue(':files_dast4_1', implode(",", $UinqFileDast4_1));
                    $statement->bindValue(':onvan_dast4_2', $_POST["onvan-dast4-2"]);
                    $statement->bindValue(':marja_dast4_2', $_POST["marja-dast4-2"]);
                    $statement->bindValue(':date_dast4_2', $_POST["date-dast4-2"]);
                    $statement->bindValue(':emtiaz_dast4_2', (int)$_POST["emtiaz-dast4-2"]);
                    $statement->bindValue(':emtiazm_dast4_2', (int)$_POST["emtiazm-dast4-2"]);
                    $statement->bindValue(':files_dast4_2', implode(",", $UinqFileDast4_2));
                    $statement->bindValue(':onvan_dast4_3', $_POST["onvan-dast4-3"]);
                    $statement->bindValue(':marja_dast4_3', $_POST["marja-dast4-3"]);
                    $statement->bindValue(':date_dast4_3', $_POST["date-dast4-3"]);
                    $statement->bindValue(':emtiaz_dast4_3', (int)$_POST["emtiaz-dast4-3"]);
                    $statement->bindValue(':emtiazm_dast4_3', (int)$_POST["emtiazm-dast4-3"]);
                    $statement->bindValue(':files_dast4_3', implode(",", $UinqFileDast4_3));
                    $statement->bindValue(':onvan_dast4_4', $_POST["onvan-dast4-4"]);
                    $statement->bindValue(':marja_dast4_4', $_POST["marja-dast4-4"]);
                    $statement->bindValue(':date_dast4_4', $_POST["date-dast4-4"]);
                    $statement->bindValue(':emtiaz_dast4_4', (int)$_POST["emtiaz-dast4-4"]);
                    $statement->bindValue(':emtiazm_dast4_4', (int)$_POST["emtiazm-dast4-4"]);
                    $statement->bindValue(':files_dast4_4', implode(",", $UinqFileDast4_4));
                    $statement->bindValue(':onvan_dast5_1', $_POST["onvan-dast5-1"]);
                    $statement->bindValue(':marja_dast5_1', $_POST["marja-dast5-1"]);
                    $statement->bindValue(':date_dast5_1', $_POST["date-dast5-1"]);
                    $statement->bindValue(':emtiaz_dast5_1', (int)$_POST["emtiaz-dast5-1"]);
                    $statement->bindValue(':emtiazm_dast5_1', (int)$_POST["emtiazm-dast5-1"]);
                    $statement->bindValue(':files_dast5_1', implode(",", $UinqFileDast5_1));
                    $statement->bindValue(':onvan_dast5_2', $_POST["onvan-dast5-2"]);
                    $statement->bindValue(':marja_dast5_2', $_POST["marja-dast5-2"]);
                    $statement->bindValue(':date_dast5_2', $_POST["date-dast5-2"]);
                    $statement->bindValue(':emtiaz_dast5_2', (int)$_POST["emtiaz-dast5-2"]);
                    $statement->bindValue(':emtiazm_dast5_2', (int)$_POST["emtiazm-dast5-2"]);
                    $statement->bindValue(':files_dast5_2', implode(",", $UinqFileDast5_2));
                    $statement->bindValue(':onvan_dast5_3', $_POST["onvan-dast5-3"]);
                    $statement->bindValue(':marja_dast5_3', $_POST["marja-dast5-3"]);
                    $statement->bindValue(':date_dast5_3', $_POST["date-dast5-3"]);
                    $statement->bindValue(':emtiaz_dast5_3', (int)$_POST["emtiaz-dast5-3"]);
                    $statement->bindValue(':emtiazm_dast5_3', (int)$_POST["emtiazm-dast5-3"]);
                    $statement->bindValue(':files_dast5_3', implode(",", $UinqFileDast5_3));
                    $statement->bindValue(':onvan_dast5_4', $_POST["onvan-dast5-4"]);
                    $statement->bindValue(':marja_dast5_4', $_POST["marja-dast5-4"]);
                    $statement->bindValue(':date_dast5_4', $_POST["date-dast5-4"]);
                    $statement->bindValue(':emtiaz_dast5_4', (int)$_POST["emtiaz-dast5-4"]);
                    $statement->bindValue(':emtiazm_dast5_4', (int)$_POST["emtiazm-dast5-4"]);
                    $statement->bindValue(':files_dast5_4', implode(",", $UinqFileDast5_4));
                    $statement->bindValue(':onvan_dast6_1', $_POST["onvan-dast6-1"]);
                    $statement->bindValue(':marja_dast6_1', $_POST["marja-dast6-1"]);
                    $statement->bindValue(':date_dast6_1', $_POST["date-dast6-1"]);
                    $statement->bindValue(':emtiaz_dast6_1', (int)$_POST["emtiaz-dast6-1"]);
                    $statement->bindValue(':emtiazm_dast6_1', (int)$_POST["emtiazm-dast6-1"]);
                    $statement->bindValue(':files_dast6_1', implode(",", $UinqFileDast6_1));
                    $statement->bindValue(':onvan_dast6_2', $_POST["onvan-dast6-2"]);
                    $statement->bindValue(':marja_dast6_2', $_POST["marja-dast6-2"]);
                    $statement->bindValue(':date_dast6_2', $_POST["date-dast6-2"]);
                    $statement->bindValue(':emtiaz_dast6_2', (int)$_POST["emtiaz-dast6-2"]);
                    $statement->bindValue(':emtiazm_dast6_2', (int)$_POST["emtiazm-dast6-2"]);
                    $statement->bindValue(':files_dast6_2', implode(",", $UinqFileDast6_2));
                    $statement->bindValue(':onvan_dast6_3', $_POST["onvan-dast6-3"]);
                    $statement->bindValue(':marja_dast6_3', $_POST["marja-dast6-3"]);
                    $statement->bindValue(':date_dast6_3', $_POST["date-dast6-3"]);
                    $statement->bindValue(':emtiaz_dast6_3', (int)$_POST["emtiaz-dast6-3"]);
                    $statement->bindValue(':emtiazm_dast6_3', (int)$_POST["emtiazm-dast6-3"]);
                    $statement->bindValue(':files_dast6_3', implode(",", $UinqFileDast6_3));
                    $statement->bindValue(':onvan_dast6_4', $_POST["onvan-dast6-4"]);
                    $statement->bindValue(':marja_dast6_4', $_POST["marja-dast6-4"]);
                    $statement->bindValue(':date_dast6_4', $_POST["date-dast6-4"]);
                    $statement->bindValue(':emtiaz_dast6_4', (int)(int)$_POST["emtiaz-dast6-4"]);
                    $statement->bindValue(':emtiazm_dast6_4', (int)$_POST["emtiazm-dast6-4"]);
                    $statement->bindValue(':files_dast6_4', implode(",", $UinqFileDast6_4));
                    
                    $statement->bindValue(':onvan_niroo1', $_POST["onvan-niroo1"]);
                    $statement->bindValue(':tahsil_niroo1', $_POST["tahsil-niroo1"]);
                    $statement->bindValue(':hamkari_niroo1', $_POST["hamkari-niroo1"]);
                    $statement->bindValue(':sabeghe_niroo1', (int)$_POST["sabeghe-niroo1"]);
                    $statement->bindValue(':bime_niroo1', $_POST["bime-niroo1"]);
                    $statement->bindValue(':emtiaz_niroo1', (int)$_POST["emtiaz-niroo1"]);
                    $statement->bindValue(':onvan_niroo2', $_POST["onvan-niroo2"]);
                    $statement->bindValue(':tahsil_niroo2', $_POST["tahsil-niroo2"]);
                    $statement->bindValue(':hamkari_niroo2', $_POST["hamkari-niroo2"]);
                    $statement->bindValue(':sabeghe_niroo2', (int)$_POST["sabeghe-niroo2"]);
                    $statement->bindValue(':bime_niroo2', $_POST["bime-niroo2"]);
                    $statement->bindValue(':emtiaz_niroo2', (int)$_POST["emtiaz-niroo2"]);
                    $statement->bindValue(':onvan_niroo3', $_POST["onvan-niroo3"]);
                    $statement->bindValue(':tahsil_niroo3', $_POST["tahsil-niroo3"]);
                    $statement->bindValue(':hamkari_niroo3', $_POST["hamkari-niroo3"]);
                    $statement->bindValue(':sabeghe_niroo3', (int)$_POST["sabeghe-niroo3"]);
                    $statement->bindValue(':bime_niroo3', $_POST["bime-niroo3"]);
                    $statement->bindValue(':emtiaz_niroo3', (int)$_POST["emtiaz-niroo3"]);
                    $statement->bindValue(':onvan_niroo4', $_POST["onvan-niroo4"]);
                    $statement->bindValue(':tahsil_niroo4', $_POST["tahsil-niroo4"]);
                    $statement->bindValue(':hamkari_niroo4', $_POST["hamkari-niroo4"]);
                    $statement->bindValue(':sabeghe_niroo4', (int)$_POST["sabeghe-niroo4"]);
                    $statement->bindValue(':bime_niroo4', $_POST["bime-niroo4"]);
                    $statement->bindValue(':emtiaz_niroo4', (int)$_POST["emtiaz-niroo4"]);
                    $statement->bindValue(':onvan_niroo5', $_POST["onvan-niroo5"]);
                    $statement->bindValue(':tahsil_niroo5', $_POST["tahsil-niroo5"]);
                    $statement->bindValue(':hamkari_niroo5', $_POST["hamkari-niroo5"]);
                    $statement->bindValue(':sabeghe_niroo5', (int)$_POST["sabeghe-niroo5"]);
                    $statement->bindValue(':bime_niroo5', $_POST["bime-niroo5"]);
                    $statement->bindValue(':emtiaz_niroo5', (int)$_POST["emtiaz-niroo5"]);
                    $statement->bindValue(':onvan_niroo6', $_POST["onvan-niroo6"]);
                    $statement->bindValue(':tahsil_niroo6', $_POST["tahsil-niroo6"]);
                    $statement->bindValue(':hamkari_niroo6', $_POST["hamkari-niroo6"]);
                    $statement->bindValue(':sabeghe_niroo6', (int)$_POST["sabeghe-niroo6"]);
                    $statement->bindValue(':bime_niroo6', $_POST["bime-niroo6"]);
                    $statement->bindValue(':emtiaz_niroo6', (int)$_POST["emtiaz-niroo6"]);
                    $statement->bindValue(':onvan_niroo7', $_POST["onvan-niroo7"]);
                    $statement->bindValue(':tahsil_niroo7', $_POST["tahsil-niroo7"]);
                    $statement->bindValue(':hamkari_niroo7', $_POST["hamkari-niroo7"]);
                    $statement->bindValue(':sabeghe_niroo7', (int)$_POST["sabeghe-niroo7"]);
                    $statement->bindValue(':bime_niroo7', $_POST["bime-niroo7"]);
                    $statement->bindValue(':emtiaz_niroo7', (int)$_POST["emtiaz-niroo7"]);
                    $statement->bindValue(':onvan_niroo8', $_POST["onvan-niroo8"]);
                    $statement->bindValue(':tahsil_niroo8', $_POST["tahsil-niroo8"]);
                    $statement->bindValue(':hamkari_niroo8', $_POST["hamkari-niroo8"]);
                    $statement->bindValue(':sabeghe_niroo8', (int)$_POST["sabeghe-niroo8"]);
                    $statement->bindValue(':bime_niroo8', $_POST["bime-niroo8"]);
                    $statement->bindValue(':emtiaz_niroo8', (int)$_POST["emtiaz-niroo8"]);
                    $statement->bindValue(':onvan_niroo9', $_POST["onvan-niroo9"]);
                    $statement->bindValue(':tahsil_niroo9', $_POST["tahsil-niroo9"]);
                    $statement->bindValue(':hamkari_niroo9', $_POST["hamkari-niroo9"]);
                    $statement->bindValue(':sabeghe_niroo9', (int)$_POST["sabeghe-niroo9"]);
                    $statement->bindValue(':bime_niroo9', $_POST["bime-niroo9"]);
                    $statement->bindValue(':emtiaz_niroo9', (int)$_POST["emtiaz-niroo9"]);
                    $statement->bindValue(':onvan_niroo10', $_POST["onvan-niroo10"]);
                    $statement->bindValue(':tahsil_niroo10', $_POST["tahsil-niroo10"]);
                    $statement->bindValue(':hamkari_niroo10', $_POST["hamkari-niroo10"]);
                    $statement->bindValue(':sabeghe_niroo10', (int)$_POST["sabeghe-niroo10"]);
                    $statement->bindValue(':bime_niroo10', $_POST["bime-niroo10"]);
                    $statement->bindValue(':emtiaz_niroo10', (int)$_POST["emtiaz-niroo10"]);
                    $statement->bindValue(':files_niroo', implode(",", $UinqFileNiroo));
                    $statement->bindValue(':onvan_bazar1_1', $_POST["onvan-bazar1-1"]);
                    $statement->bindValue(':mahal_bazar1_1', $_POST["mahal-bazar1-1"]);
                    $statement->bindValue(':date_bazar1_1', $_POST["date-bazar1-1"]);
                    $statement->bindValue(':type_bazar1_1', $_POST["type-bazar1-1"]);
                    $statement->bindValue(':emtiaz_bazar1_1', (int)$_POST["emtiaz-bazar1-1"]);
                    $statement->bindValue(':onvan_bazar1_2', $_POST["onvan-bazar1-2"]);
                    $statement->bindValue(':mahal_bazar1_2', $_POST["mahal-bazar1-2"]);
                    $statement->bindValue(':date_bazar1_2', $_POST["date-bazar1-2"]);
                    $statement->bindValue(':type_bazar1_2', $_POST["type-bazar1-2"]);
                    $statement->bindValue(':emtiaz_bazar1_2', (int)$_POST["emtiaz-bazar1-2"]);
                    $statement->bindValue(':onvan_bazar1_3', $_POST["onvan-bazar1-3"]);
                    $statement->bindValue(':mahal_bazar1_3', $_POST["mahal-bazar1-3"]);
                    $statement->bindValue(':date_bazar1_3', $_POST["date-bazar1-3"]);
                    $statement->bindValue(':type_bazar1_3', $_POST["type-bazar1-3"]);
                    $statement->bindValue(':emtiaz_bazar1_3', (int)$_POST["emtiaz-bazar1-3"]);
                    $statement->bindValue(':onvan_bazar1_4', $_POST["onvan-bazar1-4"]);
                    $statement->bindValue(':mahal_bazar1_4', $_POST["mahal-bazar1-4"]);
                    $statement->bindValue(':date_bazar1_4', $_POST["date-bazar1-4"]);
                    $statement->bindValue(':type_bazar1_4', $_POST["type-bazar1-4"]);
                    $statement->bindValue(':emtiaz_bazar1_4', (int)$_POST["emtiaz-bazar1-4"]);
                    $statement->bindValue(':note_bazar1', $_POST["note-bazar1"]);
                    $statement->bindValue(':files_bazar1_1', implode(",", $UinqFileBazar1_1));
                    $statement->bindValue(':files_bazar1_2', implode(",", $UinqFileBazar1_2));
                    $statement->bindValue(':files_bazar1_3', implode(",", $UinqFileBazar1_3));
                    $statement->bindValue(':files_bazar1_4', implode(",", $UinqFileBazar1_4));
                    $statement->bindValue(':onvan_bazar2', $_POST["onvan-bazar2"]);
                    $statement->bindValue(':files_bazar2', implode(",", $UinqFileBazar2));
                    $statement->bindValue(':onvan_bazar3_1', $_POST["onvan-bazar3-1"]);
                    $statement->bindValue(':date_bazar3_1', $_POST["date-bazar3-1"]);
                    $statement->bindValue(':bargozar_bazar3_1', $_POST["bargozar-bazar3-1"]);
                    $statement->bindValue(':mahal_bazar3_1', $_POST["mahal-bazar3-1"]);
                    $statement->bindValue(':emtiaz_bazar3_1', (int)$_POST["emtiaz-bazar3-1"]);
                    $statement->bindValue(':onvan_bazar3_2', $_POST["onvan-bazar3-2"]);
                    $statement->bindValue(':date_bazar3_2', $_POST["date-bazar3-2"]);
                    $statement->bindValue(':bargozar_bazar3_2', $_POST["bargozar-bazar3-2"]);
                    $statement->bindValue(':mahal_bazar3_2', $_POST["mahal-bazar3-2"]);
                    $statement->bindValue(':emtiaz_bazar3_2', (int)$_POST["emtiaz-bazar3-2"]);
                    $statement->bindValue(':onvan_bazar3_3', $_POST["onvan-bazar3-3"]);
                    $statement->bindValue(':date_bazar3_3', $_POST["date-bazar3-3"]);
                    $statement->bindValue(':bargozar_bazar3_3', $_POST["bargozar-bazar3-3"]);
                    $statement->bindValue(':mahal_bazar3_3', $_POST["mahal-bazar3-3"]);
                    $statement->bindValue(':emtiaz_bazar3_3', (int)$_POST["emtiaz-bazar3-3"]);
                    $statement->bindValue(':onvan_bazar3_4', $_POST["onvan-bazar3-4"]);
                    $statement->bindValue(':date_bazar3_4', $_POST["date-bazar3-4"]);
                    $statement->bindValue(':bargozar_bazar3_4', $_POST["bargozar-bazar3-4"]);
                    $statement->bindValue(':mahal_bazar3_4', $_POST["mahal-bazar3-4"]);
                    $statement->bindValue(':emtiaz_bazar3_4', (int)$_POST["emtiaz-bazar3-4"]);
                    $statement->bindValue(':note_bazar3', $_POST["note-bazar3"]);
                    $statement->bindValue(':files_bazar3_1', implode(",", $UinqFileBazar3_1));
                    $statement->bindValue(':files_bazar3_2', implode(",", $UinqFileBazar3_2));
                    $statement->bindValue(':files_bazar3_3', implode(",", $UinqFileBazar3_3));
                    $statement->bindValue(':files_bazar3_4', implode(",", $UinqFileBazar3_4));
                    $statement->bindValue(':onvan_bazar4_1', $_POST["onvan-bazar4-1"]);
                    $statement->bindValue(':date_bazar4_1', $_POST["date-bazar4-1"]);
                    $statement->bindValue(':mahal_bazar4_1', $_POST["mahal-bazar4-1"]);
                    $statement->bindValue(':naghsh_bazar4_1', $_POST["naghsh-bazar4-1"]);
                    $statement->bindValue(':emtiaz_bazar4_1', (int)$_POST["emtiaz-bazar4-1"]);
                    $statement->bindValue(':onvan_bazar4_2', $_POST["onvan-bazar4-2"]);
                    $statement->bindValue(':date_bazar4_2', $_POST["date-bazar4-2"]);
                    $statement->bindValue(':mahal_bazar4_2', $_POST["mahal-bazar4-2"]);
                    $statement->bindValue(':naghsh_bazar4_2', $_POST["naghsh-bazar4-2"]);
                    $statement->bindValue(':emtiaz_bazar4_2', (int)$_POST["emtiaz-bazar4-2"]);
                    $statement->bindValue(':onvan_bazar4_3', $_POST["onvan-bazar4-3"]);
                    $statement->bindValue(':date_bazar4_3', $_POST["date-bazar4-3"]);
                    $statement->bindValue(':mahal_bazar4_3', $_POST["mahal-bazar4-3"]);
                    $statement->bindValue(':naghsh_bazar4_3', $_POST["naghsh-bazar4-3"]);
                    $statement->bindValue(':emtiaz_bazar4_3', (int)$_POST["emtiaz-bazar4-3"]);
                    $statement->bindValue(':onvan_bazar4_4', $_POST["onvan-bazar4-4"]);
                    $statement->bindValue(':date_bazar4_4', $_POST["date-bazar4-4"]);
                    $statement->bindValue(':mahal_bazar4_4', $_POST["mahal-bazar4-4"]);
                    $statement->bindValue(':naghsh_bazar4_4', $_POST["naghsh-bazar4-4"]);
                    $statement->bindValue(':emtiaz_bazar4_4', (int)$_POST["emtiaz-bazar4-4"]);
                    $statement->bindValue(':note_bazar4', $_POST["note-bazar4"]);
                    $statement->bindValue(':files_bazar4_1', implode(",", $UinqFileBazar4_1));
                    $statement->bindValue(':files_bazar4_2', implode(",", $UinqFileBazar4_2));
                    $statement->bindValue(':files_bazar4_3', implode(",", $UinqFileBazar4_3));
                    $statement->bindValue(':files_bazar4_4', implode(",", $UinqFileBazar4_4));
                    $statement->bindValue(':onvan_amoozeshi1_1', $_POST["onvan-amoozeshi1-1"]);
                    $statement->bindValue(':date_amoozeshi1_1', $_POST["date-amoozeshi1-1"]);
                    $statement->bindValue(':bargozar_amoozeshi1_1', $_POST["bargozar-amoozeshi1-1"]);
                    $statement->bindValue(':mahal_amoozeshi1_1', $_POST["mahal-amoozeshi1-1"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_1', (int)$_POST["emtiaz-amoozeshi1-1"]);
                    $statement->bindValue(':onvan_amoozeshi1_2', $_POST["onvan-amoozeshi1-2"]);
                    $statement->bindValue(':date_amoozeshi1_2', $_POST["date-amoozeshi1-2"]);
                    $statement->bindValue(':bargozar_amoozeshi1_2', $_POST["bargozar-amoozeshi1-2"]);
                    $statement->bindValue(':mahal_amoozeshi1_2', $_POST["mahal-amoozeshi1-2"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_2', (int)$_POST["emtiaz-amoozeshi1-2"]);
                    $statement->bindValue(':onvan_amoozeshi1_3', $_POST["onvan-amoozeshi1-3"]);
                    $statement->bindValue(':date_amoozeshi1_3', $_POST["date-amoozeshi1-3"]);
                    $statement->bindValue(':bargozar_amoozeshi1_3', $_POST["bargozar-amoozeshi1-3"]);
                    $statement->bindValue(':mahal_amoozeshi1_3', $_POST["mahal-amoozeshi1-3"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_3', (int)$_POST["emtiaz-amoozeshi1-3"]);
                    $statement->bindValue(':onvan_amoozeshi1_4', $_POST["onvan-amoozeshi1-4"]);
                    $statement->bindValue(':date_amoozeshi1_4', $_POST["date-amoozeshi1-4"]);
                    $statement->bindValue(':bargozar_amoozeshi1_4', $_POST["bargozar-amoozeshi1-4"]);
                    $statement->bindValue(':mahal_amoozeshi1_4', $_POST["mahal-amoozeshi1-4"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_4', (int)$_POST["emtiaz-amoozeshi1-4"]);
                    $statement->bindValue(':note_amoozeshi1', $_POST["note-amoozeshi1"]);
                    $statement->bindValue(':files_amoozeshi1_1', implode(",", $UinqFileAmoozeshi1_1));
                    $statement->bindValue(':files_amoozeshi1_2', implode(",", $UinqFileAmoozeshi1_2));
                    $statement->bindValue(':files_amoozeshi1_3', implode(",", $UinqFileAmoozeshi1_3));
                    $statement->bindValue(':files_amoozeshi1_4', implode(",", $UinqFileAmoozeshi1_4));
                    $statement->bindValue(':onvan_amoozeshi2_1', $_POST["onvan-amoozeshi2-1"]);
                    $statement->bindValue(':date_amoozeshi2_1', $_POST["date-amoozeshi2-1"]);
                    $statement->bindValue(':mahal_amoozeshi2_1', $_POST["mahal-amoozeshi2-1"]);
                    $statement->bindValue(':naghsh_amoozeshi2_1', $_POST["naghsh-amoozeshi2-1"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_1', (int)$_POST["emtiaz-amoozeshi2-1"]);
                    $statement->bindValue(':onvan_amoozeshi2_2', $_POST["onvan-amoozeshi2-2"]);
                    $statement->bindValue(':date_amoozeshi2_2', $_POST["date-amoozeshi2-2"]);
                    $statement->bindValue(':mahal_amoozeshi2_2', $_POST["mahal-amoozeshi2-2"]);
                    $statement->bindValue(':naghsh_amoozeshi2_2', $_POST["naghsh-amoozeshi2-2"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_2', (int)$_POST["emtiaz-amoozeshi2-2"]);
                    $statement->bindValue(':onvan_amoozeshi2_3', $_POST["onvan-amoozeshi2-3"]);
                    $statement->bindValue(':date_amoozeshi2_3', $_POST["date-amoozeshi2-3"]);
                    $statement->bindValue(':mahal_amoozeshi2_3', $_POST["mahal-amoozeshi2-3"]);
                    $statement->bindValue(':naghsh_amoozeshi2_3', $_POST["naghsh-amoozeshi2-3"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_3', (int)$_POST["emtiaz-amoozeshi2-3"]);
                    $statement->bindValue(':onvan_amoozeshi2_4', $_POST["onvan-amoozeshi2-4"]);
                    $statement->bindValue(':date_amoozeshi2_4', $_POST["date-amoozeshi2-4"]);
                    $statement->bindValue(':mahal_amoozeshi2_4', $_POST["mahal-amoozeshi2-4"]);
                    $statement->bindValue(':naghsh_amoozeshi2_4', $_POST["naghsh-amoozeshi2-4"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_4', (int)$_POST["emtiaz-amoozeshi2-4"]);
                    $statement->bindValue(':note_amoozeshi2', $_POST["note-amoozeshi2"]);
                    $statement->bindValue(':files_amoozeshi2_1', implode(",", $UinqFileAmoozeshi2_1));
                    $statement->bindValue(':files_amoozeshi2_2', implode(",", $UinqFileAmoozeshi2_2));
                    $statement->bindValue(':files_amoozeshi2_3', implode(",", $UinqFileAmoozeshi2_3));
                    $statement->bindValue(':files_amoozeshi2_4', implode(",", $UinqFileAmoozeshi2_4));
                    $statement->bindValue(':emtiaz_taamolp1', (int)$_POST["emtiaz-taamolp1"]);
                    $statement->bindValue(':emtiaz_taamolp2', (int)$_POST["emtiaz-taamolp2"]);
                    $statement->bindValue(':emtiaz_taamolp3', (int)$_POST["emtiaz-taamolp3"]);
                    $statement->bindValue(':emtiaz_taamolp4', (int)$_POST["emtiaz-taamolp4"]);
                    $statement->bindValue(':emtiaz_taamolp5', (int)$_POST["emtiaz-taamolp5"]);
                    $statement->bindValue(':emtiaz_taamols1', (int)$_POST["emtiaz-taamols1"]);
                    $statement->bindValue(':emtiaz_taamols2', (int)$_POST["emtiaz-taamols2"]);
                    $statement->bindValue(':nazar_sanji1', $_POST["nazar-sanji1"]);
                    $statement->bindValue(':nazar_sanji2', $_POST["nazar-sanji2"]);
                    $statement->bindValue(':nazar_sanji3', $_POST["nazar-sanji3"]);
                    $statement->bindValue(':nazar_sanji4', $_POST["nazar-sanji4"]);
                    $statement->bindValue(':nazar_sanji5', $_POST["nazar-sanji5"]);
                    $statement->bindValue(':nazar_sanji6', $_POST["nazar-sanji6"]);
                    $statement->bindValue(':nazar_sanji7', $_POST["nazar-sanji7"]);
                    $statement->bindValue(':nazar_sanji8', $_POST["nazar-sanji8"]);
                    $statement->bindValue(':nazar_sanji9', $_POST["nazar-sanji9"]);
                    $statement->bindValue(':nazar_sanji10', $_POST["nazar-sanji10"]);
                    $statement->bindValue(':nazar_sanji11', $_POST["nazar-sanji11"]);
                    $statement->bindValue(':nazar_sanji12', $_POST["nazar-sanji12"]);
                    $statement->bindValue(':nazar_sanji13', $_POST["nazar-sanji13"]);
                    $statement->bindValue(':nazar_sanji14', $_POST["nazar-sanji14"]);

                    $statement->bindValue(':emtiazm_mali1_1', (int)$_POST["emtiazm-mali1-1"]);
                    $statement->bindValue(':emtiazm_mali1_2', (int)$_POST["emtiazm-mali1-2"]);
                    $statement->bindValue(':emtiazm_mali1_3', (int)$_POST["emtiazm-mali1-3"]);
                    $statement->bindValue(':emtiazm_mali1_4', (int)$_POST["emtiazm-mali1-4"]);
                    $statement->bindValue(':emtiazm_mali2_1', (int)$_POST["emtiazm-mali2-1"]);
                    $statement->bindValue(':emtiazm_mali2_2', (int)$_POST["emtiazm-mali2-2"]);
                    $statement->bindValue(':emtiazm_mali2_3', (int)$_POST["emtiazm-mali2-3"]);
                    $statement->bindValue(':emtiazm_mali2_4', (int)$_POST["emtiazm-mali2-4"]);
                    $statement->bindValue(':emtiazm_mali3_1', (int)$_POST["emtiazm-mali3-1"]);
                    $statement->bindValue(':emtiazm_mali3_2', (int)$_POST["emtiazm-mali3-2"]);
                    $statement->bindValue(':emtiazm_mali3_3', (int)$_POST["emtiazm-mali3-3"]);
                    $statement->bindValue(':emtiazm_mali3_4', (int)$_POST["emtiazm-mali3-4"]);
                    $statement->bindValue(':emtiazm_mali4_1', (int)$_POST["emtiazm-mali4-1"]);
                    $statement->bindValue(':emtiazm_mali4_2', (int)$_POST["emtiazm-mali4-2"]);
                    $statement->bindValue(':emtiazm_mali4_3', (int)$_POST["emtiazm-mali4-3"]);
                    $statement->bindValue(':emtiazm_mali4_4', (int)$_POST["emtiazm-mali4-4"]);
                    $statement->bindValue(':emtiazm_niroo1', (int)$_POST["emtiazm-niroo1"]);
                    $statement->bindValue(':emtiazm_niroo2', (int)$_POST["emtiazm-niroo2"]);
                    $statement->bindValue(':emtiazm_niroo3', (int)$_POST["emtiazm-niroo3"]);
                    $statement->bindValue(':emtiazm_niroo4', (int)$_POST["emtiazm-niroo4"]);
                    $statement->bindValue(':emtiazm_niroo5', (int)$_POST["emtiazm-niroo5"]);
                    $statement->bindValue(':emtiazm_niroo6', (int)$_POST["emtiazm-niroo6"]);
                    $statement->bindValue(':emtiazm_niroo7', (int)$_POST["emtiazm-niroo7"]);
                    $statement->bindValue(':emtiazm_niroo8', (int)$_POST["emtiazm-niroo8"]);
                    $statement->bindValue(':emtiazm_niroo9', (int)$_POST["emtiazm-niroo9"]);
                    $statement->bindValue(':emtiazm_niroo10', (int)$_POST["emtiazm-niroo10"]);
                    $statement->bindValue(':emtiazm_bazar1_1', (int)$_POST["emtiazm-bazar1-1"]);
                    $statement->bindValue(':emtiazm_bazar1_2', (int)$_POST["emtiazm-bazar1-2"]);
                    $statement->bindValue(':emtiazm_bazar1_3', (int)$_POST["emtiazm-bazar1-3"]);
                    $statement->bindValue(':emtiazm_bazar1_4', (int)$_POST["emtiazm-bazar1-4"]);
                    $statement->bindValue(':emtiaz_bazar2', (int)$_POST["emtiaz-bazar2"]);
                    $statement->bindValue(':emtiazm_bazar2', (int)$_POST["emtiazm-bazar2"]);
                    $statement->bindValue(':emtiazm_bazar3_1', (int)$_POST["emtiazm-bazar3-1"]);
                    $statement->bindValue(':emtiazm_bazar3_2', (int)$_POST["emtiazm-bazar3-2"]);
                    $statement->bindValue(':emtiazm_bazar3_3', (int)$_POST["emtiazm-bazar3-3"]);
                    $statement->bindValue(':emtiazm_bazar3_4', (int)$_POST["emtiazm-bazar3-4"]);
                    $statement->bindValue(':emtiazm_bazar4_1', (int)$_POST["emtiazm-bazar4-1"]);
                    $statement->bindValue(':emtiazm_bazar4_2', (int)$_POST["emtiazm-bazar4-2"]);
                    $statement->bindValue(':emtiazm_bazar4_3', (int)$_POST["emtiazm-bazar4-3"]);
                    $statement->bindValue(':emtiazm_bazar4_4', (int)$_POST["emtiazm-bazar4-4"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_1', (int)$_POST["emtiazm-amoozeshi1-1"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_2', (int)$_POST["emtiazm-amoozeshi1-2"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_3', (int)$_POST["emtiazm-amoozeshi1-3"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_4', (int)$_POST["emtiazm-amoozeshi1-4"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_1', (int)$_POST["emtiazm-amoozeshi2-1"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_2', (int)$_POST["emtiazm-amoozeshi2-2"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_3', (int)$_POST["emtiazm-amoozeshi2-3"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_4', (int)$_POST["emtiazm-amoozeshi2-4"]);
                    $statement->bindValue(':emtiazm_taamolp1', (int)$_POST["emtiazm-taamolp1"]);
                    $statement->bindValue(':emtiazm_taamolp2', (int)$_POST["emtiazm-taamolp2"]);
                    $statement->bindValue(':emtiazm_taamolp3', (int)$_POST["emtiazm-taamolp3"]);
                    $statement->bindValue(':emtiazm_taamolp4', (int)$_POST["emtiazm-taamolp4"]);
                    $statement->bindValue(':emtiazm_taamolp5', (int)$_POST["emtiazm-taamolp5"]);
                    $statement->bindValue(':emtiazm_taamols1', (int)$_POST["emtiazm-taamols1"]);
                    $statement->bindValue(':emtiazm_taamols2', (int)$_POST["emtiazm-taamols2"]);


                    $statement->bindValue(':report', $_POST["report"]);
                    $statement->bindValue(':send', $_POST["send"]);
                    
                    $inserted = $statement->execute();
                    
                }
                else
                if ( $_POST["NewEdit"]=="EDIT" )
                {
                    $sql = "UPDATE emtiaz SET ";
                    $sql .= "onvan_mali1_1=:onvan_mali1_1,mahal_mali1_1=:mahal_mali1_1,karfarma_mali1_1=:karfarma_mali1_1,mablagh_mali1_1=:mablagh_mali1_1,emtiaz_mali1_1=:emtiaz_mali1_1,";
                    $sql .= "onvan_mali1_2=:onvan_mali1_2,mahal_mali1_2=:mahal_mali1_2,karfarma_mali1_2=:karfarma_mali1_2,mablagh_mali1_2=:mablagh_mali1_2,emtiaz_mali1_2=:emtiaz_mali1_2,";
                    $sql .= "onvan_mali1_3=:onvan_mali1_3,mahal_mali1_3=:mahal_mali1_3,karfarma_mali1_3=:karfarma_mali1_3,mablagh_mali1_3=:mablagh_mali1_3,emtiaz_mali1_3=:emtiaz_mali1_3,";
                    $sql .= "onvan_mali1_4=:onvan_mali1_4,mahal_mali1_4=:mahal_mali1_4,karfarma_mali1_4=:karfarma_mali1_4,mablagh_mali1_4=:mablagh_mali1_4,emtiaz_mali1_4=:emtiaz_mali1_4,note_mali1=:note_mali1,";
                    $sql .= "files_mali1_1=:files_mali1_1,files_mali1_2=:files_mali1_2,files_mali1_3=:files_mali1_3,files_mali1_4=:files_mali1_4,";
                    $sql .= "onvan_mali2_1=:onvan_mali2_1,mahal_mali2_1=:mahal_mali2_1,karfarma_mali2_1=:karfarma_mali2_1,mablagh_mali2_1=:mablagh_mali2_1,emtiaz_mali2_1=:emtiaz_mali2_1,darsad_mali2_1=:darsad_mali2_1,";
                    $sql .= "onvan_mali2_2=:onvan_mali2_2,mahal_mali2_2=:mahal_mali2_2,karfarma_mali2_2=:karfarma_mali2_2,mablagh_mali2_2=:mablagh_mali2_2,emtiaz_mali2_2=:emtiaz_mali2_2,darsad_mali2_2=:darsad_mali2_2,";
                    $sql .= "onvan_mali2_3=:onvan_mali2_3,mahal_mali2_3=:mahal_mali2_3,karfarma_mali2_3=:karfarma_mali2_3,mablagh_mali2_3=:mablagh_mali2_3,emtiaz_mali2_3=:emtiaz_mali2_3,darsad_mali2_3=:darsad_mali2_3,";
                    $sql .= "onvan_mali2_4=:onvan_mali2_4,mahal_mali2_4=:mahal_mali2_4,karfarma_mali2_4=:karfarma_mali2_4,mablagh_mali2_4=:mablagh_mali2_4,emtiaz_mali2_4=:emtiaz_mali2_4,darsad_mali2_4=:darsad_mali2_4,note_mali2=:note_mali2,";
                    $sql .= "files_mali2_1=:files_mali2_1,files_mali2_2=:files_mali2_2,files_mali2_3=:files_mali2_3,files_mali2_4=:files_mali2_4,";
                    $sql .= "onvan_mali3_1=:onvan_mali3_1,mahal_mali3_1=:mahal_mali3_1,karfarma_mali3_1=:karfarma_mali3_1,mablagh_mali3_1=:mablagh_mali3_1,emtiaz_mali3_1=:emtiaz_mali3_1,darsad_mali3_1=:darsad_mali3_1,";
                    $sql .= "onvan_mali3_2=:onvan_mali3_2,mahal_mali3_2=:mahal_mali3_2,karfarma_mali3_2=:karfarma_mali3_2,mablagh_mali3_2=:mablagh_mali3_2,emtiaz_mali3_2=:emtiaz_mali3_2,darsad_mali3_2=:darsad_mali3_2,";
                    $sql .= "onvan_mali3_3=:onvan_mali3_3,mahal_mali3_3=:mahal_mali3_3,karfarma_mali3_3=:karfarma_mali3_3,mablagh_mali3_3=:mablagh_mali3_3,emtiaz_mali3_3=:emtiaz_mali3_3,darsad_mali3_3=:darsad_mali3_3,";
                    $sql .= "onvan_mali3_4=:onvan_mali3_4,mahal_mali3_4=:mahal_mali3_4,karfarma_mali3_4=:karfarma_mali3_4,mablagh_mali3_4=:mablagh_mali3_4,emtiaz_mali3_4=:emtiaz_mali3_4,darsad_mali3_4=:darsad_mali3_4,note_mali3=:note_mali3,";
                    $sql .= "files_mali3_1=:files_mali3_1,files_mali3_2=:files_mali3_2,files_mali3_3=:files_mali3_3,files_mali3_4=:files_mali3_4,";
                    $sql .= "onvan_mali4_1=:onvan_mali4_1,mablagh_mali4_1=:mablagh_mali4_1,emtiaz_mali4_1=:emtiaz_mali4_1,";
                    $sql .= "onvan_mali4_2=:onvan_mali4_2,mablagh_mali4_2=:mablagh_mali4_2,emtiaz_mali4_2=:emtiaz_mali4_2,";
                    $sql .= "onvan_mali4_3=:onvan_mali4_3,mablagh_mali4_3=:mablagh_mali4_3,emtiaz_mali4_3=:emtiaz_mali4_3,";
                    $sql .= "onvan_mali4_4=:onvan_mali4_4,mablagh_mali4_4=:mablagh_mali4_4,emtiaz_mali4_4=:emtiaz_mali4_4,note_mali4=:note_mali4,";
                    $sql .= "files_mali4_1=:files_mali4_1,files_mali4_2=:files_mali4_2,files_mali4_3=:files_mali4_3,files_mali4_4=:files_mali4_4,";
                    $sql .= "onvan_dast1_1=:onvan_dast1_1,marja_dast1_1=:marja_dast1_1,date_dast1_1=:date_dast1_1,emtiaz_dast1_1=:emtiaz_dast1_1,emtiazm_dast1_1=:emtiazm_dast1_1,files_dast1_1=:files_dast1_1,";
                    $sql .= "onvan_dast1_2=:onvan_dast1_2,marja_dast1_2=:marja_dast1_2,date_dast1_2=:date_dast1_2,emtiaz_dast1_2=:emtiaz_dast1_2,emtiazm_dast1_2=:emtiazm_dast1_2,files_dast1_2=:files_dast1_2,";
                    $sql .= "onvan_dast1_3=:onvan_dast1_3,marja_dast1_3=:marja_dast1_3,date_dast1_3=:date_dast1_3,emtiaz_dast1_3=:emtiaz_dast1_3,emtiazm_dast1_3=:emtiazm_dast1_3,files_dast1_3=:files_dast1_3,";
                    $sql .= "onvan_dast1_4=:onvan_dast1_4,marja_dast1_4=:marja_dast1_4,date_dast1_4=:date_dast1_4,emtiaz_dast1_4=:emtiaz_dast1_4,emtiazm_dast1_4=:emtiazm_dast1_4,files_dast1_4=:files_dast1_4,";
                    $sql .= "onvan_dast2_1=:onvan_dast2_1,marja_dast2_1=:marja_dast2_1,date_dast2_1=:date_dast2_1,emtiaz_dast2_1=:emtiaz_dast2_1,emtiazm_dast2_1=:emtiazm_dast2_1,files_dast2_1=:files_dast2_1,";
                    $sql .= "onvan_dast2_2=:onvan_dast2_2,marja_dast2_2=:marja_dast2_2,date_dast2_2=:date_dast2_2,emtiaz_dast2_2=:emtiaz_dast2_2,emtiazm_dast2_2=:emtiazm_dast2_2,files_dast2_2=:files_dast2_2,";
                    $sql .= "onvan_dast2_3=:onvan_dast2_3,marja_dast2_3=:marja_dast2_3,date_dast2_3=:date_dast2_3,emtiaz_dast2_3=:emtiaz_dast2_3,emtiazm_dast2_3=:emtiazm_dast2_3,files_dast2_3=:files_dast2_3,";
                    $sql .= "onvan_dast2_4=:onvan_dast2_4,marja_dast2_4=:marja_dast2_4,date_dast2_4=:date_dast2_4,emtiaz_dast2_4=:emtiaz_dast2_4,emtiazm_dast2_4=:emtiazm_dast2_4,files_dast2_4=:files_dast2_4,";
                    $sql .= "onvan_dast3_1=:onvan_dast3_1,marja_dast3_1=:marja_dast3_1,date_dast3_1=:date_dast3_1,emtiaz_dast3_1=:emtiaz_dast3_1,emtiazm_dast3_1=:emtiazm_dast3_1,files_dast3_1=:files_dast3_1,";
                    $sql .= "onvan_dast3_2=:onvan_dast3_2,marja_dast3_2=:marja_dast3_2,date_dast3_2=:date_dast3_2,emtiaz_dast3_2=:emtiaz_dast3_2,emtiazm_dast3_2=:emtiazm_dast3_2,files_dast3_2=:files_dast3_2,";
                    $sql .= "onvan_dast3_3=:onvan_dast3_3,marja_dast3_3=:marja_dast3_3,date_dast3_3=:date_dast3_3,emtiaz_dast3_3=:emtiaz_dast3_3,emtiazm_dast3_3=:emtiazm_dast3_3,files_dast3_3=:files_dast3_3,";
                    $sql .= "onvan_dast3_4=:onvan_dast3_4,marja_dast3_4=:marja_dast3_4,date_dast3_4=:date_dast3_4,emtiaz_dast3_4=:emtiaz_dast3_4,emtiazm_dast3_4=:emtiazm_dast3_4,files_dast3_4=:files_dast3_4,";
                    $sql .= "onvan_dast4_1=:onvan_dast4_1,marja_dast4_1=:marja_dast4_1,date_dast4_1=:date_dast4_1,emtiaz_dast4_1=:emtiaz_dast4_1,emtiazm_dast4_1=:emtiazm_dast4_1,files_dast4_1=:files_dast4_1,";
                    $sql .= "onvan_dast4_2=:onvan_dast4_2,marja_dast4_2=:marja_dast4_2,date_dast4_2=:date_dast4_2,emtiaz_dast4_2=:emtiaz_dast4_2,emtiazm_dast4_2=:emtiazm_dast4_2,files_dast4_2=:files_dast4_2,";
                    $sql .= "onvan_dast4_3=:onvan_dast4_3,marja_dast4_3=:marja_dast4_3,date_dast4_3=:date_dast4_3,emtiaz_dast4_3=:emtiaz_dast4_3,emtiazm_dast4_3=:emtiazm_dast4_3,files_dast4_3=:files_dast4_3,";
                    $sql .= "onvan_dast4_4=:onvan_dast4_4,marja_dast4_4=:marja_dast4_4,date_dast4_4=:date_dast4_4,emtiaz_dast4_4=:emtiaz_dast4_4,emtiazm_dast4_4=:emtiazm_dast4_4,files_dast4_4=:files_dast4_4,";
                    $sql .= "onvan_dast5_1=:onvan_dast5_1,marja_dast5_1=:marja_dast5_1,date_dast5_1=:date_dast5_1,emtiaz_dast5_1=:emtiaz_dast5_1,emtiazm_dast5_1=:emtiazm_dast5_1,files_dast5_1=:files_dast5_1,";
                    $sql .= "onvan_dast5_2=:onvan_dast5_2,marja_dast5_2=:marja_dast5_2,date_dast5_2=:date_dast5_2,emtiaz_dast5_2=:emtiaz_dast5_2,emtiazm_dast5_2=:emtiazm_dast5_2,files_dast5_2=:files_dast5_2,";
                    $sql .= "onvan_dast5_3=:onvan_dast5_3,marja_dast5_3=:marja_dast5_3,date_dast5_3=:date_dast5_3,emtiaz_dast5_3=:emtiaz_dast5_3,emtiazm_dast5_3=:emtiazm_dast5_3,files_dast5_3=:files_dast5_3,";
                    $sql .= "onvan_dast5_4=:onvan_dast5_4,marja_dast5_4=:marja_dast5_4,date_dast5_4=:date_dast5_4,emtiaz_dast5_4=:emtiaz_dast5_4,emtiazm_dast5_4=:emtiazm_dast5_4,files_dast5_4=:files_dast5_4,";
                    $sql .= "onvan_dast6_1=:onvan_dast6_1,marja_dast6_1=:marja_dast6_1,date_dast6_1=:date_dast6_1,emtiaz_dast6_1=:emtiaz_dast6_1,emtiazm_dast6_1=:emtiazm_dast6_1,files_dast6_1=:files_dast6_1,";
                    $sql .= "onvan_dast6_2=:onvan_dast6_2,marja_dast6_2=:marja_dast6_2,date_dast6_2=:date_dast6_2,emtiaz_dast6_2=:emtiaz_dast6_2,emtiazm_dast6_2=:emtiazm_dast6_2,files_dast6_2=:files_dast6_2,";
                    $sql .= "onvan_dast6_3=:onvan_dast6_3,marja_dast6_3=:marja_dast6_3,date_dast6_3=:date_dast6_3,emtiaz_dast6_3=:emtiaz_dast6_3,emtiazm_dast6_3=:emtiazm_dast6_3,files_dast6_3=:files_dast6_3,";
                    $sql .= "onvan_dast6_4=:onvan_dast6_4,marja_dast6_4=:marja_dast6_4,date_dast6_4=:date_dast6_4,emtiaz_dast6_4=:emtiaz_dast6_4,emtiazm_dast6_4=:emtiazm_dast6_4,files_dast6_4=:files_dast6_4,";
                    $sql .= "onvan_niroo1=:onvan_niroo1,tahsil_niroo1=:tahsil_niroo1,hamkari_niroo1=:hamkari_niroo1,sabeghe_niroo1=:sabeghe_niroo1,bime_niroo1=:bime_niroo1,emtiaz_niroo1=:emtiaz_niroo1,";
                    $sql .= "onvan_niroo2=:onvan_niroo2,tahsil_niroo2=:tahsil_niroo2,hamkari_niroo2=:hamkari_niroo2,sabeghe_niroo2=:sabeghe_niroo2,bime_niroo2=:bime_niroo2,emtiaz_niroo2=:emtiaz_niroo2,";
                    $sql .= "onvan_niroo3=:onvan_niroo3,tahsil_niroo3=:tahsil_niroo3,hamkari_niroo3=:hamkari_niroo3,sabeghe_niroo3=:sabeghe_niroo3,bime_niroo3=:bime_niroo3,emtiaz_niroo3=:emtiaz_niroo3,";
                    $sql .= "onvan_niroo4=:onvan_niroo4,tahsil_niroo4=:tahsil_niroo4,hamkari_niroo4=:hamkari_niroo4,sabeghe_niroo4=:sabeghe_niroo4,bime_niroo4=:bime_niroo4,emtiaz_niroo4=:emtiaz_niroo4,";
                    $sql .= "onvan_niroo5=:onvan_niroo5,tahsil_niroo5=:tahsil_niroo5,hamkari_niroo5=:hamkari_niroo5,sabeghe_niroo5=:sabeghe_niroo5,bime_niroo5=:bime_niroo5,emtiaz_niroo5=:emtiaz_niroo5,";
                    $sql .= "onvan_niroo6=:onvan_niroo6,tahsil_niroo6=:tahsil_niroo6,hamkari_niroo6=:hamkari_niroo6,sabeghe_niroo6=:sabeghe_niroo6,bime_niroo6=:bime_niroo6,emtiaz_niroo6=:emtiaz_niroo6,";
                    $sql .= "onvan_niroo7=:onvan_niroo7,tahsil_niroo7=:tahsil_niroo7,hamkari_niroo7=:hamkari_niroo7,sabeghe_niroo7=:sabeghe_niroo7,bime_niroo7=:bime_niroo7,emtiaz_niroo7=:emtiaz_niroo7,";
                    $sql .= "onvan_niroo8=:onvan_niroo8,tahsil_niroo8=:tahsil_niroo8,hamkari_niroo8=:hamkari_niroo8,sabeghe_niroo8=:sabeghe_niroo8,bime_niroo8=:bime_niroo8,emtiaz_niroo8=:emtiaz_niroo8,";
                    $sql .= "onvan_niroo9=:onvan_niroo9,tahsil_niroo9=:tahsil_niroo9,hamkari_niroo9=:hamkari_niroo9,sabeghe_niroo9=:sabeghe_niroo9,bime_niroo9=:bime_niroo9,emtiaz_niroo9=:emtiaz_niroo9,";
                    $sql .= "onvan_niroo10=:onvan_niroo10,tahsil_niroo10=:tahsil_niroo10,hamkari_niroo10=:hamkari_niroo10,sabeghe_niroo10=:sabeghe_niroo10,bime_niroo10=:bime_niroo10,emtiaz_niroo10=:emtiaz_niroo10,files_niroo=:files_niroo,";
                    $sql .= "onvan_bazar1_1=:onvan_bazar1_1,mahal_bazar1_1=:mahal_bazar1_1,date_bazar1_1=:date_bazar1_1,type_bazar1_1=:type_bazar1_1,emtiaz_bazar1_1=:emtiaz_bazar1_1,";
                    $sql .= "onvan_bazar1_2=:onvan_bazar1_2,mahal_bazar1_2=:mahal_bazar1_2,date_bazar1_2=:date_bazar1_2,type_bazar1_2=:type_bazar1_2,emtiaz_bazar1_2=:emtiaz_bazar1_2,";
                    $sql .= "onvan_bazar1_3=:onvan_bazar1_3,mahal_bazar1_3=:mahal_bazar1_3,date_bazar1_3=:date_bazar1_3,type_bazar1_3=:type_bazar1_3,emtiaz_bazar1_3=:emtiaz_bazar1_3,";
                    $sql .= "onvan_bazar1_4=:onvan_bazar1_4,mahal_bazar1_4=:mahal_bazar1_4,date_bazar1_4=:date_bazar1_4,type_bazar1_4=:type_bazar1_4,emtiaz_bazar1_4=:emtiaz_bazar1_4,note_bazar1=:note_bazar1,";
                    $sql .= "files_bazar1_1=:files_bazar1_1,files_bazar1_2=:files_bazar1_2,files_bazar1_3=:files_bazar1_3,files_bazar1_4=:files_bazar1_4,";
                    $sql .= "onvan_bazar2=:onvan_bazar2,files_bazar2=:files_bazar2,";
                    $sql .= "onvan_bazar3_1=:onvan_bazar3_1,date_bazar3_1=:date_bazar3_1,bargozar_bazar3_1=:bargozar_bazar3_1,mahal_bazar3_1=:mahal_bazar3_1,emtiaz_bazar3_1=:emtiaz_bazar3_1,";
                    $sql .= "onvan_bazar3_2=:onvan_bazar3_2,date_bazar3_2=:date_bazar3_2,bargozar_bazar3_2=:bargozar_bazar3_2,mahal_bazar3_2=:mahal_bazar3_2,emtiaz_bazar3_2=:emtiaz_bazar3_2,";
                    $sql .= "onvan_bazar3_3=:onvan_bazar3_3,date_bazar3_3=:date_bazar3_3,bargozar_bazar3_3=:bargozar_bazar3_3,mahal_bazar3_3=:mahal_bazar3_3,emtiaz_bazar3_3=:emtiaz_bazar3_3,";
                    $sql .= "onvan_bazar3_4=:onvan_bazar3_4,date_bazar3_4=:date_bazar3_4,bargozar_bazar3_4=:bargozar_bazar3_4,mahal_bazar3_4=:mahal_bazar3_4,emtiaz_bazar3_4=:emtiaz_bazar3_4,note_bazar3=:note_bazar3,";
                    $sql .= "files_bazar3_1=:files_bazar3_1,files_bazar3_2=:files_bazar3_2,files_bazar3_3=:files_bazar3_3,files_bazar3_4=:files_bazar3_4,";
                    $sql .= "onvan_bazar4_1=:onvan_bazar4_1,date_bazar4_1=:date_bazar4_1,mahal_bazar4_1=:mahal_bazar4_1,naghsh_bazar4_1=:naghsh_bazar4_1,emtiaz_bazar4_1=:emtiaz_bazar4_1,";
                    $sql .= "onvan_bazar4_2=:onvan_bazar4_2,date_bazar4_2=:date_bazar4_2,mahal_bazar4_2=:mahal_bazar4_2,naghsh_bazar4_2=:naghsh_bazar4_2,emtiaz_bazar4_2=:emtiaz_bazar4_2,";
                    $sql .= "onvan_bazar4_3=:onvan_bazar4_3,date_bazar4_3=:date_bazar4_3,mahal_bazar4_3=:mahal_bazar4_3,naghsh_bazar4_3=:naghsh_bazar4_3,emtiaz_bazar4_3=:emtiaz_bazar4_3,";
                    $sql .= "onvan_bazar4_4=:onvan_bazar4_4,date_bazar4_4=:date_bazar4_4,mahal_bazar4_4=:mahal_bazar4_4,naghsh_bazar4_4=:naghsh_bazar4_4,emtiaz_bazar4_4=:emtiaz_bazar4_4,note_bazar4=:note_bazar4,";
                    $sql .= "files_bazar4_1=:files_bazar4_1,files_bazar4_2=:files_bazar4_2,files_bazar4_3=:files_bazar4_3,files_bazar4_4=:files_bazar4_4,";
                    $sql .= "onvan_amoozeshi1_1=:onvan_amoozeshi1_1,date_amoozeshi1_1=:date_amoozeshi1_1,bargozar_amoozeshi1_1=:bargozar_amoozeshi1_1,mahal_amoozeshi1_1=:mahal_amoozeshi1_1,emtiaz_amoozeshi1_1=:emtiaz_amoozeshi1_1,";
                    $sql .= "onvan_amoozeshi1_2=:onvan_amoozeshi1_2,date_amoozeshi1_2=:date_amoozeshi1_2,bargozar_amoozeshi1_2=:bargozar_amoozeshi1_2,mahal_amoozeshi1_2=:mahal_amoozeshi1_2,emtiaz_amoozeshi1_2=:emtiaz_amoozeshi1_2,";
                    $sql .= "onvan_amoozeshi1_3=:onvan_amoozeshi1_3,date_amoozeshi1_3=:date_amoozeshi1_3,bargozar_amoozeshi1_3=:bargozar_amoozeshi1_3,mahal_amoozeshi1_3=:mahal_amoozeshi1_3,emtiaz_amoozeshi1_3=:emtiaz_amoozeshi1_3,";
                    $sql .= "onvan_amoozeshi1_4=:onvan_amoozeshi1_4,date_amoozeshi1_4=:date_amoozeshi1_4,bargozar_amoozeshi1_4=:bargozar_amoozeshi1_4,mahal_amoozeshi1_4=:mahal_amoozeshi1_4,emtiaz_amoozeshi1_4=:emtiaz_amoozeshi1_4,note_amoozeshi1=:note_amoozeshi1,";
                    $sql .= "files_amoozeshi1_1=:files_amoozeshi1_1,files_amoozeshi1_2=:files_amoozeshi1_2,files_amoozeshi1_3=:files_amoozeshi1_3,files_amoozeshi1_4=:files_amoozeshi1_4,";
                    $sql .= "onvan_amoozeshi2_1=:onvan_amoozeshi2_1,date_amoozeshi2_1=:date_amoozeshi2_1,mahal_amoozeshi2_1=:mahal_amoozeshi2_1,naghsh_amoozeshi2_1=:naghsh_amoozeshi2_1,emtiaz_amoozeshi2_1=:emtiaz_amoozeshi2_1,";
                    $sql .= "onvan_amoozeshi2_2=:onvan_amoozeshi2_2,date_amoozeshi2_2=:date_amoozeshi2_2,mahal_amoozeshi2_2=:mahal_amoozeshi2_2,naghsh_amoozeshi2_2=:naghsh_amoozeshi2_2,emtiaz_amoozeshi2_2=:emtiaz_amoozeshi2_2,";
                    $sql .= "onvan_amoozeshi2_3=:onvan_amoozeshi2_3,date_amoozeshi2_3=:date_amoozeshi2_3,mahal_amoozeshi2_3=:mahal_amoozeshi2_3,naghsh_amoozeshi2_3=:naghsh_amoozeshi2_3,emtiaz_amoozeshi2_3=:emtiaz_amoozeshi2_3,";
                    $sql .= "onvan_amoozeshi2_4=:onvan_amoozeshi2_4,date_amoozeshi2_4=:date_amoozeshi2_4,mahal_amoozeshi2_4=:mahal_amoozeshi2_4,naghsh_amoozeshi2_4=:naghsh_amoozeshi2_4,emtiaz_amoozeshi2_4=:emtiaz_amoozeshi2_4,note_amoozeshi2=:note_amoozeshi2,";
                    $sql .= "files_amoozeshi2_1=:files_amoozeshi2_1,files_amoozeshi2_2=:files_amoozeshi2_2,files_amoozeshi2_3=:files_amoozeshi2_3,files_amoozeshi2_4=:files_amoozeshi2_4,";
                    $sql .= "emtiaz_taamolp1=:emtiaz_taamolp1,emtiaz_taamolp2=:emtiaz_taamolp2,emtiaz_taamolp3=:emtiaz_taamolp3,emtiaz_taamolp4=:emtiaz_taamolp4,emtiaz_taamolp5=:emtiaz_taamolp5,";
                    $sql .= "emtiaz_taamols1=:emtiaz_taamols1,emtiaz_taamols2=:emtiaz_taamols2,";
                    $sql .= "nazar_sanji1=:nazar_sanji1,nazar_sanji2=:nazar_sanji2,nazar_sanji3=:nazar_sanji3,nazar_sanji4=:nazar_sanji4,nazar_sanji5=:nazar_sanji5,nazar_sanji6=:nazar_sanji6,nazar_sanji7=:nazar_sanji7,nazar_sanji8=:nazar_sanji8,nazar_sanji9=:nazar_sanji9,nazar_sanji10=:nazar_sanji10,";
                    $sql .= "nazar_sanji11=:nazar_sanji11,nazar_sanji12=:nazar_sanji12,nazar_sanji13=:nazar_sanji13,nazar_sanji14=:nazar_sanji14,";

                    $sql .="emtiazm_mali1_1=:emtiazm_mali1_1,emtiazm_mali1_2=:emtiazm_mali1_2,emtiazm_mali1_3=:emtiazm_mali1_3,emtiazm_mali1_4=:emtiazm_mali1_4,emtiazm_mali2_1=:emtiazm_mali2_1,emtiazm_mali2_2=:emtiazm_mali2_2,emtiazm_mali2_3=:emtiazm_mali2_3,emtiazm_mali2_4=:emtiazm_mali2_4,";
                    $sql .="emtiazm_mali3_1=:emtiazm_mali3_1,emtiazm_mali3_2=:emtiazm_mali3_2,emtiazm_mali3_3=:emtiazm_mali3_3,emtiazm_mali3_4=:emtiazm_mali3_4,";
                    $sql .="emtiazm_mali4_1=:emtiazm_mali4_1,emtiazm_mali4_2=:emtiazm_mali4_2,emtiazm_mali4_3=:emtiazm_mali4_3,emtiazm_mali4_4=:emtiazm_mali4_4,";
                    $sql .="emtiazm_niroo1=:emtiazm_niroo1,emtiazm_niroo2=:emtiazm_niroo2,emtiazm_niroo3=:emtiazm_niroo3,emtiazm_niroo4=:emtiazm_niroo4,emtiazm_niroo5=:emtiazm_niroo5,emtiazm_niroo6=:emtiazm_niroo6,emtiazm_niroo7=:emtiazm_niroo7,emtiazm_niroo8=:emtiazm_niroo8,emtiazm_niroo9=:emtiazm_niroo9,emtiazm_niroo10=:emtiazm_niroo10,";
                    $sql .="emtiazm_bazar1_1=:emtiazm_bazar1_1,emtiazm_bazar1_2=:emtiazm_bazar1_2,emtiazm_bazar1_3=:emtiazm_bazar1_3,emtiazm_bazar1_4=:emtiazm_bazar1_4,emtiaz_bazar2=:emtiaz_bazar2,emtiazm_bazar2=:emtiazm_bazar2,emtiazm_bazar3_1=:emtiazm_bazar3_1,emtiazm_bazar3_2=:emtiazm_bazar3_2,emtiazm_bazar3_3=:emtiazm_bazar3_3,emtiazm_bazar3_4=:emtiazm_bazar3_4,";
                    $sql .="emtiazm_bazar4_1=:emtiazm_bazar4_1,emtiazm_bazar4_2=:emtiazm_bazar4_2,emtiazm_bazar4_3=:emtiazm_bazar4_3,emtiazm_bazar4_4=:emtiazm_bazar4_4,";
                    $sql .="emtiazm_amoozeshi1_1=:emtiazm_amoozeshi1_1,emtiazm_amoozeshi1_2=:emtiazm_amoozeshi1_2,emtiazm_amoozeshi1_3=:emtiazm_amoozeshi1_3,emtiazm_amoozeshi1_4=:emtiazm_amoozeshi1_4,emtiazm_amoozeshi2_1=:emtiazm_amoozeshi2_1,emtiazm_amoozeshi2_2=:emtiazm_amoozeshi2_2,emtiazm_amoozeshi2_3=:emtiazm_amoozeshi2_3,emtiazm_amoozeshi2_4=:emtiazm_amoozeshi2_4,";
                    $sql .="emtiazm_taamolp1=:emtiazm_taamolp1,emtiazm_taamolp2=:emtiazm_taamolp2,emtiazm_taamolp3=:emtiazm_taamolp3,emtiazm_taamolp4=:emtiazm_taamolp4,emtiazm_taamolp5=:emtiazm_taamolp5,emtiazm_taamols1=:emtiazm_taamols1,emtiazm_taamols2=:emtiazm_taamols2,";


                    $sql .= "report=:report,send=:send WHERE code_user=:user_code and year=:year";


                    $statement = $conn->prepare($sql);
                    
                    $statement->bindValue(':onvan_mali1_1', $_POST["onvan-mali1-1"]);
                    $statement->bindValue(':mahal_mali1_1', $_POST["mahal-mali1-1"]);
                    $statement->bindValue(':karfarma_mali1_1', $_POST["karfarma-mali1-1"]);
                    $statement->bindValue(':mablagh_mali1_1', $_POST["mablagh-mali1-1"]);
                    $statement->bindValue(':emtiaz_mali1_1', $_POST["emtiaz-mali1-1"]);
                    $statement->bindValue(':onvan_mali1_2', $_POST["onvan-mali1-2"]);
                    $statement->bindValue(':mahal_mali1_2', $_POST["mahal-mali1-2"]);
                    $statement->bindValue(':karfarma_mali1_2', $_POST["karfarma-mali1-2"]);
                    $statement->bindValue(':mablagh_mali1_2', $_POST["mablagh-mali1-2"]);
                    $statement->bindValue(':emtiaz_mali1_2', $_POST["emtiaz-mali1-2"]);
                    $statement->bindValue(':onvan_mali1_3', $_POST["onvan-mali1-3"]);
                    $statement->bindValue(':mahal_mali1_3', $_POST["mahal-mali1-3"]);
                    $statement->bindValue(':karfarma_mali1_3', $_POST["karfarma-mali1-3"]);
                    $statement->bindValue(':mablagh_mali1_3', $_POST["mablagh-mali1-3"]);
                    $statement->bindValue(':emtiaz_mali1_3', $_POST["emtiaz-mali1-3"]);
                    $statement->bindValue(':onvan_mali1_4', $_POST["onvan-mali1-4"]);
                    $statement->bindValue(':mahal_mali1_4', $_POST["mahal-mali1-4"]);
                    $statement->bindValue(':karfarma_mali1_4', $_POST["karfarma-mali1-4"]);
                    $statement->bindValue(':mablagh_mali1_4', $_POST["mablagh-mali1-4"]);
                    $statement->bindValue(':emtiaz_mali1_4', $_POST["emtiaz-mali1-4"]);
                    $statement->bindValue(':note_mali1', $_POST["note-mali1"]);
                    $statement->bindValue(':files_mali1_1', implode(",", $UinqFileMali1_1));
                    $statement->bindValue(':files_mali1_2', implode(",", $UinqFileMali1_2));
                    $statement->bindValue(':files_mali1_3', implode(",", $UinqFileMali1_3));
                    $statement->bindValue(':files_mali1_4', implode(",", $UinqFileMali1_4));
                    $statement->bindValue(':onvan_mali2_1', $_POST["onvan-mali2-1"]);
                    $statement->bindValue(':mahal_mali2_1', $_POST["mahal-mali2-1"]);
                    $statement->bindValue(':karfarma_mali2_1', $_POST["karfarma-mali2-1"]);
                    $statement->bindValue(':mablagh_mali2_1', $_POST["mablagh-mali2-1"]);
                    $statement->bindValue(':emtiaz_mali2_1', $_POST["emtiaz-mali2-1"]);
                    $statement->bindValue(':darsad_mali2_1', $_POST["darsad-mali2-1"]);
                    $statement->bindValue(':onvan_mali2_2', $_POST["onvan-mali2-2"]);
                    $statement->bindValue(':mahal_mali2_2', $_POST["mahal-mali2-2"]);
                    $statement->bindValue(':karfarma_mali2_2', $_POST["karfarma-mali2-2"]);
                    $statement->bindValue(':mablagh_mali2_2', $_POST["mablagh-mali2-2"]);
                    $statement->bindValue(':emtiaz_mali2_2', $_POST["emtiaz-mali2-2"]);
                    $statement->bindValue(':darsad_mali2_2', $_POST["darsad-mali2-2"]);
                    $statement->bindValue(':onvan_mali2_3', $_POST["onvan-mali2-3"]);
                    $statement->bindValue(':mahal_mali2_3', $_POST["mahal-mali2-3"]);
                    $statement->bindValue(':karfarma_mali2_3', $_POST["karfarma-mali2-3"]);
                    $statement->bindValue(':mablagh_mali2_3', $_POST["mablagh-mali2-3"]);
                    $statement->bindValue(':emtiaz_mali2_3', $_POST["emtiaz-mali2-3"]);
                    $statement->bindValue(':darsad_mali2_3', $_POST["darsad-mali2-3"]);
                    $statement->bindValue(':onvan_mali2_4', $_POST["onvan-mali2-4"]);
                    $statement->bindValue(':mahal_mali2_4', $_POST["mahal-mali2-4"]);
                    $statement->bindValue(':karfarma_mali2_4', $_POST["karfarma-mali2-4"]);
                    $statement->bindValue(':mablagh_mali2_4', $_POST["mablagh-mali2-4"]);
                    $statement->bindValue(':emtiaz_mali2_4', $_POST["emtiaz-mali2-4"]);
                    $statement->bindValue(':darsad_mali2_4', $_POST["darsad-mali2-4"]);
                    $statement->bindValue(':note_mali2', $_POST["note-mali2"]);
                    $statement->bindValue(':files_mali2_1', implode(",", $UinqFileMali2_1));
                    $statement->bindValue(':files_mali2_2', implode(",", $UinqFileMali2_2));
                    $statement->bindValue(':files_mali2_3', implode(",", $UinqFileMali2_3));
                    $statement->bindValue(':files_mali2_4', implode(",", $UinqFileMali2_4));
                    $statement->bindValue(':onvan_mali3_1', $_POST["onvan-mali3-1"]);
                    $statement->bindValue(':mahal_mali3_1', $_POST["mahal-mali3-1"]);
                    $statement->bindValue(':karfarma_mali3_1', $_POST["karfarma-mali3-1"]);
                    $statement->bindValue(':mablagh_mali3_1', $_POST["mablagh-mali3-1"]);
                    $statement->bindValue(':emtiaz_mali3_1', $_POST["emtiaz-mali3-1"]);
                    $statement->bindValue(':darsad_mali3_1', $_POST["darsad-mali3-1"]);
                    $statement->bindValue(':onvan_mali3_2', $_POST["onvan-mali3-2"]);
                    $statement->bindValue(':mahal_mali3_2', $_POST["mahal-mali3-2"]);
                    $statement->bindValue(':karfarma_mali3_2', $_POST["karfarma-mali3-2"]);
                    $statement->bindValue(':mablagh_mali3_2', $_POST["mablagh-mali3-2"]);
                    $statement->bindValue(':emtiaz_mali3_2', $_POST["emtiaz-mali3-2"]);
                    $statement->bindValue(':darsad_mali3_2', $_POST["darsad-mali3-2"]);
                    $statement->bindValue(':onvan_mali3_3', $_POST["onvan-mali3-3"]);
                    $statement->bindValue(':mahal_mali3_3', $_POST["mahal-mali3-3"]);
                    $statement->bindValue(':karfarma_mali3_3', $_POST["karfarma-mali3-3"]);
                    $statement->bindValue(':mablagh_mali3_3', $_POST["mablagh-mali3-3"]);
                    $statement->bindValue(':emtiaz_mali3_3', $_POST["emtiaz-mali3-3"]);
                    $statement->bindValue(':darsad_mali3_3', $_POST["darsad-mali3-3"]);
                    $statement->bindValue(':onvan_mali3_4', $_POST["onvan-mali3-4"]);
                    $statement->bindValue(':mahal_mali3_4', $_POST["mahal-mali3-4"]);
                    $statement->bindValue(':karfarma_mali3_4', $_POST["karfarma-mali3-4"]);
                    $statement->bindValue(':mablagh_mali3_4', $_POST["mablagh-mali3-4"]);
                    $statement->bindValue(':emtiaz_mali3_4', $_POST["emtiaz-mali3-4"]);
                    $statement->bindValue(':darsad_mali3_4', $_POST["darsad-mali3-4"]);
                    $statement->bindValue(':note_mali3', $_POST["note-mali3"]);
                    $statement->bindValue(':files_mali3_1', implode(",", $UinqFileMali3_1));
                    $statement->bindValue(':files_mali3_2', implode(",", $UinqFileMali3_2));
                    $statement->bindValue(':files_mali3_3', implode(",", $UinqFileMali3_3));
                    $statement->bindValue(':files_mali3_4', implode(",", $UinqFileMali3_4));
                    $statement->bindValue(':onvan_mali4_1', $_POST["onvan-mali4-1"]);
                    $statement->bindValue(':mablagh_mali4_1', $_POST["mablagh-mali4-1"]);
                    $statement->bindValue(':emtiaz_mali4_1', $_POST["emtiaz-mali4-1"]);
                    $statement->bindValue(':onvan_mali4_2', $_POST["onvan-mali4-2"]);
                    $statement->bindValue(':mablagh_mali4_2', $_POST["mablagh-mali4-2"]);
                    $statement->bindValue(':emtiaz_mali4_2', $_POST["emtiaz-mali4-2"]);
                    $statement->bindValue(':onvan_mali4_3', $_POST["onvan-mali4-3"]);
                    $statement->bindValue(':mablagh_mali4_3', $_POST["mablagh-mali4-3"]);
                    $statement->bindValue(':emtiaz_mali4_3', $_POST["emtiaz-mali4-3"]);
                    $statement->bindValue(':onvan_mali4_4', $_POST["onvan-mali4-4"]);
                    $statement->bindValue(':mablagh_mali4_4', $_POST["mablagh-mali4-4"]);
                    $statement->bindValue(':emtiaz_mali4_4', $_POST["emtiaz-mali4-4"]);
                    $statement->bindValue(':note_mali4', $_POST["note-mali4"]);
                    $statement->bindValue(':files_mali4_1', implode(",", $UinqFileMali4_1));
                    $statement->bindValue(':files_mali4_2', implode(",", $UinqFileMali4_2));
                    $statement->bindValue(':files_mali4_3', implode(",", $UinqFileMali4_3));
                    $statement->bindValue(':files_mali4_4', implode(",", $UinqFileMali4_4));
                    /*$statement->bindValue(':onvan_dast1', $_POST["onvan-dast1"]);
                    $statement->bindValue(':marja_dast1', $_POST["marja-dast1"]);
                    $statement->bindValue(':date_dast1', $_POST["date-dast1"]);
                    $statement->bindValue(':emtiaz_dast1', $_POST["emtiaz-dast1"]);
                    $statement->bindValue(':onvan_dast2', $_POST["onvan-dast2"]);
                    $statement->bindValue(':marja_dast2', $_POST["marja-dast2"]);
                    $statement->bindValue(':date_dast2', $_POST["date-dast2"]);
                    $statement->bindValue(':emtiaz_dast2', $_POST["emtiaz-dast2"]);
                    $statement->bindValue(':onvan_dast3', $_POST["onvan-dast3"]);
                    $statement->bindValue(':marja_dast3', $_POST["marja-dast3"]);
                    $statement->bindValue(':date_dast3', $_POST["date-dast3"]);
                    $statement->bindValue(':emtiaz_dast3', $_POST["emtiaz-dast3"]);
                    $statement->bindValue(':onvan_dast4', $_POST["onvan-dast4"]);
                    $statement->bindValue(':marja_dast4', $_POST["marja-dast4"]);
                    $statement->bindValue(':date_dast4', $_POST["date-dast4"]);
                    $statement->bindValue(':emtiaz_dast4', $_POST["emtiaz-dast4"]);
                    $statement->bindValue(':onvan_dast5', $_POST["onvan-dast5"]);
                    $statement->bindValue(':marja_dast5', $_POST["marja-dast5"]);
                    $statement->bindValue(':date_dast5', $_POST["date-dast5"]);
                    $statement->bindValue(':emtiaz_dast5', $_POST["emtiaz-dast5"]);
                    $statement->bindValue(':onvan_dast6', $_POST["onvan-dast6"]);
                    $statement->bindValue(':marja_dast6', $_POST["marja-dast6"]);
                    $statement->bindValue(':date_dast6', $_POST["date-dast6"]);
                    $statement->bindValue(':emtiaz_dast6', $_POST["emtiaz-dast6"]);
                    $statement->bindValue(':note_dast', $_POST["note-dast"]);
                    $statement->bindValue(':files_dast', implode(",", $UinqFileDast));*/
                    $statement->bindValue(':onvan_dast1_1', $_POST["onvan-dast1-1"]);
                    $statement->bindValue(':marja_dast1_1', $_POST["marja-dast1-1"]);
                    $statement->bindValue(':date_dast1_1', $_POST["date-dast1-1"]);
                    $statement->bindValue(':emtiaz_dast1_1', $_POST["emtiaz-dast1-1"]);
                    $statement->bindValue(':emtiazm_dast1_1', $_POST["emtiazm-dast1-1"]);
                    $statement->bindValue(':onvan_dast1_2', $_POST["onvan-dast1-2"]);
                    $statement->bindValue(':marja_dast1_2', $_POST["marja-dast1-2"]);
                    $statement->bindValue(':date_dast1_2', $_POST["date-dast1-2"]);
                    $statement->bindValue(':emtiaz_dast1_2', $_POST["emtiaz-dast1-2"]);
                    $statement->bindValue(':emtiazm_dast1_2', $_POST["emtiazm-dast1-2"]);
                    $statement->bindValue(':onvan_dast1_3', $_POST["onvan-dast1-3"]);
                    $statement->bindValue(':marja_dast1_3', $_POST["marja-dast1-3"]);
                    $statement->bindValue(':date_dast1_3', $_POST["date-dast1-3"]);
                    $statement->bindValue(':emtiaz_dast1_3', $_POST["emtiaz-dast1-3"]);
                    $statement->bindValue(':emtiazm_dast1_3', $_POST["emtiazm-dast1-3"]);
                    $statement->bindValue(':onvan_dast1_4', $_POST["onvan-dast1-4"]);
                    $statement->bindValue(':marja_dast1_4', $_POST["marja-dast1-4"]);
                    $statement->bindValue(':date_dast1_4', $_POST["date-dast1-4"]);
                    $statement->bindValue(':emtiaz_dast1_4', $_POST["emtiaz-dast1-4"]);
                    $statement->bindValue(':emtiazm_dast1_4', $_POST["emtiazm-dast1-4"]);
                    $statement->bindValue(':files_dast1_1', implode(",", $UinqFileDast1_1));
                    $statement->bindValue(':files_dast1_2', implode(",", $UinqFileDast1_2));
                    $statement->bindValue(':files_dast1_3', implode(",", $UinqFileDast1_3));
                    $statement->bindValue(':files_dast1_4', implode(",", $UinqFileDast1_4));
                    $statement->bindValue(':onvan_dast2_1', $_POST["onvan-dast2-1"]);
                    $statement->bindValue(':marja_dast2_1', $_POST["marja-dast2-1"]);
                    $statement->bindValue(':date_dast2_1', $_POST["date-dast2-1"]);
                    $statement->bindValue(':emtiaz_dast2_1', $_POST["emtiaz-dast2-1"]);
                    $statement->bindValue(':emtiazm_dast2_1', $_POST["emtiazm-dast2-1"]);
                    $statement->bindValue(':onvan_dast2_2', $_POST["onvan-dast2-2"]);
                    $statement->bindValue(':marja_dast2_2', $_POST["marja-dast2-2"]);
                    $statement->bindValue(':date_dast2_2', $_POST["date-dast2-2"]);
                    $statement->bindValue(':emtiaz_dast2_2', $_POST["emtiaz-dast2-2"]);
                    $statement->bindValue(':emtiazm_dast2_2', $_POST["emtiazm-dast2-2"]);
                    $statement->bindValue(':onvan_dast2_3', $_POST["onvan-dast2-3"]);
                    $statement->bindValue(':marja_dast2_3', $_POST["marja-dast2-3"]);
                    $statement->bindValue(':date_dast2_3', $_POST["date-dast2-3"]);
                    $statement->bindValue(':emtiaz_dast2_3', $_POST["emtiaz-dast2-3"]);
                    $statement->bindValue(':emtiazm_dast2_3', $_POST["emtiazm-dast2-3"]);
                    $statement->bindValue(':onvan_dast2_4', $_POST["onvan-dast2-4"]);
                    $statement->bindValue(':marja_dast2_4', $_POST["marja-dast2-4"]);
                    $statement->bindValue(':date_dast2_4', $_POST["date-dast2-4"]);
                    $statement->bindValue(':emtiaz_dast2_4', $_POST["emtiaz-dast2-4"]);
                    $statement->bindValue(':emtiazm_dast2_4', $_POST["emtiazm-dast2-4"]);
                    $statement->bindValue(':files_dast2_1', implode(",", $UinqFileDast2_1));
                    $statement->bindValue(':files_dast2_2', implode(",", $UinqFileDast2_2));
                    $statement->bindValue(':files_dast2_3', implode(",", $UinqFileDast2_3));
                    $statement->bindValue(':files_dast2_4', implode(",", $UinqFileDast2_4));
                    $statement->bindValue(':onvan_dast3_1', $_POST["onvan-dast3-1"]);
                    $statement->bindValue(':marja_dast3_1', $_POST["marja-dast3-1"]);
                    $statement->bindValue(':date_dast3_1', $_POST["date-dast3-1"]);
                    $statement->bindValue(':emtiaz_dast3_1', $_POST["emtiaz-dast3-1"]);
                    $statement->bindValue(':emtiazm_dast3_1', $_POST["emtiazm-dast3-1"]);
                    $statement->bindValue(':onvan_dast3_2', $_POST["onvan-dast3-2"]);
                    $statement->bindValue(':marja_dast3_2', $_POST["marja-dast3-2"]);
                    $statement->bindValue(':date_dast3_2', $_POST["date-dast3-2"]);
                    $statement->bindValue(':emtiaz_dast3_2', $_POST["emtiaz-dast3-2"]);
                    $statement->bindValue(':emtiazm_dast3_2', $_POST["emtiazm-dast3-2"]);
                    $statement->bindValue(':onvan_dast3_3', $_POST["onvan-dast3-3"]);
                    $statement->bindValue(':marja_dast3_3', $_POST["marja-dast3-3"]);
                    $statement->bindValue(':date_dast3_3', $_POST["date-dast3-3"]);
                    $statement->bindValue(':emtiaz_dast3_3', $_POST["emtiaz-dast3-3"]);
                    $statement->bindValue(':emtiazm_dast3_3', $_POST["emtiazm-dast3-3"]);
                    $statement->bindValue(':onvan_dast3_4', $_POST["onvan-dast3-4"]);
                    $statement->bindValue(':marja_dast3_4', $_POST["marja-dast3-4"]);
                    $statement->bindValue(':date_dast3_4', $_POST["date-dast3-4"]);
                    $statement->bindValue(':emtiaz_dast3_4', $_POST["emtiaz-dast3-4"]);
                    $statement->bindValue(':emtiazm_dast3_4', $_POST["emtiazm-dast3-4"]);
                    $statement->bindValue(':files_dast3_1', implode(",", $UinqFileDast3_1));
                    $statement->bindValue(':files_dast3_2', implode(",", $UinqFileDast3_2));
                    $statement->bindValue(':files_dast3_3', implode(",", $UinqFileDast3_3));
                    $statement->bindValue(':files_dast3_4', implode(",", $UinqFileDast3_4));
                    $statement->bindValue(':onvan_dast4_1', $_POST["onvan-dast4-1"]);
                    $statement->bindValue(':marja_dast4_1', $_POST["marja-dast4-1"]);
                    $statement->bindValue(':date_dast4_1', $_POST["date-dast4-1"]);
                    $statement->bindValue(':emtiaz_dast4_1', $_POST["emtiaz-dast4-1"]);
                    $statement->bindValue(':emtiazm_dast4_1', $_POST["emtiazm-dast4-1"]);
                    $statement->bindValue(':onvan_dast4_2', $_POST["onvan-dast4-2"]);
                    $statement->bindValue(':marja_dast4_2', $_POST["marja-dast4-2"]);
                    $statement->bindValue(':date_dast4_2', $_POST["date-dast4-2"]);
                    $statement->bindValue(':emtiaz_dast4_2', $_POST["emtiaz-dast4-2"]);
                    $statement->bindValue(':emtiazm_dast4_2', $_POST["emtiazm-dast4-2"]);
                    $statement->bindValue(':onvan_dast4_3', $_POST["onvan-dast4-3"]);
                    $statement->bindValue(':marja_dast4_3', $_POST["marja-dast4-3"]);
                    $statement->bindValue(':date_dast4_3', $_POST["date-dast4-3"]);
                    $statement->bindValue(':emtiaz_dast4_3', $_POST["emtiaz-dast4-3"]);
                    $statement->bindValue(':emtiazm_dast4_3', $_POST["emtiazm-dast4-3"]);
                    $statement->bindValue(':onvan_dast4_4', $_POST["onvan-dast4-4"]);
                    $statement->bindValue(':marja_dast4_4', $_POST["marja-dast4-4"]);
                    $statement->bindValue(':date_dast4_4', $_POST["date-dast4-4"]);
                    $statement->bindValue(':emtiaz_dast4_4', $_POST["emtiaz-dast4-4"]);
                    $statement->bindValue(':emtiazm_dast4_4', $_POST["emtiazm-dast4-4"]);
                    $statement->bindValue(':files_dast4_1', implode(",", $UinqFileDast4_1));
                    $statement->bindValue(':files_dast4_2', implode(",", $UinqFileDast4_2));
                    $statement->bindValue(':files_dast4_3', implode(",", $UinqFileDast4_3));
                    $statement->bindValue(':files_dast4_4', implode(",", $UinqFileDast4_4));
                    $statement->bindValue(':onvan_dast5_1', $_POST["onvan-dast5-1"]);
                    $statement->bindValue(':marja_dast5_1', $_POST["marja-dast5-1"]);
                    $statement->bindValue(':date_dast5_1', $_POST["date-dast5-1"]);
                    $statement->bindValue(':emtiaz_dast5_1', $_POST["emtiaz-dast5-1"]);
                    $statement->bindValue(':emtiazm_dast5_1', $_POST["emtiazm-dast5-1"]);
                    $statement->bindValue(':onvan_dast5_2', $_POST["onvan-dast5-2"]);
                    $statement->bindValue(':marja_dast5_2', $_POST["marja-dast5-2"]);
                    $statement->bindValue(':date_dast5_2', $_POST["date-dast5-2"]);
                    $statement->bindValue(':emtiaz_dast5_2', $_POST["emtiaz-dast5-2"]);
                    $statement->bindValue(':emtiazm_dast5_2', $_POST["emtiazm-dast5-2"]);
                    $statement->bindValue(':onvan_dast5_3', $_POST["onvan-dast5-3"]);
                    $statement->bindValue(':marja_dast5_3', $_POST["marja-dast5-3"]);
                    $statement->bindValue(':date_dast5_3', $_POST["date-dast5-3"]);
                    $statement->bindValue(':emtiaz_dast5_3', $_POST["emtiaz-dast5-3"]);
                    $statement->bindValue(':emtiazm_dast5_3', $_POST["emtiazm-dast5-3"]);
                    $statement->bindValue(':onvan_dast5_4', $_POST["onvan-dast5-4"]);
                    $statement->bindValue(':marja_dast5_4', $_POST["marja-dast5-4"]);
                    $statement->bindValue(':date_dast5_4', $_POST["date-dast5-4"]);
                    $statement->bindValue(':emtiaz_dast5_4', $_POST["emtiaz-dast5-4"]);
                    $statement->bindValue(':emtiazm_dast5_4', $_POST["emtiazm-dast5-4"]);
                    $statement->bindValue(':files_dast5_1', implode(",", $UinqFileDast5_1));
                    $statement->bindValue(':files_dast5_2', implode(",", $UinqFileDast5_2));
                    $statement->bindValue(':files_dast5_3', implode(",", $UinqFileDast5_3));
                    $statement->bindValue(':files_dast5_4', implode(",", $UinqFileDast5_4));
                    $statement->bindValue(':onvan_dast6_1', $_POST["onvan-dast6-1"]);
                    $statement->bindValue(':marja_dast6_1', $_POST["marja-dast6-1"]);
                    $statement->bindValue(':date_dast6_1', $_POST["date-dast6-1"]);
                    $statement->bindValue(':emtiaz_dast6_1', $_POST["emtiaz-dast6-1"]);
                    $statement->bindValue(':emtiazm_dast6_1', $_POST["emtiazm-dast6-1"]);
                    $statement->bindValue(':onvan_dast6_2', $_POST["onvan-dast6-2"]);
                    $statement->bindValue(':marja_dast6_2', $_POST["marja-dast6-2"]);
                    $statement->bindValue(':date_dast6_2', $_POST["date-dast6-2"]);
                    $statement->bindValue(':emtiaz_dast6_2', $_POST["emtiaz-dast6-2"]);
                    $statement->bindValue(':emtiazm_dast6_2', $_POST["emtiazm-dast6-2"]);
                    $statement->bindValue(':onvan_dast6_3', $_POST["onvan-dast6-3"]);
                    $statement->bindValue(':marja_dast6_3', $_POST["marja-dast6-3"]);
                    $statement->bindValue(':date_dast6_3', $_POST["date-dast6-3"]);
                    $statement->bindValue(':emtiaz_dast6_3', $_POST["emtiaz-dast6-3"]);
                    $statement->bindValue(':emtiazm_dast6_3', $_POST["emtiazm-dast6-3"]);
                    $statement->bindValue(':onvan_dast6_4', $_POST["onvan-dast6-4"]);
                    $statement->bindValue(':marja_dast6_4', $_POST["marja-dast6-4"]);
                    $statement->bindValue(':date_dast6_4', $_POST["date-dast6-4"]);
                    $statement->bindValue(':emtiaz_dast6_4', $_POST["emtiaz-dast6-4"]);
                    $statement->bindValue(':emtiazm_dast6_4', $_POST["emtiazm-dast6-4"]);
                    $statement->bindValue(':files_dast6_1', implode(",", $UinqFileDast6_1));
                    $statement->bindValue(':files_dast6_2', implode(",", $UinqFileDast6_2));
                    $statement->bindValue(':files_dast6_3', implode(",", $UinqFileDast6_3));
                    $statement->bindValue(':files_dast6_4', implode(",", $UinqFileDast6_4));
                    $statement->bindValue(':onvan_niroo1', $_POST["onvan-niroo1"]);
                    $statement->bindValue(':tahsil_niroo1', $_POST["tahsil-niroo1"]);
                    $statement->bindValue(':hamkari_niroo1', $_POST["hamkari-niroo1"]);
                    $statement->bindValue(':sabeghe_niroo1', $_POST["sabeghe-niroo1"]);
                    $statement->bindValue(':bime_niroo1', $_POST["bime-niroo1"]);
                    $statement->bindValue(':emtiaz_niroo1', $_POST["emtiaz-niroo1"]);
                    $statement->bindValue(':onvan_niroo2', $_POST["onvan-niroo2"]);
                    $statement->bindValue(':tahsil_niroo2', $_POST["tahsil-niroo2"]);
                    $statement->bindValue(':hamkari_niroo2', $_POST["hamkari-niroo2"]);
                    $statement->bindValue(':sabeghe_niroo2', $_POST["sabeghe-niroo2"]);
                    $statement->bindValue(':bime_niroo2', $_POST["bime-niroo2"]);
                    $statement->bindValue(':emtiaz_niroo2', $_POST["emtiaz-niroo2"]);
                    $statement->bindValue(':onvan_niroo3', $_POST["onvan-niroo3"]);
                    $statement->bindValue(':tahsil_niroo3', $_POST["tahsil-niroo3"]);
                    $statement->bindValue(':hamkari_niroo3', $_POST["hamkari-niroo3"]);
                    $statement->bindValue(':sabeghe_niroo3', $_POST["sabeghe-niroo3"]);
                    $statement->bindValue(':bime_niroo3', $_POST["bime-niroo3"]);
                    $statement->bindValue(':emtiaz_niroo3', $_POST["emtiaz-niroo3"]);
                    $statement->bindValue(':onvan_niroo4', $_POST["onvan-niroo4"]);
                    $statement->bindValue(':tahsil_niroo4', $_POST["tahsil-niroo4"]);
                    $statement->bindValue(':hamkari_niroo4', $_POST["hamkari-niroo4"]);
                    $statement->bindValue(':sabeghe_niroo4', $_POST["sabeghe-niroo4"]);
                    $statement->bindValue(':bime_niroo4', $_POST["bime-niroo4"]);
                    $statement->bindValue(':emtiaz_niroo4', $_POST["emtiaz-niroo4"]);
                    $statement->bindValue(':onvan_niroo5', $_POST["onvan-niroo5"]);
                    $statement->bindValue(':tahsil_niroo5', $_POST["tahsil-niroo5"]);
                    $statement->bindValue(':hamkari_niroo5', $_POST["hamkari-niroo5"]);
                    $statement->bindValue(':sabeghe_niroo5', $_POST["sabeghe-niroo5"]);
                    $statement->bindValue(':bime_niroo5', $_POST["bime-niroo5"]);
                    $statement->bindValue(':emtiaz_niroo5', $_POST["emtiaz-niroo5"]);
                    $statement->bindValue(':onvan_niroo6', $_POST["onvan-niroo6"]);
                    $statement->bindValue(':tahsil_niroo6', $_POST["tahsil-niroo6"]);
                    $statement->bindValue(':hamkari_niroo6', $_POST["hamkari-niroo6"]);
                    $statement->bindValue(':sabeghe_niroo6', $_POST["sabeghe-niroo6"]);
                    $statement->bindValue(':bime_niroo6', $_POST["bime-niroo6"]);
                    $statement->bindValue(':emtiaz_niroo6', $_POST["emtiaz-niroo6"]);
                    $statement->bindValue(':onvan_niroo7', $_POST["onvan-niroo7"]);
                    $statement->bindValue(':tahsil_niroo7', $_POST["tahsil-niroo7"]);
                    $statement->bindValue(':hamkari_niroo7', $_POST["hamkari-niroo7"]);
                    $statement->bindValue(':sabeghe_niroo7', $_POST["sabeghe-niroo7"]);
                    $statement->bindValue(':bime_niroo7', $_POST["bime-niroo7"]);
                    $statement->bindValue(':emtiaz_niroo7', $_POST["emtiaz-niroo7"]);
                    $statement->bindValue(':onvan_niroo8', $_POST["onvan-niroo8"]);
                    $statement->bindValue(':tahsil_niroo8', $_POST["tahsil-niroo8"]);
                    $statement->bindValue(':hamkari_niroo8', $_POST["hamkari-niroo8"]);
                    $statement->bindValue(':sabeghe_niroo8', $_POST["sabeghe-niroo8"]);
                    $statement->bindValue(':bime_niroo8', $_POST["bime-niroo8"]);
                    $statement->bindValue(':emtiaz_niroo8', $_POST["emtiaz-niroo8"]);
                    $statement->bindValue(':onvan_niroo9', $_POST["onvan-niroo9"]);
                    $statement->bindValue(':tahsil_niroo9', $_POST["tahsil-niroo9"]);
                    $statement->bindValue(':hamkari_niroo9', $_POST["hamkari-niroo9"]);
                    $statement->bindValue(':sabeghe_niroo9', $_POST["sabeghe-niroo9"]);
                    $statement->bindValue(':bime_niroo9', $_POST["bime-niroo9"]);
                    $statement->bindValue(':emtiaz_niroo9', $_POST["emtiaz-niroo9"]);
                    $statement->bindValue(':onvan_niroo10', $_POST["onvan-niroo10"]);
                    $statement->bindValue(':tahsil_niroo10', $_POST["tahsil-niroo10"]);
                    $statement->bindValue(':hamkari_niroo10', $_POST["hamkari-niroo10"]);
                    $statement->bindValue(':sabeghe_niroo10', $_POST["sabeghe-niroo10"]);
                    $statement->bindValue(':bime_niroo10', $_POST["bime-niroo10"]);
                    $statement->bindValue(':emtiaz_niroo10', $_POST["emtiaz-niroo10"]);
                    $statement->bindValue(':files_niroo', implode(",", $UinqFileNiroo));
                    $statement->bindValue(':onvan_bazar1_1', $_POST["onvan-bazar1-1"]);
                    $statement->bindValue(':mahal_bazar1_1', $_POST["mahal-bazar1-1"]);
                    $statement->bindValue(':date_bazar1_1', $_POST["date-bazar1-1"]);
                    $statement->bindValue(':type_bazar1_1', $_POST["type-bazar1-1"]);
                    $statement->bindValue(':emtiaz_bazar1_1', $_POST["emtiaz-bazar1-1"]);
                    $statement->bindValue(':onvan_bazar1_2', $_POST["onvan-bazar1-2"]);
                    $statement->bindValue(':mahal_bazar1_2', $_POST["mahal-bazar1-2"]);
                    $statement->bindValue(':date_bazar1_2', $_POST["date-bazar1-2"]);
                    $statement->bindValue(':type_bazar1_2', $_POST["type-bazar1-2"]);
                    $statement->bindValue(':emtiaz_bazar1_2', $_POST["emtiaz-bazar1-2"]);
                    $statement->bindValue(':onvan_bazar1_3', $_POST["onvan-bazar1-3"]);
                    $statement->bindValue(':mahal_bazar1_3', $_POST["mahal-bazar1-3"]);
                    $statement->bindValue(':date_bazar1_3', $_POST["date-bazar1-3"]);
                    $statement->bindValue(':type_bazar1_3', $_POST["type-bazar1-3"]);
                    $statement->bindValue(':emtiaz_bazar1_3', $_POST["emtiaz-bazar1-3"]);
                    $statement->bindValue(':onvan_bazar1_4', $_POST["onvan-bazar1-4"]);
                    $statement->bindValue(':mahal_bazar1_4', $_POST["mahal-bazar1-4"]);
                    $statement->bindValue(':date_bazar1_4', $_POST["date-bazar1-4"]);
                    $statement->bindValue(':type_bazar1_4', $_POST["type-bazar1-4"]);
                    $statement->bindValue(':emtiaz_bazar1_4', $_POST["emtiaz-bazar1-4"]);
                    $statement->bindValue(':note_bazar1', $_POST["note-bazar1"]);
                    $statement->bindValue(':files_bazar1_1', implode(",", $UinqFileBazar1_1));
                    $statement->bindValue(':files_bazar1_2', implode(",", $UinqFileBazar1_2));
                    $statement->bindValue(':files_bazar1_3', implode(",", $UinqFileBazar1_3));
                    $statement->bindValue(':files_bazar1_4', implode(",", $UinqFileBazar1_4));
                    $statement->bindValue(':onvan_bazar2', $_POST["onvan-bazar2"]);
                    $statement->bindValue(':files_bazar2', implode(",", $UinqFileBazar2));
                    $statement->bindValue(':onvan_bazar3_1', $_POST["onvan-bazar3-1"]);
                    $statement->bindValue(':date_bazar3_1', $_POST["date-bazar3-1"]);
                    $statement->bindValue(':bargozar_bazar3_1', $_POST["bargozar-bazar3-1"]);
                    $statement->bindValue(':mahal_bazar3_1', $_POST["mahal-bazar3-1"]);
                    $statement->bindValue(':emtiaz_bazar3_1', $_POST["emtiaz-bazar3-1"]);
                    $statement->bindValue(':onvan_bazar3_2', $_POST["onvan-bazar3-2"]);
                    $statement->bindValue(':date_bazar3_2', $_POST["date-bazar3-2"]);
                    $statement->bindValue(':bargozar_bazar3_2', $_POST["bargozar-bazar3-2"]);
                    $statement->bindValue(':mahal_bazar3_2', $_POST["mahal-bazar3-2"]);
                    $statement->bindValue(':emtiaz_bazar3_2', $_POST["emtiaz-bazar3-2"]);
                    $statement->bindValue(':onvan_bazar3_3', $_POST["onvan-bazar3-3"]);
                    $statement->bindValue(':date_bazar3_3', $_POST["date-bazar3-3"]);
                    $statement->bindValue(':bargozar_bazar3_3', $_POST["bargozar-bazar3-3"]);
                    $statement->bindValue(':mahal_bazar3_3', $_POST["mahal-bazar3-3"]);
                    $statement->bindValue(':emtiaz_bazar3_3', $_POST["emtiaz-bazar3-3"]);
                    $statement->bindValue(':onvan_bazar3_4', $_POST["onvan-bazar3-4"]);
                    $statement->bindValue(':date_bazar3_4', $_POST["date-bazar3-4"]);
                    $statement->bindValue(':bargozar_bazar3_4', $_POST["bargozar-bazar3-4"]);
                    $statement->bindValue(':mahal_bazar3_4', $_POST["mahal-bazar3-4"]);
                    $statement->bindValue(':emtiaz_bazar3_4', $_POST["emtiaz-bazar3-4"]);
                    $statement->bindValue(':note_bazar3', $_POST["note-bazar3"]);
                    $statement->bindValue(':files_bazar3_1', implode(",", $UinqFileBazar3_1));
                    $statement->bindValue(':files_bazar3_2', implode(",", $UinqFileBazar3_2));
                    $statement->bindValue(':files_bazar3_3', implode(",", $UinqFileBazar3_3));
                    $statement->bindValue(':files_bazar3_4', implode(",", $UinqFileBazar3_4));
                    $statement->bindValue(':onvan_bazar4_1', $_POST["onvan-bazar4-1"]);
                    $statement->bindValue(':date_bazar4_1', $_POST["date-bazar4-1"]);
                    $statement->bindValue(':mahal_bazar4_1', $_POST["mahal-bazar4-1"]);
                    $statement->bindValue(':naghsh_bazar4_1', $_POST["naghsh-bazar4-1"]);
                    $statement->bindValue(':emtiaz_bazar4_1', $_POST["emtiaz-bazar4-1"]);
                    $statement->bindValue(':onvan_bazar4_2', $_POST["onvan-bazar4-2"]);
                    $statement->bindValue(':date_bazar4_2', $_POST["date-bazar4-2"]);
                    $statement->bindValue(':mahal_bazar4_2', $_POST["mahal-bazar4-2"]);
                    $statement->bindValue(':naghsh_bazar4_2', $_POST["naghsh-bazar4-2"]);
                    $statement->bindValue(':emtiaz_bazar4_2', $_POST["emtiaz-bazar4-2"]);
                    $statement->bindValue(':onvan_bazar4_3', $_POST["onvan-bazar4-3"]);
                    $statement->bindValue(':date_bazar4_3', $_POST["date-bazar4-3"]);
                    $statement->bindValue(':mahal_bazar4_3', $_POST["mahal-bazar4-3"]);
                    $statement->bindValue(':naghsh_bazar4_3', $_POST["naghsh-bazar4-3"]);
                    $statement->bindValue(':emtiaz_bazar4_3', $_POST["emtiaz-bazar4-3"]);
                    $statement->bindValue(':onvan_bazar4_4', $_POST["onvan-bazar4-4"]);
                    $statement->bindValue(':date_bazar4_4', $_POST["date-bazar4-4"]);
                    $statement->bindValue(':mahal_bazar4_4', $_POST["mahal-bazar4-4"]);
                    $statement->bindValue(':naghsh_bazar4_4', $_POST["naghsh-bazar4-4"]);
                    $statement->bindValue(':emtiaz_bazar4_4', $_POST["emtiaz-bazar4-4"]);
                    $statement->bindValue(':note_bazar4', $_POST["note-bazar4"]);
                    $statement->bindValue(':files_bazar4_1', implode(",", $UinqFileBazar4_1));
                    $statement->bindValue(':files_bazar4_2', implode(",", $UinqFileBazar4_2));
                    $statement->bindValue(':files_bazar4_3', implode(",", $UinqFileBazar4_3));
                    $statement->bindValue(':files_bazar4_4', implode(",", $UinqFileBazar4_4));
                    $statement->bindValue(':onvan_amoozeshi1_1', $_POST["onvan-amoozeshi1-1"]);
                    $statement->bindValue(':date_amoozeshi1_1', $_POST["date-amoozeshi1-1"]);
                    $statement->bindValue(':bargozar_amoozeshi1_1', $_POST["bargozar-amoozeshi1-1"]);
                    $statement->bindValue(':mahal_amoozeshi1_1', $_POST["mahal-amoozeshi1-1"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_1', $_POST["emtiaz-amoozeshi1-1"]);
                    $statement->bindValue(':onvan_amoozeshi1_2', $_POST["onvan-amoozeshi1-2"]);
                    $statement->bindValue(':date_amoozeshi1_2', $_POST["date-amoozeshi1-2"]);
                    $statement->bindValue(':bargozar_amoozeshi1_2', $_POST["bargozar-amoozeshi1-2"]);
                    $statement->bindValue(':mahal_amoozeshi1_2', $_POST["mahal-amoozeshi1-2"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_2', $_POST["emtiaz-amoozeshi1-2"]);
                    $statement->bindValue(':onvan_amoozeshi1_3', $_POST["onvan-amoozeshi1-3"]);
                    $statement->bindValue(':date_amoozeshi1_3', $_POST["date-amoozeshi1-3"]);
                    $statement->bindValue(':bargozar_amoozeshi1_3', $_POST["bargozar-amoozeshi1-3"]);
                    $statement->bindValue(':mahal_amoozeshi1_3', $_POST["mahal-amoozeshi1-3"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_3', $_POST["emtiaz-amoozeshi1-3"]);
                    $statement->bindValue(':onvan_amoozeshi1_4', $_POST["onvan-amoozeshi1-4"]);
                    $statement->bindValue(':date_amoozeshi1_4', $_POST["date-amoozeshi1-4"]);
                    $statement->bindValue(':bargozar_amoozeshi1_4', $_POST["bargozar-amoozeshi1-4"]);
                    $statement->bindValue(':mahal_amoozeshi1_4', $_POST["mahal-amoozeshi1-4"]);
                    $statement->bindValue(':emtiaz_amoozeshi1_4', $_POST["emtiaz-amoozeshi1-4"]);
                    $statement->bindValue(':note_amoozeshi1', $_POST["note-amoozeshi1"]);
                    $statement->bindValue(':files_amoozeshi1_1', implode(",", $UinqFileAmoozeshi1_1));
                    $statement->bindValue(':files_amoozeshi1_2', implode(",", $UinqFileAmoozeshi1_2));
                    $statement->bindValue(':files_amoozeshi1_3', implode(",", $UinqFileAmoozeshi1_3));
                    $statement->bindValue(':files_amoozeshi1_4', implode(",", $UinqFileAmoozeshi1_4));
                    $statement->bindValue(':onvan_amoozeshi2_1', $_POST["onvan-amoozeshi2-1"]);
                    $statement->bindValue(':date_amoozeshi2_1', $_POST["date-amoozeshi2-1"]);
                    $statement->bindValue(':mahal_amoozeshi2_1', $_POST["mahal-amoozeshi2-1"]);
                    $statement->bindValue(':naghsh_amoozeshi2_1', $_POST["naghsh-amoozeshi2-1"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_1', $_POST["emtiaz-amoozeshi2-1"]);
                    $statement->bindValue(':onvan_amoozeshi2_2', $_POST["onvan-amoozeshi2-2"]);
                    $statement->bindValue(':date_amoozeshi2_2', $_POST["date-amoozeshi2-2"]);
                    $statement->bindValue(':mahal_amoozeshi2_2', $_POST["mahal-amoozeshi2-2"]);
                    $statement->bindValue(':naghsh_amoozeshi2_2', $_POST["naghsh-amoozeshi2-2"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_2', $_POST["emtiaz-amoozeshi2-2"]);
                    $statement->bindValue(':onvan_amoozeshi2_3', $_POST["onvan-amoozeshi2-3"]);
                    $statement->bindValue(':date_amoozeshi2_3', $_POST["date-amoozeshi2-3"]);
                    $statement->bindValue(':mahal_amoozeshi2_3', $_POST["mahal-amoozeshi2-3"]);
                    $statement->bindValue(':naghsh_amoozeshi2_3', $_POST["naghsh-amoozeshi2-3"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_3', $_POST["emtiaz-amoozeshi2-3"]);
                    $statement->bindValue(':onvan_amoozeshi2_4', $_POST["onvan-amoozeshi2-4"]);
                    $statement->bindValue(':date_amoozeshi2_4', $_POST["date-amoozeshi2-4"]);
                    $statement->bindValue(':mahal_amoozeshi2_4', $_POST["mahal-amoozeshi2-4"]);
                    $statement->bindValue(':naghsh_amoozeshi2_4', $_POST["naghsh-amoozeshi2-4"]);
                    $statement->bindValue(':emtiaz_amoozeshi2_4', $_POST["emtiaz-amoozeshi2-4"]);
                    $statement->bindValue(':note_amoozeshi2', $_POST["note-amoozeshi2"]);
                    $statement->bindValue(':files_amoozeshi2_1', implode(",", $UinqFileAmoozeshi2_1));
                    $statement->bindValue(':files_amoozeshi2_2', implode(",", $UinqFileAmoozeshi2_2));
                    $statement->bindValue(':files_amoozeshi2_3', implode(",", $UinqFileAmoozeshi2_3));
                    $statement->bindValue(':files_amoozeshi2_4', implode(",", $UinqFileAmoozeshi2_4));
                    $statement->bindValue(':emtiaz_taamolp1', $_POST["emtiaz-taamolp1"]);
                    $statement->bindValue(':emtiaz_taamolp2', $_POST["emtiaz-taamolp2"]);
                    $statement->bindValue(':emtiaz_taamolp3', $_POST["emtiaz-taamolp3"]);
                    $statement->bindValue(':emtiaz_taamolp4', $_POST["emtiaz-taamolp4"]);
                    $statement->bindValue(':emtiaz_taamolp5', $_POST["emtiaz-taamolp5"]);
                    $statement->bindValue(':emtiaz_taamols1', $_POST["emtiaz-taamols1"]);
                    $statement->bindValue(':emtiaz_taamols2', $_POST["emtiaz-taamols2"]);
                    $statement->bindValue(':nazar_sanji1', $_POST["nazar-sanji1"]);
                    $statement->bindValue(':nazar_sanji2', $_POST["nazar-sanji2"]);
                    $statement->bindValue(':nazar_sanji3', $_POST["nazar-sanji3"]);
                    $statement->bindValue(':nazar_sanji4', $_POST["nazar-sanji4"]);
                    $statement->bindValue(':nazar_sanji5', $_POST["nazar-sanji5"]);
                    $statement->bindValue(':nazar_sanji6', $_POST["nazar-sanji6"]);
                    $statement->bindValue(':nazar_sanji7', $_POST["nazar-sanji7"]);
                    $statement->bindValue(':nazar_sanji8', $_POST["nazar-sanji8"]);
                    $statement->bindValue(':nazar_sanji9', $_POST["nazar-sanji9"]);
                    $statement->bindValue(':nazar_sanji10', $_POST["nazar-sanji10"]);
                    $statement->bindValue(':nazar_sanji11', $_POST["nazar-sanji11"]);
                    $statement->bindValue(':nazar_sanji12', $_POST["nazar-sanji12"]);
                    $statement->bindValue(':nazar_sanji13', $_POST["nazar-sanji13"]);
                    $statement->bindValue(':nazar_sanji14', $_POST["nazar-sanji14"]);

                    $statement->bindValue(':emtiazm_mali1_1', $_POST["emtiazm-mali1-1"]);
                    $statement->bindValue(':emtiazm_mali1_2', $_POST["emtiazm-mali1-2"]);
                    $statement->bindValue(':emtiazm_mali1_3', $_POST["emtiazm-mali1-3"]);
                    $statement->bindValue(':emtiazm_mali1_4', $_POST["emtiazm-mali1-4"]);
                    $statement->bindValue(':emtiazm_mali2_1', $_POST["emtiazm-mali2-1"]);
                    $statement->bindValue(':emtiazm_mali2_2', $_POST["emtiazm-mali2-2"]);
                    $statement->bindValue(':emtiazm_mali2_3', $_POST["emtiazm-mali2-3"]);
                    $statement->bindValue(':emtiazm_mali2_4', $_POST["emtiazm-mali2-4"]);
                    $statement->bindValue(':emtiazm_mali3_1', $_POST["emtiazm-mali3-1"]);
                    $statement->bindValue(':emtiazm_mali3_2', $_POST["emtiazm-mali3-2"]);
                    $statement->bindValue(':emtiazm_mali3_3', $_POST["emtiazm-mali3-3"]);
                    $statement->bindValue(':emtiazm_mali3_4', $_POST["emtiazm-mali3-4"]);
                    $statement->bindValue(':emtiazm_mali4_1', $_POST["emtiazm-mali4-1"]);
                    $statement->bindValue(':emtiazm_mali4_2', $_POST["emtiazm-mali4-2"]);
                    $statement->bindValue(':emtiazm_mali4_3', $_POST["emtiazm-mali4-3"]);
                    $statement->bindValue(':emtiazm_mali4_4', $_POST["emtiazm-mali4-4"]);
                    $statement->bindValue(':emtiazm_niroo1', $_POST["emtiazm-niroo1"]);
                    $statement->bindValue(':emtiazm_niroo2', $_POST["emtiazm-niroo2"]);
                    $statement->bindValue(':emtiazm_niroo3', $_POST["emtiazm-niroo3"]);
                    $statement->bindValue(':emtiazm_niroo4', $_POST["emtiazm-niroo4"]);
                    $statement->bindValue(':emtiazm_niroo5', $_POST["emtiazm-niroo5"]);
                    $statement->bindValue(':emtiazm_niroo6', $_POST["emtiazm-niroo6"]);
                    $statement->bindValue(':emtiazm_niroo7', $_POST["emtiazm-niroo7"]);
                    $statement->bindValue(':emtiazm_niroo8', $_POST["emtiazm-niroo8"]);
                    $statement->bindValue(':emtiazm_niroo9', $_POST["emtiazm-niroo9"]);
                    $statement->bindValue(':emtiazm_niroo10', $_POST["emtiazm-niroo10"]);
                    $statement->bindValue(':emtiazm_bazar1_1', $_POST["emtiazm-bazar1-1"]);
                    $statement->bindValue(':emtiazm_bazar1_2', $_POST["emtiazm-bazar1-2"]);
                    $statement->bindValue(':emtiazm_bazar1_3', $_POST["emtiazm-bazar1-3"]);
                    $statement->bindValue(':emtiazm_bazar1_4', $_POST["emtiazm-bazar1-4"]);
                    $statement->bindValue(':emtiaz_bazar2', (int)$_POST["emtiaz-bazar2"]);
                    $statement->bindValue(':emtiazm_bazar2', (int)$_POST["emtiazm-bazar2"]);
                    $statement->bindValue(':emtiazm_bazar3_1', $_POST["emtiazm-bazar3-1"]);
                    $statement->bindValue(':emtiazm_bazar3_2', $_POST["emtiazm-bazar3-2"]);
                    $statement->bindValue(':emtiazm_bazar3_3', $_POST["emtiazm-bazar3-3"]);
                    $statement->bindValue(':emtiazm_bazar3_4', $_POST["emtiazm-bazar3-4"]);
                    $statement->bindValue(':emtiazm_bazar4_1', $_POST["emtiazm-bazar4-1"]);
                    $statement->bindValue(':emtiazm_bazar4_2', $_POST["emtiazm-bazar4-2"]);
                    $statement->bindValue(':emtiazm_bazar4_3', $_POST["emtiazm-bazar4-3"]);
                    $statement->bindValue(':emtiazm_bazar4_4', $_POST["emtiazm-bazar4-4"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_1', $_POST["emtiazm-amoozeshi1-1"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_2', $_POST["emtiazm-amoozeshi1-2"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_3', $_POST["emtiazm-amoozeshi1-3"]);
                    $statement->bindValue(':emtiazm_amoozeshi1_4', $_POST["emtiazm-amoozeshi1-4"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_1', $_POST["emtiazm-amoozeshi2-1"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_2', $_POST["emtiazm-amoozeshi2-2"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_3', $_POST["emtiazm-amoozeshi2-3"]);
                    $statement->bindValue(':emtiazm_amoozeshi2_4', $_POST["emtiazm-amoozeshi2-4"]);
                    $statement->bindValue(':emtiazm_taamolp1', $_POST["emtiazm-taamolp1"]);
                    $statement->bindValue(':emtiazm_taamolp2', $_POST["emtiazm-taamolp2"]);
                    $statement->bindValue(':emtiazm_taamolp3', $_POST["emtiazm-taamolp3"]);
                    $statement->bindValue(':emtiazm_taamolp4', $_POST["emtiazm-taamolp4"]);
                    $statement->bindValue(':emtiazm_taamolp5', $_POST["emtiazm-taamolp5"]);
                    $statement->bindValue(':emtiazm_taamols1', $_POST["emtiazm-taamols1"]);
                    $statement->bindValue(':emtiazm_taamols2', $_POST["emtiazm-taamols2"]);


                    $statement->bindValue(':report', $_POST["report"]);
                    $statement->bindValue(':send', $_POST["send"]);

                    $statement->bindValue(':user_code', $_POST["user-code"]);
                    $statement->bindValue(':year', $_POST["year"]);
                    
                    $inserted = $statement->execute();
                }
                
                $conn = null;
                break;
        case "send-report":
            $sql = "UPDATE emtiaz SET send=:send WHERE code_user=:user_code and year=:year";

            $statement = $conn->prepare($sql);
            
            $statement->bindValue(':send', 1);
            $statement->bindValue(':user_code', $_POST["user-code"]);
            $statement->bindValue(':year', $_POST["year"]);
            
            $inserted = $statement->execute();
            $conn=null;
            break;
       
    }

//}
?>
