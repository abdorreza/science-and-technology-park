<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	    <script src="jquery/javascript.js" type="text/javascript"></script>
        <script src="../PersianDate/dist/persian-date.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/alert.js"></script>
	</head>
<body>
    <div id="snackbar"></div>
    <?php
        require_once "includes/functions.php";
        $conn=connect_to_database();
        $sth = $conn->prepare("SELECT * FROM users WHERE code=:code");
        $sth->bindValue(':code', $_COOKIE["user_code"]);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
    ?>
    <div class="sidebar">
	  <div class="profile-pic">
		<?php echo "<img src='images/users/".str_replace(' ', '', $result[0]["logo"])."'>"; ?>
	  </div>
	  
	  <?php
	  
	    switch ($result[0]["user_type"])
	    {
	        case "admin_all":
	            echo "<div class='user-name'><p>مدیر ارشد سایت</p>";
	            break; 
	        case "admin_state":
	            echo "<div class='user-name'><p>مدیر استان</p>";
	            break; 
	        case "admin":
	            echo "<div class='user-name'><p>مدیر مرکز</p>";
	            break; 
	        case "nazer":
	            echo "<div class='user-name'><p>کارشناس</p>";
	            break; 
	        case "mali":
	            echo "<div class='user-name'><p>امور مالی</p>";
	            break; 
	        case "corp":
	        case "sarmaye":
	        case "moshaver":
	            echo "<div class='user-name'><p>شرکت</p>";
	            break; 
	    }
        echo $result[0]["name"]."</div>";
	  ?>
	  
      <?php
          //if ( $_COOKIE["user_code"]==$_COOKIE["user_page"] )
          //{
              switch ( $_COOKIE["user_type"] )
              {
                case "admin_all": //ALL ADMIN
                    echo '<a href="control-panel.php?mnu=1" id="menu1" class="m-state main-menu">'.str_repeat('&nbsp;', 10).'مدیریت استان ها</a>';
                    echo '<a href="control-panel.php?mnu=2" id="menu2" class="m-center main-menu">'.str_repeat('&nbsp;', 10).'مدیریت مراکز</a>';
                    echo '<a href="control-panel.php?mnu=3" id="menu3" class="m-user main-menu">'.str_repeat('&nbsp;', 10).'مدیریت کاربران</a>';
                    echo '<a href="control-panel.php?mnu=4" id="menu4" class="m-corp main-menu">'.str_repeat('&nbsp;', 10).'اطلاعات شرکت ها</a>';
                    //echo '<a href="control-panel.php?mnu=5" id="menu5" class="m-form main-menu">'.str_repeat('&nbsp;', 10).'فرم شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=6" id="menu6" class="m-search main-menu">'.str_repeat('&nbsp;', 10).'جستجوی شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=7" id="menu7" class="m-report main-menu">'.str_repeat('&nbsp;', 10).'گزارشات</a>';
                    echo '<a href="control-panel.php?mnu=8" id="menu8" class="m-profile main-menu">'.str_repeat('&nbsp;', 10).'تنظیمات پروفایل</a>';
                    echo '<a href="control-panel.php?mnu=9" id="menu9" class="m-message main-menu">'.str_repeat('&nbsp;', 10).'صندوق پیام'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=10" id="menu10" class="m-sarmaye main-menu">'.str_repeat('&nbsp;', 10).'سرمایه گذاری'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=11" id="menu11" class="m-moshavere main-menu">'.str_repeat('&nbsp;', 10).'مشاوره تخصصی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=12" id="menu12" class="m-messageall main-menu">'.str_repeat('&nbsp;', 10).'ارسال پیام کلی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=13" id="menu13" class="m-contact main-menu">'.str_repeat('&nbsp;', 10).'مدیران موسسات'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="#" id="menu14" class="m-exit main-menu" onclick="exit_site()">'.str_repeat('&nbsp;', 10).'خروج</a>';
                    break;
                case "admin_state": //State Admin
                    echo '<a href="control-panel.php?mnu=1" id="menu1" class="m-center main-menu">'.str_repeat('&nbsp;', 10).'مدیریت مراکز</a>';
                    echo '<a href="control-panel.php?mnu=2" id="menu2" class="m-user main-menu">'.str_repeat('&nbsp;', 10).'مدیریت کاربران</a>';
                    echo '<a href="control-panel.php?mnu=3" id="menu3" class="m-corp main-menu">'.str_repeat('&nbsp;', 10).'اطلاعات شرکت ها</a>';
                    /*if ( $_COOKIE["state_code"]==1 )
                    {
                        echo '<a href="control-panel.php?mnu=4" id="menu4" class="m-form main-menu">'.str_repeat('&nbsp;', 10).'فرم شرکت ها</a>';
                    }*/
                    echo '<a href="control-panel.php?mnu=5" id="menu5" class="m-search main-menu">'.str_repeat('&nbsp;', 10).'جستجوی شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=6" id="menu6" class="m-report main-menu">'.str_repeat('&nbsp;', 10).'گزارشات</a>';
                    echo '<a href="control-panel.php?mnu=7" id="menu7" class="m-profile main-menu">'.str_repeat('&nbsp;', 10).'تنظیمات پروفایل</a>';
                    echo '<a href="control-panel.php?mnu=8" id="menu8" class="m-message main-menu">'.str_repeat('&nbsp;', 10).'صندوق پیام'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=9" id="menu9" class="m-sarmaye main-menu">'.str_repeat('&nbsp;', 10).'سرمایه گذاری'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=10" id="menu10" class="m-moshavere main-menu">'.str_repeat('&nbsp;', 10).'مشاوره تخصصی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=11" id="menu11" class="m-messageall main-menu">'.str_repeat('&nbsp;', 10).'ارسال پیام کلی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=12" id="menu12" class="m-contact main-menu">'.str_repeat('&nbsp;', 10).'مدیران موسسات'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=13" id="menu13" class="m-about main-menu">'.str_repeat('&nbsp;', 10).'درباره'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="#" id="menu12" class="m-exit main-menu" onclick="exit_site()">'.str_repeat('&nbsp;', 10).'خروج</a>';
                    break;
                case "admin": //Center Admin
                    echo '<a href="control-panel.php?mnu=1" id="menu1" class="m-user main-menu">'.str_repeat('&nbsp;', 10).'مدیریت کاربران</a>';
                    echo '<a href="control-panel.php?mnu=2" id="menu2" class="m-corp main-menu">'.str_repeat('&nbsp;', 10).'اطلاعات شرکت ها</a>';
                    /*if ( $_COOKIE["state_code"]==1 )
                    {
                        echo '<a href="control-panel.php?mnu=3" id="menu3" class="m-form main-menu">'.str_repeat('&nbsp;', 10).'فرم شرکت ها</a>';
                    }*/
                    echo '<a href="control-panel.php?mnu=4" id="menu4" class="m-search main-menu">'.str_repeat('&nbsp;', 10).'جستجوی شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=5" id="menu5" class="m-report main-menu">'.str_repeat('&nbsp;', 10).'گزارشات</a>';
                    echo '<a href="control-panel.php?mnu=6" id="menu6" class="m-profile main-menu">'.str_repeat('&nbsp;', 10).'تنظیمات پروفایل</a>';
                    echo '<a href="control-panel.php?mnu=7" id="menu7" class="m-message main-menu">'.str_repeat('&nbsp;', 10).'صندوق پیام'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=8" id="menu8" class="m-sarmaye main-menu">'.str_repeat('&nbsp;', 10).'سرمایه گذاری'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=9" id="menu9" class="m-moshavere main-menu">'.str_repeat('&nbsp;', 10).'مشاوره تخصصی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=10" id="menu10" class="m-messageall main-menu">'.str_repeat('&nbsp;', 10).'ارسال پیام کلی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=11" id="menu11" class="m-contact main-menu">'.str_repeat('&nbsp;', 10).'مدیران موسسات'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=12" id="menu12" class="m-about main-menu">'.str_repeat('&nbsp;', 10).'درباره'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="#" id="menu11" class="m-exit main-menu" onclick="exit_site()">'.str_repeat('&nbsp;', 10).'خروج</a>';
                    break;
                case "nazer":
                    echo '<a href="control-panel.php?mnu=1" id="menu1" class="m-corp main-menu">'.str_repeat('&nbsp;', 10).'اطلاعات شرکت ها</a>';
                    /*if ( $_COOKIE["state_code"]==1 )
                    {
                        echo '<a href="control-panel.php?mnu=2" id="menu2" class="m-form main-menu">'.str_repeat('&nbsp;', 10).'فرم شرکت ها</a>';
                    }*/
                    echo '<a href="control-panel.php?mnu=3" id="menu3" class="m-search main-menu">'.str_repeat('&nbsp;', 10).'جستجوی شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=4" id="menu4" class="m-report main-menu">'.str_repeat('&nbsp;', 10).'گزارشات</a>';
                    echo '<a href="control-panel.php?mnu=5" id="menu5" class="m-profile main-menu">'.str_repeat('&nbsp;', 10).'تنظیمات پروفایل</a>';
                    echo '<a href="control-panel.php?mnu=6" id="menu6" class="m-message main-menu">'.str_repeat('&nbsp;', 10).'صندوق پیام'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=7" id="menu7" class="m-sarmaye main-menu">'.str_repeat('&nbsp;', 10).'سرمایه گذاری'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=8" id="menu8" class="m-moshavere main-menu">'.str_repeat('&nbsp;', 10).'مشاوره تخصصی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=9" id="menu9" class="m-contact main-menu">'.str_repeat('&nbsp;', 10).'مدیران موسسات'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=10" id="menu10" class="m-about main-menu">'.str_repeat('&nbsp;', 10).'درباره'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="#" id="menu9" class="m-exit main-menu" onclick="exit_site()">'.str_repeat('&nbsp;', 10).'خروج</a>';
                    break;
                case "mali":
                    echo '<a href="control-panel.php?mnu=1" id="menu1" class="m-corp main-menu">'.str_repeat('&nbsp;', 10).'اطلاعات شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=2" id="menu2" class="m-search main-menu">'.str_repeat('&nbsp;', 10).'جستجوی شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=3" id="menu3" class="m-report main-menu">'.str_repeat('&nbsp;', 10).'گزارشات</a>';
                    echo '<a href="control-panel.php?mnu=4" id="menu4" class="m-profile main-menu">'.str_repeat('&nbsp;', 10).'تنظیمات پروفایل</a>';
                    echo '<a href="control-panel.php?mnu=5" id="menu5" class="m-message main-menu">'.str_repeat('&nbsp;', 10).'صندوق پیام'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=6" id="menu6" class="m-sarmaye main-menu">'.str_repeat('&nbsp;', 10).'سرمایه گذاری'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=7" id="menu7" class="m-moshavere main-menu">'.str_repeat('&nbsp;', 10).'مشاوره تخصصی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=8" id="menu8" class="m-contact main-menu">'.str_repeat('&nbsp;', 10).'مدیران موسسات'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=9" id="menu9" class="m-about main-menu">'.str_repeat('&nbsp;', 10).'درباره'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="#" id="menu8" class="m-exit main-menu" onclick="exit_site()">'.str_repeat('&nbsp;', 10).'خروج</a>';
                    break;
                case "corp":
                case "sarmaye":
                case "moshaver":
                    echo '<a href="control-panel.php?mnu=1" id="menu1" class="m-corp main-menu">'.str_repeat('&nbsp;', 10).'اطلاعات شرکت</a>';
                    /*if ( $_COOKIE["state_code"]==1 )
                    {
                        echo '<a href="control-panel.php?mnu=2" id="menu2" class="m-form main-menu">'.str_repeat('&nbsp;', 10).'فرم ها</a>';
                    }*/
                    echo '<a href="control-panel.php?mnu=3" id="menu3" class="m-search main-menu">'.str_repeat('&nbsp;', 10).'جستجوی شرکت ها</a>';
                    echo '<a href="control-panel.php?mnu=4" id="menu4" class="m-profile main-menu">'.str_repeat('&nbsp;', 10).'تنظیمات پروفایل</a>';
                    echo '<a href="control-panel.php?mnu=5" id="menu5" class="m-message main-menu">'.str_repeat('&nbsp;', 10).'صندوق پیام'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=6" id="menu6" class="m-sarmaye main-menu">'.str_repeat('&nbsp;', 10).'سرمایه گذاری'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=7" id="menu7" class="m-moshavere main-menu">'.str_repeat('&nbsp;', 10).'مشاوره تخصصی'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=8" id="menu8" class="m-contact main-menu">'.str_repeat('&nbsp;', 10).'مدیران موسسات'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="control-panel.php?mnu=9" id="menu9" class="m-about main-menu">'.str_repeat('&nbsp;', 10).'درباره'.'<span id="NewMessage"></span>'.'</a>';
                    echo '<a href="#" id="menu8" class="m-exit main-menu" onclick="exit_site()">'.str_repeat('&nbsp;', 10).'خروج</a>';
                    break;
              }
          //}
	  ?>
	</div>
	
	<div class="work">
	    <?php
              //if ( $_COOKIE["user_code"]==$_COOKIE["user_page"] )
              //{
              switch ( $_COOKIE["user_type"] )
              {
                case "admin_all":
                        if ( $_GET["mnu"]==1 ) { include 'includes/states.php'; }
                        else if ( $_GET["mnu"]==2 ) { include 'includes/centers.php'; }
                        else if ( $_GET["mnu"]==3 ) 
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
                        else if ( $_GET["mnu"]==4 ) { include 'includes/corp-info.php'; }
                        else if ( $_GET["mnu"]==5 ) { include 'includes/corp-form.php'; }
                        else if ( $_GET["mnu"]==6 ) { include 'includes/search-corp.php'; }
                        else if ( $_GET["mnu"]==7 ) { include 'includes/reports.php'; }
                        else if ( $_GET["mnu"]==8 ) { include 'includes/set_profile.php'; }
                        else if ( $_GET["mnu"]==9 ) { include 'includes/msg-box.php'; }
                        else if ( $_GET["mnu"]==10 ) { include 'includes/search-sarmaye.php'; }
                        else if ( $_GET["mnu"]==11 ) { include 'includes/search-moshaver.php'; }
                        else if ( $_GET["mnu"]==12 ) { include 'includes/msg-all.php'; }
                        else if ( $_GET["mnu"]==13 ) { include 'includes/contact.php'; }
                        break;
                case "admin_state":
                        if ( $_GET["mnu"]==1 ) { include 'includes/centers.php'; }
                        else if ( $_GET["mnu"]==2 ) { include 'includes/users.php'; }
                        else if ( $_GET["mnu"]==3 ) { include 'includes/corp-info.php'; }
                        else if ( $_GET["mnu"]==4 ) { include 'includes/corp-form.php'; }
                        else if ( $_GET["mnu"]==5 ) { include 'includes/search-corp.php'; }
                        else if ( $_GET["mnu"]==6 ) { include 'includes/reports.php'; }
                        else if ( $_GET["mnu"]==7 ) { include 'includes/set_profile.php'; }
                        else if ( $_GET["mnu"]==8 ) { include 'includes/msg-box.php'; }
                        else if ( $_GET["mnu"]==9 ) { include 'includes/search-sarmaye.php'; }
                        else if ( $_GET["mnu"]==10 ) { include 'includes/search-moshaver.php'; }
                        else if ( $_GET["mnu"]==11 ) { include 'includes/msg-all.php'; }
                        else if ( $_GET["mnu"]==12 ) { include 'includes/contact.php'; }
                        else if ( $_GET["mnu"]==13 ) { include 'includes/about.php'; }
                        break;
                case "admin":
                        if ( $_GET["mnu"]==1 ) { include 'includes/users.php'; }
                        else if ( $_GET["mnu"]==2 ) { include 'includes/corp-info.php'; }
                        else if ( $_GET["mnu"]==3 ) { include 'includes/corp-form.php'; }
                        else if ( $_GET["mnu"]==4 ) { include 'includes/search-corp.php'; }
                        else if ( $_GET["mnu"]==5 ) { include 'includes/reports.php'; }
                        else if ( $_GET["mnu"]==6 ) { include 'includes/set_profile.php'; }
                        else if ( $_GET["mnu"]==7 ) { include 'includes/msg-box.php'; }
                        else if ( $_GET["mnu"]==8 ) { include 'includes/search-sarmaye.php'; }
                        else if ( $_GET["mnu"]==9 ) { include 'includes/search-moshaver.php'; }
                        else if ( $_GET["mnu"]==10 ) { include 'includes/msg-all.php'; }
                        else if ( $_GET["mnu"]==11 ) { include 'includes/contact.php'; }
                        else if ( $_GET["mnu"]==12 ) { include 'includes/about.php'; }
                        break;
                case "nazer":
                        if ( $_GET["mnu"]==1 ) { include 'includes/corp-info.php'; }
                        else if ( $_GET["mnu"]==2 ) { include 'includes/corp-form.php'; }
                        else if ( $_GET["mnu"]==3 ) { include 'includes/search-corp.php'; }
                        else if ( $_GET["mnu"]==4 ) { include 'includes/reports.php'; }
                        else if ( $_GET["mnu"]==5 ) { include 'includes/set_profile.php'; }
                        else if ( $_GET["mnu"]==6 ) { include 'includes/msg-box.php'; }
                        else if ( $_GET["mnu"]==7 ) { include 'includes/search-sarmaye.php'; }
                        else if ( $_GET["mnu"]==8 ) { include 'includes/search-moshaver.php'; }
                        else if ( $_GET["mnu"]==9 ) { include 'includes/contact.php'; }
                        else if ( $_GET["mnu"]==10 ) { include 'includes/about.php'; }
                        break;
                case "mali":
                        if ( $_GET["mnu"]==1 ) { include 'includes/corp-info.php'; }
                        else if ( $_GET["mnu"]==2 ) { include 'includes/search-corp.php'; }
                        else if ( $_GET["mnu"]==3 ) { include 'includes/reports.php'; }
                        else if ( $_GET["mnu"]==4 ) { include 'includes/set_profile.php'; }
                        else if ( $_GET["mnu"]==5 ) { include 'includes/msg-box.php'; }
                        else if ( $_GET["mnu"]==6 ) { include 'includes/search-sarmaye.php'; }
                        else if ( $_GET["mnu"]==7 ) { include 'includes/search-moshaver.php'; }
                        else if ( $_GET["mnu"]==8 ) { include 'includes/contact.php'; }
                        else if ( $_GET["mnu"]==9 ) { include 'includes/about.php'; }
                        break;
                case "corp":
                case "sarmaye":
                case "moshaver":
                        if ( $_GET["mnu"]==1 ) { include 'includes/corp-info.php'; }
                        else if ( $_GET["mnu"]==2 ) { include 'includes/corp-form.php'; }
                        else if ( $_GET["mnu"]==3 ) { include 'includes/search-corp.php'; }
                        else if ( $_GET["mnu"]==4 ) { include 'includes/set_profile.php'; }
                        else if ( $_GET["mnu"]==5 ) { include 'includes/msg-box.php'; }
                        else if ( $_GET["mnu"]==6 ) { include 'includes/search-sarmaye.php'; }
                        else if ( $_GET["mnu"]==7 ) { include 'includes/search-moshaver.php'; }
                        else if ( $_GET["mnu"]==8 ) { include 'includes/contact.php'; }
                        else if ( $_GET["mnu"]==9 ) { include 'includes/about.php'; }
                        break;
              }
              //}
              //else
              //{
              //   if ( $_GET["mnu"]==1 ) { include 'includes/info.php'; }
              //}
        ?>
	</div>
	
	
	    <div id="FormEmtiaz">
            <div id="popupContact">
                 <div class="formMsg">
                    <p>
                        <table>
                            <tr>
                                <td>ارسال پیام به :</td>
                                <td><div id="to"></div></td>
                            </tr>
                        </table>
                    </p>
                    <br/>
                    <br/>
                    </p>
                    متن پیام    
                    </p>
                    <p>
                        <textarea id="msg" class="MyMsg"></textarea>
                    </p>
                    <div class="btn-holder">
                        <a href="javascript:%20Send_Msg()" id="submit" class="btns">ارسال پیام</a>
                        <a href="#" id="cancle" class="btns" onclick ="Cancle_Msg()" >انصراف</a>
                    </div>
                 </div>
            </div>
        </div>

	
	
	<script type="text/javascript">
	
        // Split URL bases on $_GET parameters
        //var urlParams = new URLSearchParams(window.location.search);
        //alert(urlParams.get('code'));
	
        document.getElementById("menu"+<?php echo $_GET["mnu"]?>).classList.add("active"); 

        function GoToMyProfile()
        {
            setCookie("user_page", getCookie("user_code"), 1); // a user page that we visit it
            top.location = "control-panel.php?mnu=1";
        }
        
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
                       $("#NewMessage").html(response);
                    }
                    else
                    {
                       $("#NewMessage").html("");
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
                       $("#NewMessage").html(response);
                    }
                    else
                    {
                       $("#NewMessage").html("");
                    }
                }
             });
        });
    </script>
    
</body>
</html>


	    <!--
        <?php
            echo $_COOKIE["user_code"]."<br/>";
            echo $_COOKIE["user_page"]."<br/>";
            echo $_COOKIE["username"]."<br/>";
            echo $_COOKIE["user_type"]."<br/>";
            echo $_COOKIE["center_code"]."<br/>";
        ?>
        -->

