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
                        <?php echo '<button id="add" onclick="show_new_sarmaye()">اضافه کردن مدیر سرمایه گذار </button>'; ?>
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
                                    echo "<select id='all_states6' style='width:100%' onchange='ChangeStateFilter6()'>";
                                    echo "<option value=''>سرمایه گذاران کلیه استان ها</option>";
                                }
                                else
                                {
                                    echo "<select id='all_states6' style='width:100%' onchange='ChangeStateFilter6()' disabled>";
                                }
                                    foreach($result as $row)
                                    {
                                        echo "<option value=".$row["code"]."> سرمایه گذار ".$row["name"]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </td>
                    <td width="10%">
                        <?php

                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                if ( $scc=="" )
                                {
                                    echo "<select id='all_centers6' style='width:100%' onchange='ChangeCenterFilter6()'>";
                                        echo "<option value=''>سرمایه گذارن کلیه مراکز</option>";
                                    echo "</select>";
                                }
                                else
                                {
                                    $sth1 = $conn->prepare("SELECT * FROM centers WHERE state_code=".$scc);
                                    $sth1->execute();
                                    $result1 = $sth1->fetchAll();
                                    echo "<select id='all_centers6' style='width:100%' onchange='ChangeCenterFilter6()'>";
                                        echo "<option value=''>سرمایه گذاران کلیه مراکز</option>";
                                        foreach($result1 as $row)
                                        {
                                            echo "<option value=".$row["code"]."> سرمایه گذاران ".$row["name"]."</option>";
                                        }
                                    echo "</select>";
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
    </div>

    <?php $_COOKIE["filter1"]=$scc; ?>
    <?php $_COOKIE["filter2"]=""; ?>
    <div class="area6">
           <?php include 'includes/user-sarmaye-list.php'; ?> 
    </div>
    
    <!-- *************************** -->
    <!-- Popup Window for New Center -->
    <!-- *************************** -->
    <div id="PopupWindow6">
        <div id="Popupwin6">
             <div class="form6">
             
                 <input type="hidden" id="NewEdit">
                 <input type="hidden" id="EditCode">
                 
                 <div id="popup-header6"><h3>اضافه کردن سرمایه گذار</h3></div>
                 
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
                                    echo "<select id='state_list6' onchange='ChangeCenter6()'>";
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
                            <select id='center_list6'>
                                <option value=''>انتخاب مرکز...</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>نام</td>
                        <td><input type="text" size="50" maxlength="50" maxlength="50" id="name6"></td>
                    </tr>
                    <tr>
                        <td>نام کاربری</td>
                        <td><input type="text" size="30" maxlength="30" maxlength="30" id="username6" class="en"></td>
                    </tr>
                    <tr>
                        <td>رمز عبور</td>
                        <td><input type="password" size="30" maxlength="30" maxlength="30" id="password6" class="en"></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="upload-btn">
                                <input id="upload-image6" type="file" onchange="SetCenterLogo6(this);"/>
                                آپلود لوگوی سرمایه گذار
                            </label>
                        </td>
                        <td><img id="cuf6" src="#" alt="" /></td>
                    </tr>
                </table>
                
                <div class="btn-holder">
                    <a href="javascript:%20Save_Sarmaye()" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_div6()" >انصراف</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Waiting Page -->    
    <div id="Waiting6">
        <div id="popupContact">
             <div class="formWait">
             <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        if ( getCookie("user_type")!="admin_all" )
        {
            $("#state_list6").prop("disabled",true);
            $("#center_list6").prop("disabled",true);
            $("#state_list6").val(getCookie("state_code"));
            ChangeCenter6();
            setTimeout(function(){ $("#center_list6").val(getCookie("center_code")); }, 400);
        }
        if ( getCookie("user_type")=="admin_state" )
        {
            $("#center_list6").val("");
            $("#center_list6").prop("disabled",false);
        }

        function Save_Sarmaye() 
        {
            if ( $('#state_list6').val() == "" )
            {
                swal("لطفا استان را انتخاب کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('center_list6').value == "" )
            {
                swal("لطفا مرکز را انتخاب کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('name6').value == "" ) 
            {
                swal("لطفا نام سرمایه گذار را وارد کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('username6').value == "" ) 
            {
                swal("لطفا نام کاربری را وارد کنید", {icon: "warning",});
                return;
            } 
            if (document.getElementById('password6').value == "" && document.getElementById("NewEdit").value=="NEW" ) 
            {
                swal("لطفا رمز عبور را وارد کنید", {icon: "warning",});
                return;
            } 
            //else 
            //{
                if ( document.getElementById("NewEdit").value=="NEW" )
                {
                    var save=true;
                    var file_data = $('#upload-image6').prop('files')[0];   
                    var form_data = new FormData();   
                    form_data.append('file', file_data);
                    form_data.append('username', $("#username6").val());
                    form_data.append('password', $("#password6").val());
                    form_data.append('state_code', $("#state_list6").val());
                    form_data.append('center_code', $("#center_list6").val());
                    form_data.append('name', $("#name6").val());
                    form_data.append('save', save);
                    form_data.append('what', "sarmaye");
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
                                $( ".area6" ).load( "includes/user-sarmaye-list.php" );
                                document.getElementById('name6').value="";
                                hide_div6();
                            }
                        }
                     });
                 }
                 else
                 {
                    var edit=true;
                    var file_data = $('#upload-image6').prop('files')[0];   
                    var form_data = new FormData();   
                    form_data.append('file', file_data);
                    form_data.append('code', document.getElementById("EditCode").value);
                    form_data.append('username', $("#username6").val());
                    form_data.append('password', $("#password6").val());
                    form_data.append('state_code', $("#state_list6").val());
                    form_data.append('center_code', $("#center_list6").val());
                    form_data.append('name', $("#name6").val());
                    form_data.append('edit', edit);
                    form_data.append('what', "corp");
                    $.ajax({
                        url: 'includes/edit.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            $( ".area6" ).load( "includes/user-sarmaye-list.php" );
                            document.getElementById('name6').value="";
                            hide_div6();
                        }
                     });
                 }              

            //}
        }

        function show_new_sarmaye() 
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
                          document.getElementById("cuf6").src="";
                          document.getElementById("name6").value="";
                          document.getElementById("username6").value="";
                          document.getElementById("password6").value="";
                          document.getElementById("NewEdit").value="NEW";
                          document.getElementById("popup-header6").innerHTML="اضافه کردن سرمایه گذار";
                          document.getElementById('PopupWindow6').style.display = "block";
                          document.getElementById('name6').focus();
                    }
                }
             });              
        }

        function show_edit_sarmaye(code) 
        {
            $("#Waiting6").css("display","block");
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', code);
            form_data.append('what', "corp");
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
                    document.getElementById('username6').value=obj[0].username;
                    document.getElementById('name6').value=obj[0].name;
                    document.getElementById("cuf6").src="images/users/"+obj[0].logo;
                    document.getElementById('password6').value=""
                    $("#state_list6").val(obj[0].state_code);
                    ChangeCenter6();
                    setTimeout(function(){ $("#center_list6").val(obj[0].center_code); }, 400);
                    document.getElementById("NewEdit").value="EDIT";
                    document.getElementById("EditCode").value=code;
                    document.getElementById("popup-header6").innerHTML="ویرایش سرمایه گذار";
                    setTimeout(function()
                    { 
                        $("#Waiting6").css("display","none");
                        document.getElementById('PopupWindow6').style.display = "block";
                        document.getElementById('name6').focus();
                    }, 1000);
                }
             });              

          /*document.getElementById("NewEdit").value="EDIT";
          document.getElementById("EditCode").value=code;
          document.getElementById("popup-header3").innerHTML="ویرایش شرکت";
          setTimeout(function()
          { 
              $("#Waiting3").css("display","none");
              document.getElementById('PopupWindow3').style.display = "block";
              document.getElementById('name3').focus();
          }, 1000);*/
        }
        
        function hide_div6()
        {
          document.getElementById('PopupWindow6').style.display = "none";
        }
        
        function SetCenterLogo6(input) 
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
                    $('#cuf6').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function Del_Sarmaye(code)
        {
             swal({
               title: "برای حذف مطمئن هستید؟",
               text: "با تایید کلیه اطلاعات کاربر مورد نظر کاملا حذف می شود",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {

                  var del=true;
                  var what="corp";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area6" ).load( "includes/user-sarmaye-list.php" );
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
                  var what="corp";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area3" ).load( "includes/user-corp.php .area3" );
                  });
              }*/
        }

       function ChangeCenter6()
       {
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#state_list6").val());
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
                    $('#center_list6').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('center_list6');
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
                        select = document.getElementById('center_list6');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "انتخاب مرکز...";
                        select.appendChild(opt);
                    }
                 }
              });
       }

        function ChangeStateFilter6()
        {
             setCookie("filter1",$("#all_states6").val(),1);
             var search=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#all_states6").val());
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
                    $('#all_centers6').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('all_centers6');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'سرمایه گذاران کلیه مراکز';
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
                        select = document.getElementById('all_centers6');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'سرمایه گذاران کلیه مراکز';
                        select.appendChild(opt);
                    }
                 }
              });
            setCookie("filter2","",1);
            $(".area6").load("includes/user-sarmaye-list.php");
        }

        function ChangeCenterFilter6()
        {
            setCookie("filter1",$("#all_states6").val(),1);
            setCookie("filter2",$("#all_centers6").val(),1);
            $(".area6").load("includes/user-sarmaye-list.php");
        }

    </script>
</body>
</html>