<!DOCTYPE html>
<html lang="en">
	<head>
		<title>شبکه تخصصی شرکت های فناور</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/responsive.css">
	</head>
	<body>
		<div id="mainDIV">
			<div id="header">
				<div id="logo">
					<img src="./images/logo.png" alt="شبکه تخصصی شرکت های فناور">
				</div>
				<div id="nav-responsive">
					<div class="menu-list"> 
						<!-- Logo and navigation menu -->
						<div class="geeks"> 
							<a href="#" class=""></a> 
							<div id="menus"> 
								<a href="index.php">صفحه نخست</a> 
								<a href="corps.php">شرکت های عضو</a> 
								<a href="sarmaye.php">سرمایه گذاران</a> 
								<a href="moshaver.php">مشاوران تخصصی</a> 
								<a href="login-page.php">ورود/عضویت</a> 
								<a href="contactus.html">تماس با ما</a> 
								<a href="about.html">درباره</a> 
								<a href="help.html">راهنما</a> 
							</div> 
							
							<!-- Bar icon for navigation -->
							<a href="javascript:void(0);" class="icon" onclick="geeksforgeeks()">منو</a> 
						</div> 
					</div> 
				</div>
				<div id="nav">
					  <nav>  
						<ul class="menu">
							  <li><a href="index.php">صفحه نخست</a></li>
							  <li><a href="corps.php">شرکت های عضو</a></li>
							  <li class="current"><a href="sarmaye.php">سرمایه گذاران</a></li>
	 						  <li><a href="moshaver.php">مشاوران تخصصی</a></li>
							  <li><a href="login-page.php">ورود/عضویت</a></li>
							  <li><a href="contactus.html">تماس با ما</a></li>
							  <li><a href="about.html">درباره</a></li>
							  <li><a href="help.html">راهنما</a></li>
						  </ul>
					  </nav>
				</div>
			</div>
			<div id="content">
                <div id="snackbar"></div>
                <?php
                    require_once "includes/functions.php";
                    $conn=connect_to_database();
                ?>
                <div id="CorpFilter">
                    <form action="includes/search-sarmare-result.php" method="get">
                                <table id="FilterTable">
                                    <tr>
                                        <td width="19%">
                                            <?php
                                                echo "<select id='StateFilter' style='width:100%;' onchange='ChangeCenter()'>";
                                                echo "<option value=''>تمامی استان ها</option>";
                                                $sth = $conn->prepare("SELECT * FROM states");
                                                $sth->execute();
                                                $result = $sth->fetchAll();
                                                foreach($result as $row)
                                                {
                                                    echo "<option value=".$row["code"].">".$row["name"]."</option>";
                                                }
                                                echo "</SELECT>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="19%">
                                                <select id='CenterFilter' style='width:100%'>
                                                    <option value=''>تمامی مراکز</option>
                                                </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="19%">
                                            <?php
                                                echo "<select id='HozeFilter' style='width:100%;' onchange='ChangeZamine()'>";
                                                echo "<option value=''>تمامی حوزه ها</option>";
                                                $sth = $conn->prepare("SELECT * FROM hoze");
                                                $sth->execute();
                                                $result = $sth->fetchAll();
                                                foreach($result as $row)
                                                {
                                                    echo "<option value=".$row["code"].">".$row["name"]."</option>";
                                                }
                                                echo "</select>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="19%">
                                            <?php
                                                echo "<select id='ZamineFilter' style='width:100%;'>";
                                                echo "<option value=''>تمامی زمینه ها</option>";
                                                echo "</select>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right;" width="25%">
                                            <input type="text" id="IdeaFilter" size="50" maxlength="50" placeholder="زمینه ایده محوری">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right;padding-top:5px;" width="5%">
                                            <a href="#" id="DoneFilter" class="btns" onclick ="SetFilter()" >جستجو</a>
                                        </td>
                                    </tr>
                                </table>
            
                    </form>
                </div>
                
                <?php 
                    $_COOKIE["StateFilter"]="";
                    $_COOKIE["CenterFilter"]="";
                    $_COOKIE["HozeFilter"]="";
                    $_COOKIE["ZamineFilter"]="";
                    $_COOKIE["IdeaFilter"]="";
                ?>
                <div class="area3">
                    <?php include 'includes/search-sarmare-result.php'; ?>
                </div>
                
                <!-- Waiting Page -->    
                <div id="Waiting">
                    <div id="popupContact">
                         <div class="formWait">
                         <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
                        </div>
                    </div>
                </div>
			</div>
			<div id="footer">
				<div id="footer-left">
					<div id="footer-left-site">
					</div>
					<div id="footer-left-contact">
						<a href="mailto:info@iranstp.ir?Subject=Hello%20again">info@iranstp.ir</a>
					</div>
					<div id="footer-left-net">
					</div>
				</div>
				<div id="footer-right">
				</div>
			</div>
		</div>
		<?php    
		   $conn = null;
		?>

	<script src="jquery/jquery.js" type="text/javascript"></script>
    <script>

		function ShowResMenu() 
		{
		  var x = document.getElementById("res-menu");
		  if (x.style.display === "block") 
		  {
			x.style.display = "none";
		  } 
		  else 
		  {
			x.style.display = "block";
		  }
		}

       function ChangeZamine()
       {
            var hoze=document.getElementById("HozeFilter").value;
            if ( hoze=="" )
            {
                $('#ZamineFilter').empty();
                select = document.getElementById('ZamineFilter');
                var opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "تمامی زمینه ها"
            }
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('hoze', hoze);
             form_data.append('filter', filter);
             $.ajax({
                 url: 'includes/filter_zamine.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#ZamineFilter').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('ZamineFilter');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی زمینه ها"
                        select.appendChild(opt);
                        for (var i=0;i<obj.length;i++)
                        {
                            var opt = document.createElement('option');
                            opt.value = obj[i].code;
                            opt.innerHTML = obj[i].name;
                            select.appendChild(opt);
                        }
                    }
                    else
                    {
                        select = document.getElementById('ZamineFilter');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی زمینه ها"
                        select.appendChild(opt);
                    }
                 }
              });
       }
       
       
       function ChangeCenter()
       {

             var filter=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#StateFilter").val());
             form_data.append('filter', filter);
             $.ajax({
                 url: 'includes/filter_center.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#CenterFilter').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('CenterFilter');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی مراکز";
                        select.appendChild(opt);
                        for (var i=0;i<obj.length;i++)
                        {
                            var opt = document.createElement('option');
                            opt.value = obj[i].code;
                            opt.innerHTML = obj[i].name;
                            select.appendChild(opt);
                        }
                    }
                    else
                    {
                        select = document.getElementById('CenterFilter');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی مراکز";
                        select.appendChild(opt);
                    }
                 }
              });
       }
       
       
       function SetFilter()
       {
            $("#Waiting").css("display","block");
            if ( $("#StateFilter").val()==null )
            {
               setCookie("StateFilter","",1);
            }
            else
            {
                setCookie("StateFilter",$("#StateFilter").val(),1);
            } 
            if ( $("#CenterFilter").val()==null )
            {
                setCookie("CenterFilter","",1);
            }
            else
            {
                setCookie("CenterFilter",$("#CenterFilter").val(),1);
            } 
            if ( $("#HozeFilter").val()==null )
            {
                setCookie("HozeFilter","",1);
            }
            else
            {
                setCookie("HozeFilter",$("#HozeFilter").val(),1);
            } 
            if ( $("#ZamineFilter").val()==null )
            {
                setCookie("ZamineFilter","",1);
            }
            else
            {
                setCookie("ZamineFilter",$("#ZamineFilter").val(),1);
            } 
            if ( $("#IdeaFilter").val()==null )
            {
                setCookie("IdeaFilter","",1);
            }
            else
            {
                setCookie("IdeaFilter",$("#IdeaFilter").val(),1);
            } 
            $(".area3").load("includes/search-sarmare-result.php");
            setTimeout(function()
            { 
                $("#Waiting").css("display","none");
            }, 400);
       }
		// Responsive Menu
			// Function to toggle the bar 
			function geeksforgeeks() 
			{ 
				var x = document.getElementById("menus");
				if (x.style.display === "block") 
				{ 
					x.style.display = "none"; 
				} 
				else 
				{ 
					x.style.display = "block";
				} 
			} 
    
    </script>
	</body>
</html>

