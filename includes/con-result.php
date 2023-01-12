
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
	</head>
<body>
    <div id="result">
        <?php
            $filter0="";
            $filter1="";
            $filter2="";
            $filter3="";
            if ( $_COOKIE["StateFilter"]!="" )
            {
                $filter0="users.state_code=:state_code";
            }
            if ( $_COOKIE["CenterFilter"]!="" )
            {
                $filter1="users.center_code=:center_code";
            }
            if ( $_COOKIE["name"]!="" )
            {
                $filter2="users.name LIKE :name";
            }
            if ( $_COOKIE["modir"]!="" )
            {
                $filter3="users.user_type=:user_type";
            }
            if ( $filter0=="" && $filter1=="" && $filter2=="" && $filter3=="" )
            { 
                $sql="SELECT users.code,users.user_type,users.name,users.state_code,users.center_code,users.logo,states.name as stname,centers.name as cname FROM users LEFT JOIN states ON users.state_code=states.code LEFT JOIN centers ON users.center_code=centers.code WHERE users.user_type<>'admin_all' AND users.user_type<>'corp' AND users.user_type<>'moshaver' AND users.user_type<>'sarmaye'";
            }
            else
            {
                $sql="SELECT users.code,users.user_type,users.name,users.state_code,users.center_code,users.logo,states.name as stname,centers.name as cname FROM users LEFT JOIN states ON users.state_code=states.code LEFT JOIN centers ON users.center_code=centers.code WHERE users.user_type<>:admin_all AND users.user_type<>:corp AND users.user_type<>:sarmaye AND users.user_type<>:moshaver AND ";
                if ( $filter0!="" && $filter1!="" )
                {
                    $filter1=" AND ".$filter1;
                }
                if ( ( $filter0!="" || $filter1!="" ) && $filter2!="" )
                {
                    $filter2=" AND ".$filter2;
                }
                if ( ( $filter0!="" || $filter1!="" || $filter2!="" ) && $filter3!="" )
                {
                    $filter3=" AND ".$filter3;
                }
                $sql.=$filter0.$filter1.$filter2.$filter3;
            }

                        
            require_once "functions.php";
            $conn=connect_to_database();
            $sth = $conn->prepare($sql);

            $sth->bindValue(':admin_all', "admin_all");
            $sth->bindValue(':corp', "corp");
            $sth->bindValue(':sarmaye', "sarmaye");
            $sth->bindValue(':moshaver', "moshaver");
            if ( $filter0!="" )
            {
                $sth->bindValue(':state_code', $_COOKIE["StateFilter"]);
            }
            if ( $filter1!="" )
            {
                $sth->bindValue(':center_code', $_COOKIE["CenterFilter"]);
            }
            if ( $filter2!="" )
            {
                $sth->bindValue(':name', '%'.$_COOKIE["name"].'%');
            }
            if ( $filter3!="" )
            {
                $sth->bindValue(':user_type',$_COOKIE["modir"]);
            }
            
            $sth->execute();
            $count = $sth->rowCount();
            if ( $count>0 )
            {
                $result = $sth->fetchAll();
                echo "<div id='yes-search'>";
                echo "
                    <table id='search-header'>
                        <tr>
                            <td width='10%'>ردیف<td>
                            <td width='40%'>نام<td>
                            <td width='30%'>استان و مرکز<td>
                            <td width='20%'>سمت<td>
                        </tr>
                    </table>";
                echo "<table id='search-tbl'>";
                $andis=1;
                    foreach($result as $row)
                    {
                        $semat="";
                        switch ( $row["user_type"])
                        {
                            case "admin_state":
                                $semat="مدیر موسسه";
                                break;
                            case "admin":
                                $semat="مدیر مرکز";
                                break;
                            case "nazer":
                                $semat="کارشناس";
                                break;
                            case "mali":
                                $semat="امور مالی";
                                break;
                        }
                        echo"
                            <tr>
                                <td width='10%'><span>".$andis."</span></td>
                                <td width='40%'><a href='#' onclick='GoToProfile(".$row["code"].")'>".$row["name"]."</a></td>
                                <td width='30%'>".$row['stname']."<br/>".$row['cname']."</td>
                                <td width='20%'>".$semat."</td>
                            </tr>
                            ";
						$andis=$andis+1;
                        /*echo"
                        <table id='contact-tbl' width='100%'>
                            <tr>
                                <td width='5%' style='text-align:center;'>
                                    <a href='#' onclick='GoToProfile(".$row["code"].")'><img src='../images/users/".str_replace(" ", "", $row["logo"])."' onclick='GoToProfile(".$row["code"].")'></a>
                                </td>
                                <td width='28%' style='text-align:right;padding-right: 5px;'>
                                    <a href='#' onclick='GoToProfile(".$row["code"].")'>".$row["name"]."</a>
                                </td>
                                <td width='28%' style='text-align:right;padding-right: 5px;'>
                                    ".$row['stname']."<br/>".$row['cname']."
                                </td>
                                <td width='5%' style='text-align:center;'>
                                    ".$semat."
                                </td>
                            </tr>
                        </table>";*/
                    }
                echo "</table>";
                echo "</div>";
            }
            else
            {
                echo "<div id='no-result'>اطلاعاتی یافت نشد</div>";
            }
            
            
            $conn = null;
            
        ?>
    </div>
    
    <script>
        function GoToProfile(code)
        {
            setCookie("user_page", code, 1); // a user page that we visit it
            //top.location = "control-panel.php?mnu=1";
            top.location = "includes/profile.php";
        }      
    </script>
</body>


