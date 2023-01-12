<!DOCTYPE html>
<html lang="en">
	<head>
		<title>شبکه تخصصی شرکت های فناور</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" media="all" href="../css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="../css/responsive.css">
	</head>
	<body>
		<div id="mainDIV">
			<div id="header">
				<div id="logo">
					<img src="../images/logo.png" alt="شبکه تخصصی شرکت های فناور">
				</div>
				<div id="nav-responsive"><div>منو</div>
					<select onchange="location=this.value">
						<option></option>
						<option value="../index.php">صفحه نخست</option>
						<option value="../corps.php">شرکت های عضو</a></li>
						<option value="../sarmaye.php">سرمایه گذاران</a></li>
						<option value="../moshaver.php">مشاوران</a></li>
						<option value="../login-page.php">ورود/عضویت</a></li>
						<option value="../contactus.html">تماس با ما</a></li>
						<option value="../about.html">درباره</option>
						<option value="../help.html">راهنما</option>
					</select>
				</div>
				<div id="nav">
					  <nav>  
						<ul class="menu">
							  <li><a href="../index.php">صفحه نخست</a></li>
							  <li class="current"><a href="../corps.php">شرکت های عضو</a></li>
							  <li><a href="../sarmaye.php">سرمایه گذاران</a></li>
	 						  <li><a href="../moshaver.php">مشاوران تخصصی</a></li>
							  <li><a href="../login-page.php">ورود/عضویت</a></li>
							  <li><a href="../contactus.html">تماس با ما</a></li>
							  <li><a href="../about.html">درباره</a></li>
							  <li><a href="../help.html">راهنما</a></li>
						  </ul>
					  </nav>
				</div>
			</div>
			<div id="content">
				<?php
					require_once "functions.php";
					$conn=connect_to_database();
					$sth = $conn->prepare("SELECT * FROM users WHERE code=:code");
					$sth->bindValue(':code', $_COOKIE["user_page"]);
					$sth->execute();
					$result = $sth->fetchAll();
					$conn=null;
					//if ( $result[0]["user_type"]=="corp" )
					//{
						include "profile-corp.php";
					//}
					//else
					//{
						//include "profile-other.php";
					//}
				?>

			</div>
		</div>
		
		
	   <script src="jquery/jquery.js" type="text/javascript"></script>
    <script>
        var files0=[], files1=[], files2=[], files3=[], files4=[], files5=[], files6=[];    
            /* Set Profile Items */
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', getCookie("user_page"));
            form_data.append('what', "profile-info");
            form_data.append('search', search);
            $.ajax({
                url: 'search.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    var obj = JSON.parse(response);
                    $("#name").val(obj[0].name);
                    $("#date").val(obj[0].date_sabt);
                    $("#type").val(obj[0].type);
                    $("#modir").val(obj[0].name1);
                    $("#tel").val(obj[0].tel);
                    $("#fax").val(obj[0].fax);
                    $("#email").val(obj[0].email);
                    $("#mobile").val(obj[0].mobile);
                    $("#website").val(obj[0].website);
                    $("#idea").val(obj[0].idea);
                    $("#address").val(obj[0].address);
                    $("#hoze").val(obj[0].hoze_name);
                    $("#zamine").val(obj[0].zamine_name);
                    $("#esteghrar").val(obj[0].date_esteghrar);
                    $("#corp-name").html(obj[0].name);
                    if ( obj[0].product1!="" )
                    {
                        $("#product1").val(obj[0].product1);
                        $("#rowp1").css("display","table-row");
                    }
                    else
                    {
                        $("#product1").val("");
                        $("#rowp1").css("display","none");
                    }
                    if ( obj[0].product2!="" )
                    {
                        $("#product2").val(obj[0].product2);
                        $("#rowp2").css("display","table-row");
                    }
                    else
                    {
                        $("#product2").val("");
                        $("#rowp2").css("display","none");
                    }
                    if ( obj[0].product3!="" )
                    {
                        $("#product3").val(obj[0].product3);
                        $("#rowp3").css("display","table-row");
                    }
                    else
                    {
                        $("#product3").val("");
                        $("#rowp3").css("display","none");
                    }
                    if ( obj[0].product4!="" )
                    {
                        $("#product4").val(obj[0].product4);
                        $("#rowp4").css("display","table-row");
                    }
                    else
                    {
                        $("#product4").val("");
                        $("#rowp4").css("display","none");
                    }
                    if ( obj[0].product5!="" )
                    {
                        $("#product5").val(obj[0].product5);
                        $("#rowp5").css("display","table-row");
                    }
                    else
                    {
                        $("#product5").val("");
                        $("#rowp5").css("display","none");
                    }
                    if ( obj[0].product6!="" )
                    {
                        $("#product6").val(obj[0].product6);
                        $("#rowp6").css("display","table-row");
                    }
                    else
                    {
                        $("#product6").val("");
                        $("#rowp6").css("display","none");
                    }
                        if ( obj[0].pic.length>0 )
                        {
                            FilesList=obj[0].pic.split(","); // Convert String to Array
                        }
                        else
                        {
                            FilesList="";
                        }
                        for (var j=0;j<FilesList.length;j++)
                        {
                            files0[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                        }
                        if (files0[0]!="")
                        {
                           $('#modir-pic-set').attr('src', "../images/corps/modir/"+files0[0].name)
                        }
                        else
                        {
                           $('#modir-pic-set').attr('src', "../images/corps/modir/no-image.jpg")
                        }
                    if ( obj[0].product_img1.length>0 )
                    {
                        FilesList=obj[0].product_img1.split(",");
                    }
                    else
                    {
                        FilesList="";
                    }
                    for (var j=0;j<FilesList.length;j++)
                    {
                        files1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                    }
                    if ( obj[0].product_img2.length>0 )
                    {
                        FilesList=obj[0].product_img2.split(",");
                    }
                    else
                    {
                        FilesList="";
                    }
                    for (var j=0;j<FilesList.length;j++)
                    {
                        files2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                    }
                    if ( obj[0].product_img3.length>0 )
                    {
                        FilesList=obj[0].product_img3.split(",");
                    }
                    else
                    {
                        FilesList="";
                    }
                    for (var j=0;j<FilesList.length;j++)
                    {
                        files3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                    }
                    if ( obj[0].product_img4.length>0 )
                    {
                        FilesList=obj[0].product_img4.split(",");
                    }
                    else
                    {
                        FilesList="";
                    }
                    for (var j=0;j<FilesList.length;j++)
                    {
                        files4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                    }
                    if ( obj[0].product_img5.length>0 )
                    {
                        FilesList=obj[0].product_img5.split(",");
                    }
                    else
                    {
                        FilesList="";
                    }
                    for (var j=0;j<FilesList.length;j++)
                    {
                        files5[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                    }
                    if ( obj[0].product_img6.length>0 )
                    {
                        FilesList=obj[0].product_img6.split(",");
                    }
                    else
                    {
                        FilesList="";
                    }
                    for (var j=0;j<FilesList.length;j++)
                    {
                        files6[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                    }
                }
             });
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', getCookie("user_page"));
            form_data.append('what', "profile-modir");
            form_data.append('search', search);
            $.ajax({
                url: 'search.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    var obj = JSON.parse(response);
                    $("#modir-name").val(obj[0].name);
                    $("#modir-ostan").val(obj[0].state_name);
                    $("#modir-markaz").val(obj[0].center_name);
                    $("#modir-tel").val(obj[0].tel);
                    $("#modir-email").val(obj[0].email);
                    switch (obj[0].user_type)
                    {
                        case "admin_all":
                            $("#modir-semat").val("مدیر کل");
                            $("#modir-ostan").val("کل استان ها");
                            $("#modir-markaz").val("کل مراکز");
                            break;
                        case "admin_state":
                            $("#modir-semat").val("مدیر استان");
                            $("#modir-markaz").val("کل مراکز");
                            break;
                        case "admin":
                            $("#modir-semat").val("مدیر مرکز");
                            break;
                        case "nazer":
                            $("#modir-semat").val("کارشناس");
                            break;
                        case "mali":
                            $("#modir-semat").val("امور مالی");
                            break;
                    }
                }
             });

//    <div id="snackbar"></div>
//    <div id="modir-pic-profile">
//        <img id="modir-pic-set" src="">
//    </div>
             
             

         /***************************/              
       function openPage(evt, cityName) 
       {
         var i, tabcontent, tablinks;
         
         if ( cityName=="page1" )
         {
            $("#modir-pic-profile").css("display","block");
         }
         else
         {
            $("#modir-pic-profile").css("display","none");
        }
         
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
           tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
           tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
       }
       
       document.getElementById("defaultOpen").click();


             
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
                url: 'send_msg.php', 
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
        
        
        function ShowFileManage(part)
        {
            //setCookie("UploadPart",part,1);
            switch (part)
            {
                case "Modir-Pic":
                    var files=eval("files"+0);
                    path="../images/corps/modir/";
                    break;
                case "Product1":
                    var files=eval("files"+1);
                    path="../images/corps/product/";
                    break;
                case "Product2":
                    var files=eval("files"+2);
                    path="../images/corps/product/";
                    break;
                case "Product3":
                    var files=eval("files"+3);
                    path="../images/corps/product/";
                    break;
                case "Product4":
                    var files=eval("files"+4);
                    path="../images/corps/product/";
                    break;
                case "Product5":
                    var files=eval("files"+5);
                    path="../images/corps/product/";
                    break;
                case "Product6":
                    var files=eval("files"+6);
                    path="../images/corps/product/";
                    break;
            }
            var tableHeaderRowCount = 0;
            var table = document.getElementById('ManageTable');
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) 
            {
                table.deleteRow(tableHeaderRowCount);
            }
            for (var i=0;i<files.length;i++)
            {
                var markup = "<tr>";
                markup = markup + "<td width='5%'>"+(i+1)+"</td>";
                param=path+files[i].name;
                markup = markup + "<td width='10%'><a href='#' onclick='ShowFile(\""+param+"\");'>"+"فایل" +(i+1)+"<a/>" + "</td>";
                markup = markup + "<td width='10%'><a href="+path+files[i].name+" target='blank' download>دانلود<a/>" + "</td>";
                markup = markup + "<td width='15%'>" + files[i].type + "</td>";
                markup = markup + "<td width='5%'>" + "<img id='del-pic' src='../images/delete.png' onclick='DeleteFile("+(i)+")'>" + "</td>";
                markup = markup + "</tr>";
                $("#ManageTable > tbody").append(markup);
            }
            $('#FileManager').css("z-index","1");
            $('#FileManager').css("display","block");
        }

        function ShowFile(file_name)
        {
             var win = window.open("show_file.php?file="+file_name, '_blank');
             win.focus();
        }
        
        function hide_window(win)
        {
            $("#"+win).css("display","none");
        }
        
        function ShowProductText(part)
        {
            switch (part)
            {
                case "Product1":
                    $("#_product").val($("#product1").val());
                    break;
            }
            $("#GetCorpProducts").css("display","block");
        }
        
        
        function MainMenu()
        {
            top.location = "../control-panel.php?mnu=1";
        }
     </script>
	</body>
</html>



