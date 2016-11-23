<?php
	require_once __DIR__.'/../config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Page</title>
</head>
<body>
	Login Google with Javascript (and server authentication)
	<div id="google-login-btn">login in with google</div>
	<a href="#" onclick="signOut();">Sign out</a><br />
	<a href="#" onclick="toggleLogin();">Toggle login</a><br />
	<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
	<script>

	var auth2;
	var do_login = false;

	function toggleLogin() {
		console.log(do_login);
		do_login = !do_login;
	}

	function init() {
		gapi.load('auth2', function() {
        	auth2 = gapi.auth2.init({
				client_id: "<?php echo getenv('CLIENT_ID');?>",
				fetch_basic_profile: true
			});
	        auth2.attachClickHandler('google-login-btn', {}, onSuccess, onFailure);
      	});
		gapi.signin2.render('google-login-btn');
	}

	var onSuccess = function(googleUser) {
		console.log(googleUser);
		var id_token = googleUser.getAuthResponse().id_token;
		var profile = googleUser.getBasicProfile();
		console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		console.log('Name: ' + profile.getName());
		console.log('Image URL: ' + profile.getImageUrl());
		console.log('Email: ' + profile.getEmail());

		sendUserTokenToServer(id_token);
	}

	var onFailure = function(error) {
	    console.log(error);
	};

	function sendUserTokenToServer(token) {
		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/login/with-js/verify-user-token.php');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
		  console.log('Signed in as: ' + xhr.responseText);
		};
		xhr.send('token=' + token);
	}

	function signOut() {
	    auth2.signOut().then(function () {
	      console.log('User signed out.');
	    });
	}

	</script>
</body>
</html>