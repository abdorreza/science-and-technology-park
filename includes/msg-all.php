<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/alert.js"></script>
        <script src="../PersianDate/dist/persian-date.js" type="text/javascript"></script>
	</head>
<body>
    <div id="snackbar"></div>
    <?php
        require_once "functions.php";
        $conn=connect_to_database();
    ?>
    <div id="send-to-all">
        <div id="CorpFilter">
            <!--<form action="includes/search-result.php" method="get">-->
            <table id="MsgAllTable">
                <tr>
                    <td>
                        <?php
                            echo "<select id='StateFilter' style='width:350px;' onchange='ChangeCenter()'>";
                            echo "<option value=''>تمامی استان ها</option>";
                            $sth = $conn->prepare("SELECT * FROM states");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }
                            echo "</SELECT>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo "<select id='CenterFilter' style='width:350px;'>";
                            echo "<option value=''>تمامی مراکز</option>";
                            /*$sth = $conn->prepare("SELECT * FROM centers");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }*/
                            echo "</SELECT>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo "<select id='HozeFilter' style='width:350px;' onchange='ChangeZamine()'>";
                            echo "<option value=''>تمامی حوزه ها</option>";
                            $sth = $conn->prepare("SELECT * FROM hoze");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo "<select id='ZamineFilter' style='width:350px;'>";
                            echo "<option value=''>تمامی زمینه ها</option>";
                            echo "</select>";
                        ?>
                    </td>
                </tr>
            </table>
            <!--</form>-->
        </div>
        <textarea id="msg-all" placeholder="متن پیام"></textarea>
        <div id="btn-holder">
            <a href="#" class="btns" onclick ="SendToAll()" >ارسال</a>
        </div>
    </div>
    
    
    <script>
        if ( getCookie("user_type")!="admin_all" )
        {
          $("#StateFilter").prop('disabled', true);
          $("#CenterFilter").prop('disabled', true);
          $("#StateFilter").val(getCookie("state_code"));
          ChangeCenter();
          setTimeout(function(){ $("#CenterFilter").val(getCookie("center_code")); }, 100);
        }
        if ( getCookie("user_type")=="admin_state" )
        {
          $("#CenterFilter").prop('disabled', false);
          $("#CenterFilter").val(getCookie("center_code"));
        }

      function ChangeCenter()
      {
            var filter=true;
            var form_data = new FormData();                  
            form_data.append('state', $("#StateFilter").val());
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
                   $('#CenterFilter').empty();
                   if ( response != 0) 
                   {
                       var obj = JSON.parse(response);
                       select = document.getElementById('CenterFilter');
                       var opt = document.createElement('option');
                       opt.value = "";
                       opt.innerHTML = "تمامی مراکز";
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
                       select = document.getElementById('CenterFilter');
                       var opt = document.createElement('option');
                       opt.value = "";
                       opt.innerHTML = "تمامی مراکز";
                       select.appendChild(opt);
                   }
                }
             });
      }


       function ChangeZamine()
       {
            var hoze=document.getElementById("HozeFilter").value;
            if ( hoze=="" )
            {
                $('#ZamineFilter').empty();
                select = document.getElementById('ZamineFilter');
                var opt = document.createElement('option');
                opt.value = "";
                opt.innerHTML = "تمامی زمینه ها"
            }
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('hoze', hoze);
             form_data.append('filter', filter);
             $.ajax({
                 url: 'includes/filter_zamine.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#ZamineFilter').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('ZamineFilter');
                        var i;
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی زمینه ها"
                        select.appendChild(opt);
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
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی زمینه ها"
                        select.appendChild(opt);
                    }
                 }
              });
       }
       
       function SendToAll()
       {
       
            if ( $("#msg-all").val()=="" )
            {
                swal("متن پیام را جهت ارسال وارد نکرده اید", {icon: "warning",});
                return;
            }
            filter0="";
            filter1="";
            filter2="";
            filter3="";

            if ( $("#StateFilter").val()!="" )
            {
                filter0="code_state="+$("#StateFilter").val();
            }
            if ( $("#CenterFilter").val()!="" )
            {
                filter1="code_center="+$("#CenterFilter").val();
                if ( filter0!="" ) 
                {
                    filter1=" AND "+filter1;
                }
            }
            if ( $("#HozeFilter").val()!="" )
            {
                filter2="hoze="+$("#HozeFilter").val();
                if ( filter0+filter1!="" ) 
                {
                    filter2=" AND "+filter2;
                }
            }
            if ( $("#ZamineFilter").val()!="" )
            {
                filter3="zamine="+$("#ZamineFilter").val();
                if ( filter0+filter1+filter2!="" ) 
                {
                    filter3=" AND "+filter3;
                }
            }

            filter="";
            filter=filter0+filter1+filter2+filter3;
            if ( filter!="" )
            {
                filter=" WHERE "+filter;
            }
             new persianDate().format();
             var dt=new Date();

             var year=new persianDate().year();
             var month=new persianDate().month();
             var day=new persianDate().day();
            
             var send=true;
             var form_data = new FormData();                  
             form_data.append('filter', filter);
             form_data.append('send', send);
             form_data.append('from', getCookie("user_code"));
             form_data.append('msg', $("#msg-all").val());
             form_data.append('date', year+"/"+month+"/"+day);
             form_data.append('time', dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds());
             form_data.append('what', "to-all");
             $.ajax({
                 url: 'includes/send_msg.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    swal("پیام شما ارسال شد", {icon: "success",});
                 }
              });
       }
       
       

    
    </script>
    
</body>
</html>


