<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/alert.js"></script>
	</head>
<body>
    <?php
    ?>

    <div class="uper">
            <?php
                require_once "functions.php";
                $conn=connect_to_database();
            ?>
            <table width="70%">
                <tr>
                    <td width="5%">
                        <?php echo '<button id="add" onclick="show_new_mali()">اضافه کردن کارشناس مالی </button>'; ?>
                    </td>
                    <td width="10%">
                        <?php
                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                $sth = $conn->prepare("SELECT * FROM states");
                                $sth->execute();
                                $result = $sth->fetchAll();
                                echo "<select id='all_states2' style='width:100%' onchange='ChangeStateFilter2()'>";
                                    echo "<option value=''>کارشناسان کلیه استان ها</option>";
                                    foreach($result as $row)
                                    {
                                        echo "<option value=".$row["code"]."> کارشناسان ".$row["name"]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </td>
                    <td width="10%">
                        <?php
                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                echo "<select id='all_centers2' style='width:100%' onchange='ChangeCenterFilter2()'>";
                                    echo "<option value=''>کارشناسان کلیه مراکز</option>";
                                echo "</select>";
                            }
                        ?>
                    </td>
                </tr>
            </table>
    </div>

    <?php $_COOKIE["filter1"]=""; ?>
    <?php $_COOKIE["filter2"]=""; ?>
    <div class="area2">
           <?php include 'includes/user-mali-list.php'; ?> 
    </div>
    
    <!-- *************************** -->
    <!-- Popup Window for New Center -->
    <!-- *************************** -->
    <div id="PopupWindow2">
        <div id="Popupwin2">
             <div class="form2">
             
                 <input type="hidden" id="NewEdit">
                 <input type="hidden" id="EditCode">
                 
                 <div id="popup-header2"><h3>اضافه کردن مدیر سایت</h3></div>
                 
                <br class="my-break"/>
                <table>
                    <?php
                        //if( $_COOKIE["user_type"]=="admin_all" )
                        //{
                            $sth = $conn->prepare("SELECT * FROM states");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            echo "<tr>";
                                echo "<td>استان&nbsp;&nbsp;&nbsp;</td>";
                                echo "<td>";
                                    echo "<select id='state_list2' onchange='ChangeCenter2()'>";
                                        echo "<option value=''>انتخاب استان...</option>";
                                        foreach($result as $row)
                                        {
                                            echo "<option value=".$row["code"].">".$row["name"]."</option>";
                                        }
                                    echo "</select>";
                                echo "</td>";
                            echo "</tr>";
                        //}
                    ?>
                    <tr>
                        <td>مرکز</td>
                        <td>
                            <select id='center_list2'>
                                <option value=''>انتخاب مرکز...</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>نام</td>
                        <td><input type="text" size="50" maxlength="50" maxlength="50" id="name2"></td>
                    </tr>
                    <tr>
                        <td>نام کاربری</td>
                        <td><input type="text" size="30" maxlength="30" maxlength="30" id="username2" class="en"></td>
                    </tr>
                    <tr>
                        <td>رمز عبور</td>
                        <td><input type="password" size="30" maxlength="30" maxlength="30" id="password2" class="en"></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="upload-btn">
                                <input id="upload-image2" type="file" onchange="SetCenterLogo2(this);"/>
                                آپلود تصویر کارشناس
                            </label>
                        </td>
                        <td><img id="cuf2" src="#" alt="" /></td>
                    </tr>
                </table>
                
                <div class="btn-holder">
                    <a href="javascript:%20Save_Mali()" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_div2()" >انصراف</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Waiting Page -->    
    <div id="Waiting2">
        <div id="popupContact">
             <div class="formWait">
             <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        if ( getCookie("user_type")!="admin_all" )
        {
            $("#state_list2").prop("disabled",true);
            $("#center_list2").prop("disabled",true);
            $("#state_list2").val(getCookie("state_code"));
            ChangeCenter2();
            setTimeout(function(){ $("#center_list2").val(getCookie("center_code")); }, 400);
        }
        if ( getCookie("user_type")=="admin_state" )
        {
            $("#center_list2").val("");
            $("#center_list2").prop("disabled",false);
        }

        function Save_Mali() 
        {
            if (document.getElementById('state_list2').value == "" )
            {
                swal("لطفا استان را انتخاب کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('center_list2').value == "" )
            {
                swal("لطفا مرکز را انتخاب کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('name2').value == "" ) 
            {
                swal("لطفا نام کارشناس مالی را وارد کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('username2').value == "" ) 
            {
                swal("لطفا نام کاربری را وارد کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('password2').value == "" && document.getElementById("NewEdit").value=="NEW" ) 
            {
                swal("لطفا رمز عبور را وارد کنید", {icon: "warning",});
                return;
            } 
            //else 
            //{
                if ( document.getElementById("NewEdit").value=="NEW" )
                {
                    var save=true;
                    var file_data = $('#upload-image2').prop('files')[0];   
                    var form_data = new FormData();   
                    form_data.append('file', file_data);
                    form_data.append('username', $("#username2").val());
                    form_data.append('password', $("#password2").val());
                    form_data.append('state_code', $("#state_list2").val());
                    form_data.append('center_code', $("#center_list2").val());
                    form_data.append('name', $("#name2").val());
                    form_data.append('save', save);
                    form_data.append('what', "mali");
                    $.ajax({
                        url: 'includes/save.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            if (response.includes("exist_username")) 
                            {
                                swal("نام کاربری دیگری انتخاب کنید. این نام کاربری وجود دارد", {icon: "warning",});
                                return;
                            }
                            else
                            {
                                $( ".area2" ).load( "includes/user-mali-list.php" );
                                document.getElementById('name2').value="";
                                hide_div2();
                            }
                        }
                     });
                 }
                 else
                 {
                    var edit=true;
                    var file_data = $('#upload-image2').prop('files')[0];   
                    var form_data = new FormData();   
                    form_data.append('file', file_data);
                    form_data.append('code', document.getElementById("EditCode").value);
                    form_data.append('username', $("#username2").val());
                    form_data.append('password', $("#password2").val());
                    form_data.append('state_code', $("#state_list2").val());
                    form_data.append('center_code', $("#center_list2").val());
                    form_data.append('name', $("#name2").val());
                    form_data.append('edit', edit);
                    form_data.append('what', "mali");
                    $.ajax({
                        url: 'includes/edit.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            $( ".area2" ).load( "includes/user-mali-list.php" );
                            document.getElementById('name2').value="";
                            hide_div2();
                        }
                     });
                 }              

            //}
        }

        function show_new_mali() 
        {
            var search=true;
            var form_data = new FormData();                  
            form_data.append('what', "states-center-count");
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
                    if ( response==0 )
                    {
                         swal("قبل از ایجاد کاربر باید استان و مرکز را ایجاد کنید", {icon: "warning",});
                    }
                    else
                    {
                          document.getElementById("cuf2").src="";
                          document.getElementById("name2").value="";
                          document.getElementById("username2").value="";
                          document.getElementById("password2").value="";
                          document.getElementById("NewEdit").value="NEW";
                          document.getElementById("popup-header2").innerHTML="اضافه کردن مالی";
                          document.getElementById('PopupWindow2').style.display = "block";
                          document.getElementById('name2').focus();
                    }
                }
             });              
        }

        function show_edit_mali(code) 
        {
            $("#Waiting2").css("display","block");
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', code);
            form_data.append('what', "mali");
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
                    document.getElementById('username2').value=obj[0].username;
                    document.getElementById('name2').value=obj[0].name;
                    document.getElementById("cuf2").src="images/users/"+obj[0].logo;
                    document.getElementById('password2').value=""
                    $("#state_list2").val(obj[0].state_code);
                    ChangeCenter2();
                    setTimeout(function(){ $("#center_list2").val(obj[0].center_code); }, 400);
                    document.getElementById("NewEdit").value="EDIT";
                    document.getElementById("EditCode").value=code;
                    document.getElementById("popup-header2").innerHTML="ویرایش مالی";
                    setTimeout(function()
                    { 
                        $("#Waiting2").css("display","none");
                        document.getElementById('PopupWindow2').style.display = "block";
                        document.getElementById('name2').focus();
                    }, 1000);
                }
             });              

          /*document.getElementById("NewEdit").value="EDIT";
          document.getElementById("EditCode").value=code;
          document.getElementById("popup-header2").innerHTML="ویرایش مالی";
          setTimeout(function()
          { 
              $("#Waiting2").css("display","none");
              document.getElementById('PopupWindow2').style.display = "block";
              document.getElementById('name2').focus();
          }, 1000);*/
        }
        
        function hide_div2()
        {
          document.getElementById('PopupWindow2').style.display = "none";
        }
        
        function SetCenterLogo2(input) 
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
                    $('#cuf2').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function Del_Mali(code)
        {
             swal({
               title: "برای حذف مطمئن هستید؟",
               text: "با تایید اطلاعات کاربر مورد نظر کاملا حذف می شوند",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {

                  var del=true;
                  var what="mali";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area2" ).load( "includes/user-mali-list.php" );
                  });
                  
                 swal("اطلاعات با موفقیت حذف شد", {
                   icon: "success",
                 });
               } else {
                 swal("شما از حذف اطلاعات انصراف دادید");
               }
             });
              /*if ( confirm("آیا برای حذف کردن مطمئن هستید؟") == true )
              {
                  var del=true;
                  var what="mali";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area2" ).load( "includes/user-mali.php .area2" );
                  });
              }*/
        }

       function ChangeCenter2()
       {
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#state_list2").val());
             form_data.append('filter', filter);
             $.ajax({
                 url: 'includes/filter_center.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#center_list2').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('center_list2');
                        var i;
                        for (i=0;i<obj.length;i++)
                        {
                            var opt = document.createElement('option');
                            opt.value = obj[i].code;
                            opt.innerHTML = obj[i].name;
                            select.appendChild(opt);
                        }
                    }
                    else
                    {
                        select = document.getElementById('center_list2');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "انتخاب مرکز...";
                        select.appendChild(opt);
                    }
                 }
              });
       }

        function ChangeStateFilter2()
        {
             setCookie("filter1",$("#all_states2").val(),1);
             var search=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#all_states2").val());
             form_data.append('search', search);
             form_data.append('what', 'filter-center');
             $.ajax({
                 url: 'includes/search.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#all_centers2').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('all_centers2');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'مدیران کلیه مراکز';
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
                        select = document.getElementById('all_centers2');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'مدیران کلیه مراکز';
                        select.appendChild(opt);
                    }
                 }
              });
            setCookie("filter2","",1);
            $(".area2").load("includes/user-mali-list.php");
        }

        function ChangeCenterFilter2()
        {
            setCookie("filter1",$("#all_states2").val(),1);
            setCookie("filter2",$("#all_centers2").val(),1);
            $(".area2").load("includes/user-mali-list.php");
        }

    </script>
</body>
</html>