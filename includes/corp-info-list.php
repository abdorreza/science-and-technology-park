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
            $filter3="";
            //if ( $_COOKIE["user_type"]=="admin_all" )
            //{
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
                if ( isset($_COOKIE["filter3"]) && $_COOKIE["filter3"]!="" )
                {
                
                    $filter3=" user_type=:user_type";
                }
                else
                {
                    $filter3="corp";
                }
            //}
            switch ($_COOKIE["user_type"])
            {
                case "admin_all":
                    //$sth = $conn->prepare("SELECT * FROM users WHERE user_type='corp'".$filter1.$filter2);
                    $sth = $conn->prepare("SELECT * FROM users WHERE ".$filter3.$filter1.$filter2);
                    if ( $filter1!="" )
                    {
                        $sth->bindValue(':state_code', $_COOKIE["filter1"]);
                    }
                    if ( $filter2!="" )
                    {
                        $sth->bindValue(':center_code', $_COOKIE["filter2"]);
                    }
                    if ( $filter3!="" )
                    {
                        $sth->bindValue(':user_type', $_COOKIE["filter3"]);
                    }
                    break;
                case "admin_state":
                    //$sth = $conn->prepare("SELECT * FROM users WHERE user_type='corp' AND state_code=:state_code".$filter2);
                    if ( $filter3!="" )
                    {
                        $filter3=" AND ".$filter3;
                    }
                    $sth = $conn->prepare("SELECT * FROM users WHERE state_code=:state_code".$filter3.$filter2);
                    $sth->bindValue(':state_code', $_COOKIE["state_code"]);
                    if ( $filter2!="" )
                    {
                        $sth->bindValue(':center_code', $_COOKIE["filter2"]);
                    }
                    if ( $filter3!="" )
                    {
                        $sth->bindValue(':user_type', $_COOKIE["filter3"]);
                    }
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
        <!--<table id='search-header'>
            <tr>
                <td width='10%'></td>
                <td width='35%'>نام</td>
                <td width='50%'></td>
            </tr>
        </table>-->
        <br/>
        <br/>
        <table id='search-tbl'>
            <?php
            {
                $result = $sth->fetchAll();
                $andis=1;
                foreach($result as $row)
                {
                    echo"
                        <tr>
                            <td width='10%'><span>".$andis."</span></td>
                            <td width='35%'><a href='#' onclick='GoToProfile(".$row["code"].")'>".$row["name"]."</a></td>
                            <td width='7%'><a id='lnk' href='#' onclick='SetCorpInfo($row[code],$row[state_code],$row[center_code],\"{$row['name']}\")'>[مشخصات شرکت]</a></td>
                            <td width='7%'><a id='lnk' href='#' onclick='GoToProfile(".$row["code"].")'>[پروفایل شرکت]</a></td>
                        </tr>
                        ";
                    $andis=$andis+1;
                    /*echo "<tr>";
                        echo "<td width='5%' class='pic' style='text-align:center;'><img src='../images/users/".str_replace(" ", "", $row["logo"])."' onclick='GoToProfile(".$row["code"].")'></td>";
                        echo "<td width='40%' class='op'><a href='#' onclick='GoToProfile(".$row["code"].")'>".$row["name"]."</a></td>";
                        echo "<td width='10%' class='op'><a href='#' onclick='SetCorpInfo($row[code],$row[state_code],$row[center_code],\"{$row['name']}\")'>[مشخصات شرکت]</a></td>";
                    echo "</tr>";*/
                }
            }
            ?>
        </table>
        
        <!--<table class="data3">
                <?php
                {
                    $result = $sth->fetchAll();
                    $col=0;
                    foreach($result as $row)
                    {
                        $col=$col+1;
                        if ( $col==1 ) 
                        { 
                            echo "<tr>"; 
                        }
                        echo "<td>";
                            echo "<div class='cell'>";
                                echo "<img src='../images/users/".str_replace(" ", "", $row["logo"])."'>";
                                echo "<div class='tl'>";
                                    echo $row["name"];
                                echo "</div>";
                                echo "<div class='op'>";
                                    $logo = pathinfo($row["logo"]);
                                    $logo_extension=$logo['extension'];
                                    $logo_name=$logo['filename'];
                                    echo "<img src='../images/add-info.png' onclick='SetCorpInfo($row[code],$row[center_code],\"{$row['name']}\")'>";
                                    echo "<img src='../images/view.png' onclick='GoToProfile(".$row["code"].")'>";
                                echo "</div>";
                            echo "</div>";
                        echo "</td>";
                        if ( $col==5 ) 
                        { 
                            echo "</tr>";
                            $col=0; 
                        }
                    }
                }
                ?>
        </table>-->
</body>
</html>