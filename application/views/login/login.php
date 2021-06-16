<?php
		if(isset($_SESSION['username'])){
			$directory = getAbsolutePath();
			header("Location: http://$_SERVER[HTTP_HOST]$directory");
		}
?>
<title>Login | Sign up</title>
<div class="login_signup_html_page">
	<div class="login__container" id="login__container">
		<div class="login__form-container login__sign-up-container">
			<form action="login/signupQuery" method="POST">
				<h1>Create Account</h1>
				<input type="text" placeholder="Name" id="signup_name" name="signup_name" required/>
				<input type="email" placeholder="Email" id="signup_email" name="signup_email" required/>
				<input type="password" placeholder="Password" id="signup_pswd" name="signup_pswd" required/>
				<button type="submit">Sign Up</button>
			</form>
		</div>
		<div class="login__form-container login__sign-in-container">
			<form action="login/loginQuery" method="POST">
				<h1>Sign in</h1>
				<input type="email" placeholder="Email" id="email" name="email" />
				<input type="password" placeholder="Password" id="password" name="password" />
				<button type="submit">Sign In</button>
			</form>
		</div>
		<div class="login__overlay-container">
			<div class="login__overlay">
				<div class="login__overlay-panel login__overlay-left">
					<h1>Welcome Back!</h1>
					<p>Tell us who you are<br /> and keep the party's up!</p>
					<button class="login__ghost" id="signIn">Sign In</button>
				</div>
				<div class="login__overlay-panel login__overlay-right">
					<h1>Don't have and account?</h1>
					<p>Make up one with a few simple step and join the fun with us!</p>
					<button class="login__ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</div>