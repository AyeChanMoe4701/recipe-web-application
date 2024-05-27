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
					<h3>Login</h3>
					
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Email" id="email">
						<div id="email-error" style="color:red;">
              
              			</div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" id="password">
						<div id="pass-error" style="color:red;">
              
              			</div>
              			<div id="error" style="color:red;">
              
              			</div>
					</div>
					
					<button id="loginButton">
						<span>Login</span>
					</button>
					<br>
					<center><p><a href="#!">Forgot password?</a></p></center>
			<div>
			<br>
              <p>Don't have an account? <a href="register.php">Register</a>
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

$(document).ready(function() { 

$('#loginButton').click(function(e) { 
e.preventDefault();
var emailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
var email=$('#email').val(); 
var password=$('#password').val(); 
var location = $('input[name="location"]').val();
    if(emailValid.test(email) && password.trim() != "")  { 

          // alert("Enter a valid email address"); 

      $.ajax({ 

      method: "POST", 

      url: "loginAPI.php", 

      data: { mail:email, pwd:password}, 

      datatype: "json" 

      }).done(function( msg ) { 

      console.log(msg); 

      if(msg=="Success"){ 

      window.location.href = "http://localhost/CW/my_profile.php";


		}
      else {

		$('#error').html(msg); 

		
       }
 	});

    }

	else if(email.trim() == ""){
		$('#email-error').html('Please enter email!');
	}

    else if(password == ""){
            	$('#pass-error').html('Please enter password!');
    }
    else if(!emailValid.test(email)){

      $('#email-error').html('Enter a valid email');

    }

}) 

})
</script>
	</body>
</html>
<?php
