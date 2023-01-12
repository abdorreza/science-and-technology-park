<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>اتوماسیون شرکت های مرکز رشد و فناور</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="../jquery/jquery.js" type="text/javascript"></script>
    <script src="../jquery/javascript.js" type="text/javascript"></script>
    <script type="text/javascript" src="../jquery/alert.js"></script>
</head>
<body>

    <div class="uper">
        <?php echo '<button id="add" onclick="show_div_new()">اضافه کردن استان جدید</button>'; ?>
    </div>

    <div class="area">
         <?php include 'includes/states-list.php'; ?> 
    </div>
    
    <!-- *************************** -->
    <!-- Popup Window for New Center -->
    <!-- *************************** -->
    <div id="PopupWindow">
        <div id="Popupwin">
             <div class="form">
             
             <input type="hidden" id="NewEdit">
             <input type="hidden" id="EditCode">

             <div id="popup-header"><h3>اضافه کردن استان جدید</h3></div>

                <br class="my-break"/>
                <p>
                    <label class="lb1">نام استان
                        <input type="text" size="50" maxlength="50" id="name" onkeydown = "if (event.keyCode == 13) PressEnter()">
                    </label> 
                </p>
                <div class="upload-holder">
                    <p><img id="cuf" src="#" alt="" /></p>
                    <label class="upload-btn">
                        <input id="upload-image" type="file" onchange="SetCenterLogo(this);"/>
                        آپلود لوگوی استان
                    </label>
                    <!--<td>
                        <label class="upload-btn">
                            <a href="#" id="upload-image" onclick="DelCenterLogo();">حذف لوگو</a>
                        </label>
                    </td>-->
                </div>           
                <div class="btn-holder">
                    <a href="javascript:%20Save_Center()" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_div()" >انصراف</a>
                </div>
            </div>
        </div>
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

        function Save_Center() 
        {
            if (document.getElementById('name').value == "" ) 
            {
                swal("لطفا نام استان را وارد کنید", {icon: "warning",});
                return;
            } 
            else 
            {
                if ( document.getElementById("NewEdit").value=="NEW" )
                {
                    var center=document.getElementById("name").value;
                    var save=true;
                    var file_data = $('#upload-image').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    form_data.append('state', center);
                    form_data.append('save', save);
                    form_data.append('what', "state");
                    $.ajax({
                        url: 'includes/save.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            //$( ".area" ).load( "includes/states.php .area" );
                            $( ".area" ).load( "includes/states-list.php" );
                            document.getElementById('name').value="";
                            hide_div();
                        }
                     });
                 }
                 else
                 {
                    var name=document.getElementById("name").value;
                    var code=document.getElementById("EditCode").value;
                    var edit=true;
                    var file_data = $('#upload-image').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    form_data.append('name', name);
                    form_data.append('code', code);
                    form_data.append('edit', edit);
                    form_data.append('what', "state");
                    $.ajax({
                        url: 'includes/edit.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            //$( ".area" ).load( "includes/states.php .area" );
                            $( ".area" ).load( "includes/states-list.php" );
                            document.getElementById('name').value="";
                            hide_div();
                        }
                     });
                 }              

            }
        }

        function show_div_new() 
        {
          document.getElementById("cuf").src="";
          document.getElementById("name").value="";
          document.getElementById("NewEdit").value="NEW";
          document.getElementById("popup-header").innerHTML="اضافه کردن استان جدید";
          document.getElementById('PopupWindow').style.display = "block";
          document.getElementById('name').focus();          
        }

        function show_div_edit(code) 
        {
            $("#Waiting").css("display","block");
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', code);
            form_data.append('what', "state");
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
                    document.getElementById("cuf").src="images/states/"+obj[0].logo;
                    document.getElementById("NewEdit").value="EDIT";
                    document.getElementById("EditCode").value=code;
                    document.getElementById("popup-header").innerHTML="ویرایش استان";
                    setTimeout(function()
                    { 
                        $("#Waiting").css("display","none");
                        document.getElementById('PopupWindow').style.display = "block";
                        document.getElementById('name').focus();
                    }, 1000);
                }
             });              

          /*document.getElementById("NewEdit").value="EDIT";
          document.getElementById("EditCode").value=code;
          document.getElementById("popup-header").innerHTML="ویرایش استان";
          setTimeout(function()
          { 
              $("#Waiting").css("display","none");
              document.getElementById('PopupWindow').style.display = "block";
              document.getElementById('name').focus();
          }, 1000);*/
        }
        
        
        function hide_div()
        {
          document.getElementById('PopupWindow').style.display = "none";
        }
        
        function SetCenterLogo(input) 
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
                    $('#cuf').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function Del_Center(code)
        {
             swal({
               title: "برای حذف مطمئن هستید؟",
               text: "با تایید علاوه بر حدف استان مورد نظر، تمامی مراکز و کاربران و شرکت های زیر مجموعه آن نیز حذف خواهند شد",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {

                  var del=true;
                  var what="state";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        //$( ".area" ).load( "includes/states.php .area" );
                        $( ".area" ).load( "includes/states-list.php" );
                        hide_div();
                  });
                  
                 swal("اطلاعات با موفقیت حذف شد", {
                   icon: "success",
                 });
               } else {
                 swal("شما از حذف اطلاعات انصراف دادید");
               }
             });
         
            /*
              if ( confirm("آیا برای حذف کردن مطمئن هستید؟") == true )
              {
                  var del=true;
                  var what="center";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area" ).load( "includes/centers.php .area" );
                        hide_div();
                  });
              }
              */
        }
        
        function DelCenterLogo()
        {
             swal({
               title: "برای حذف لوگو هستید؟",
               text: "با تایید حتی بدون ذخیره سازی لوگوی استان مورد نظر حذف می شود",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {

                  var del=true;
                  code=$("#EditCode").val();
                  var what="state_logo";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                    //$( ".area" ).load( "includes/states.php .area" );
                    $( ".area" ).load( "includes/states-list.php" );
                    $('#cuf').attr('src', "../images/states/no-image.jpg")
                  });
                  
                 swal("لوگو با موفقیت حذف شد", {
                   icon: "success",
                 });
               } else {
                 swal("شما از حذف لوگو انصراف دادید");
               }
             });
        }
        
        function Manage_State(code)
        {
            top.location = "control-panel.php?mnu=7&code="+code;
        }
        
        
        window.onerror = function(msg, url, linenumber) 
        {
            alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
            return true;
        }
        

    </script>


</body>
</html>    