<?php



 // 313vBFwTL7IYH0AMQcaP3FFh
 // 266654733914-97ptp0qvd57c40793f26reiib06j2ho1.apps.googleusercontent.com
?>
<html>
<head>
<meta name="google-signin-client_id" content="266654733914-97ptp0qvd57c40793f26reiib06j2ho1.apps.googleusercontent.com">
<br>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<br>

</head>
<body>

<div class="g-signin2" data-onsuccess="onSignIn"></div>
<br>

<br>
<script>

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  location.href="callback.php?id="+profile.getId()+"&name="+profile.getName()+"&image="+ profile.getImageUrl()+
  "&email="+profile.getEmail();
}


</script>


</body>


</html>
