<?php
	session_start();
?>
<?php include ("database_warehouse_db.php");?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
		
        <link rel="stylesheet" href="style.css">

		<title>Warehouse Logistics | Login</title>
	</head>

	<body>
		<div class="container login">
            <div class="row">
                <div class="col-md-5 login-left">
					<img src="images/floating_logo.png" alt="" style="width:100%;"/>

                    <div class="row login-form">
                        
                        <h2>LOGIN</h2>
                        
                            <div class="mb-3">
                                <input type="email" id="email_input" class="form-control" placeholder="Email" value="" />
                            </div>

                            <div class="mb-3">
                                <input type="password" id="password_input" class="form-control" placeholder="Password" value="" />
                            </div>

                            <div class="mb-3">      
                                <button id="login_btn" class="btnLogin" name="login_user" onclick="login_function()">Login</button>
                            </div>

							<p>Need an account? <a href="page_register.php" title="Register to Warehouse Logistics!">Register now!</a></p>
							
                        
                    </div>
                </div>

                <div class="col-md-7 login-right">
                </div>
            </div>
        </div>
	</body>
	<script>
		function login_function(){
		    //alert($('#email_input').val());
		    //alert($('#password_input').val());
            $.post("fetch_login.php",
                {
                email_input: $('#email_input').val(),
				password_input: $('#password_input').val()
                },
                function(data, status){
                    alert(data);
                    if(data == "LOGIN SUCCESSFUL"){
                        window.location.href = "page_administrator.php";
                    }
                });
        }
	</script>
</html>