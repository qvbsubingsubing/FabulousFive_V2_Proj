<?php
	session_start();
    session_unset();
    session_destroy();
    session_start();
    $_SESSION["curr_email"] = "none";
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
                email_input: encrypt($('#email_input').val()),
				password_input: encrypt($('#password_input').val())
                },
                function(data, status){
                    alert(data);
                    if(data == "LOGIN SUCCESSFUL"){
                        window.location.href = "page_administrator.php";
                    }
                });
        }
        function encrypt(sample_message){
        //sample message (well literally). ascii message, same as sample message, but in ascii form.
        ascii_message = []
        for(let i = 0; i < sample_message.length; i++){
            ascii_message[i] = sample_message.charCodeAt(i);
        }
        //RSA-in TIME!
        encrypt_array = [11, 13, 17, 19, 23, 29, 191, 193, 197, 199]
        prime_array = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97]
        p_var = Math.floor(Math.random() * encrypt_array.length);
        q_var = Math.floor(Math.random() * encrypt_array.length);
        while(q_var == p_var){
            q_var = Math.floor(Math.random() * encrypt_array.length);
        }
        n_var = encrypt_array[p_var] * encrypt_array[q_var];
        l_var = (encrypt_array[p_var] - 1) * (encrypt_array[q_var] - 1);
        e_var = prime_array[Math.floor(Math.random() * prime_array.length)];
        while(parseInt(n_var % e_var) == 0 || parseInt(l_var % e_var) == 0){
            e_var = prime_array[Math.floor(Math.random() * prime_array.length)];
        }
        public_key = 0;
        while(((public_key * e_var) % l_var) != 1){
            public_key += 1;
        }
        //alert("P: "+encrypt_array[p_var].toString()+" | Q: "+encrypt_array[q_var].toString()+" | N: "+n_var.toString()+" | L: "+l_var.toString()+" | E: "+e_var.toString()+" | D: "+public_key.toString())
        //ENCRYPTING
        encrypted_message = []
        for(let i = 0; i < ascii_message.length; i++){
            encrypted_message[i] = powerMod(ascii_message[i], e_var, n_var)
        }
        encrypted_message[encrypted_message.length] = public_key;
        encrypted_message[encrypted_message.length] = n_var;
        return encrypted_message;
    }
    function powerMod(base, exponent, modulus) {
        if (modulus === 1) return 0;
        var result = 1;
        base = base % modulus;
        while (exponent > 0) {
            if (exponent % 2 === 1)  //odd number
                result = (result * base) % modulus;
            exponent = exponent >> 1; //divide by 2
            base = (base * base) % modulus;
        }
        return result;
    }
	</script>
</html>