<?php
if(!isset($_COOKIE["admin_password"])) {
	header("Refresh: 20");
	require_once('protector.php');
}
include 'dbh.php';
?>

<!doctype html>
<html lang="en">
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
	.heading{
	color:#e00122;
	font-size:26px;
	}
	td{
		border-bottom: 1px solid #D3D3D3;
	}
	th{
		text-align:left;
	}
	th,td{
		padding-right: 10px;
		padding-bottom:5px;
		padding-top:5px;
		font-size: 15px;
	}
	#sbt{
		bottom: 20px;
		position: fixed;
		right: 70px;
		z-index: 10000;
		font-size:15px;
		font-weight:600;
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
	#sbt:hover:enabled{
		letter-spacing: 0.5px;	
		-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
		-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
		box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
		transition: all 0.4s ease 0s;
	}
	</style>	
</head>
<body>
<div>
<?php include("header_admin.php");?>
<button id="sbt" onclick="window.location.href = '/adoptabook/export.php';">EXPORT <img width="30px" height="18px" src="/adoptabook/images/download.png"></button>
<div class="row" style="margin: 15px">
		<?php if(isset($_GET['success'])){
		echo '<h3 style="color:#e00122;text-align:center">Updated Successfully!</h3>';
		}?>
		<h2 class="heading">Pending books</h2>
		<table> 
		<tr> 
			<th talign="bottom" width="2%">
			</th>
			<th valign="bottom" width="23%">
			Title
			</th>
			<th valign="bottom" width="15%">
			Author
			</th>
			<th valign="bottom" width="2%">
			Published Year
			</th>
			<th valign="bottom" width="20%">
			Library
			</th>
			<th valign="bottom" width="5%"> 
			Status
			</th>
			<th valign="bottom" width="12%">
			Name
			</th>
			<th valign="bottom" width="10%">
			Adoption Date
			</th>
			<th valign="bottom" width="2%">
			Event Year
			</th>
			<th valign="bottom" width="10%">
			Recognition
			</th>
		</tr>
		<?php
		$sql = "SELECT  bid, title, author, pub_year, adopt_status, library, adopter_fname, adopter_lname, adopt_date, adopt_year, adopter_recognition FROM main_book where adopt_status=2 ORDER BY title ASC";
		$result = $conn->query($sql);
               
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())                 

			{ 	
				if(!empty($row["adopt_date"])){	
					$dateObj = explode(" ", $row["adopt_date"]);
					$removed = array_shift($dateObj);
					$time = join(" ",$dateObj);
				}
				else{
				$time=null;
				}
				
				//$time = date("jS \of F Y h:i:s A",strtotime(strval($row["adopt_date"])));
				echo '<tr> 
					<td valign="top" width="2%">
					<a href="/adoptabook/edit.php?'.$row["bid"].'">
					<img width="20px" height="20px" src="/adoptabook/images/edit.png" class="max-image">
					</a>
					</td>
					<td valign="top" width="23%">
					'.$row["title"].'
					</td>
					<td valign="top" width="15%">
					'.$row["author"].'
					</td> 
					<td valign="top" width="2%">	
					'.$row["pub_year"].'
					</td> 
					<td valign="top" width="20%">	
					'.$row["library"].'
					</td> 
					<td valign="top" width="5%">';
					if($row["adopt_status"] == 2){
						echo'Pending';
					} else if($row["adopt_status"] == 1){
						echo'Adopted';
					} else {
						echo'Available';
					}
					echo'</td>  
					<td valign="top" width="12%">	
					'.$row["adopter_fname"] . ' ' .$row["adopter_lname"].'
					</td> 
					<td valign="top" width="10%">
					'.$time.'
					</td> 
					<td valign="top" width="2%">	
					'.$row["adopt_year"].'
					</td> 
					<td valign="top" width="10%">	
					'.$row["adopter_recognition"].'
					</td>
				</tr>'; 
		}
			
		}?>
		</table>
