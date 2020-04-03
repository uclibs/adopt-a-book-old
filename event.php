<?php if(!isset($_SESSION)){
		include 'dbh.php';
			session_start();
		$inactive = 1800; //time for expiration
		header("refresh: 1801");
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
		?>
<!DOCTYPE html>
<html lang="en">
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
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
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 50%;
  padding: 10px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
.heading{
	color:#e00122;
	font-size:26px;
}
.image{
	width:80%;
	padding-top:10%;
}
    .alertuc{
    padding: 15px;
    border: medium solid #e00122;
    }
</style>
</head>
<body>
<div class="main-wrapper">

<?php include("header.php") ?>
<div class="container">
<div class="row">
<br/><br/>
  <h2 class="heading">Event Cancelled! </h2>
  <br/>
    <div class="alertuc"
  <p style="font-size:16px;">We are reaching out to share that the Hidden Treasures: An Adopt-A-Book Evening at UC Libraries scheduled for Thursday, March 12 has been cancelled due to the evolving COVID-19 (coronavirus disease) situation.
    </p>
    <p>The UC Foundation is coordinating with the university and following UC’s lead in protecting our community.  UC’s latest update, released yesterday, can be found <a href="https://www.uc.edu/publichealth.html">here</a>. Our aim is to ensure everyone’s health and safety and we feel this is the best solution</p></div>
      
	<!--Join Us on March 12, 2020 for

	Hidden Treasures: An Adopt-A-Book Evening at UC Libraries

	6:00pm to 8:30pm at Walter C. Langsam Library.<br/><br/>
	Includes reception, program and complimentary parking.

	For tickets, visit <a target="_blank" href="https://foundation.uc.edu/HiddenTreasures">foundation.uc.edu/HiddenTreasures</a>.

	If you are unable to attend, please consider a donation to UC Libraries at <a target="_blank" href="https://foundation.uc.edu/LibrariesAnnualFund">foundation.uc.edu/LibrariesAnnualFund</a>.<br/><br/>

	For more information or to discuss sponsorships, please contact Christa Bernardo at 513.556.0055 or <a href="mailto:bernarct@ucmail.uc.edu">bernarct@ucmail.uc.edu</a>. 

  </p>-->
  <div class="column">
    <img class="image" src="images/AAB 1.jpg" class="img" alt="Placeholder image">
	<img class="image" src="images/AAB 2.jpg" class="img" alt="Placeholder image">
  </div>
  <div class="column">
    <img class="image" src="images/AAB 5.jpg" class="img" alt="Placeholder image">
	<img class="image" src="images/AAB 6.jpg" class="img" alt="Placeholder image">
  </div>
</div>
</div>
</div>
<br/><br/>
<div style = "text-align:center;position:absolute;width:100%">
			<?php include("footer.php")?>
		</div>
</div>
</body>
</html>