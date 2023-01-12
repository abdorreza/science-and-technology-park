<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/PersianDatePicker.min.js"></script>
	</head>
<body>

    <div id="snackbar"></div>

    <table id="set-profile-table">
        <tr>
            <td width="9%">
               نام
            </td>
            <td>
                <input type="text" size="50" maxlength="50" id="name">
            </td>
        </tr>
        <tr>
            <td>
               تلفن
            </td>
            <td>
                <input type="text" class="en" size="50" maxlength="30" id="tel">
            </td>
        </tr>
        <tr>
            <td>
               ایمیل
            </td>
            <td>
                <input type="text" class="en" size="50" maxlength="30" id="email">
            </td>
        </tr>
        <tr>
            <td>
               نام کاربری
            </td>
            <td>
                <input type="text" class="en" size="30" maxlength="30" id="username">
            </td>
        </tr>
        <tr>
            <td>
               رمز عبور
            </td>
            <td>
                <input type="password" size="30" maxlength="30" class="en" id="password">
            </td>
        </tr>
        <tr>
            <td>
                <label class="upload-btn">
                    <input id="upload-image" type="file" onchange="SetLogo(this);"/>
                    آپلود تصویر
                </label>
            </td>
            <td>
                <img id="cuf4" src="#" alt="" />
            </td>
        </tr>
    </table>

    <div id="btn-holder">
        <a href="javascript:%20Save_Profile()" id="submit">ذخیره</a>
    </div>


    <!-- Waiting Page -->    
    <div id="Waiting">
        <div id="popupContact">
             <div class="formWait">
                <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
            </div>
        </div>
    </div>

    
    <script type="text/javascript">
            $("#Waiting").css("display","block");
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', getCookie("user_code"));
            form_data.append('what', "profile");
            form_data.append('search', search);
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
                    document.getElementById('name').value=obj[0].name;
                    document.getElementById('tel').value=obj[0].tel;
                    document.getElementById('email').value=obj[0].email;
                    document.getElementById('username').value=obj[0].username;
                    document.getElementById('password').value="";
                    $('#cuf4').attr('src', '../images/users/'+obj[0].logo);
                    setTimeout(function()
                    { 
                        $("#Waiting").css("display","none");
                    }, 400);
                }
             });
             
             
             
             function SetLogo(input) 
             {
                 if ( input.files[0].size>4000000 )
                 {
                    swal("اندازه فایل انتخاب شده بیشتر از حد مجاز است. نهایت اندازه هر فایل 4 مگابایت است", {icon: "warning",});
                    return;
                 }
                 if (input.files && input.files[0]) 
                 {
                     var reader = new FileReader();
         
                     reader.onload = function (e) 
                     {
                         $('#cuf4').attr('src', e.target.result)
                     };
                     reader.readAsDataURL(input.files[0]);
                 }
             }

             
             
             function Save_Profile()
             {
                var save=true;
                var form_data = new FormData();                  
                form_data.append('code', getCookie("user_code"));

                form_data.append('name',document.getElementById('name').value);
                form_data.append('tel',document.getElementById('tel').value);
                form_data.append('email',document.getElementById('email').value);
                form_data.append('username',document.getElementById('username').value);
                form_data.append('password',document.getElementById('password').value);
                form_data.append('file', $('#upload-image').prop('files')[0]);

                form_data.append('what', "profile");
                form_data.append('save', save);
                $.ajax({
                    url: 'includes/save.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(response)
                    {
                        setCookie("username", document.getElementById('username').value, 1);
                        setCookie("user_name", document.getElementById('name').value, 1);
                        //$( ".sidebar" ).load( "control-panel.php .sidebar" );
                        $( "#cheader" ).load( "control-panel.php #cheader" );
                        $("#snackbar").css("background-color","darkgreen");
                        $("#snackbar").css("border","4px solid green");
                        $("#snackbar").html("ذخیره سازی با موفقیت انجام شد");
                        ShowFloatingMessage();
                    }
                 });
             }              
    </script>
    
</body>