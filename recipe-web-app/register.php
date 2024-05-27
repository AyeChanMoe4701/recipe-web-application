<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
		<title>Delicious Recipes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form action="">
					<h3>Register</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username" id="name">
						<div id="name-error" style="color:red;">
              
              			</div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="Phone Number" id="phone">
						<div id="phone-error" style="color:red;">
              
              			</div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Email" id="email">
						<div id="email-error" style="color:red;">
              
              			</div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" id="pass">
						<div id="pass-error" style="color:red;">
              
              			</div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Confirm Password" id="cpass">
						<div id="cpass-error" style="color:red;">
              
              			</div>
					</div>
					<button id="register-btn">
						<span>Register</span>
					</button>
					<div>
			<br>
              <p>Already have an account? <a href="login.php">Login</a>
              </p>
            </div>
			
			<div>
			<br>
              <p><a href="Home.php">Back to Home</a>
              </p>
            </div>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		
<script>

$(document).ready(function(){

    $('#register-btn').click(function(e){
    	e.preventDefault();
        
       var emailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
        var passValid = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
        var phoneValid = /^[0-9]*$/;
        var username = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var password = $('#pass').val();
        var cPassword = $('#cpass').val();
        
        if(username.trim() != "" && emailValid.test(email) && passValid.test(password) && password == cPassword){
            $('.input-error').html('');
            $.ajax({
                method: "POST",
                url: "registerAPI.php",
                data: {username:username,email:email,phone:phone,pass:password}
            }).done(function(msg){
                if(msg == 'Success'){
                    window.location.href="login.php";
                }
                else if(msg == 'Registered'){
                    $('#email-error').html('Email already registered');
                }
                else{
                    alert("Unable to register!");
                }



           });
            console.log('Success');
        }
        else{
            if(username.trim() == ""){
                $('#name-error').html('Please enter username!');
            }
                        
            if(email.trim() == ""){
            	$('#email-error').html('Please enter email!');
            }
            else if(!emailValid.test(email)){
                	$('#email-error').html('Invalid email!');
            }
                        
            if(!phoneValid.test(phone)){
            	$('#phone-error').html('Invalid phone number!')
            }
                        	
            if(password == ""){
            	$('#pass-error').html('Please enter password!');
            }
            else if(!passValid.test(password)){
               	$('#pass-error').html('Password must have at least 8 characters with at least 1 upper & lowercase, 1 special character!');
            }
                                   
            if(cPassword == ""){
            	$('#cpass-error').html('Please confirm your password!');
            }
            else if(password != cPassword){
               	$('#cpass-error').html('Password not match!');
            }
            
                       
        }
    })

})
</script>
	</body>
</html>