</div>
<div class="row" style="margin: 15px">
	<br/>
		<h2 class="heading">Adopted books</h2>
		<table> 
		<tr> 
				<th valign="bottom" width="2%">
			</th>
			<th valign="bottom" width="23%">
			Title
			</th>
			<th valign="bottom" width="15%">
			Author
			</th>
			<th valign="bottom" width="2%">
			Published Year
			</th>
			<th valign="bottom" width="20%">
			Library
			</th>
			<th valign="bottom" width="5%"> 
			Status
			</th>
			<th valign="bottom" width="12%">
			Name
			</th>
			<th valign="bottom" width="10%">
			Adoption Date
			</th>
			<th valign="bottom" width="2%">
			Event Year
			</th>
			<th valign="bottom" width="10%">
			Recognition
			</th>
		</tr>
		<?php
		$sql = "SELECT  bid, title, author, pub_year, adopt_status, library, adopter_fname, adopter_lname, adopt_date, adopt_year, adopter_recognition FROM main_book where adopt_status=1 ORDER BY title ASC";
		$result = $conn->query($sql);
               
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())                 
			{ 
				if(!empty($row["adopt_date"])){	
					$dateObj = explode(" ", $row["adopt_date"]);
					$removed = array_shift($dateObj);
					$time = join(" ",$dateObj);
				}
				else{
				$time=null;
				}
				echo '<tr> 
			<td valign="top" width="2%">
					<a href="/adoptabook/edit.php?'.$row["bid"].'">
					<img width="20px" height="20px" src="/adoptabook/images/edit.png" class="max-image">
					</a>
					</td>
					<td valign="top" width="23%">
					'.$row["title"].'
					</td>
					<td valign="top" width="15%">
					'.$row["author"].'
					</td> 
					<td valign="top" width="2%">	
					'.$row["pub_year"].'
					</td> 
					<td valign="top" width="20%">	
					'.$row["library"].'
					</td> 
					<td valign="top" width="5%">';
					if($row["adopt_status"] == 2){
						echo'Pending';
					} else if($row["adopt_status"] == 1){
						echo'Adopted';
					} else {
						echo'Available';
					}
					echo'</td>  
					<td valign="top" width="12%">	
					'.$row["adopter_fname"] . ' ' .$row["adopter_lname"].'
					</td>
					<td valign="top" width="10%">	
					'.$time.'
					</td> 
					<td valign="top" width="2%">	
					'.$row["adopt_year"].'
					</td> 
					<td valign="top" width="10%">	
					'.$row["adopter_recognition"].'
					</td>
				</tr>'; 
		}
			
		}?>
		</table>
</div>
<div class="row" style="margin: 15px">
	<br/>
		<h2 class="heading">Available books</h2>
		<table> 
		<tr> 
				<th valign="bottom" width="2%">
			</th>
			<th valign="bottom" width="21.5%">
			Title
			</th>
			<th valign="bottom" width="15%">
			Author
			</th>
			<th valign="bottom" width="2%">
			Published Year
			</th>
			<th valign="bottom" width="20%">
			Library
			</th>
			<th valign="bottom" width="5%"> 
			Status
			</th>
			<th valign="bottom" width="12%">
			Name
			</th>
			<th valign="bottom" width="10%">
			Adoption Date
			</th>
			<th valign="bottom" width="2%">
			Event Year
			</th>
			<th valign="bottom" width="10%">
			Recognition
			</th>
		</tr>
		<?php
		$sql = "SELECT  bid, title, author, pub_year, adopt_status, library, adopter_fname, adopter_lname, adopt_date, adopt_year, adopter_recognition FROM main_book where adopt_status=0 ORDER BY title ASC";
		$result = $conn->query($sql);
               
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())                 
			{ 
				if(!empty($row["adopt_date"])){	
					$dateObj = explode(" ", $row["adopt_date"]);
					$removed = array_shift($dateObj);
					$time = join(" ",$dateObj);
				}
				else{
				$time=null;
				}
				echo '<tr> 
					<td valign="top" width="2%">
					<a href="/adoptabook/edit.php?'.$row["bid"].'">
					<img width="20px" height="20px" src="/adoptabook/images/edit.png" class="max-image">
					</a>
					</td>
					<td valign="top" width="21.5%">
					'.$row["title"].'
					</td>
					<td valign="top" width="15%">
					'.$row["author"].'
					</td> 
					<td valign="top" width="2%">	
					'.$row["pub_year"].'
					</td> 
					<td valign="top" width="20%">	
					'.$row["library"].'
					</td> 
					<td valign="top" width="5%">';
					if($row["adopt_status"] == 2){
						echo'Pending';
					} else if($row["adopt_status"] == 1){
						echo'Adopted';
					} else {
						echo'Available';
					}
					echo'</td> 
					<td valign="top" width="12%">	
					'.$row["adopter_fname"] . ' ' .$row["adopter_lname"].'
					</td>
					<td valign="top" width="10%">	
					'.$time.'
					</td> 
					<td valign="top" width="2%">	
					'.$row["adopt_year"].'
					</td> 
					<td valign="top" width="10%">	
					'.$row["adopter_recognition"].'
					</td> 
				</tr>'; 
		}
			
		}?>
		</table>
</div>
<div style = "text-align:center;position:relative;">
			<?php include("footer.php")?>
</div>
</div>
</body>
</html>
