<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
	</head>
<body>
        <!-- //$scc is state code that it assigned in control-panel.php -->
        <div class="tab1">
          <?php if ($_COOKIE["user_type"]=="admin_all") { ?>
              <button class="tablinks" onclick="OpenPage(event, 'page1')" id="defaultOpen">مدیران موسسات پارک ها</button>
          <?php } ?>
          <button class="tablinks" onclick="OpenPage(event, 'page2')" id="defaultOpen">مدیران مراکز</button>
          <button class="tablinks" onclick="OpenPage(event, 'page3')">کارشناسان</button>
          <?php if ( $_COOKIE["state_code"]==1 ) { ?>
              <button class="tablinks" onclick="OpenPage(event, 'page4')">امور مالی</button>
          <?php } ?>
          <button class="tablinks" onclick="OpenPage(event, 'page5')">مدیران شرکت ها</button>
          <button class="tablinks" onclick="OpenPage(event, 'page6')">سرمایه گذاران</button>
          <button class="tablinks" onclick="OpenPage(event, 'page7')">مشاوران تخصصی</button>
        </div>
        
          <?php
            if ($_COOKIE["user_type"]=="admin_all")
            {
          ?>
            <div id="page1" class="tabcontent1"> <!-- Page 1 -->
                <?php include 'includes/user-state.php'; ?>
            </div>
          <?php
          }
          ?>
        <div id="page2" class="tabcontent1"> <!-- Page 2 -->
            <?php include 'includes/user-admin.php'; ?>
        </div>
        <div id="page3" class="tabcontent1"> <!-- Page 3 -->
            <?php include 'includes/user-nazer.php'; ?>
        </div>
        <div id="page4" class="tabcontent1"> <!-- Page 4 -->
            <?php include 'includes/user-mali.php'; ?>
        </div>
        <div id="page5" class="tabcontent1"> <!-- Page 5 -->
            <?php include 'includes/user-corp.php'; ?>
        </div>
        <div id="page6" class="tabcontent1"> <!-- Page 6 -->
            <?php include 'includes/user-sarmaye.php'; ?>
        </div>
        <div id="page7" class="tabcontent1"> <!-- Page 7 -->
            <?php include 'includes/user-moshaver.php'; ?>
        </div>
    
    
    <script type="text/javascript">
           function OpenPage(evt, cityName) 
           {
             var i, tabcontent, tablinks;
             tabcontent = document.getElementsByClassName("tabcontent1");
             for (i = 0; i < tabcontent.length; i++) 
             {
               tabcontent[i].style.display = "none";
             }
             tablinks = document.getElementsByClassName("tablinks");
             for (i = 0; i < tablinks.length; i++) 
             {
               tablinks[i].className = tablinks[i].className.replace(" active", "");
             }
             document.getElementById(cityName).style.display = "block";
             evt.currentTarget.className += " active";
           }
           
           document.getElementById("defaultOpen").click();
           
    </script>

</body>
</html>