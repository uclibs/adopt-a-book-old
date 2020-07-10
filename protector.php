<?php
function showForm($error="Login"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                      "DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta charset="utf-8" />
	 <?php include("title.php")?>
	<meta name="description" content="" />
	<meta name="author" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 	
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" class="alt" href="css/theme-uc.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114.png" />
    
    <script src="assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>
	<link rel="stylesheet" href="assets/plugins/revolutionslider/css/settings.css">
	
    
    <!-- JQuery Custom Plugin -->
    <script type='text/javascript' src="js/custom.js"></script>
	<style>
	.display{
	color:#e00122;
	font-size:24px;
	font-weight:bold;
	}
	label{
		display:inline-block;
		font-weight:bold;
		font-size:15px;
	}
	#sbt {
	  background-color: black; /* Green */
	  border: none;
	  color: white;
	  padding: 8px 14px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  margin: 4px 2px;
	  border-radius: 4px;
	  cursor: pointer;
	  -webkit-transition-duration: 0.4s; /* Safari */
	  transition-duration: 0.4s;
	}


	#sbt:hover:enabled {
	  box-shadow: 7px 4px 7px -3px rgba(0,0,0,0.35);
	  color: white;
	  background-color: #404040;
	}
	</style>
	</head>
<body>
<div class="main-wrapper">
<?php include("header_admin.php");?>
<div align="center" class="container">
	<div class="row"><br/><br/><br/><br/>
	<div class="display">
  <?php echo $error; ?>
  </div><br/><br/>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd">
    <label>Password:</label>
	<input name="passwd" type="password"/><br/><br/>
	<input id="sbt" align="center" type="submit" name="submit_pwd" value="Login"/> 
   </form>
   </div>
   </div>
   <div style = "text-align:center;position:fixed;bottom:0;width:100%">
			<?php include("footer.php")?>
	</div>
   </div>
</body>       
<?php   
}
?>

<?php
$password = 'admin'; // Set your password here
if (isset($_POST['submit_pwd'])){
	$pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
 
	if ($pass != $password) {
		showForm("Wrong password!");
		exit();     
	}
	else{ 
			setcookie ("admin_password",$password,time()+ (8* 60 * 60));
		}
} else {
	showForm();
	exit();
}
?>