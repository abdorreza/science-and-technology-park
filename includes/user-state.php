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

    <div class="uper">
            <?php
                require_once "functions.php";
                $conn=connect_to_database();
            ?>
            <table width="50%">
                <tr>
                    <td width="5%">
                        <?php echo '<button id="add" onclick="show_div_new_state()">اضافه کردن مدیر موسسه </button>'; ?>
                    </td>
                    <td width="10%">
                        <?php
                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                if ( $scc=="" )
                                {
                                    $sth = $conn->prepare("SELECT * FROM states");
                                }
                                else
                                {
                                    $sth = $conn->prepare("SELECT * FROM states WHERE code=".$scc);
                                }
                                $sth->execute();
                                $result = $sth->fetchAll();
                                if ( $scc=="" )
                                {
                                    echo "<select id='all_states4' style='width:100%' onchange='ChangeStateFilter4()'>";
                                    echo "<option value=''>مدیران کلیه استان ها</option>";
                                }
                                else
                                {
                                    echo "<select id='all_states4' style='width:100%' onchange='ChangeStateFilter4()' disabled>";
                                }
                                    foreach($result as $row)
                                    {
                                        echo "<option value=".$row["code"]."> مدیران ".$row["name"]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </td>
                </tr>
            </table>
    </div>
    <?php
        $_COOKIE["filter"]=$scc;
    ?>
    <div class="area4">
       <?php include 'includes/user-state-list.php'; ?> 
    </div>
    
    <!-- *************************** -->
    <!-- Popup Window for New Center -->
    <!-- *************************** -->
    <div id="PopupWindow4">
        <div id="Popupwin">
             <div class="form">
             
                 <input type="hidden" id="NewEdit">
                 <input type="hidden" id="EditCode">
                 
                 <div id="popup-header"><h3>اضافه کردن مدیر استان</h3></div>
                <br class="my-break"/>
                <table>
                    <?php
                        //if( $_COOKIE["user_type"]=="admin_all" )
                        //{
                            if ( $scc=="" )
                            {
                                $sth = $conn->prepare("SELECT * FROM states");
                            }
                            else
                            {
                                $sth = $conn->prepare("SELECT * FROM states WHERE code=".$scc);
                            }
                            $sth->execute();
                            $result = $sth->fetchAll();
                            echo "<tr>";
                                echo "<td>استان&nbsp;&nbsp;&nbsp;</td>";
                                echo "<td>";
                                    echo "<select id='state_list4'>";
                                        if ( $scc=="" )
                                        {
                                            echo "<option value=''>انتخاب استان...</option>";
                                        }
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
                        <td>نام</td>
                        <td><input type="text" size="50" maxlength="50" maxlength="50" id="name4"></td>
                    </tr>
                    <tr>
                        <td>نام کاربری</td>
                        <td><input type="text" size="30" maxlength="30" maxlength="30" id="username4" class="en"></td>
                    </tr>
                    <tr>
                        <td>رمز عبور</td>
                        <td><input type="password" size="30" maxlength="30" maxlength="30" id="password4" class="en"></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="upload-btn">
                                <input id="upload-image4" type="file" onchange="SetStateLogo(this);"/>
                                آپلود تصویر مدیر
                            </label>
                        </td>
                        <td><img id="cuf4" src="#" alt="" /></td>
                    </tr>
                </table>
                
                <div class="btn-holder">
                    <a href="javascript:%20Save_State()" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_div4()" >انصراف</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Waiting Page -->    
    <div id="Waiting4">
        <div id="popupContact">
             <div class="formWait">
             <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        setCookie("filter","",-1);
        if ( getCookie("user_type")!="admin_all" )
        {
            $("#state_list4").prop("disabled",true);
            $("#state_list4").val(getCookie("state_code"));
        }
        
        function Save_State() 
        {
            if (document.getElementById('state_list4').value == "" )
            {
                swal("لطفا استان را انتخاب کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('name4').value == "" ) 
            {
                swal("لطفا نام مدیر سایت را وارد کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('username4').value == "" ) 
            {
                swal("لطفا نام کاربری را وارد کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('password4').value == "" && document.getElementById("NewEdit").value=="NEW" ) 
            {
                swal("لطفا رمز عبور را وارد کنید", {icon: "warning",});
                return;
            } 
            //else 
            //{
                if ( document.getElementById("NewEdit").value=="NEW" )
                {
                    var save=true;
                    var file_data = $('#upload-image4').prop('files')[0];   
                    var form_data = new FormData();   
                    form_data.append('file', file_data);
                    form_data.append('username', $("#username4").val());
                    form_data.append('password', $("#password4").val());
                    form_data.append('state_code', $("#state_list4").val());
                    //form_data.append('center_code', $("#center_list").val());
                    form_data.append('name', $("#name4").val());
                    form_data.append('save', save);
                    form_data.append('what', "admin_state");
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
                                $( ".area4" ).load( "includes/user-state-list.php" );
                                document.getElementById('name4').value="";
                                hide_div4();
                            }
                        }
                     });
                 }
                 else
                 {
                    var name=document.getElementById("name4").value;
                    //var center_code=$("#center_list").val();
                    var edit=true;
                    var file_data = $('#upload-image4').prop('files')[0];   
                    var form_data = new FormData();   
                    form_data.append('file', file_data);
                    form_data.append('code', document.getElementById("EditCode").value);
                    form_data.append('username', $("#username4").val());
                    form_data.append('password', $("#password4").val());
                    form_data.append('state_code', $("#state_list4").val());
                    //form_data.append('center_code', center_code);
                    form_data.append('name', $("#name4").val());
                    form_data.append('edit', edit);
                    form_data.append('what', "admin_state");
                    $.ajax({
                        url: 'includes/edit.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            $( ".area4" ).load( "includes/user-state-list.php" );
                            document.getElementById('name4').value="";
                            hide_div4();
                        }
                     });
                 }              

            //}
        }

        function show_div_new_state() 
        {
          document.getElementById("cuf").src="";
          document.getElementById("name").value="";
          document.getElementById("username").value="";
          document.getElementById("password").value="";
          document.getElementById("NewEdit").value="NEW";
          document.getElementById("popup-header").innerHTML="اضافه کردن مدیر استان";
          document.getElementById('PopupWindow4').style.display = "block";
          document.getElementById('name').focus();          
        }

        function show_div_edit_state(code) 
        {
            $("#Waiting4").css("display","block");
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', code);
            form_data.append('what', "admin_state");
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
                    document.getElementById('username4').value=obj[0].username;
                    document.getElementById('name4').value=obj[0].name;
                    document.getElementById("cuf4").src="images/users/"+obj[0].logo;
                    document.getElementById('password4').value=""
                    $("#state_list4").val(obj[0].state_code);
                    document.getElementById("NewEdit").value="EDIT";
                    document.getElementById("EditCode").value=code;
                    document.getElementById("popup-header").innerHTML="ویرایش مدیر استان";
                    setTimeout(function()
                    { 
                        $("#Waiting4").css("display","none");
                        document.getElementById('PopupWindow4').style.display = "block";
                        document.getElementById('name').focus();
                    }, 1000);
                }
             });              

          /*document.getElementById("NewEdit").value="EDIT";
          document.getElementById("EditCode").value=code;
          document.getElementById("popup-header").innerHTML="ویرایش مدیر استان";
          setTimeout(function()
          { 
              $("#Waiting4").css("display","none");
              document.getElementById('PopupWindow4').style.display = "block";
              document.getElementById('name').focus();
          }, 1000);*/
        }
        
        function hide_div4()
        {
          document.getElementById('PopupWindow4').style.display = "none";
        }
        
        function SetStateLogo(input) 
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
        
        function Del_State(code)
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
                  var what="admin_state";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area4" ).load( "includes/user-state-list.php" );
                  });
                  
                 swal("اطلاعات با موفقیت حذف شد", {
                   icon: "success",
                 });
               } else {
                 swal("شما از حذف اطلاعات انصراف دادید");
               }
             });
        }
        
        
       function ChangeState()
       {

             var filter=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#state_list4").val());
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
                    $('#center_list').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('center_list4');
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
                        select = document.getElementById('center_list4');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "انتخاب مرکز...";
                        select.appendChild(opt);
                    }
                 }
              });
       }

        function ChangeStateFilter4()
        {
            setCookie("filter",$("#all_states4").val(),1);
            $(".area4").load("includes/user-state-list.php");
        }
        
        
    </script>
</body>
</html>