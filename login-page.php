<!DOCTYPE html>
<html lang="en">
	<head>
		<title>شبکه تخصصی شرکت های فناور</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/responsive.css">
		<script src="jquery/javascript.js" type="text/javascript"></script>
	    <script src="jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="jquery/alert.js"></script>
	</head>
	<body>
		<div id="snackbar"></div>
		<div id="mainDIV">
			<div id="header">
				<div id="logo">
					<img src="./images/logo.png" alt="شبکه تخصصی شرکت های فناور">
				</div>
				<div id="nav-responsive">
					<!--<div  id="res-menu-title"><a href="javascript:void(0);" onclick="ShowResMenu()">منو</a></div>
					<div id="res-menu">
						<a href="index.php">صفحه نخست</a>
						<a href="corps.php">شرکت های عضو</a>
						<a href="sarmaye.php">سرمایه گذاران</a>
						<a href="moshaver.php">مشاوران تخصصی</a>
						<a href="login-page.php">ورود/عضویت</a>
						<a href="contactus.html">تماس با ما</a>
						<a href="about.html">درباره</a>
						<a href="help.html">راهنما</a>
					</div>-->
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
							  <li><a href="sarmaye.php">سرمایه گذاران</a></li>
	 						  <li><a href="moshaver.php">مشاوران تخصصی</a></li>
							  <li class="current"><a href="login-page.php">ورود/عضویت</a></li>
							  <li><a href="contactus.html">تماس با ما</a></li>
							  <li><a href="about.html">درباره</a></li>
							  <li><a href="help.html">راهنما</a></li>
						  </ul>
					  </nav>
				</div>
			</div>
			<div id="content">&nbsp;
                    <div id="login-form">
                        <!--CONTENT-->
                        <div class="content">
                        <p>نام کاربری</p>
                        <!--USERNAME--><input name="username" tabindex="1" type="text" class="input username" /><!--END USERNAME-->
                        <p>رمز عبور</p>
                        <!--PASSWORD--><input name="password" tabindex="2"  type="password" class="input password" /><!--END PASSWORD-->
                        </div>
                        <!--END CONTENT-->
                        <!--<div class="captcha">
                            <p>کد امنیتی</p>
                            <table>
                                <tr>
                                    <td class="captcha-left" tabindex="-1"><a tabindex="-1" onclick="document.getElementById('captcha').src='includes/showcaptcha.php?rnd='+Math.random();" href="javascript:void(0)"><img tabindex="-1" src="images/refresh.png"></a></td>
                                    <td class="captcha-right" tabindex="-1"><img tabindex="-1" id="captcha" src="includes/showcaptcha.php" alt=""></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="captcha-bottom"><input tabindex="3" name="input-captcha" type="text" class="input-captcha" /></td>
                                </tr>
                            </table>
                        </div>-->
                        <!--FOOTER-->
                        <div class="footer">
                        <p id="errmsg"></p>
                        <!--LOGIN BUTTON--><input type="submit" name="submit" value="ورود" class="button login"/><!--END LOGIN BUTTON-->
                        <br/>
                        <br/>
                        <!--<p><a href="">[رمز عبور را فراموش کرده ام]</a></p>
                        <p><a href="">[ایجاد حساب کاربری]</a></p>-->
                        </div>
                        <!--END FOOTER-->
                    </div>
                    <!--END LOGIN FORM-->
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
		
		<script type="text/javascript">
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
			$(".username").focus();
			$(document).ready(function (){
				$(".login").click(function(){
					var username=$(".username").val();
					var password=$(".password").val();
					var captcha=$(".input-captcha").val();
					if ( username=="" || password=="")
					{
						$("#snackbar").html("جهت ورود به سایت باید تمامی فیلدها را پر نمایید");
						ShowFloatingMessage();
						return;
					}
					else {
						var login = true;
						$.post("login.php", {username: username, password: password, captcha:captcha, login: login}, function (data) {
							if ( data =="captcha error" )
							{
								$("#snackbar").html("کد امنیتی اشتباه است");
								ShowFloatingMessage();
								return;
							}
							if ( data!=0 )
							{
								var obj = JSON.parse(data);
								setCookie("user_code", obj[0].code, 1);
								setCookie("username", obj[0].username, 1);
								setCookie("user_type", obj[0].user_type, 1);
								setCookie("state_code", obj[0].state_code, 1);
								setCookie("center_code", obj[0].center_code, 1);
								setCookie("user_page", obj[0].code, 1); // a user page that we visit it
								setCookie("user_name", obj[0].name, 1);
								top.location = "control-panel.php?mnu=3";
							}
							else {
								$("#snackbar").html("نام کاربری یا رمز عبور اشتباه است");
								ShowFloatingMessage();
							}
						})
					}
				});

			});

			/*** Go To Next Element By Press ENTER ***/
			jQuery.extend(jQuery.expr[':'], {
				focusable: function (el, index, selector) {
					return $(el).is('a, button, :input, [tabindex]');
				}
			});

			$(document).on('keypress', 'input,select', function (e) {
				if (e.which == 13) {
					e.preventDefault();
					// Get all focusable elements on the page
					var $canfocus = $(':focusable');
					var index = $canfocus.index(this) + 1;
					if (index >= $canfocus.length) index = 0;
					$canfocus.eq(index).focus();
				}
			});

			$(".password").focusout(function()
			{
				$(".input-captcha").focus();
			});
			
			$(".input-captcha").focusout(function()
			{
				$('.login').trigger('click');
			});
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

