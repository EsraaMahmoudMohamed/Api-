
<?php


if(isset($_GET))
{


$name=$_GET['name'];
$email=$_GET['email'];


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

// $sql="select * from login where username='".$name."'and Password='".$pass."'";
$sql="select * from login where email='".$email."'";


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
$_SESSION['email']=$email;




  header("Location:signup.php");
  

  }

mysqli_close($db);






}




?>

