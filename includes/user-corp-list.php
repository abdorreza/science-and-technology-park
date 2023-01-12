<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
<body>
    <?php
        require_once "functions.php";
        $conn=connect_to_database();
        $filter1="";
        $filter2="";
        if ( $_COOKIE["user_type"]=="admin_all" )
        {
            if ( isset($_COOKIE["filter1"]) && $_COOKIE["filter1"]!="" )
            {
            
                $filter1=" AND state_code=:state_code";
            }
            else
            {
                $filter1="";
            }
            if ( isset($_COOKIE["filter2"]) && $_COOKIE["filter2"]!="" )
            {
            
                $filter2=" AND center_code=:center_code";
            }
            else
            {
                $filter2="";
            }
        }
        switch ($_COOKIE["user_type"])
        {
            case "admin_all":
                $sth = $conn->prepare("SELECT * FROM users WHERE user_type='corp'".$filter1.$filter2);
                if ( $filter1!="" )
                {
                    $sth->bindValue(':state_code', $_COOKIE["filter1"]);
                }
                if ( $filter2!="" )
                {
                    $sth->bindValue(':center_code', $_COOKIE["filter2"]);
                }
                break;
            case "admin_state":
                $sth = $conn->prepare("SELECT * FROM users WHERE user_type='corp' AND state_code=".$_COOKIE["state_code"]);
                break;
            default:
                $sth = $conn->prepare("SELECT * FROM users WHERE user_type='corp' AND center_code=".$_COOKIE["center_code"]);
        }
        $sth->execute();
        $count = $sth->rowCount();
        if ($count<=0 )
        {
            echo "<div id='board-msg'>شرکتی تعریف نشده است</div>";
        }
    ?>
        <!--<table class="data3">-->
        <table id='state-tbl'>
                <?php
                {
                    $result = $sth->fetchAll();
                    $andis=1;
                    foreach($result as $row)
                    {
                        echo"
                            <tr>
                                <td width='10%'><span>".$andis."</span></td>
                                <td width='70%'>".$row["name"]."</td>
                                <td width='10%'><img src='../images/delete.png' onclick='Del_Corp(".$row["code"].")'></td>
                                <td width='10%'><img src='../images/edit.png' onclick='show_edit_corp(".$row['code'].")'></td>
                            </tr>
                            ";
						$andis=$andis+1;
                        /*$col=$col+1;
                        if ( $col==1 ) 
                        { 
                            echo "<tr>"; 
                        }
                        echo "<td>";
                            echo "<div class='cell''>";
                                echo "<img src='./images/users/".str_replace(" ", "", $row["logo"])."'>";
                                echo "<div class='tl''>";
                                    echo $row["name"];
                                echo "</div>";
                                echo "<div class='op'>";
                                    $logo = pathinfo($row["logo"]);
                                    $logo_extension=$logo['extension'];
                                    $logo_name=$logo['filename'];
                                    echo "<img src='../images/delete.png' onclick='Del_Corp(".$row["code"].")'>";
                                    echo "<img src='../images/edit.png' onclick='show_edit_corp(".$row['code'].")'>";
                                echo "</div>";
                            echo "</div>";
                        echo "</td>";
                        if ( $col==5 ) 
                        { 
                            echo "</tr>";
                            $col=0; 
                        }*/
                    }
                }
                ?>
        </table>
</body>
</html>

