<?php

session_start();
if(!isset($_POST['name_f'])||!isset($_POST['email'])||!isset($_POST['pass']))
{
 ?>
<html>
<title> SignUp </title>
<script>

</script>

<body>
  <form action="signup.php" method="post">
    UserName:
    <br>
    <input type="text" name="name_f"  value="<?php echo $_SESSION['name'];?>">
    <br>

    Email:
    <br>
    <input type="text" name="email" value="<?php echo $_SESSION['email'];?>" >
    <br>
    password:
    <br>
    <input type="password" name="pass" >
    <br>



<input type="submit"  name=submit value="ok">







  </form>
</body>
</html>

<?php
}
else {
  // extract($_POST);

$email=$_POST['email'];
$name=$_POST['name_f'];
$pass=$_POST['pass'];
if(preg_match("/^[A-Za-z0-9]+@[a-zA-Z]+.[com-org-net]+$/",$email)
  && preg_match("/^[A-Za-z0-9]+$/",$pass)
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

$sql="insert into login(username,email,password) values (\"".$name."\",\"".$email."\",\"".$pass."\");";
echo $sql;
$result=mysqli_query($db,$sql);


if(!$result)
{

  echo "cant insert";
  exit;
}
  else {
    ?>
<script>
alert("done");
location.href="welcom.php";

</script>
  <?php

  }

mysqli_close($db);

}

else {
  echo "<script>
alert('Data not vaild please enter a valid data ');
window.location.href='signup.php';
</script>";

}



}




?>
