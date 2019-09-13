
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<?php 
require "class/sessionClass.php";
Session::init();
require "class/loginClass.php";
$db=new loginClass();

if(!empty($_POST['email']) && !empty($_POST['password']))
{

$email=$_POST['email'];
$password=sha1($_POST['password']);
$param=array($email,$password);
$result=$db->checkLoginData($param);
if(!empty($result))
{
	$param2=array($result[0]['userTypeID']);
$userType=$db->getUserType($param2);

if(count($result)>0)
{
	if(!empty($result) && !empty($userType))
	{
		Session::set("login",true);
	Session::set("username",$result[0]['userName']);
	Session::set("userType",$userType[0]['userTypeName']);
	Session::set("id",$result[0]['id']);
  // Session::set("userTypeID",$result[0]['userTypeID']);
	
  echo Session::get("userType");

	header("Location:index.php");
	}

}
}
else
{
	?>
	<div class="container">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <p style="color:red"> Invalid Email Or Password!!</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>

	<?php
}
}



?>







<body>
	<div class="container">
		<h2 style="color: blue;padding: 20px; font-family: Comic Sans MS;">WELCOME TO ONLINE DEPARTMENT MANAGEMENT SYSTEM</h2>

<form action="" method="POST">
	
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"  placeholder="Password" required="">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>