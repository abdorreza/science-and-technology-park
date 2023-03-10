
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
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
            $filter4="";
            if ( $_COOKIE["StateFilter"]!="" )
            {
                $filter0="code_state=:code_state";
            }
            if ( $_COOKIE["CenterFilter"]!="" )
            {
                $filter1="code_center=:code_center";
            }
            if ( $_COOKIE["HozeFilter"]!="" )
            {
                $filter2="hoze=:hoze";
            }
            if ( $_COOKIE["ZamineFilter"]!="" )
            {
                $filter3="zamine=:zamine";
            }
            if ( $_COOKIE["IdeaFilter"]!="" )
            {
                $filter4="idea LIKE :idea";
            }
            
            if ( $filter0=="" && $filter1=="" && $filter2=="" && $filter3=="" && $filter4=="" )
            { 
                //$sql="SELECT corps.code_user,corps.name,corps.idea,corps.tel,corps.email,corps.website,corps.address,hoze.name as hoze_name,zamine.name as zamine_name from corps LEFT JOIN hoze ON corps.hoze=hoze.code LEFT JOIN zamine ON corps.hoze=zamine.code";
                $sql="SELECT corps.code_user,corps.name,corps.idea,corps.tel,corps.email,corps.website,corps.address,hoze.name as hoze_name,zamine.name as zamine_name,users.code,users.user_type from corps LEFT JOIN hoze ON corps.hoze=hoze.code LEFT JOIN zamine ON corps.hoze=zamine.code LEFT JOIN users ON corps.code_user=users.code WHERE users.user_type='sarmaye'";
            }
            else
            {
                //$sql="SELECT corps.code_user,corps.name,corps.idea,corps.tel,corps.email,corps.website,corps.address,hoze.name as hoze_name,zamine.name as zamine_name from corps LEFT JOIN hoze ON corps.hoze=hoze.code LEFT JOIN zamine ON corps.hoze=zamine.code WHERE ";
                $sql="SELECT corps.code_user,corps.name,corps.idea,corps.tel,corps.email,corps.website,corps.address,hoze.name as hoze_name,zamine.name as zamine_name,users.code,users.user_type from corps LEFT JOIN hoze ON corps.hoze=hoze.code LEFT JOIN zamine ON corps.hoze=zamine.code LEFT JOIN users ON corps.code_user=users.code WHERE users.user_type='sarmaye' ";
                if ( $filter0!="" )
                {
                    $filter0=" AND ".$filter0;
                }
                if ( $filter0!="" && $filter1!="" )
                {
                    $filter1=" AND ".$filter1;
                }
                //if ( ( $filter0!="" || $filter1!="" ) && $filter2!="" )
                if ( $filter2!="" )
                {
                    $filter2=" AND ".$filter2;
                }
                if ( ( $filter0!="" || $filter1!="" || $filter2!="" ) && $filter3!="" )
                {
                    $filter3=" AND ".$filter3;
                }
                //if ( ( $filter0!="" || $filter1!="" || $filter2!="" || $filter3!="" ) && $filter4!="" )
                if ( $filter4!="" )
                {
                    $filter4=" AND ".$filter4;
                }
                /*if ( $filter1!="" && $filter2!="" )
                {
                    $filter2=" AND ".$filter2;
                }
                if ( ( $filter1!="" || $filter2!="" ) && $filter3!="" )
                {
                    $filter3=" AND ".$filter3;
                }
                if ( ( $filter1!="" || $filter2!="" || $filter3!="" ) && $filter4!="" )
                {
                    $filter4=" AND ".$filter4;
                }*/
                $sql.=$filter0.$filter1.$filter2.$filter3.$filter4;
            }
            
            
            require_once "functions.php";
            $conn=connect_to_database();
            $sth = $conn->prepare($sql);

            if ( $filter0!="" )
            {
                $sth->bindValue(':code_state', $_COOKIE["StateFilter"]);
            }
            if ( $filter1!="" )
            {
                $sth->bindValue(':code_center', $_COOKIE["CenterFilter"]);
            }
            if ( $filter2!="" )
            {
                $sth->bindValue(':hoze', $_COOKIE["HozeFilter"]);
            }
            if ( $filter3!="" )
            {
                $sth->bindValue(':zamine', $_COOKIE["ZamineFilter"]);
            }
            if ( $filter4!="" )
            {
                $sth->bindValue(':idea', '%'.$_COOKIE["IdeaFilter"].'%');
            }

            $sth->execute();
            $count = $sth->rowCount();
            if ( $count>0 )
            {
                $result = $sth->fetchAll();
                $andis=1;
                echo "<div id='yes-search'>";
                echo "
                <table id='search-header'>
                    <tr>
                        <td width='8%'></td>
                        <td width='30%'>??????</td>
                        <td width='31%'>???????? ???????????? ??????????</td>
                        <td width='31%'>?????????? ???????????? ??????????</td>
                    </tr>
                </table>";
                echo "<table id='search-tbl'>";
                    foreach($result as $row)
                    {
                        echo"
                            <tr>
                                <td width='8%'><span>".$andis."</span></td>
                                <td width='42%'><a href='#' onclick='GoToProfile(".$row["code_user"].")'>".$row["name"]."</a></td>
                                <td width='50%'>".$row["hoze_name"]."</td>
                                <td width='50%'>".$row["zamine_name"]."</td>
                            </tr>
                            ";
						$andis=$andis+1;
                        /*echo"
                        <table id='search-tbl'>
                            <tr>
                                <td colspan='2' id='search-name'><span> ?????? </span><a href='#' onclick='GoToProfile(".$row["code_user"].")'>".$row["name"]."</a></td>
                            </tr>
                            <tr>
                                <td width='50%' id='search-other'><span> ???????? ???????????? </span>".$row["hoze_name"]."</td>
                                <td width='50%' id='search-other'><span> ?????????? ???????????? </span>".$row["zamine_name"]."</td>
                            </tr>
                            <tr>
                                <td width='50%' id='search-other'><span> ???????? ?????????? </span>".$row["idea"]."</td>
                                <td width='50%' id='search-other'><span> ?????????? ???????? </span>".$row["tel"]."</td>
                            </tr>
                            <tr>
                                <td width='50%' id='search-other'><span> ?????????? </span>".$row["email"]."</td>
                                <td width='50%' id='search-other'><span> ???? ???????? </span>".$row["website"]."</td>
                            </tr>
                            <tr>
                                <td colspan='2' id='search-other'><span> ???????? </span>".$row["address"]."</td>
                            </tr>
                        </table>";*/
                    }
                echo "</table>";
                echo "</div>";
            }
            else
            {
                echo "<div id='no-result'>???????????????? ???????? ??????</div>";
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
</html>