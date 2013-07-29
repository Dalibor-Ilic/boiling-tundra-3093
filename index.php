<?php
// Awesome FB APP 
//
// Name: SysX 
//
require_once 'facebook.php';// this line calls our facebook.php file that is the core of PHP facebook API

// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => '349605418503544',
  'secret' => '23225a026ad411524165e3a7a7624d3a',
  'cookie' => true,
)); // all we are doing is creating an array for facebook to use with our app id and app secret in and setting the cookie to true
try {
  $me = $facebook->api('/me');
} catch (FacebookApiException $e) {
  error_log($e);
} // this code is saying if the session to the app is created use the $me as a selector for the information or die
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SysXapp</title>
</head>

<body>
<? if ($facebook->getSession()) { ?>
<form action="signup.php" method="post">
<fieldset class="field_name">
<label>Ime</label>
<input class="name" name="first_name" type="text" value="<? if ($facebook->getSession()) {echo $me['first_name'];}else{echo'First Name';} ?>" />
</fieldset>
<fieldset class="field_name">
<label>Prezime</label>
<input class="name" name="last_name" type="text" value="<? if ($facebook->getSession()) {echo $me['last_name'];}else{echo'Last Name';} ?>" />
</fieldset>
<fieldset>
<label>Email Adresa</label>
<input name="email" type="text" value="<? if ($facebook->getSession()) {echo $me['email'];}else{echo'email address';} ?>" />
</fieldset>
<fieldset>
<label>Kod</label>
<input name="code" type="text" value="<? if ($facebook->getSession()) {echo $me['code'];}else{echo'Kod';} ?>" />
</fieldset>
<fieldset>
<input name="submit" type="submit" value="submit" />
</fieldset>
</form>
<? } else {
  ?>
<p>Sign up with Facebook <fb:login-button perms="email,user_checkins,user_location,publish_stream,user_birthday,offline_access"> Connect</fb:login-button> It only takes a few seconds</p>
<div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'349605418503544', cookie:true, 
            status:true, xfbml:true 
         });
  	 FB.Event.subscribe('auth.login', function(response) {
        window.location.reload(); //will reload your page you are on
      });
      </script> 
 <? }
?> 
</body>
</html>
