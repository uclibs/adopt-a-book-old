<?php
	include 'dbh.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	if(!isset($_SESSION)){
			session_start();
		$inactive = 1800; //time for expiration
		ini_set('session.gc_maxlifetime', $inactive);

		if (isset($_SESSION["cart"]) && !empty($_SESSION["cart_item"]) && (time() - $_SESSION["cart"] > $inactive)) {
		//session_regenerate_id(true); //generate new session ID
			foreach($_SESSION["cart_item"] as $k => $v) {
				$conn->query("UPDATE main_book SET adopt_status = 0 WHERE bid='" . $v["bid"] . "'");
			}
			session_unset();     // unset $_SESSION variable for this page
			session_destroy();   // destroy session data
		}
		
	}
	$_SESSION["cart"] = time(); // Update session
	if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
				$exist = false;
				$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$id = substr($url, strrpos($url, '?') + 1);
				$bid_part = explode("&", $id);
				$bid = $bid_part[0];
				$resultset = $conn->query("SELECT amount, bid, title, author, category, library, image FROM main_book WHERE bid='" . $bid . "'");
				while($row=mysqli_fetch_assoc($resultset)) {
				$bookById[] = $row;
				}	
				$bookArray = array($bookById[0]["bid"]=>array('amount'=>$bookById[0]["amount"], 'bid'=>$bookById[0]["bid"], 'title'=>$bookById[0]["title"], 'author'=>$bookById[0]["author"], 'image'=>$bookById[0]["image"]));				
				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $v) {
							if($v["bid"] == $bid)
								$exist = true;
						}
						if($exist == false)
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$bookArray);
				}
				else {
					$_SESSION["cart_item"] = $bookArray;
				}
				$conn->query("UPDATE main_book SET adopt_status = 2 WHERE bid='" . $bid . "'");
		break;
		}
	}
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$parsed_url = parse_url($url);
	$query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
	$query = substr($query, 1);
	$query_part = explode("&", $query);
	$query = $query_part[0];
	$url_refresh = "/adoptabook/readmore.php?" . $query;
	header("refresh: 1801; url = $url_refresh");
	$pending = false;
	if(!isset($_GET['action'])){
		$resultset = $conn->query("SELECT adopt_status FROM main_book WHERE bid='" . $query . "'");
			while($row=mysqli_fetch_assoc($resultset)) {
				if($row['adopt_status'] == 2){
					$pending = true;
				}
			}
	}
	
	if(isset($_POST['add'])) { 
			$resultset = $conn->query("SELECT adopt_status FROM main_book WHERE bid='" . $query . "'");
			while($row=mysqli_fetch_assoc($resultset)) {
				if($row['adopt_status'] == 0){
					header("Location: /adoptabook/readmore.php?" .$query."&action=add"); 
					exit();
				}
				else{
					$pending = true;
				}
			}
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
    <script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
	<script type="text/javascript" src="js/jquery.slitslider.js"></script>    
	<script type='text/javascript' src="js/jquery.plugins.min.js"></script>
	<script type='text/javascript' src="js/bootstrap.min.js"></script>
    <script type='text/javascript' src="js/tinynav.min.js"></script>
    <script type="text/javascript" src="js/jquery.iosslider.min.js"></script>
    <script type='text/javascript' src="js/jquery.flexslider.js"></script>
    <script type='text/javascript' src="js/jquery.prettyPhoto.js"></script>
    <script type='text/javascript' src="js/superfish.js"></script>
    <script type='text/javascript' src="js/isotope.js"></script> 
    <script type='text/javascript' src="js/jquery.hoverex.min.js"></script>
   	
	<script type="text/javascript" src="js/jflickrfeed.min.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.js"></script>   
   	<script type="text/javascript" src="js/jcarousel.js"></script>
    <script type="text/javascript" src="js/jquery.carouFredSel.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>
	<link rel="stylesheet" href="assets/plugins/revolutionslider/css/settings.css">
    
    <!-- JQuery Custom Plugin -->
    <script type='text/javascript' src="js/custom.js"></script>	
    <script type="text/javascript">	
		$(window).bind("load", function() {
			$(document).ready(function() {
				$('#flexslider-loader').fadeOut(800);
			});	
		});
	</script>
    <script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){
			window.scrollTo(0,1);
		}
	</script>
		
		
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->    
	
	<style>
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
			
		#sbt[disabled] {
				background: #666;
				cursor: not-allowed;
			}
		button {
			font-size: 18px;
		}
		.foot1 {
		text-align: center;
	    }
		.bookplate {
			background-image: url('/adoptabook/covers-thumb/bookplate.png');
			height: 615px;
		}
		.heading{
			color:#e00122;
			font-size:30px;
		}
</style>
	
