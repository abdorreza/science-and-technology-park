<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>اتوماسیون شرکت های مرکز رشد و فناور</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="../jquery/jquery.js" type="text/javascript"></script>
    <script src="../PersianDate/dist/persian-date.js" type="text/javascript"></script>
    <script src="../jquery/javascript.js" type="text/javascript"></script>
    <script type="text/javascript" src="../jquery/alert.js"></script>

    <script type="text/javascript" src="../jquery/alert.js"></script>	
	<!--<link href="../css/lightbox.css" rel="stylesheet" />-->
</head>
<body>
		<!--<a href="../images/programmer.jpg" data-lightbox="roadtrip"><img src="../images/programmer.jpg" alt="Single Image"/></a>
		<a href="../images/programmer.jpg" data-lightbox="roadtrip"><img src="../images/programmer.jpg" alt="Single Image"/></a>
		<a href="../images/programmer.jpg" data-lightbox="roadtrip"><img src="../images/programmer.jpg" alt="Single Image"/></a>-->
		<?php
            require_once "functions.php";
            $conn=connect_to_database();
            $sth = $conn->prepare("SELECT * FROM users WHERE code=:code");
            $sth->bindValue(':code', $_COOKIE["user_page"]);
            $sth->execute();
            $result = $sth->fetchAll();
		?>
		<div id="profile-right">
			<?php
				echo "<img src='../images/users/".str_replace(' ', '', $result[0]["logo"])."'>";
			?>
			<div id="prir">
				<p>نام</p>
				<p><input type="text" id="name" size="50" disabled></p>
				<hr>
				<p>مدیر عامل</p>
				<p><input type="text" id="modir" size="50" disabled></p>
				<hr>
				<p>حوزه فعالیت</p>
				<p><input type="text" id="hoze" size="40" disabled></p>
				<hr>
				<p>زمینه فعالیت</p>
				<p><input type="text" id="zamine" size="40" disabled></p>
				<hr>
				<p>همراه مدیر</p>
				<p><input type="text" id="mobile" class="en" disabled></p>
				<hr>
				<p>تلفن</p>
				<p><input type="text" id="tel" class="en" disabled></p>
				<hr>
				<p>فکس</p>
				<p><input type="text" id="fax" class="en" disabled></p>
				<hr>
				<p>ایمیل</p>
				<p><input type="text" class="en" id="email" size="40" disabled></p>
				<hr>
				<p>وب سایت</p>
				<p><input type="text" id="website" class="en" size="40" disabled></p>
				<hr>
				<p>آدرس</p>
				<p><input type="text" id="address" size="100" disabled></p>
			</div>
		</div>
		<div id="profile-left">
			<div id="pril">
				<p>ایده محوری</p>
				<p><input type="text" id="idea" size="100" disabled></p>
				<hr>
				<table id="profile-tbl">
					<tr id="rowp1">
						<td width="10%">محصولات 1</td>
						<td width="60%"><input type="text" id="product1" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product1');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product1');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp2">
						<td>محصولات 2</td>
						<td><input type="text" id="product2" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product2');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product2');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp3">
						<td>محصولات 3</td>
						<td><input type="text" id="product3" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product3');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product3');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp4">
						<td>محصولات 4</td>
						<td><input type="text" id="product4" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product4');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product4');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp5">
						<td>محصولات 5</td>
						<td><input type="text" id="product5" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product5');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product5');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp6">
						<td>محصولات 6</td>
						<td><input type="text" id="product6" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product6');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product6');">مشاهده محصول</a></td>
					</tr>
				</table>
			</div>
		</div>
		
		<!---------------------------------------------->
		<!-- AddCorpProduct corp Products -->    
		<div id="GetCorpProducts">
			<div id="popupContact">
				 <div class="formProducts">
				 
				 <div class="popup-hr-products"><h4>توضیحات محصول شرکت</h4></div>

					<br class="my-break"/>


					<table class="input-table">
						<tr>
							<td width="12%">
								<lable class="lazem">محصول</lable>
							</td>
							<td>
								<!--<input type="text" size="125" maxlength="125" id="_product" >-->
								<textarea id="_product" rows="10" disabled></textarea>
							</td>
						</tr>
					</table>
					<div class="btn-holder">
						<a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpProducts')" >بازگشت</a>
					</div>
				</div>
			</div>
		</div>
		
		

		<div id="FileManager">
			<div id="popupContact">
				 <div class="formUpload">
					<h4 class="ManageHeader">فایل های ضمیمه محصول</h4>
					<div class="UploadedFiles">
						<table id="ManageTable">
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="btn-holder">
						<a href="#" id="cancle" class="btns" onclick ="hide_window('FileManager')" >بازگشت</a>
					 </div>
				</div>
			</div>
		</div>
		
		<!--<script src="../jquery/lightbox.js"></script>-->
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
							   //$('#modir-pic-set').attr('src', "../images/corps/modir/"+files0[0].name)
							}
							else
							{
							   //$('#modir-pic-set').attr('src', "../images/corps/modir/no-image.jpg")
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


<?php
/*
		<div id="profile-left">
			<div class="tab">
			   <button class="tablinks" onclick="openPage(event, 'page1')" id="defaultOpen">اطلاعات شرکت</button>
			   <button class="tablinks" onclick="openPage(event, 'page2')">حوزه فعالیت، زمینه فعالیت و محصولات</button>
			</div>
			<div id="page1" class="tabcontent"> <!-- Page 1 -->
				<table id="profile-tbl">
					<tr>
						<td width="12%">نام</td>
						<td><input type="text" id="name" size="50" disabled></td>
					</tr>
					<tr>
						<td>تاریخ ثبت</td>
						<td><input type="text" id="date" class="en" size="10" disabled></td>
					</tr>
					<tr>
						<td>نوع شرکت</td>
						<td><input type="text" id="type" disabled></td>
					</tr>
					<tr>
						<td>مدیر عامل</td>
						<td><input type="text" id="modir" size="50" disabled></td>
					</tr>
					<tr>
						<td>همراه مدیر</td>
						<td><input type="text" id="mobile" class="en" disabled></td>
					</tr>
					<tr>
						<td>تلفن</td>
						<td><input type="text" id="tel" class="en" disabled></td>
					</tr>
					<tr>
						<td>فکس</td>
						<td><input type="text" id="fax" class="en" disabled></td>
					</tr>
					<tr>
						<td>ایمیل</td>
						<td><input type="text" class="en" id="email" size="40" disabled></td>
					</tr>
					<tr>
						<td>وب سایت</td>
						<td><input type="text" id="website" class="en" size="40" disabled></td>
					</tr>
					<tr>
						<td>تاریخ استقرار</td>
						<td><input type="text" class="en" id="esteghrar" size="10" disabled></td>
					</tr>
					<tr>
						<td>آدرس</td>
						<td><input type="text" id="address" size="100" disabled></td>
					</tr>
				</table>
			</div> <!--Page 1-->
			<div id="page2" class="tabcontent"> <!-- Page 2 -->
				<table id="profile-tbl">
					<tr>
						<td width="10%">حوزه فعالیت</td>
						<td><input type="text" id="hoze" size="40" disabled></td>
					</tr>
					<tr>
						<td>زمینه فعالیت</td>
						<td><input type="text" id="zamine" size="40" disabled></td>
					</tr>
					<tr>
						<td>ایده محوری</td>
						<td><input type="text" id="idea" size="100" disabled></td>
					</tr>
				</table>
				<table id="profile-tbl">
					<tr id="rowp1">
						<td width="10%">محصولات 1</td>
						<td width="60%"><input type="text" id="product1" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product1');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product1');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp2">
						<td>محصولات 2</td>
						<td><input type="text" id="product2" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product2');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product2');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp3">
						<td>محصولات 3</td>
						<td><input type="text" id="product3" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product3');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product3');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp4">
						<td>محصولات 4</td>
						<td><input type="text" id="product4" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product4');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product4');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp5">
						<td>محصولات 5</td>
						<td><input type="text" id="product5" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product5');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product5');">مشاهده محصول</a></td>
					</tr>
					<tr id="rowp6">
						<td>محصولات 6</td>
						<td><input type="text" id="product6" size="70" disabled></td>
						<td><a href="#" onclick="ShowProductText('Product6');">مشاهده توضیحات</a></td>
						<td><a href="#" onclick="ShowFileManage('Product6');">مشاهده محصول</a></td>
					</tr>
				</table>
			</div><!--Page 2-->
		</div>
		
		<!---------------------------------------------->
		<!-- AddCorpProduct corp Products -->    
		<div id="GetCorpProducts">
			<div id="popupContact">
				 <div class="formProducts">
				 
				 <div class="popup-hr-products"><h4>توضیحات محصول شرکت</h4></div>

					<br class="my-break"/>


					<table class="input-table">
						<tr>
							<td width="12%">
								<lable class="lazem">محصول</lable>
							</td>
							<td>
								<!--<input type="text" size="125" maxlength="125" id="_product" >-->
								<textarea id="_product" rows="10" disabled></textarea>
							</td>
						</tr>
					</table>
					<div class="btn-holder">
						<a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpProducts')" >بازگشت</a>
					</div>
				</div>
			</div>
		</div>
*/

?>