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

    <div class="uper" width="50%">
            <?php
                require_once "functions.php";
                $conn=connect_to_database();
            ?>
            <table width="50%">
                <tr>
                    <td width="5%">
                        <?php echo '<button id="add" onclick="show_div_new()">اضافه کردن مرکز جدید</button>'; ?> 
                    </td>
                    <td width="10%">
                        <?php
                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                $sth = $conn->prepare("SELECT * FROM states");
                                $sth->execute();
                                $result = $sth->fetchAll();
                                echo "<select id='all_states' style='width:100%' onchange='ChangeState()'>";
                                    echo "<option value=''>مراکز کلیه استان ها</option>";
                                    foreach($result as $row)
                                    {
                                        echo "<option value=".$row["code"]."> مراکز ".$row["name"]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </td>
                </tr>
            </table>
    </div>
    <?php $_COOKIE["filter"]=""; ?>
    <div class="area">
        <?php include 'includes/centers-list.php'; ?>
    </div>
    
    <!-- *************************** -->
    <!-- Popup Window for New Center -->
    <!-- *************************** -->
    <div id="PopupWindow">
        <div id="Popupwin">
             <div class="form">
             
             <input type="hidden" id="NewEdit">
             <input type="hidden" id="EditCode">
             
             <div id="popup-header"><h3>اضافه کردن مرکز جدید</h3></div>

                <br class="my-break"/>
                
                <!--******************************************-->
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
                                    echo "<select style='width:300px' id='state_list'>";
                                        foreach($result as $row)
                                        {
                                            echo "<option value=".$row["code"].">".$row["name"]."</option>";
                                        }
                                    echo "</select>";
                                echo "</td>";
                            echo "</tr>";
                        //}
                    ?>
                </table>
                <!--******************************************-->
                
                <p>
                    <label class="lb1">نام مرکز
                        <input type="text" size="50" maxlength="50" id="name" onkeydown = "if (event.keyCode == 13) PressEnter()" required>
                    </label> 
                </p>
                <div class="upload-holder">
                    <p><img id="cuf" src="#" alt="" /></p>
                    <label class="upload-btn1">
                        <input id="upload-image" type="file" onchange="SetCenterLogo(this);"/>
                        آپلود لوگوی مرکز
                    </label>
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
        setCookie("filter","",-1);
        if ( getCookie("user_type")=="admin_state" )
        {
            $("#state_list").prop("disabled",true);
            $("#state_list").val(getCookie("state_code"));
        }

        function Save_Center() 
        {
            if (document.getElementById('name').value == "" ) 
            {
                swal("لطفا نام مرکز را وارد کنید", {icon: "warning",});
                return;
            } 
            else 
            {
                if ( document.getElementById("NewEdit").value=="NEW" )
                {
                    var save=true;
                    var file_data = $('#upload-image').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    form_data.append('state', $("#state_list").val());
                    form_data.append('center', $("#name").val());
                    form_data.append('save', save);
                    form_data.append('what', "center");
                    $.ajax({
                        url: 'includes/save.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            $( ".area" ).load( "includes/centers-list.php" );
                            document.getElementById('name').value="";
                            hide_div();
                        }
                     });
                 }
                 else
                 {
                    var edit=true;
                    var file_data = $('#upload-image').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    form_data.append('state', $("#state_list").val());
                    form_data.append('name', $("#name").val());
                    form_data.append('code', $("#EditCode").val());
                    form_data.append('edit', edit);
                    form_data.append('what', "center");
                    $.ajax({
                        url: 'includes/edit.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(response)
                        {
                            $( ".area" ).load( "includes/centers-list.php" );
                            document.getElementById('name').value="";
                            hide_div();
                        }
                     });
                 }              

            }
        }

        function show_div_new() 
        {
            var search=true;
            var form_data = new FormData();                  
            form_data.append('what', "states-count");
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
                    if ( response<=0 )
                    {
                         swal("قبل از ایجاد مرکز باید استان را ایجاد کنید", {icon: "warning",});
                    }
                    else
                    {
                          document.getElementById("cuf").src="";
                          document.getElementById("name").value="";
                          document.getElementById("NewEdit").value="NEW";
                          document.getElementById("popup-header").innerHTML="اضافه کردن مرکز جدید";
                          document.getElementById('PopupWindow').style.display = "block";
                          document.getElementById('name').focus();
                    }
                }
             });              
        }

        function show_div_edit(code) 
        {
            $("#Waiting").css("display","block");
            var search=true;
            var form_data = new FormData();                  
            form_data.append('code', code);
            form_data.append('what', "center");
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
                    document.getElementById('state_list').value=obj[0].state_code;
                    document.getElementById("cuf").src="images/centers/"+obj[0].logo;
                    document.getElementById("NewEdit").value="EDIT";
                    document.getElementById("EditCode").value=code;
                    document.getElementById("popup-header").innerHTML="ویرایش مرکز";
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
          document.getElementById("popup-header").innerHTML="ویرایش مرکز";
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
               text: "با تایید علاوه بر حدف مرکز مورد نظر، تمامی کاربران و شرکت های زیر مجموعه آن نیز حذف خواهند شد",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {

                  var del=true;
                  var what="center";
                  $.post("includes/del.php",{code:code,del:del,what:what}, function(data){
                        $( ".area" ).load( "includes/centers-list.php" );
                        hide_div();
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
            setCookie("filter",$("#all_states").val(),1);
            $(".area").load("includes/centers-list.php");
        }
      
    </script>


</body>
</html>    