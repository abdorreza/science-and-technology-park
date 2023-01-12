<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/PersianDatePicker.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/PersianDatePicker.min.css" />
        <script type="text/javascript" src="../jquery/alert.js"></script>

		<style>
			input[type="file"] 
			{
				display:none;
			}
		</style>
	</head>


<?php

	require_once "includes/functions.php";
	$conn=connect_to_database();

	echo "<table id='import-top'>";
		echo "<tr>";
			echo "<td style='width:7%;'>استان</td>";
			echo "<td>";
			//if ( $_COOKIE["user_type"]=="admin_all" )
			//{
				//if ( $scc=="" )
				if ( $_COOKIE["state_code"]==0 )
				{
					$sth = $conn->prepare("SELECT * FROM states");
				}
				else
				{
					//$sth = $conn->prepare("SELECT * FROM states WHERE code=".$scc);
					$sth = $conn->prepare("SELECT * FROM states WHERE code=".$_COOKIE["state_code"]);
					
				}
				$sth->execute();
				$result = $sth->fetchAll();
				//if ( $scc=="" )
				if ( $_COOKIE["state_code"]==0 )
				{
					echo "<select id='all_states' style='width:100%' onchange='ChangeStateFilter()'>";
					echo "<option value=''>انتخاب استان</option>";
				}
				else
				{
					echo "<select id='all_states' style='width:100%' onchange='ChangeStateFilter()' disabled>";
				}
					foreach($result as $row)
					{
						echo "<option value=".$row["code"].">".$row["name"]."</option>";
					}
				echo "</select>";
			//}
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>مرکز</td>";
			echo "<td>";
			//if ( $_COOKIE["user_type"]=="admin_all" )
			//{
				//if ( $scc=="" )
				if ( $_COOKIE["state_code"]==0 )
				{
					echo "<select id='all_centers' style='width:100%' onchange='ChangeCenterFilter()'>";
						echo "<option value=''>انتخاب مرکز</option>";
					echo "</select>";
				}
				else
				{
					//$sth1 = $conn->prepare("SELECT * FROM centers WHERE state_code=".$scc);
					$sth1 = $conn->prepare("SELECT * FROM centers WHERE state_code=".$_COOKIE["state_code"]);
					
					$sth1->execute();
					$result1 = $sth1->fetchAll();
					echo "<select id='all_centers' style='width:100%' onchange='ChangeCenterFilter()'>";
						echo "<option value=''>انتخاب مرکز</option>";
						foreach($result1 as $row)
						{
							echo "<option value=".$row["code"].">".$row["name"]."</option>";
						}
					echo "</select>";
				}
			//}
			echo "</td>";
		echo "</tr>";
	echo "</table>";
	
	
?>



<label id="btns">
	<?php echo "<input id='upload_files' type='file'' accept='.xls,.xlsx' onchange='UploadFiles()'/>"?>
	<a>انتخاب فایل اکسل</a>
</label>

<div id="upload-msg"></div>
<div id="upload-type">
	<p>توجه: ساختار فایل اکسل الزاما باید به صورت ساختار زیر باشد.</p>
	<p>در صورت هماهنگ نبودن ساختار فایل اکسل مورد نظر با ساختار زیر، از ورود اطلاعات آن خودداری کنید.</p>
	<table id="excel-struct">
		<thead>
			<th>A</th>
			<th>B</th>
			<th>C</th>
			<th>D</th>
			<th>E</th>
			<th>F</th>
			<th>G</th>
			<th>H</th>
			<th>I</th>
			<th>J</th>
			<th>K</th>
			<th>L</th>
			<th>M</th>
			<th>N</th>
			
		</thead>
		<tr>
			<td>نام شرکت یا شخص عضو</td>
			<td>موبایل</td>
			<td>ایمیل</td>
			<td>تلفن</td>
			<td>فکس</td>
			<td>سایت</td>
			<td>آدرس</td>
			<td>نام مدیر عامل</td>
			<td>کد ملی مدیر عامل</td>
			<td>ایده محوری</td>
			<td>حوزه فعالیت</td>
			<td>زمینه فعالیت</td>
			<td>تاریخ استقرار</td>
			<td>تاریخ پایان قرارداد</td>

		</tr>
	</table>
</div>
<div id='import-btns'>
	<table>
		<tr>
			<td><a href="#" id="btn-show" onclick="ShowData()">مشاهده اطلاعات فایل اکسل</a></td>
			<td><a href="#" id="btn-import" onclick="ImportData()">وارد کردن اطلاعات اکسل</a></td>
		</tr>
	</table>
</div>

<div id="show_excel">
	<table id="ExcelCells">
	</table>
</div>



