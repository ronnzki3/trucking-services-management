<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-wrapper">
            <div>
                <h3 style="text-align:center;">LXAP Trucking Services</h3>
            </div>
            <div>
                <h4 style="text-align:center;font-weight:500;">Daily Recording System</h4>
            </div>
            <div style="padding:10px;color:blue;font-weight:600;">
                Change Login Credential
            </div>
            <div>
                <span class="error-login"></span>
            </div>
            <div>
                <span class="success-login"></span>
            </div>
            <div>
                <input type="text" class="txtinput txtuser" placeholder="enter new username">
            </div>
            <div>
                <input type="password" class="txtinput txtpass" placeholder="enter new password">
            </div>
            <div>
                <input type="password" class="txtinput txtpass2" placeholder="repeat new password">
            </div>
            <div style="margin-top:10px;">
                <input type="button" id="btnupdate" class="btn" value="Update">
            </div>
            <div style="margin-top:20px;">
                <a href="payable.php" style="margin-right:20px;color:red;text-decoration:none;" class="alink">Cancel</a>
                <a href="../index.php" style="text-decoration:none;color:blue;" class="alink">Home</a>                
            </div>
        </div>
    </div>


    <script src="../js/jquery-3.6.1.min.js"></script>	
    <script>
        $(document).ready(()=>{
           $('#btnupdate').on('click',()=>{
               $('.error-login').hide(200);
               let user=$('.txtuser').val().trim();
               let pass=$('.txtpass').val().trim();
               let pass2=$('.txtpass2').val().trim();
               if(user.length>0 && pass.length>0 && pass2.length>0){
                        if(pass==pass2){
                                    $.ajax({
                                        url:'../pages/auth.php',
                                        type:'post',
                                        cache:false,
                                        data: {
                                            'userupdate':'edit',
                                            'user':user,
                                            'pass':pass,
                                        },
                                        success:function(data){
                                            $('.error-login').hide(300);                                            
                                            $('.success-login').empty();
                                            $('.success-login').html(data);
                                            $(".txtpass").attr("disabled", "disabled"); 
                                            $(".txtpass2").attr("disabled", "disabled");
                                            $(".txtuser").attr("disabled", "disabled");  
                                            $('.success-login').show(500);

                                            // if(parseInt(data)>0){
                                            //     $('.success-login').empty();
                                            //     $('.success-login').html('New username and password updated successfully.');
                                            //     $('.success-login').show(500);
                                            // }else{
                                            //     $('.error-login').empty();
                                            //     $('.error-login').html('Invalid username/password.');
                                            //     $('.error-login').show(500);
                                            // }
                                        }
                                    });
                        }else{
                            $('.error-login').empty();
                            $('.error-login').html('New password did not match.');
                            $('.error-login').show(500);
                        }
                        
               }else{
                        $('.error-login').empty();
                        $('.error-login').html('Input field/s must not empty.');
                        $('.error-login').show(500);
               }
               
           });
        });
    </script>
</body>
</html>