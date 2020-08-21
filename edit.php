<?php
	include 'dbh.php';
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$url_components = parse_url($url);
	$query = $url_components['query'];
	if (isset($_POST['save'])) {
		$author = $_POST['author'];
		$category = $_POST['category'];
		$pub_year = $_POST['pub_year'];
		$adopt_year = $_POST['adopt_year'];
		$description = addslashes($_POST['description']);
		$condition_treatment = addslashes($_POST['condition_treatment']);
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$dedication = $_POST['ded'];
		$recognition = $_POST['recognition'];
		$adopt_status = $_POST['status'];
		$conn->query("UPDATE main_book SET adopt_year = '". $adopt_year."', author = '". $author."', condition_treatment = '". $condition_treatment."', category = '". $category."', pub_year = '". $pub_year."', description = '". $description."', adopter_fname = '". $fname."' , adopter_lname='". $lname."' , adopter_phone ='". $phone."',adopter_email='". $email."' ,adopt_status ='". $adopt_status."', adopter_ded = '" . $dedication . "', adopter_recognition= '" . $recognition . "' WHERE bid='" . $query . "'");
		//header("Location: /adoptabook/admin.php?success");
	}
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
    
    <noscript>
        <link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
    </noscript>
	
	
    <script type="text/javascript" src="js/modernizr.custom.79639.js"></script><!-- JQuery Plugin -->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/tinynav.min.js"></script>
	
    <script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
	<script type="text/javascript" src="js/jquery.slitslider.js"></script>    
	<script type='text/javascript' src="js/jquery.plugins.min.js"></script>
	<script type='text/javascript' src="js/bootstrap.min.js"></script>
  
	
    <script type="text/javascript" src="js/jquery.iosslider.min.js"></script>
    <script type='text/javascript' src="js/jquery.flexslider.js"></script>
    <script type='text/javascript' src="js/jquery.prettyPhoto.js"></script>
    <script type='text/javascript' src="js/superfish.js"></script>
    <script type='text/javascript' src="js/isotope.js"></script> 
    <script type='text/javascript' src="js/jquery.hoverex.min.js"></script>
   	<script type="text/javascript" src="twitter/jquery.tweet.js"></script>
	<script type="text/javascript" src="js/jflickrfeed.min.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.js"></script>   
   	<script type="text/javascript" src="js/jcarousel.js"></script>
    <script type="text/javascript" src="js/jquery.carouFredSel.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	
	
    
    <script src="assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>
	<link rel="stylesheet" href="assets/plugins/revolutionslider/css/settings.css">
	
    
    <!-- JQuery Custom Plugin -->
    <script type='text/javascript' src="js/custom.js"></script>
	<style>
	.heading{
		color:#e00122;
		font-size:26px;
	}
	label{
		width:15%;
		display: inline-block;
		font-weight:bold;
	}	
	input, select{
		width:83%;
	}
	textarea {
		width: 83%;
	}
	span{
		text-align:center;
	}
	#description, #condition_treatment {
		height:150px;
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
	span{
		padding-left:10px;
	}
	</style>	
</head>
<body>
<div class="main-wrapper">
<?php include("header_admin.php") ?>
<div class="container">
<div class="row">
	<br/><br/>
	<?php 
	$sql = "SELECT  author, category, library, pub_year, title, amount, description, adopt_year, condition_treatment, adopt_status, adopter_fname ,adopter_lname, adopter_phone, adopter_email, adopter_ded , adopter_recognition, adopt_date FROM main_book where Bid=$query";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		echo'
		<form action="" method="post">
			<label for="title">Title:</label>
			<input type="text" id="title" name="title" value="' . $row["title"] . '" readonly><br>
			<label for="author">Author:</label>
			<input type="text" id="author" name="author" value="' . $row["author"] . '"><br>
			<label for="pub_year">Publication Year:</label>
			<input type="text" id="pub_year" name="pub_year" value="' . $row["pub_year"] . '"><br>
			<label for="category">Category:</label>
			<input type="text" id="category" name="category" value="' . $row["category"] . '"><br>
			<label for="library">Library:</label>
			<input type="text" id="library" name="library" value="' . $row["library"] . '" readonly><br>
			<label for="pub_year">Event year:</label>
			<input type="text" id="adopt_year" name="adopt_year" value="' . $row["adopt_year"] . '"><br>
			<label for="description">Description:</label>
			<textarea id="description" name="description">' . $row["description"] . '</textarea><br>
			<label for="condition_treatment">Condition treatment:</label>
			<textarea id="condition_treatment" name="condition_treatment">' . $row["condition_treatment"] . '</textarea><br>
			<label for="status">Adoption status:</label>
			<select id="status" name="status">';
			if($row["adopt_status"] == 2){
			echo'<option>'.$row["adopt_status"].' - Pending</option>
				<option>0 - Available</option>
				<option>1 - Adopted</option>';
			}
			else if($row["adopt_status"] == 1){
			echo'<option>'.$row["adopt_status"].' - Adopted</option>
				<option>0 - Available</option>
				<option>2 - Pending</option>';
			}
			else{
			echo'<option>'.$row["adopt_status"].' - Available</option>
				<option>1 - Adopted</option>
				<option>2 - Pending</option>';
			}
			echo'</select>
			<br>
			<label for="time">Adoption timestamp:</label>
			<input type="text" id="time" name="time" value="' . $row["adopt_date"] . '" readonly><br>
			<label for="cost">Amount:</label>
			<input type="text" id="cost" name="cost" value="' . '$' . number_format($row["amount"],2) . '" readonly><br>
			<label for="fname">Adopter first Name:</label>
			<input type="text" id="fname" name="fname" value="' . $row["adopter_fname"] . '" ><br>
			<label for="lname">Adopter last Name:</label>
			<input type="text" id="lname" name="lname" value="' . $row["adopter_lname"] . '" ><br>
			<label for="phone">Adopter phone number:</label>
			<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" name="phone" value="' . $row["adopter_phone"] . '" ><span>Format: 123-456-7890</span><br>
			<label for="email">Adopter email:</label>
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="email" name="email" value="' . $row["adopter_email"] . '" ><span>Format: abc@def.xyz</span><br>
			<label for="ded">Adopter dedication:</label>
			<textarea id="ded" name="ded" maxlength = "75">' . $row["adopter_ded"] . '</textarea><br>
			<label for="recognition">Adopter recognition:</label>
			<textarea type="text" id="recognition" name="recognition" maxlength="75">' . $row["adopter_recognition"] . '</textarea><br><br>
			<input id="sbt" type="submit" name="save" value="Save">
		</form>';
	} ?>

</div>
</div>
<br/><br/>
<div style = "text-align:center;position:absolute;width:100%">
			<?php include("footer.php")?>
		</div>
</div>
</body>
</html>