<script>
		if (getCookie("user_type")=="admin"  || getCookie("user_type")=="admin_state")
		{
			$("#all_states").prop("disabled",true);
		}
		if (getCookie("user_type")=="admin")
		{
			$("#all_centers").prop("disabled",true);
			ChangeStateFilter();
            setTimeout(function(){ $("#all_centers").val(getCookie("center_code")); }, 400);
		}

		var ExcelFile="";
		
        function ChangeStateFilter()
        {
             //setCookie("filter1",$("#all_states").val(),1);
             var search=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#all_states").val());
             form_data.append('search', search);
             form_data.append('what', 'filter-center');
             $.ajax({
                 url: '../includes/search.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#all_centers').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('all_centers');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'انتخاب مرکز';
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
                        select = document.getElementById('all_centers');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'انتخاب مرکز';
                        select.appendChild(opt);
                    }
                 }
              });
            //setCookie("filter2","",1);
            //setCookie("filter3",$("#all_corps").val(),1);
            //$(".area3").load("includes/corp-info-list.php");
        }
		

        function UploadFiles()
        {
             if ( $('#upload_files').prop('files')[0].size>4000000 )
             {
                alert("اندازه فایل انتخاب شده بیشتر از حد مجاز است. نهایت اندازه هر فایل 4 مگابایت است");
                return;
             }
			 $("#upload-msg").css("display","block");
			 $("#upload-type").css("display","block");
			 document.getElementById('upload-msg').innerHTML="لطفا صبر کنید...";
             var info=true;
             var form_data = new FormData();                  
             form_data.append('file', $('#upload_files').prop('files')[0]);
             form_data.append('info', info);
             $.ajax({
                 url: 'import/get_excel_info.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
					if ( response=="false" )
					{
						document.getElementById('upload-msg').innerHTML="خطا : فایل انتخاب شده، فایل اکسل نیست.";
						return;
					}
					ExcelFile=response;
                    document.getElementById('upload-msg').innerHTML="فایل اکسل با موفقیت خوانده شد.";
                    swal(".فایل اکسل با موفقیت خوانده شد", {icon: "success",});
					$("#import-btns").css("display","block");
					$("#btn-show").css("display","block");
					$("#btn-import").css("display","block");
					
                 }
              });
        }
		
	function isset(str)
	{
		if ( str==null )
			return '';
		else
			return str;
	}

   function ShowData()
   {
		var rde=true;
		var form_data = new FormData();
		form_data.append('ExeclFile', ExcelFile);
        form_data.append('read', rde);
		$.ajax({
			url: 'import/readexcel.php',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function(response)
			{
				var obj = JSON.parse(response);
				rows=Object.keys(obj).length;
				$('#ExcelCells').append("<thead>");
				$('#ExcelCells').append("<th>A</th>");
				$('#ExcelCells').append("<th>B</th>");
				$('#ExcelCells').append("<th>C</th>");
				$('#ExcelCells').append("<th>D</th>");
				$('#ExcelCells').append("<th>E</th>");
				$('#ExcelCells').append("<th>F</th>");
				$('#ExcelCells').append("<th>G</th>");
				$('#ExcelCells').append("<th>H</th>");
				$('#ExcelCells').append("<th>I</th>");
				$('#ExcelCells').append("<th>J</th>");
				$('#ExcelCells').append("<th>K</th>");
				$('#ExcelCells').append("<th>L</th>");
				$('#ExcelCells').append("<th>M</th>");
				$('#ExcelCells').append("<th>N</th>");
				$('#ExcelCells').append("</thead>");
				for (i=1;i<=rows;i++)
				{
					$('#ExcelCells').append("<tr>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['A'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['B'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['C'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['D'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['E'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['F'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['G'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['H'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['I'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['J'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['K'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['L'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['M'])+"</td>");
					$('#ExcelCells').append("<td>"+isset(obj[i]['N'])+"</td>");
					$('#ExcelCells').append("</tr>");
				}
            }
        });
   }


   
   function ImportData()
   {
		if ( $("#all_states").val()=="" && $("#all_centers").val()=="" )
		{
            swal(".انتخاب استان و مرکز جهت وارد کردن اطلاعات الزامی است", {icon: "warning",});
			return;
		}
		if ( $("#all_states").val()=="")
		{
            swal(".انتخاب استان جهت وارد کردن اطلاعات الزامی است", {icon: "warning",});
			return;
		}
		if ( $("#all_centers").val()=="" )
		{
            swal(".انتخاب مرکز جهت وارد کردن اطلاعات الزامی است", {icon: "warning",});
			return;
		}
		/////////////////////////////////////////////
             swal({
               title: "انتقال اطلاعات از فایل اکسل",
               text: "برای انتفال اطلاعات از فایل اکسل به سامانه مطمئن هستید؟",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) 
			   {
					document.getElementById('upload-msg').innerHTML="در حال انجام انتقال اطلاعات از فایل اکسل. لطفا صبر کنید.";
					var imp=true;
					var form_data = new FormData();
					form_data.append('ExeclFile', ExcelFile);
					form_data.append('state_code', $("#all_states").val());
					form_data.append('center_code', $("#all_centers").val());
					form_data.append('import', imp);
					$.ajax({
						url: 'import/importexcel.php',
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,
						type: 'post',
						success: function(response)
						{
							if ( response.trim()=="Exist" )
							{
								document.getElementById('upload-msg').innerHTML="انتقال اطلاعات از فایل اکسل انجام نشد. دارای اطلاعات تکراری. احتمالا اطلاعات این فایل قبلا وارد شده است.";
								swal(".انتقال انجام نشد. اطلاعات فایل اکسل در سامانه وجود دارد", {icon: "warning",});
							}
							else
							{
								document.getElementById('upload-msg').innerHTML="انتقال اطلاعات از فایل اکسل به بانک اطلاعاتی انجام شد.";
								swal(".انتقال اطلاعات از فایل اکسل به بانک اطلاعاتی انجام شد", {icon: "success",});
							}
						}
					});
               }
			   else
			   {
				  swal(".شما از انتقال اطلاعات فایل اکسل به سامانه انصراف دادید", {icon: "success",});
			   }
             });

		/////////////////////////////////////////////
   }
 
</script>
