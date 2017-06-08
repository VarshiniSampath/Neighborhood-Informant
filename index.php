
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='less/reset.css' />
	<link rel='stylesheet/less' href='less/home.less' />
	<script src='js/jquery-1.8.2.min.js'></script>
	<script src='js/less.js'></script>
	<script src='js/ui.js'></script>
	<script src='js/login.js'></script>
	<title>Neighborhood Informant</title>
</head>
<body>
	<div class='outer-wrapper'>
		<div class='row row1'>
			<div class='row1-image'></div>
			<ul class='header-items'>
				<li class='username'><div class='dd-arrow'></div>
					<ul class='dropdown'>
						<li>My preferences</li>
						<li>Log out</li>
					</ul>
				</li>
				<li id='loginBtn' onclick='showLoginPage();'>Log in</li>
				<li id='registerBtn' onclick='showRegisterPage();'>Sign up</li>
				<li>About</li>				
			</ul>
			<div class='center-bar'>
				<div class='bold-header'>HELLO, CHICAGO.</div>
				<div class='caption'>We help you find the perfect neighborhood based on your preferences.</div>
			</div>
			<form action = 'search/searchResults.php' method='post'>
				<div class='input-holder'>
					<div class='search'>
						<input name='searchString' class='search-input' id='searchString' placeholder='Search Neighborhood or Zip'>
						<button class='search-button'>SEARCH</button>
					</div>
				</div>
			</form>
		</div>
		<div class='row row2'>
			<div class='container'>
				<div class='tagline'>Some of Chicago's most trending neighborhoods:</div>
				<ul class='neighborhoods'>
					<li>
						<div class='image-container'>
							<img src='images/edgewater.jpg'>
						</div>
						<div class='neighborhood-name'>
							Edgewater
						</div>
					</li>
					<li>
						<div class='image-container'>
							<img src='images/northcenter.jpg'>
						</div>
						<div class='neighborhood-name'>
							North Center
						</div>
					</li>
					<li>
						<div class='image-container'>
							<img src='images/westtown.jpg'>
						</div>
						<div class='neighborhood-name'>
							West Town
						</div>
					</li>
					<li>
						<div class='image-container'>
							<img src='images/nearsouthside.jpg'>
						</div>
						<div class='neighborhood-name'>
							Near South Side
						</div>
					</li>
					<li>
						<div class='image-container'>
							<img src='images/logansquare.jpg'>
						</div>
						<div class='neighborhood-name'>
							Logan Square
						</div>
					</li>
					<li>
						<div class='image-container'>
							<img src='images/nearnorthside.jpg'>
						</div>
						<div class='neighborhood-name'>
							Near North Side
						</div>
					</li>
				</ul>
			</div>	
		</div>
		<div class='row row2 row3'>
			<div class='container'>
				<div class='tagline'>Why is Neighborhood Informant the best?</div>
				<ul class='neighborhoods'>
					<li>
						<div class='title'>BEST LOCATIONS</div>
						<div class='icon-container'>
							<img src='images/location.svg'>
						</div>
						<div class='icon-text'>
							Marshmallow donut apple pie biscuit cheesecake candy apple pie. Sweet dragee marzipan cupcake cotton candy jujubes sugar plum.
						</div>
					</li>
					<li>
						<div class='title'>MOST AFFORDABLE</div>
						<div class='icon-container'>
							<img src='images/price.svg'>
						</div>
						<div class='icon-text'>
							Marshmallow donut apple pie biscuit cheesecake candy apple pie. Sweet dragee marzipan cupcake cotton candy jujubes sugar plum.
						</div>
					</li>
					<li>
						<div class='title'>YOUR PREFERENCES</div>
						<div class='icon-container'>
							<img src='images/switch.svg'>
						</div>
						<div class='icon-text'>
							Marshmallow donut apple pie biscuit cheesecake candy apple pie. Sweet dragee marzipan cupcake cotton candy jujubes sugar plum.
						</div>
					</li>
				</ul>
			</div>	
		</div>
		<div class='footer'>
			&copy; Copyright 2015 Group 25, Software Engineering Class. Made at University of Illinois at Chicago.
		</div>	
	</div>
	<div class='overlay'></div>
	<div id='loginPage' class='md-modal md-effect-8'>
		<div class='login md-content'>
			<div class='dismiss' onclick='hideLoginPage();'></div>
			<div class='title'>LOGIN</div>
			<div id='loginErrorMsg'></div>
			<div class='email_holder'>
				<input type='text' id='loginEmail' class='email' placeholder='Email address'>
			</div>
			<div class='password_holder'>
				<input type='password' id='loginPwd' class='password' placeholder='Password'>
			</div>
			<div class='button-holder'>
				<button class='submit-button' onclick='validateLogin()'>LOGIN</button>
				<div class='login-additional'>
					<div class='left'>Forgot password?</div>
					<div class='right' onclick='hideLoginPage(); showRegisterPage();'>Don't have an account? Sign up</div>
				</div>
			</div>
		</div>
	</div>
	<div id='registerPage' class='md-modal md-effect-8'>
		<div class='register md-content'>
			<div class='dismiss' onclick='hideRegisterPage();'></div>
			<div class='title'>SIGN UP</div>
			<div id='registerErrorMsg'></div>
			<div class='name_holder'>
				<input type='text' class='name' id='userName' placeholder='Full name'>
			</div>
			<div class='email_holder'>
				<input type='text' class='email' id='userMail' placeholder='Email address'>
			</div>
			<div class='password_holder'>
				<input type='password' class='password' id='userPassword' placeholder='Password'>
			</div>
			<div class='password_holder'>
				<input type='password' class='password' id='retypePwd' placeholder='Password again'>
			</div>
			<div class='button-holder'>
				<button class='submit-button' onclick='signUp();'>SIGN UP</button>
				<div class='login-additional' onclick='hideRegisterPage(); showLoginPage();'>
					<div>Have an account already? Log in.</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
// <?php
// require_once('./includes/init.php');
// echo"

// ";
// mysql_close($con);
// ?>