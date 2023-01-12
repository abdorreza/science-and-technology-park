<?php
if ( isset($_POST["search"]) )
{

    require_once "functions.php";

    $conn=connect_to_database();
    
    switch ($_POST["what"]) 
    {
        case "state":
            $stmt = $conn->prepare("SELECT * FROM states WHERE code=:code");
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
            break;
        case "center":
            $stmt = $conn->prepare("SELECT * FROM centers WHERE code=:code");
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
            break;
        case "states-count":
            $stmt = $conn->prepare("SELECT COUNT(*) FROM states");
            $stmt->execute();            
            echo $stmt->fetchColumn();
            break;
        case "states-center-count":
            $stmt1 = $conn->prepare("SELECT COUNT(*) FROM states");
            $stmt1->execute();            
            $stmt2 = $conn->prepare("SELECT COUNT(*) FROM centers");
            $stmt2->execute();            
            if ( $stmt1->fetchColumn()<=0 || $stmt2->fetchColumn()<=0 )
            {
                echo 0;
            }
            else
            {
                echo 1;
            }
            break;
        case "admin_state":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "admin":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "nazer":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "mali":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "corp":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "corp-info":
            $stmt = $conn->prepare("SELECT * FROM corps WHERE code_user=:code");
            $stmt->execute(['code' => $_POST["code"]]);
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
            break;
        case "corp-info-other":
            $stmt = $conn->prepare("SELECT corps.name,corps.date_sabt,corps.type,corps.tel,corps.fax,corps.email,corps.website,corps.idea,corps.address,hoze.name as hoze_name,zamine.name as zamine_name from corps LEFT JOIN hoze ON corps.hoze=hoze.code LEFT JOIN zamine ON corps.zamine=zamine.code WHERE code_user=:code");
            $stmt->execute(['code' => $_POST["code"]]);
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
            break;
        case "profile":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "corp-emtiaz":
            $stmt = $conn->prepare("SELECT * FROM emtiaz WHERE code_user=:code AND year=:year");
            $stmt->execute(['code' => $_POST['code'],'year' => $_POST['year']]);
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
            break;
        case "user-msg":
            $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code");
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
            break;
        case "refresh-emtiaz":
            $stmt = $conn->prepare("SELECT * FROM emtiaz WHERE code_user=:code AND year=:year");
            $stmt->execute(['code' => $_POST['code'],'year' => $_POST['year']]);
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
            break;
        case "profile-info":
            $sql="SELECT users.user_type,users.name,users.logo,corps.type,corps.date_sabt,corps.mobile,corps.pic,corps.name1,corps.tel,corps.fax,corps.email,corps.website,corps.idea,corps.address,corps.date_esteghrar,";
            $sql.="product1,product2,product3,product4,product5,product6,product_img1,product_img2,product_img3,product_img4,product_img5,product_img6,";
            $sql.="hoze.name as hoze_name,zamine.name as zamine_name FROM users";
            $sql.=" LEFT JOIN corps ON users.code=corps.code_user";
            $sql.=" LEFT JOIN hoze ON corps.hoze=hoze.code";
            $sql.=" LEFT JOIN zamine ON corps.zamine=zamine.code WHERE users.code=:code";
            $stmt = $conn->prepare($sql);
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
            break;
        case "profile-modir":
            $sql="SELECT users.user_type,users.name,users.tel,users.email,states.name as state_name,centers.name as center_name FROM users";
            $sql.=" LEFT JOIN states ON users.state_code=states.code";
            $sql.=" LEFT JOIN centers ON users.center_code=centers.code";
            $sql.=" WHERE users.code=:code";
            $stmt = $conn->prepare($sql);
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
            break;
        case "rep-form":
            $stmt = $conn->prepare("SELECT * FROM emtiaz WHERE code_user=:code AND year=:year");
            $stmt->execute(['code' => $_POST['code'],'year' => $_POST['year']]);
            $count = $stmt->rowCount();
            echo $count;
            break;
        case "filter-center":
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
            break;
    }

    $conn = null;


}  //isset login	
?>

