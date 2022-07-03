<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="style.css">

		<title>Warehouse Logistics | Register</title>
	</head>

	<body>
		<div class="container register">
            <div class="row">
                <div class="col-md-7 register-left">
                </div>

                <div class="col-md-5 register-right">
                    
                    <img src="images/logo.png">

                    <div class="row">
                        
                        <h2>SIGN UP</h2>
                        
                            <div class="mb-2">
                                <input type="text" id="firstname" class="form-control" placeholder="First Name*"/>
                            </div>
                            
                            <div class="mb-2">
                                <input type="text" id="lastname" class="form-control" placeholder="Last Name*"/>
                            </div>
                                        
                            <div class="mb-2">
                                <input type="text" id="email" class="form-control" placeholder="Email*"/>
                            </div>
                            <div class="mb-2">
                                <input type="password" id="password" class="form-control" placeholder="Password*"/>
                            </div>
                            <div class="mb-2">
                                <input type="password" id="checkpassword" class="form-control" placeholder="Confirm Password*"/>
                            </div>
                            <div class="mb-2">
                                <select class="form-control" name="gender" id="gender">
                                    <option class="hidden"  selected disabled>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            
                            <div class="mb-2">
                                <input type="text" id="contactnumber" name="txtEmpPhone" class="form-control" placeholder="Contact Number*"/>
                            </div>
                            <div class="mb-2">
                                <input type="text" id="address" class="form-control" placeholder="Address*"/>
                            </div>

                            <div class="mb-2">      
                                <button id="register_btn" class="btnRegister" name="register_user" onclick="register_function()">Register</button>
                            </div>

                            <p>Already have an account? <a href="page_login.php" title="Login to Warehouse Logistics!">Login now!</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
	</body>
    <script>
        function register_function(){
            //alert("register button detected");
            $.post("insert_account.php",
                {
                firstname_input: $('#firstname').val(),
                lastname_input: $('#lastname').val(), 
                email_input: $('#email').val(), 
                password_input: $('#password').val(),
                confirm_password_input: $('#checkpassword').val(),
                gender_input: $('#gender').val(),
                contact_number_input: $('#contactnumber').val(),
                address_input: $('#address').val()
                },
                function(data, status){
                    alert(data);
                    if(data == "NEW ACCOUNT CREATED SUCCESSFULLY!"){
                         window.location.href = "page_login.php";
                    }
                });
        }
    </script>
</html>