</head>
<body>

	<!-- Style Switcher Start --><!-- Style Switcher Start -->
	
	<div class="main-wrapper">

        <?php include("header.php")?>
        
        <div id="breadcrumb">
            <div class="container">
					<?php if($pending == true){
						echo'<br/><br/><div><strong><p style="color:#e00122;font-size:20px">Sorry! This book is currently unavailable.</p></strong></div>';
						}
					?>
                    <div class="row">
					<div class="span8">
                        <h2 class="heading"">Book Details</h2>
                     
                    </div>
                    
                </div>
            </div>    	
        </div>
        
        <div class="container">
		<?php
		$sql = "SELECT  Bid, title, author, category, library, image, description, amount, adopt_status, condition_treatment, adopter_fname ,adopter_lname, adopter_ded , adopter_recognition, pub_year,adopt_year FROM main_book where Bid=$query";
				$result = $conn->query($sql);
               
				if ($result->num_rows > 0) 
					{
					while($row = $result->fetch_assoc()) 
                            
					{	 $authorvalue = trim($row["author"]); 
                        
				        if($row["adopt_status"] != 1 )
						{
							if($row["adopt_status"] == 0)
							{	
						      if($row["category"] == "Preserve for the Future")
							  {
							 echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>';
									  if(  $authorvalue  != NULL && $row["pub_year"] != NULL)
										echo '<p>'.$authorvalue.', '.$row["pub_year"].'</p>';
									  else if(  $authorvalue  != NULL && $row["pub_year"] == NULL)
										  echo '<p>'.$authorvalue.'</p>';
									  else if(  $authorvalue  == NULL && $row["pub_year"] != NULL)
										  echo '<p>'.$row["pub_year"].'</p>';
								echo'</div>
								</div>
								<div class="row">
								<div class="span8" style="text-align: justify;">
								<div class = "field">
								  <p> <b>Adoption Amount:</b> $' .$row["amount"].'</p>
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								<div> 
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
								<br></br>
								<div>
								<p style="text-align:justify"> <b> Condition and treatment: </b>
									'.$row["condition_treatment"].'</P>
								</div>
								</div>
								<div id="content" class="span4">
									<img width="300px" height="300px" alt="'.$row["title"].'" src="/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>
									<form method="post">
									<button name="add" id="sbt" type="submit">Add to cart</button>
									</form> 
								
								';
							  }
							  else
							  {
								  echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>';
									  if(  $authorvalue  != NULL && $row["pub_year"] != NULL)
										echo '<p>   '.  $authorvalue .', '.$row["pub_year"].' </p>';
									  else if(  $authorvalue  != NULL && $row["pub_year"] == NULL)
										  echo '<p>   '.  $authorvalue .' </p>';
									  else if(  $authorvalue  == NULL && $row["pub_year"] != NULL)
										  echo '<p>  '.$row["pub_year"].' </p>';
								echo'</div>
								</div>
								<div class="row">
								<div class="span8" style="text-align: justify;">
								<div class = "field">
								  <p> <b>Adoption Amount:</b> $' .$row["amount"].'</p>
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								<div> 
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
								</div>
								<div id="content" class="span4">
								  <img width="300px" height="300px" alt="'.$row["title"].'" src="/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>
									<form method="post"">
									<button name="add" id="sbt" type="submit">Add to Cart</button>';
									echo'</form>
								
								';
							  }
							  
							}
							else
							{
								if ($row["category"] == "Preserve for the Future")
                                    
								{
								echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>';
									  if(  $authorvalue  != NULL && $row["pub_year"] != NULL)
										echo '<p>   '.  $authorvalue .' , '.$row["pub_year"].' </p>';
									  else if(  $authorvalue  != NULL && $row["pub_year"] == NULL)
										  echo '<p>   '.  $authorvalue .' </p>';
									  else if(  $authorvalue  == NULL && $row["pub_year"] != NULL)
										  echo '<p>  '.$row["pub_year"].' </p>';
								echo'</div>
								</div>
								<div class="row">
								<div class="span8" style="text-align: justify;">
								<div class = "field">
								  <p> <b>Adoption Amount:</b> $' .$row["amount"].'</p>
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								<div> 
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
                                <br></br>
								<div>
								<p style="text-align:justify"> <b> Condition and treatment: </b>
									'.$row["condition_treatment"].'</P>
								</div>
								</div>
								<div id="content" class="span4">
									<img width="300px" height="300px" alt="'.$row["title"].'" src="/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>';
									if($pending == false){
									echo'<div><button id="sbt" disabled>Added to cart</button>';
									if(isset($_GET["action"]) && $_GET["action"] == "add") { ?>
										<button id="sbt" style="margin-left:40px" type="button" onclick="window.location.href='/adoptabook/cart.php'" >View cart </button>
										<button id="sbt" style="margin-left:40px" type="button" onclick="window.location.href='/adoptabook/tobeadopted.php'">Adopt more books </button>
									<?php }
									echo '</div>';
									}
								}
								else
								{
								echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>';
									  if(  $authorvalue  != NULL && $row["pub_year"] != NULL)
										echo '<p>   '.  $authorvalue .' , '.$row["pub_year"].' </p>';
									  else if(  $authorvalue  != NULL && $row["pub_year"] == NULL)
										  echo '<p>   '.  $authorvalue .' </p>';
									  else if(  $authorvalue  == NULL && $row["pub_year"] != NULL)
										  echo '<p>  '.$row["pub_year"].' </p>';
								echo'</div>
								</div>
								<div class="row">
								<div class="span8" style="text-align: justify;">
								<div class = "field">
								  <p> <b>Adoption Amount:</b> $' .$row["amount"].'</p>
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								<div> 
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
								</div>
								<div id="content" class="span4">
								  <img width="300px" height="300px" alt="'.$row["title"].'" src="/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>';
									if($pending == false){
									echo'<div><button id="sbt" disabled>Added to cart</button>';
									if(isset($_GET["action"]) && $_GET["action"] == "add") { ?>
										<button id="sbt" style="margin-left:40px" type="button" onclick="window.location.href='/adoptabook/cart.php'" >View cart </button>
										<button id="sbt" style="margin-left:40px" type="button" onclick="window.location.href='/adoptabook/tobeadopted.php'">Adopt more books </button>
									<?php }
									echo '</div>';
									}
								}
							}
						}
						else
						{
							if($row["category"] == "Preserve for the Future")
								
							{
							   echo'<div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>';
									  if(  $authorvalue  != NULL && $row["pub_year"] != NULL)
										echo '<p>   '.  $authorvalue .' , '.$row["pub_year"].' </p>';
									  else if(  $authorvalue  != NULL && $row["pub_year"] == NULL)
										  echo '<p>   '.  $authorvalue .' </p>';
									  else if(  $authorvalue  == NULL && $row["pub_year"] != NULL)
										  echo '<p>  '.$row["pub_year"].' </p>';
								echo'</div>
								</div>
								<div class="row">
								<div class="span6" style="text-align: justify;" width: 500px;">
								<div> 
								   <img width="100px" height="40px" style="float: left; margin-right: 10px;" alt="'.$row["title"].'" src="/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
								<br></br>
								<div>
								<p style="text-align:justify"> <b> Condition and treatment: </b>
									'.$row["condition_treatment"].'</P>
								</div>
								<div class = "field">
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								</div>
								<div class=" bookplate span6" style="width: 410px;">
								<div class="bookplate_text" style="padding: 410px 20px 20px 40px; word-break: break-word;">
									<p><b>'.$row["title"].'</b></p>';
									if(!empty($row["adopter_recognition"])){
									echo'<p> <b>Adopted by</b> <br>
									'.$row["adopter_recognition"].' </p>';
									}
									echo'<div class="adoption_message">
									<p> <em>'.$row["adopter_ded"].'</em></p>
									</div>
									</div>
								</div>
								</div>
								<br>
								';
							}
							else
							{
								echo'<div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>';
									  if(  $authorvalue  != NULL && $row["pub_year"] != NULL)
										echo '<p>   '.  $authorvalue .' , '.$row["pub_year"].' </p>';
									  else if(  $authorvalue  != NULL && $row["pub_year"] == NULL)
										  echo '<p>   '.  $authorvalue .' </p>';
									  else if(  $authorvalue  == NULL && $row["pub_year"] != NULL)
										  echo '<p>  '.$row["pub_year"].' </p>';
								echo'</div>
								</div>
								<div class="row">
								<div class="span6" style="text-align: justify;" width: 500px;">
								<div> 
								   <img width="100px" height="40px" style="float: left; margin-right: 10px;" alt="'.$row["title"].'" src="/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
								<div class = "field">
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								</div>
								<div class=" bookplate span6" style="width: 410px;">
								<div class="bookplate_text" style="padding: 410px 20px 20px 40px; word-break: break-word;">
									<p><b>'.$row["title"].'</b></p>';
									if(!empty($row["adopter_recognition"])){
									echo'<p> <b>Adopted by</b> <br>
									'.$row["adopter_recognition"].' </p>';
									}
									echo'<div class="adoption_message">
									<p> <em>'.$row["adopter_ded"].'</em></p>
									</div>
									</div>
								</div>
								</div>
								<br>
								';
							}
						}
						
					}
				}
		?>
		</div>
					<br>
					<div id="end" class="container">
						<div class="row">
							<div class="span12">&nbsp;</div>
						</div>
        </div>
        
        
            
 		<!-- Bottom Footer -->
        <?php include("footer.php")?>
  <!-- END Bottom Footer -->
 	</div>
    <p id="back-top" style="display: none;">
        <a href="#top">top<i class="icon-angle-up"></i></a>
    </p>
	
	<script>
	function topFunction() 
	{
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
	}
	</script>
	<?php

	if(isset($_GET['action']))
	{
    ?>
    <script>
        $(function() {
            $('html, body').animate({
                scrollTop: $("#end").offset().top
            }, 1400);
         });
		 <?php if (isset($_SESSION["cart"]) && !empty($_SESSION["cart_item"])) { ?>
		var interval = setTimeout('change()', 20 * 60 * 1000);

		function change()
		{
			if (confirm('Your shopping cart will expire in 10 minutes due to inactivity. Please click OK to extend your cart for another 30 minutes.')) {
				location.reload();
			}
		}	
		<?php } ?>
    </script>
    <?php

}

?>
	
</body>
</html>