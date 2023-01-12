<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/alert.js"></script>
	</head>
<body>
    <div id="snackbar"></div>
    <div id="TopMsbBox"></div>
    <table id="message-box-header">
        <tr>
            <td width='4%''>
            </td>
            <td width='14%''>
                زمان
            </td>
            <td width='50%''>
                پیام
            </td>
            <td width='25%'>
                ارسال شده توسط
            </td>
            <td width='4%'>
                ردیف
            </td>
        </tr>
    </table>
    <div class="area6 msg-box-back">
        <?php
            require_once "functions.php";
            $conn=connect_to_database();
            //$sth = $conn->prepare("SELECT * FROM message WHERE code_to=".$_COOKIE['user_code']);
            $sql="SELECT message.msg,message.visit,message.code,message.code_from,message.time,message.date,users.name as from_user from message LEFT JOIN users ON message.code_from=users.code WHERE code_to=".$_COOKIE['user_code'];
            $sth = $conn->prepare($sql);

            $sth->execute();
            $count = $sth->rowCount();
            if ( $count<=11 )
            {
                echo "<script>$('.data4-header').css('width','100%');</script>";
            }
            /*if ($count<=0 )
            {
                echo "<div class='board-msg'>پیامی وجود ندارد</div>";
            }*/
        ?>
        <table id="messages">
                <?php
                {
                    $radif=1;
                    $result = $sth->fetchAll();
                    foreach($result as $row)
                    {
                        if ( $row['visit']==0 )
                        {
                            echo "<tr style='background:greenyellow;'>";
                        }
                        else
                        { 
                            echo "<tr>";
                        } 
                            echo "<td width='4%'>";
                                echo "<a href='#' class='rowsEditDelete' onclick ='DeleteMsg(".$row['code'].")' ><img src='../images/delete.png'></a>";
                            echo "</td>";
                            echo "<td width='14%' style='text-align:center'>";
                                echo $row["time"]." - ".$row["date"];
                            echo "</td>";
                            echo "<td width='50%''>";
                                $msg=$row["msg"];
                                if ( mb_strlen($msg , "utf8" )>63 )
                                {
                                    $msg="...".mb_substr($msg,0,63, 'utf8');
                                }
                                echo "<a href='#' class='msgtbl' onclick='showMSG($row[code],\"{$row['from_user']}\")'>".$msg."</a>";
                            echo "</td>";
                            echo "<td width='25%'>";
                                echo "<a href='#' class='msgtbl' onclick='GoToProfile(".$row["code_from"].")'>".$row["from_user"]."</a>";
                            echo "</td>";
                            echo "<td width='4%'>";
                                echo $radif;
                            echo "</td>";
                        echo "</tr>";
                        $radif=$radif+1;
                    }
                }
                ?>
        </table>
        
    </div>
    <div class="btn-holder">
        <a href="#" id="cancle" class="btns" onclick ="DeleteAllMSG()" >حذف کلیه پیام ها</a>
    </div>
    
        <!-- Show Message -->    
        <div id="GetCorpEnteshar">
            <div id="popupContact">
                 <div class="formEnteshar">
                 
                    <input type="hidden" id="msg-code">
                    <input type="hidden" id="msg-code-from">
                    <input type="hidden" id="msg-code-to">
                 
                    <br class="my-break"/>
                    <table id="tmsg">
                        <tr>
                            <td width="12%">
                                ارسال کننده
                            </td>
                            <td width="90%">
                                 <input type="text" size="50" id="from" disabled>
                            </td>
                        </tr>
                            <td width="10%"">
                                متن پیام
                            </td>
                            <td width="90%">
                                 <textarea id="msg" rows="6" class="MyMessage" readonly></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td style="text-align:left">
                                <lable id="date_time"></lable>
                            </td>
                        </tr>
                        </tr>
                            <td width="10%">
                                پاسخ شما
                            </td>
                            <td width="90%">
                                 <textarea id="msgReply" rows="6" class="MyMessage"></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="btn-holder">
                        <a href="#" onclick ="msgReply()" >ارسال پاسخ</a>
                        <a href="#" onclick ="CloseMsg()" >بازگشت به صندوق پیام ها</a>
                    </div>
                </div>
            </div>
        </div>

    
    
    <script>
    
        function showMSG(code,name)
        {
            var form_data = new FormData();
            var send=true;
            form_data.append('code', code);
            form_data.append('send', send);
            form_data.append('what', "read");
            $.ajax({
                url: 'includes/send_msg.php',
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
                        $("#from").val(name);                        
                        $("#msg").val(obj[0].msg);                        
                        $("#msg-code").val(code);                        
                        $("#msg-code-from").val(obj[0].code_from);                        
                        $("#msg-code-to").val(obj[0].code_to);
                        $("#date_time").html(obj[0].time+" - "+obj[0].date);                      
                    }
                }
             });

             /*Update New Messages Number*/
            var send=true;
            var form_data = new FormData();                  
            form_data.append('code-user', getCookie("user_code"));
            form_data.append('send', send);
            form_data.append('what', "NewMessages");
            $.ajax({
                url: 'includes/send_msg.php', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response)
                {
                    if ( response!=0 )
                    {
                       $("#NewMessage").html(response);
                    }
                    else
                    {
                       $("#NewMessage").html("");
                    }
                }
             });
             /****************************/
            
            $("#GetCorpEnteshar").css("display","block");
       }
        
        function msgReply()
        {
            new persianDate().format();
            var dt=new Date();

            var year=new persianDate().year();
            var month=new persianDate().month();
            var day=new persianDate().day();
            var send=true;
            var form_data = new FormData();                  
            form_data.append('from',$("#msg-code-to").val());
            form_data.append('to', $("#msg-code-from").val());
            form_data.append('msg', $("#msgReply").val());
            form_data.append('date', year+"/"+month+"/"+day);
            form_data.append('time', dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds());
            form_data.append('send', send);
            form_data.append('what', "send");
            $.ajax({
                url: 'includes/send_msg.php', 
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

            $("#GetCorpEnteshar").css("display","none");
        }

        function GoToProfile(code)
        {
            setCookie("user_page", code, 1); // a user page that we visit it
            top.location = "includes/profile.php";
        }
        
        function DeleteAllMSG()
        {
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "با تایید تمامی پیام ها حذف می شود",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) {
                        var send=true;
                        var form_data = new FormData();                  
                        form_data.append('code-user',getCookie("user_code"));
                        form_data.append('msg', $("#msgReply").val());
                        form_data.append('send', send);
                        form_data.append('what', "DeleteAll");
                        $.ajax({
                            url: 'includes/send_msg.php', 
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,                         
                            type: 'post',
                            success: function(response)
                            {
                                 $("#snackbar").css("background","red");
                                 $("#snackbar").html("پیام های شما با موفقیت حذف شد");
                                 ShowFloatingMessage();
                                 $( ".area6" ).load( "includes/msg-box.php .area6" );
                                 $('.data4-header').css('width','100%');
                            }
                         });
                   } else {
                   }
                 });
        }
        
        function DeleteMsg(code)
        {
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "با تایید پیام مورد نظر حذف می شود",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) {
                        var send=true;
                        var form_data = new FormData();                  
                        form_data.append('code',code);
                        form_data.append('send', send);
                        form_data.append('what', "DeleteOne");
                        $.ajax({
                            url: 'includes/send_msg.php', 
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,                         
                            type: 'post',
                            success: function(response)
                            {
                                 $("#snackbar").css("background","red");
                                 $("#snackbar").html("پیام با موفقیت حذف شد");
                                 ShowFloatingMessage();
                                 $( ".area6" ).load( "includes/msg-box.php .area6" );
                                 if ( response<=11 )
                                 {
                                     $('.data4-header').css('width','100%');
                                 }
                            }
                         });
                   } else {
                   }
                 });
        }      

    
        function CloseMsg()
        {
            $( ".area6" ).load( "includes/msg-box.php .area6" );
            $("#GetCorpEnteshar").css("display","none");
        }
    </script>
    
</body>