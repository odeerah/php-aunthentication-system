# php-aunthentication-system
<?php
session_start();
include 'config.php';
if(isset($_POST['login']))
{
$username=$_POST['username']; // Get username
$password=$_POST['password']; // get password
//query for match the user inputs
$ret=mysqli_query($con,"SELECT * FROM login WHERE userName='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
// if user inputs match if condition will runn
if($num>0)
{
$_SESSION['login']=$username; // hold the user name in session
$_SESSION['id']=$num['id']; // hold the user id in session
$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
$action="Login";// query for inser user log in to data base
mysqli_query($con,"insert into userlog(userId,username,userIp,action) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$action')")
// code redirect the page after login
$extra="welcome.php";
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
// If the userinput no matched with database else condition will run
else
{
$_SESSION['msg']="Invalid username or password";
$extra="index.php";
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
 }
}
?>

<?php
include_once ("lib/header.php");
?>
    <body>
    
        welcome to SNH: Hospital for the ignorance <hr><p>This is a specialist hospital</p>
        <?php
    
        
        include_once ("lib/footer.php");

        
        ?>
        </body>
        </html>
