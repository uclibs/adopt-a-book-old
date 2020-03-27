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
  padding: 10px;
}

.left {
  width: 60%;
}

.right {
  width: 40%;
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

</style>
</head>
<body>
<div class="main-wrapper">

<?php include("header.php") ?>
<div class="container">
<div class="row">
<br/><br/>
  <h2 class="heading">Donors</h2>
  <br/>
  <p style="font-size:16px;">UC Libraries is deeply grateful to the following individuals and companies for their wonderfully generous support of this year’s presentation of Hidden Treasures.</p>
  <div class="column left">
    <br/>
	<p>
	<b>Honorary Co-chairs</b><br/>
	Mary and Jack Gimpel
	<br/><br/>
	<b>Co-chairs</b><br/>
	Thea Langsam and Rosemary Schlachter<br/><br/>
	<b>Sponsors</b><br/>
	<img width="45%" style="padding-top:5px;padding-bottom:5px" src="images/Clean Logo.png" class="img" alt="Placeholder image"><br/>
	Drs. Lesley Gilberston and William Hurford<br/>
	RF (Bob) Littlehale, MD
	<br/><br/>
	<b>Hosts & Hostesses</b><br/>
	Mary Ellen Betz<br/>
	Dorothy F. Byers, PhD<br/>
	Dr. and Mrs. William Camm<br/>
	Dr. Philip and Linda Diller<br/>
	Ellen and Dr. Stewart Dunsker<br/>
	Kim and Bob Fender<br/>
	Dr. Lesley Gilbertson and Dr. William Hurford<br/>
	Mary and Jack Gimpel<br/>
	Linda and Dave Graviss<br/>
	Nancy Huth, MD and Raymond Jones<br/>
	Laura and Richard Kretschmer, Jr.<br/>
	Thea Langsam<br/>
	Richard I. and Susan J. Lauf<br/>
	RF (Bob) Littlehale, MD<br/>
	Messer Construction Company<br/>
	Vivian Kay Morgan<br/>
	Kristi Nelson and Stewart Goldman<br/>
	Cora Ogle<br/>
	Ann and Harry Santen<br/>
	Mr. and Mrs. Daniel Scheid<br/>
	Rosemary and Mark Schlachter<br/>
	Jason Shorten<br/>
	Ted Silberstein<br/>
	Donald A. Spencer, Jr.<br/>
	Xuemao Wang<br/>
	Ginger and David W. Warner<br/>
	Nancy Zimpher<br/>

	</p>
  </div>
  <div class="column right">
  <br/>
    <img src="images/AAB 3.jpg" class="img" alt="Placeholder image" style="padding-top:20%">
	<img src="images/AAB 4.jpg" class="img" alt="Placeholder image" style="padding-top:40%">
  </div>
</div>
</div>
<br/>
<div style = "text-align:center;position:absolute;width:100%">
			<?php include("footer.php")?>
		</div>
</div>
</body>
</html>