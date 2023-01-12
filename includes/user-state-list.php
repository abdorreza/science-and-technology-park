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
        if ( $_COOKIE["user_type"]=="admin_all" )
        {
            if ( isset($_COOKIE["filter"]) && $_COOKIE["filter"]!="" )
            {
            
                $filter=" AND state_code=:state_code";
            }
            else
            {
                $filter="";
            }
        }
        else
        {
            $filter=" AND state_code=:state_code";
            $_COOKIE["filter"]=$_COOKIE["state_code"];
        }
        
        $sth = $conn->prepare("SELECT * FROM users WHERE user_type='admin_state'".$filter);
        if ( $filter!="" )
        {
            $sth->bindValue(':state_code', $_COOKIE["filter"]);
        }
        $sth->execute();
        $count = $sth->rowCount();
        if ($count<=0 )
        {
            echo "<div id='board-msg'>مدیر استانی تعریف نشده است</div>";
        }
    ?>
        <!--<table class="data5">-->
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
                                <td width='10%'><img src='../images/delete.png' onclick='Del_State(".$row["code"].")'></td>
                                <td width='10%'><img src='../images/edit.png' onclick='show_div_edit_state(".$row['code'].")'></td>
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
                                    echo "<img src='../images/delete.png' onclick='Del_State(".$row["code"].")'>";
                                    echo "<img src='../images/edit.png' onclick='show_div_edit_state(".$row['code'].")'>";
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


