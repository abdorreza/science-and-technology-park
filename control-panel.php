<!DOCTYPE html>
<html lang="fa">
	<head>
		<title>شبکه تخصصی شرکت های فناور</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/responsive.css">
	</head>
	<body>
		<div id="mainDIV">
			<div id="cheader">
		<?php
			require_once "includes/functions.php";
			$conn=connect_to_database();
			$sth = $conn->prepare("SELECT * FROM users WHERE code=:code");
			$sth->bindValue(':code', $_COOKIE["user_code"]);
			$sth->execute();
			$result = $sth->fetchAll();
			$count = $sth->rowCount();
		?>
				<div id="clogo">
					<img src="./images/logo.png" alt="شبکه تخصصی شرکت های فناور">
					<table>
						<tr>
							<td><a href="control-panel.php?mnu=1" id="menu1">صندوق پیام<span id="NewMessages"></span></a></td>
							<td><a href="control-panel.php?mnu=2" id="menu2">پروفایل</a></td>
							<td><a href="control-panel.php?mnu=3" id="menu3">تماس با ما</a></td>
							<td><a href="control-panel.php?mnu=4" id="menu4">درباره</a></td>
							<td><a href="control-panel.php?mnu=20" id="menu4">راهنما</a></td>
						<tr>
					</table>
				</div>
				  <div id="user-pic">
					  <table>
						<tr>
						  <td colsspan='2'><?php echo "<img src='images/users/".str_replace(' ', '', $result[0]["logo"])."'>";?></td>
						</tr>
						<tr>
							  <?php
								switch ($result[0]["user_type"])
								{
									case "admin_all":
										echo "<td>مدیر ارشد سایت</td>";
										break; 
									case "admin_state":
										echo "<td>مدیر استان</td>";
										break; 
									case "admin":
										echo "<td>مدیر مرکز</td>";
										break; 
									case "nazer":
										echo "<td>کارشناس</td>";
										break; 
									case "mali":
										echo "<td>امور مالی</td>";
										break; 
									case "corp":
									case "sarmaye":
									case "moshaver":
										echo "<td>شرکت</td>";
										break; 
								}
							  ?>
						</tr>
						<tr>
							<?php echo "<td>".$result[0]["name"]."</td>"; ?>
						</tr>
						<tr>
						  <td><a href="#" onclick="exit_site()">خروج</a></td>
						</tr>
					  </table>
				  </div>
				<div id="cnav-responsive">
					<!--<select onchange="location=this.value" id="mobile-menu">
						<option value="">منو</option>-->
                        <?php
							  switch ( $_COOKIE["user_type"] )
							  {
								case "admin_all": //ALL ADMIN
									/*echo"
									<option value='control-panel.php?mnu=5'>مدیریت استان ها</option>
									<option value='control-panel.php?mnu=6'>مدیریت مراکز</option>
									<option value='control-panel.php?mnu=7'>مدیریت کاربران</option>
									<option value='control-panel.php?mnu=8'>اطلاعات شرکت ها</option>
									<option value='control-panel.php?mnu=9'>گزارش شرکت ها</option>
									<option value='control-panel.php?mnu=10'>جستجوی شرکت ها</option>
									<option value='control-panel.php?mnu=11'>گزارشات</option>
									<option value='control-panel.php?mnu=12'>سرمایه گذاری</option>
									<option value='control-panel.php?mnu=13'>مشاوره تخصصی</option>
									<option value='control-panel.php?mnu=14'>ارسال پیام کلی</option>
									<option value='control-panel.php?mnu=15'>مدیران موسسات</option>
									<option value='control-panel.php?mnu=16'>ورود اطلاعات</option>
									";*/
									echo"
										<div class='menu-list'> 
											<!-- Logo and navigation menu -->
											<div class='geeks'> 
												<a href='#' class=''></a> 
												<div id='menus'> 
													<a href='control-panel.php?mnu=5'>مدیریت استان ها</a> 
													<a href='control-panel.php?mnu=6'>مدیریت مراکز</a> 
													<a href='control-panel.php?mnu=7'>مدیریت کاربران</a> 
													<a href='control-panel.php?mnu=8'>اطلاعات شرکت ها</a> 
													<a href='control-panel.php?mnu=9'>گزارش شرکت ها</a> 
													<a href='control-panel.php?mnu=10'>جستجوی شرکت ها</a> 
													<a href='control-panel.php?mnu=11'>گزارشات</a> 
													<a href='control-panel.php?mnu=12'>سرمایه گذاری</a> 
													<a href='control-panel.php?mnu=13'>مشاوره تخصصی</a> 
													<a href='control-panel.php?mnu=14'>ارسال پیام کلی</a> 
													<a href='control-panel.php?mnu=15'>مدیران موسسات</a> 
													<a href='control-panel.php?mnu=16'>ورود اطلاعات</a> 
												</div> 
												
												<!-- Bar icon for navigation -->
												<a href='javascript:void(0);' class='icon' onclick='geeksforgeeks()'>منو</a> 
											</div> 
										</div> 
									";
									break;
								case "admin_state": //State Admin
									/*echo"
									<option value='control-panel.php?mnu=6'>مدیریت مراکز</option>
									<option value='control-panel.php?mnu=7'>مدیریت کاربران</option>
									<option value='control-panel.php?mnu=8'>اطلاعات شرکت ها</option>
									<option value='control-panel.php?mnu=9'>گزارش شرکت ها</option>
									<option value='control-panel.php?mnu=10'>جستجوی شرکت ها</option>
									<option value='control-panel.php?mnu=11'>گزارشات</option>
									<option value='control-panel.php?mnu=12'>سرمایه گذاری</option>
									<option value='control-panel.php?mnu=13'>مشاوره تخصصی</option>
									<option value='control-panel.php?mnu=14'>ارسال پیام کلی</option>
									<option value='control-panel.php?mnu=15'>مدیران موسسات</option>
									<option value='control-panel.php?mnu=16'>ورود اطلاعات</option>
									";*/
									echo"
										<div class='menu-list'> 
											<!-- Logo and navigation menu -->
											<div class='geeks'> 
												<a href='#' class=''></a> 
												<div id='menus'> 
													<a href='control-panel.php?mnu=6'>مدیریت مراکز</a> 
													<a href='control-panel.php?mnu=7'>مدیریت کاربران</a> 
													<a href='control-panel.php?mnu=8'>اطلاعات شرکت ها</a> 
													<a href='control-panel.php?mnu=9'>گزارش شرکت ها</a> 
													<a href='control-panel.php?mnu=10'>جستجوی شرکت ها</a> 
													<a href='control-panel.php?mnu=11'>گزارشات</a> 
													<a href='control-panel.php?mnu=12'>سرمایه گذاری</a> 
													<a href='control-panel.php?mnu=13'>مشاوره تخصصی</a> 
													<a href='control-panel.php?mnu=14'>ارسال پیام کلی</a> 
													<a href='control-panel.php?mnu=15'>مدیران موسسات</a> 
													<a href='control-panel.php?mnu=16'>ورود اطلاعات</a> 
												</div> 
												
												<!-- Bar icon for navigation -->
												<a href='javascript:void(0);' class='icon' onclick='geeksforgeeks()'>منو</a> 
											</div> 
										</div> 
									";
									break;
								case "admin": //Center Admin
									/*echo"
									<option value='control-panel.php?mnu=7'>مدیریت کاربران</option>
									<option value='control-panel.php?mnu=8'>اطلاعات شرکت ها</option>
									<option value='control-panel.php?mnu=9'>گزارش شرکت ها</option>
									<option value='control-panel.php?mnu=10'>جستجوی شرکت ها</option>
									<option value='control-panel.php?mnu=11'>گزارشات</option>
									<option value='control-panel.php?mnu=12'>سرمایه گذاری</option>
									<option value='control-panel.php?mnu=13'>مشاوره تخصصی</option>
									<option value='control-panel.php?mnu=14'>ارسال پیام کلی</option>
									<option value='control-panel.php?mnu=15'>مدیران موسسات</option>
									<option value='control-panel.php?mnu=16'>ورود اطلاعات</option>
									";*/
									echo"
										<div class='menu-list'> 
											<!-- Logo and navigation menu -->
											<div class='geeks'> 
												<a href='#' class=''></a> 
												<div id='menus'> 
													<a href='control-panel.php?mnu=7'>مدیریت کاربران</a> 
													<a href='control-panel.php?mnu=8'>اطلاعات شرکت ها</a> 
													<a href='control-panel.php?mnu=9'>گزارش شرکت ها</a> 
													<a href='control-panel.php?mnu=10'>جستجوی شرکت ها</a> 
													<a href='control-panel.php?mnu=11'>گزارشات</a> 
													<a href='control-panel.php?mnu=12'>سرمایه گذاری</a> 
													<a href='control-panel.php?mnu=13'>مشاوره تخصصی</a> 
													<a href='control-panel.php?mnu=14'>ارسال پیام کلی</a> 
													<a href='control-panel.php?mnu=15'>مدیران موسسات</a> 
													<a href='control-panel.php?mnu=16'>ورود اطلاعات</a> 
												</div> 
												
												<!-- Bar icon for navigation -->
												<a href='javascript:void(0);' class='icon' onclick='geeksforgeeks()'>منو</a> 
											</div> 
										</div> 
									";
									break;
								case "nazer":
									/*echo"
									<option value='control-panel.php?mnu=8'>اطلاعات شرکت ها</option>
									<option value='control-panel.php?mnu=9'>گزارش شرکت ها</option>
									<option value='control-panel.php?mnu=10'>جستجوی شرکت ها</option>
									<option value='control-panel.php?mnu=11'>گزارشات</option>
									<option value='control-panel.php?mnu=12'>سرمایه گذاری</option>
									<option value='control-panel.php?mnu=13'>مشاوره تخصصی</option>
									<option value='control-panel.php?mnu=15'>مدیران موسسات</option>
									";*/
									echo"
										<div class='menu-list'> 
											<!-- Logo and navigation menu -->
											<div class='geeks'> 
												<a href='#' class=''></a> 
												<div id='menus'> 
													<a href='control-panel.php?mnu=8'>اطلاعات شرکت ها</a> 
													<a href='control-panel.php?mnu=9'>گزارش شرکت ها</a> 
													<a href='control-panel.php?mnu=10'>جستجوی شرکت ها</a> 
													<a href='control-panel.php?mnu=11'>گزارشات</a> 
													<a href='control-panel.php?mnu=12'>سرمایه گذاری</a> 
													<a href='control-panel.php?mnu=13'>مشاوره تخصصی</a> 
													<a href='control-panel.php?mnu=15'>مدیران موسسات</a> 
												</div> 
												
												<!-- Bar icon for navigation -->
												<a href='javascript:void(0);' class='icon' onclick='geeksforgeeks()'>منو</a> 
											</div> 
										</div> 
									";
									break;
								case "mali":
									/*echo"
									<option value='control-panel.php?mnu=8'>اطلاعات شرکت ها</option>
									<option value='control-panel.php?mnu=10'>جستجوی شرکت ها</option>
									<option value='control-panel.php?mnu=11'>گزارشات</option>
									<option value='control-panel.php?mnu=12'>سرمایه گذاری</option>
									<option value='control-panel.php?mnu=13'>مشاوره تخصصی</option>
									<option value='control-panel.php?mnu=15'>مدیران موسسات</option>
									";*/
									echo"
										<div class='menu-list'> 
											<!-- Logo and navigation menu -->
											<div class='geeks'> 
												<a href='#' class=''></a> 
												<div id='menus'> 
													<a href='control-panel.php?mnu=8'>اطلاعات شرکت ها</a> 
													<a href='control-panel.php?mnu=10'>جستجوی شرکت ها</a> 
													<a href='control-panel.php?mnu=11'>گزارشات</a> 
													<a href='control-panel.php?mnu=12'>سرمایه گذاری</a> 
													<a href='control-panel.php?mnu=13'>مشاوره تخصصی</a> 
													<a href='control-panel.php?mnu=15'>مدیران موسسات</a> 
												</div> 
												
												<!-- Bar icon for navigation -->
												<a href='javascript:void(0);' class='icon' onclick='geeksforgeeks()'>منو</a> 
											</div> 
										</div> 
									";
									break;
								case "corp":
								case "sarmaye":
								case "moshaver":
									/*echo"
									<option value='control-panel.php?mnu=5'>اطلاعات شرکت ها</option>
									<option value='control-panel.php?mnu=6'>گزارش شرکت</option>
									<option value='control-panel.php?mnu=7'>جستجوی شرکت ها</option>
									<option value='control-panel.php?mnu=8'>سرمایه گذاری</option>
									<option value='control-panel.php?mnu=9'>مشاوره تخصصی</option>
									<option value='control-panel.php?mnu=10'>مدیران موسسات</option>
									";*/
									echo"
										<div class='menu-list'> 
											<!-- Logo and navigation menu -->
											<div class='geeks'> 
												<a href='#' class=''></a> 
												<div id='menus'> 
													<a href='control-panel.php?mnu=5'>اطلاعات شرکت</a>
													<a href='control-panel.php?mnu=6'>گزارش شرکت</a> 
													<a href='control-panel.php?mnu=7'>جستجوی شرکت ها</a> 
													<a href='control-panel.php?mnu=8'>سرمایه گذاری</a> 
													<a href='control-panel.php?mnu=9'>مشاوره تخصصی</a> 
													<a href='control-panel.php?mnu=10'>مدیران موسسات</a> 
												</div> 
												
												<!-- Bar icon for navigation -->
												<a href='javascript:void(0);' class='icon' onclick='geeksforgeeks()'>منو</a> 
											</div> 
										</div> 
									";
									break;
							  }
					    ?>
					<!--</select>-->
				</div>
				<div id="cnav">
					  <nav>  
						<ul class="menuc">
                            <?php
                                  switch ( $_COOKIE["user_type"] )
                                  {
                                    case "admin_all": //ALL ADMIN
                                        echo '<li><a href="control-panel.php?mnu=5" id="menu5">مدیریت استان ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=6" id="menu6">مدیریت مراکز</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=7" id="menu7">مدیریت کاربران</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=8" id="menu8">اطلاعات شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=9" id="menu9">گزارش شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=10" id="menu10">جستجوی شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=11" id="menu11">گزارشات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=12" id="menu12">سرمایه گذاری</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=13" id="menu13">مشاوره تخصصی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=14" id="menu14">ارسال پیام کلی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=15" id="menu15">مدیران موسسات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=16" id="menu16">ورود اطلاعات</a></li>';
                                        break;
                                    case "admin_state": //State Admin
                                        echo '<li><a href="control-panel.php?mnu=5" id="menu5">مدیریت مراکز</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=6" id="menu6">مدیریت کاربران</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=7" id="menu7">اطلاعات شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=8" id="menu8">گزارش شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=9" id="menu9">جستجوی شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=10" id="menu10">گزارشات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=11" id="menu11">سرمایه گذاری</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=12" id="menu12">مشاوره تخصصی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=13" id="menu13">ارسال پیام کلی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=14" id="menu14">مدیران موسسات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=15" id="menu15">ورود اطلاعات</a></li>';
                                        break;
                                    case "admin": //Center Admin
                                        echo '<li><a href="control-panel.php?mnu=5" id="menu5">مدیریت کاربران</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=6" id="menu6">اطلاعات شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=7" id="menu7">گزارش شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=8" id="menu8">جستجوی شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=9" id="menu9">گزارشات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=10" id="menu10">سرمایه گذاری</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=11" id="menu11">مشاوره تخصصی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=12" id="menu12">ارسال پیام کلی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=13" id="menu13">مدیران موسسات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=14" id="menu14">ورود اطلاعات</a></li>';
                                        break;
                                    case "nazer":
                                        echo '<li><a href="control-panel.php?mnu=5" id="menu5">اطلاعات شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=6" id="menu6">گزارش شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=7" id="menu7">جستجوی شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=8" id="menu8">گزارشات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=9" id="menu9">سرمایه گذاری</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=10" id="menu10">مشاوره تخصصی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=11" id="menu11">مدیران موسسات</a></li>';
                                        break;
                                    case "mali":
                                        echo '<li><a href="control-panel.php?mnu=5" id="menu5">اطلاعات شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=6" id="menu6">جستجوی شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=7" id="menu7">گزارشات</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=8" id="menu8">سرمایه گذاری</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=9" id="menu9">مشاوره تخصصی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=10" id="menu10">مدیران موسسات</a></li>';
                                        break;
                                    case "corp":
                                    case "sarmaye":
                                    case "moshaver":
                                        echo '<li><a href="control-panel.php?mnu=5" id="menu5">اطلاعات شرکت</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=6" id="menu6">گزارش شرکت</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=7" id="menu7">جستجوی شرکت ها</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=8" id="menu8">سرمایه گذاری</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=9" id="menu9">مشاوره تخصصی</a></li>';
                                        echo '<li><a href="control-panel.php?mnu=10" id="menu10">مدیران موسسات</a></li>';
                                        break;
                                  }
                            ?>
						  </ul>
					  </nav>
				</div>
			</div>
			
			
			<div id="cp-content">
                    <?php
                          switch ( $_COOKIE["user_type"] )
                          {
                            case "admin_all":
                                    if ( $_GET["mnu"]==1 ) { include 'includes/msg-box.php'; }
                                    else if ( $_GET["mnu"]==2 ) { include 'includes/set_profile.php'; }
                                    else if ( $_GET["mnu"]==3 ) { include 'includes/contactus.html'; }
                                    else if ( $_GET["mnu"]==4 ) { include 'includes/about.php'; }
                                    else if ( $_GET["mnu"]==5 ) { include 'includes/states.php'; }
                                    else if ( $_GET["mnu"]==6 ) { include 'includes/centers.php'; }
                                    else if ( $_GET["mnu"]==7 ) 
                                    { 
                                        if ( isset($_GET["code"]) )
                                        {
                                            $scc=$_GET["code"];
                                            include "includes/users.php";
                                        }
                                        else
                                        {
                                            $scc="";
                                            include 'includes/users.php'; 
                                        }
                                    }
                                    else if ( $_GET["mnu"]==8 ) { include 'includes/corp-info.php'; }
                                    else if ( $_GET["mnu"]==9 ) { include 'includes/corp-form.php'; }
                                    else if ( $_GET["mnu"]==10 ) { include 'includes/search-corp.php'; }
                                    else if ( $_GET["mnu"]==11 ) { include 'includes/reports.php'; }
                                    else if ( $_GET["mnu"]==12 ) { include 'includes/search-sarmaye.php'; }
                                    else if ( $_GET["mnu"]==13 ) { include 'includes/search-moshaver.php'; }
                                    else if ( $_GET["mnu"]==14 ) { include 'includes/msg-all.php'; }
                                    else if ( $_GET["mnu"]==15 ) { include 'includes/contact.php'; }
                                    else if ( $_GET["mnu"]==16 ) 
                                    { 
                                        if ( isset($_GET["code"]) )
                                        {
                                            $scc=$_GET["code"];
                                            include "import/import.php";
                                        }
                                        else
                                        {
                                            $scc="";
                                            include 'import/import.php'; 
                                        }
                                    }
                                    else if ( $_GET["mnu"]==20 ) { include 'includes/help.html'; }
                                    break;
                            case "admin_state":
                                    if ( $_GET["mnu"]==1 ) { include 'includes/msg-box.php'; }
                                    else if ( $_GET["mnu"]==2 ) { include 'includes/set_profile.php'; }
                                    else if ( $_GET["mnu"]==3 ) { include 'includes/contactus.html'; }
                                    else if ( $_GET["mnu"]==4 ) { include 'includes/about.php'; }
                                    else if ( $_GET["mnu"]==5 ) { include 'includes/centers.php'; }
                                    else if ( $_GET["mnu"]==6 ) 
									{ 
                                        if ( isset($_GET["code"]) )
                                        {
                                            $scc=$_GET["code"];
                                            include "includes/users.php";
                                        }
                                        else
                                        {
                                            $scc="";
                                            include 'includes/users.php'; 
                                        }
									}
                                    else if ( $_GET["mnu"]==7 ) { include 'includes/corp-info.php'; }
                                    else if ( $_GET["mnu"]==8 ) { include 'includes/corp-form.php'; }
                                    else if ( $_GET["mnu"]==9 ) { include 'includes/search-corp.php'; }
                                    else if ( $_GET["mnu"]==10 ) { include 'includes/reports.php'; }
                                    else if ( $_GET["mnu"]==11 ) { include 'includes/search-sarmaye.php'; }
                                    else if ( $_GET["mnu"]==12 ) { include 'includes/search-moshaver.php'; }
                                    else if ( $_GET["mnu"]==13 ) { include 'includes/msg-all.php'; }
                                    else if ( $_GET["mnu"]==14 ) { include 'includes/contact.php'; }
                                    else if ( $_GET["mnu"]==15 ) 
                                    { 
                                        if ( isset($_GET["code"]) )
                                        {
                                            $scc=$_GET["code"];
                                            include "import/import.php";
                                        }
                                        else
                                        {
                                            $scc="";
                                            include 'import/import.php'; 
                                        }
                                    }
                                    else if ( $_GET["mnu"]==20 ) { include 'includes/help.html'; }
                                    break;
                            case "admin":
                                    if ( $_GET["mnu"]==1 ) { include 'includes/msg-box.php'; }
                                    else if ( $_GET["mnu"]==2 ) { include 'includes/set_profile.php'; }
                                    else if ( $_GET["mnu"]==3 ) { include 'includes/contactus.html'; }
                                    else if ( $_GET["mnu"]==4 ) { include 'includes/about.php'; }
                                    else if ( $_GET["mnu"]==5 ) 
									{ 
                                        if ( isset($_GET["code"]) )
                                        {
                                            $scc=$_GET["code"];
                                            include "includes/users.php";
                                        }
                                        else
                                        {
                                            $scc="";
                                            include 'includes/users.php'; 
                                        }
									}
                                    else if ( $_GET["mnu"]==6 ) { include 'includes/corp-info.php'; }
                                    else if ( $_GET["mnu"]==7 ) { include 'includes/corp-form.php'; }
                                    else if ( $_GET["mnu"]==8 ) { include 'includes/search-corp.php'; }
                                    else if ( $_GET["mnu"]==9 ) { include 'includes/reports.php'; }
                                    else if ( $_GET["mnu"]==10 ) { include 'includes/search-sarmaye.php'; }
                                    else if ( $_GET["mnu"]==11 ) { include 'includes/search-moshaver.php'; }
                                    else if ( $_GET["mnu"]==12 ) { include 'includes/msg-all.php'; }
                                    else if ( $_GET["mnu"]==13 ) { include 'includes/contact.php'; }
                                    else if ( $_GET["mnu"]==14 ) 
                                    { 
                                        if ( isset($_GET["code"]) )
                                        {
                                            $scc=$_GET["code"];
                                            include "import/import.php";
                                        }
                                        else
                                        {
                                            $scc="";
                                            include 'import/import.php'; 
                                        }
                                    }
                                    else if ( $_GET["mnu"]==20 ) { include 'includes/help.html'; }
                                    break;
                            case "nazer":
                                    if ( $_GET["mnu"]==1 ) { include 'includes/msg-box.php'; }
                                    else if ( $_GET["mnu"]==2 ) { include 'includes/set_profile.php'; }
                                    else if ( $_GET["mnu"]==3 ) { include 'includes/contactus.html'; }
                                    else if ( $_GET["mnu"]==4 ) { include 'includes/about.php'; }
                                    else if ( $_GET["mnu"]==5 ) { include 'includes/corp-info.php'; }
                                    else if ( $_GET["mnu"]==6 ) { include 'includes/corp-form.php'; }
                                    else if ( $_GET["mnu"]==7 ) { include 'includes/search-corp.php'; }
                                    else if ( $_GET["mnu"]==8 ) { include 'includes/reports.php'; }
                                    else if ( $_GET["mnu"]==9 ) { include 'includes/search-sarmaye.php'; }
                                    else if ( $_GET["mnu"]==10 ) { include 'includes/search-moshaver.php'; }
                                    else if ( $_GET["mnu"]==11 ) { include 'includes/contact.php'; }
                                    else if ( $_GET["mnu"]==20 ) { include 'includes/help.html'; }
                                    break;
                            case "mali":
                                    if ( $_GET["mnu"]==1 ) { include 'includes/msg-box.php'; }
                                    else if ( $_GET["mnu"]==2 ) { include 'includes/set_profile.php'; }
                                    else if ( $_GET["mnu"]==3 ) { include 'includes/contactus.html'; }
                                    else if ( $_GET["mnu"]==4 ) { include 'includes/about.php'; }
                                    else if ( $_GET["mnu"]==5 ) { include 'includes/corp-info.php'; }
                                    else if ( $_GET["mnu"]==6 ) { include 'includes/search-corp.php'; }
                                    else if ( $_GET["mnu"]==7 ) { include 'includes/reports.php'; }
                                    else if ( $_GET["mnu"]==8 ) { include 'includes/search-sarmaye.php'; }
                                    else if ( $_GET["mnu"]==9 ) { include 'includes/search-moshaver.php'; }
                                    else if ( $_GET["mnu"]==10 ) { include 'includes/contact.php'; }
                                    else if ( $_GET["mnu"]==20 ) { include 'includes/help.html'; }
                                    break;
                            case "corp":
                            case "sarmaye":
                            case "moshaver":
                                    if ( $_GET["mnu"]==1 ) { include 'includes/msg-box.php'; }
                                    else if ( $_GET["mnu"]==2 ) { include 'includes/set_profile.php'; }
                                    else if ( $_GET["mnu"]==3 ) { include 'includes/contactus.html'; }
                                    else if ( $_GET["mnu"]==4 ) { include 'includes/about.php'; }
                                    else if ( $_GET["mnu"]==5 ) { include 'includes/corp-info.php'; }
                                    else if ( $_GET["mnu"]==6 ) { include 'includes/corp-form.php'; }
                                    else if ( $_GET["mnu"]==7 ) { include 'includes/search-corp.php'; }
                                    else if ( $_GET["mnu"]==8 ) { include 'includes/search-sarmaye.php'; }
                                    else if ( $_GET["mnu"]==9 ) { include 'includes/search-moshaver.php'; }
                                    else if ( $_GET["mnu"]==10 ) { include 'includes/contact.php'; }
                                    else if ( $_GET["mnu"]==20 ) { include 'includes/help.html'; }
                                    break;
                          }
                    ?>
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
		
	    <script src="jquery/jquery.js" type="text/javascript"></script>
	    <script src="jquery/javascript.js" type="text/javascript"></script>
	<script type="text/javascript">
        document.getElementById("menu"+<?php echo $_GET["mnu"]?>).classList.add("current"); 
        function exit_site()
        {
            setCookie("user_code", "", -1);
            setCookie("username", "", -1);
            setCookie("user_type", "", -1);
            setCookie("center_code", "", -1);
            setCookie("user_page", "", -1);
            setCookie("user_name", "", -1);
            top.location = "index.php";
        }

        function GoToMyProfile()
        {
            setCookie("user_page", getCookie("user_code"), 1); // a user page that we visit it
            top.location = "control-panel.php?mnu=1";
        }
        
        function ShowMessageWindow()
        {
            var search=true;
            var form_data = new FormData();
            form_data.append('code', getCookie("user_page"));
            form_data.append('search', search);
            form_data.append('what', "user-msg");
            $.ajax({
                url: 'includes/search.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    if ( response!=0 )
                    {
                        var obj = JSON.parse(response);
                        $("#to").html(obj[0].name);                        
                    }
                }
             });
            
            document.getElementById('FormEmtiaz').style.display = "block";
            $("#msg").focus();
        }
        
        function Send_Msg()
        {
            new persianDate().format();
            var dt=new Date();

            var year=new persianDate().year();
            var month=new persianDate().month();
            var day=new persianDate().day();

            var send=true;
            var form_data = new FormData();
            form_data.append('from', getCookie("user_code"));
            form_data.append('to', getCookie("user_page"));
            form_data.append('msg', document.getElementById("msg").value);
            form_data.append('date', year+"/"+month+"/"+day);
            form_data.append('time', dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds());
            form_data.append('send', send);
            form_data.append('what', "send");
            $.ajax({
                url: 'includes/send_msg.php', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response)
                {
                     $("#snackbar").css("background","blue");
                     $("#snackbar").html("پیام شما با موفقیت ارسال شد");
                     ShowFloatingMessage();
                }
             });
            $("#msg").val("");
            document.getElementById('FormEmtiaz').style.display = "none";
        }
        
        function Cancle_Msg()
        {
            $("#msg").val("");
            document.getElementById('FormEmtiaz').style.display = "none";
        }
        
        window.setInterval(function() 
        { 
            var send=true;
            var form_data = new FormData();                  
            form_data.append('code-user', getCookie("user_code"));
            form_data.append('send', send);
            form_data.append('what', "NewMessages");
            $.ajax({
                url: 'includes/send_msg.php', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response)
                {
                    if ( response!=0 )
                    {
                       $("#NewMessages").html(response);
                       $("#NewMessages").css("display", "block");                    
                    }
                    else
                    {
                       $("#NewMessages").html("");
                       $("#NewMessages").css("display", "none");                    
                    }
                }
             });
        
        }, 10000);
        
        
        $(window).on('load', function() {
            var send=true;
            var form_data = new FormData();                  
            form_data.append('code-user', getCookie("user_code"));
            form_data.append('send', send);
            form_data.append('what', "NewMessages");
            $.ajax({
                url: 'includes/send_msg.php', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response)
                {
                    if ( response!=0 )
                    {
                       $("#NewMessages").html(response);
                    }
                    else
                    {
                       $("#NewMessages").html("");
                    }
                }
             });
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















