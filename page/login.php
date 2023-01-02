<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <div style="padding:10px;color:green;font-weight:600;">
                Authentication
            </div>
            <div>
                <span class="error-login"></span>
            </div>
            <div>
                <input type="text" class="txtinput txtuser" placeholder="username">
            </div>
            <div>
                <input type="password" class="txtinput txtpass" placeholder="password">
            </div>
            <div style="margin-top:20px;">                
                <input type="button" id="btnlogin" class="btn" value="Login">
                <a href="../index.php" style="margin-top:20px;color:red;display:inline-block;">Cancel</a>
            </div>
        </div>
    </div>


    <script src="../js/jquery-3.6.1.min.js"></script>	
    <script>
        $(document).ready(()=>{
           $('#btnlogin').on('click',()=>{
               $('.error-login').hide(200);
               let user=$('.txtuser').val().trim();
               let pass=$('.txtpass').val().trim();
               $.ajax({
                    url:'../pages/auth.php',
                    type:'post',
                    cache:false,
                    data: {
                        'userlogin':'add',
                        'user':user,
                        'pass':pass,
                    },
                    success:function(data){
                        if(parseInt(data)>0){
                            location.href="../pages/authenticated.php?id="+data;
                        }else{
                            $('.error-login').empty();
                            $('.error-login').html('Invalid username/password.');
                            $('.error-login').show(500);
                        }
                    }
               });
           });
        });
    </script>
</body>
</html>