<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/PersianDatePicker.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/PersianDatePicker.min.css" />
        <script type="text/javascript" src="../jquery/alert.js"></script>
	</head>
<body>
    <table class="input-table" style="direction:rtl;border:2px solid #002870;">
        <tr style="background-color:#8ef0b1;">
            <td width="3%">نام</td>
            <td width="35%"><input type="text" id="name" size="50" disabled></td>
            <td width="5%">تاریخ ثبت</td>
            <td width="10%"><input type="text" id="date" class="en" size="10" disabled></td>
            <td width="6%">نوع شرکت</td>
            <td><input type="text" id="type" disabled></td>
        </tr>
    </table>
    <table class="input-table" style="direction:rtl;border:2px solid #002870;">
        <tr style="background-color:#8eb1f0;">
            <td width="3%">تلفن</td>
            <td width="35%"><input type="text" id="tel" class="en" disabled></td>
            <td width="5%">فکس</td>
            <td><input type="text" id="fax" class="en" disabled></td>
        </tr>
    </table>
    <table class="input-table" style="direction:rtl;border:2px solid #002870;">
        <tr style="background-color:#8ef0b1;">
            <td width="3%">ایمیل</td>
            <td width="35%"><input type="text" class="en" id="email" size="50" disabled></td>
            <td width="5%">وب سایت</td>
            <td><input type="text" id="website" class="en" size="50" disabled></td>
        </tr>
    </table>
    <table class="input-table" style="direction:rtl;border:2px solid #002870;">
        <tr style="background-color:#8eb1f0;">
            <td width="7%">حوزه فعالیت</td>
            <td width="35%"><input type="text" id="hoze" size="50" disabled></td>
            <td width="7%">زمینه فعالیت</td>
            <td><input type="text" id="zamine" size="50" disabled></td>
        </tr>
    </table>
    <table class="input-table" style="direction:rtl;border:2px solid #002870;">
        <tr style="background-color:#8ef0b1;">
            <td width="7%">ایده محوری</td>
            <td><input type="text" id="idea" size="50" disabled></td>
        </tr>
    </table>
    <table class="input-table" style="direction:rtl;border:2px solid #002870;">
        <tr style="background-color:#8eb1f0;">
            <td width="7%">آدرس</td>
            <td><input type="text" id="address" size="120" disabled></td>
        </tr>
    </table>
    
    
    <script>
        var search=true;
        var form_data = new FormData();
        form_data.append('code', getCookie("user_page"));
        form_data.append('search', search);
        form_data.append('what', "corp-info-other");
        $.ajax({
            url: 'includes/search.php',
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
                $("#tel").val(obj[0].tel);
                $("#fax").val(obj[0].fax);
                $("#email").val(obj[0].email);
                $("#website").val(obj[0].website);
                $("#hoze").val(obj[0].hoze_name);
                $("#zamine").val(obj[0].zamine_name);
                $("#idea").val(obj[0].idea);
                $("#address").val(obj[0].address);
            }
         });
    </script>
    
</body>
</html>


