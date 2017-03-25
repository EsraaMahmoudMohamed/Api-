 <!-- 375245543942-mggj7hoc7p0fshu154r9hhjan0mgf7vk.apps.googleusercontent.com  -->
 <!-- trDQLZqm2DmH4WlGx37omuGk  -->
<!-- http://apiproj.com/home.php -->
<html>
<head> <a href="signup.php"> signup</a></head>
<body>

<?php


if(!isset($_POST['name'])||!isset($_POST['pass']))
{
 ?>

	<center>
<table border="2" >
<tr>
<td>
<form action="home.php" method ="POST">
	UserName:
	<br>
<input type="text" name="name"><br>

Password:<br>
<input type="text" name="pass"><br>

<input type="submit" name="submit" value="login "><br>



</form>
</td></tr></table>
</center>
	</body>
</html>


<hr>

<!-- -------------------------- -->





<?php
}
else {
  // extract($_POST);


$name=$_POST['name'];
$pass=$_POST['pass'];
if( preg_match("/^[A-Za-z0-9]+$/",$pass)
  && preg_match("/^[a-zA-Z_]+$/",$name))

  {

  $DBName="itidb";
  $DBHost="localhost";
  $DBUserw="itiuserw";
$DBUserwpass="itipass";
@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
if(mysqli_connect_error())
  {
    echo "cant not  connect";
    exit;
  }

$sql="select * from login where username='".$name."'and Password='".$pass."'";
// $sql="select * from login where username='".$name."'";


$result=mysqli_query($db,$sql);
if(! $result)
{

  echo "can't select";
  
   exit;
}

if(mysqli_num_rows($result)>0){
 header("Location:welcom.php");
}

  else {

session_start();
$_SESSION['name']=$name;
$_SESSION['pass']=$pass;




  header("Location:signup.php");
  

  }

mysqli_close($db);

}

else {
  echo "<script>
alert('Data not vaild please enter a valid data ');
window.location.href='home.php';
</script>";

}



}




?>



















<!-- ---------------------------------- -->
<html>
<head>
<meta name="google-signin-client_id" content="375245543942-mggj7hoc7p0fshu154r9hhjan0mgf7vk.apps.googleusercontent.com">
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
	  location.href="linkedincheck.php?name="+profile.getName()+
	  "&email="+profile.getEmail();
	}


	</script>
</body>
</html>

<!-- ----------------------- -->

<html>
<body>
<a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78z0ebmhlpwa0u&redirect_uri=http://apiproj.com/linkedin.php&state=987654321&scope=r_basicprofile,r_emailaddress"> Login by LinkedIn  </a>

</body>

</html>
