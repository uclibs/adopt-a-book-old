<?php
include 'dbh.php';
if(!isset($_SESSION)){
            session_start();
        $inactive = 1800; //time for expiration
		header("refresh: 1801");
        ini_set('session.gc_maxlifetime', $inactive);
        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart_item"]) && (time() - $_SESSION["cart"] > $inactive)) {
			foreach($_SESSION["cart_item"] as $k => $v) {
				$conn->query("UPDATE main_book SET adopt_status = 0 WHERE bid='" . $v["bid"] . "'");
				$conn->query("UPDATE main_book SET user_id = NULL WHERE bid='" . $v["bid"] . "'");
			}
            session_unset();     // unset $_SESSION variable for this page
            session_destroy();   // destroy session data
        }
        
    }
	error_reporting( E_ALL );
	if(isset($_SESSION["cart_item"])){	
		$nameoffield = 1;
		$name = 1;
		foreach ($_SESSION["cart_item"] as $k => $v) { 
			$str = "dedication" . (string)$nameoffield++;
			$adopter_name = "adopter_name" . (string)$name++;
			if(!empty($_POST[$str])){
				$_SESSION["cart_item"][$k]["dedication"] = $_POST[$str];
				$_SESSION["cart_item"][$k]["name"] = $_POST[$adopter_name];
			//	$conn->query("UPDATE main_book SET adopter_ded='" . $_POST[$str] . "' WHERE bid='" . $v["bid"] . "'");
			}
			else{
				$_SESSION["cart_item"][$k]["dedication"] = null;
				$_SESSION["cart_item"][$k]["name"] = null;
			//$conn->query("UPDATE main_book SET adopter_ded=null WHERE bid='" . $v["bid"] . "'");
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
    
    
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->    
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
	<script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 76) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(len);
        }
      };
    </script>
	
	<script>
		//jquery code to load contents dynamically without reloading
		
		$(document).ready(function() {
						
			$("#sbt").click(function() {
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var phno = $("#phone").val();
				var emailid = $("#email").val();
				$("div#cstmm").on('load',("userdetail.php",{
					fname: fname,
					lname: lname,
					email: emailid,
					phone: phno,				
				} );				
			});
		});		
		
		
		
	
	</script>
	
	
<style>
.cstm1{
	margin-top: 30px;
	padding-bottom: 30px;
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
	
	#sbt[disabled] {
		background: #666;
		cursor: not-allowed;
	}
	.foot1 {
		text-align: center;
	}
	button {
	font-size: 17px;
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
            
        <div id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="span8">
						<h2 class="heading">Adopter Information Form</h2>
                    </div>					
                </div>
            </div>    	
        </div>

		<div class = "container" style="overflow:hidden;">
			<div class="row">
				<p style="margin-left:20px;font-size:16px;">Please review the information below.  If any changes are needed, use your browser's back button to return to the previous page and make corrections.</p>
				<div class="span6"> 
					<div class="cstm1" style="font-size:15px;">
					<?php
				
				if(isset($_SESSION["cart_item"])){
						$total_price = 0;
						$incr = 1;
						$ded = 1;
						$recog = 1;
						$str = "";
						echo '<div> <strong> Adopted books: </strong> </div>';
						echo "<br>";
						
						foreach ($_SESSION["cart_item"] as $item) { 
						echo '<div class="container">
							<div class="row">
								<div class="span1">';echo $incr++;
								echo'</div>
								<div class="span1">
									<img width="100 px" height="70px" src="/adoptabook/covers-thumb/'; echo $item["image"];echo'.jpg" class="max-image">
								</div> 
								<div class="span10">
									<div ><strong>'; echo $item["title"]; echo'</strong></div>';
									$str = "dedication" . (string)$ded++;
									$recognition = "adopter_name" . (string)$recog++;
									echo'<div style="line-height:30px">';if(!empty($_POST[$str])){echo'<b>Dedication: </b>';echo $_POST[$str];}echo'</div>
									<div style="line-height:20px">';if(!empty($_POST[$recognition])){echo'<b>Recognition: </b>';echo $_POST[$recognition];}echo'</div>
								</div>
															
							</div>
						<hr/>
						</div>';
						$total_price += $item["amount"];						
						}
						}	
						?>

				</div>
			</div>
		</div>
		<div class="row">
		<div class="span6"> 
		<strong>Total amount to be paid: <?php echo "$ ".number_format($total_price, 2);?> </strong>
		</div>
		</div>
		<div class="row">		
				
				<?php
				echo '<div class="span6"> 
						<div class="cstm1" id="cstmm">
							<p style="color: red;">Please fill out all information</p> 
								<form id="contact_form1" method="post" action="userdetail.php" >
									<div class="span8" style="margin-top:10px"> 
										<label for="First Name" style="display: inline-flex; padding-right: 38px">First Name *</label>
										<input type="text" style="background:whitesmoke; color:black" class="span4" id="fname" name="fname" required> 
									</div> 
									
									<div class="span8" style="margin-top:10px"> 
										<label for="Last Name" style="display: inline-flex; padding-right: 40px">Last Name *</label>
										<input type="text" style="background:whitesmoke; color:black" class="span4" id="lname" name="lname" required> 
									</div> 
									
									<div class="span8" style="margin-top:10px">
										<label style="display: inline-flex; padding-right: 73px">Email *</label>
										<input type="email" class="span4" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="background:whitesmoke; color:black" id="email" name="email" required>
										<span>Format: abc@def.xyz</span>
									</div> 
									<div class="span8" style="margin-top:10px">
										<label style="display: inline-flex; padding-right: 68px">Phone *</label>
										<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="span4" style="background:whitesmoke; color:black" id="phone" name="phone" required>
										<span>Format: 123-456-7890</span>
									</div> 
									<div class="span8" style="text-align: center; margin-top:30px;margin-bottom: 30px">
										<button id = "sbt" class="one-edge-shadow cstm5"> Make payment </button>
										
									</div> 
								
					</div>
				</div> ' ;
		
?>







			</div>
		</div>

	
        
       
            
 		<!-- Bottom Footer -->
        <?php include("footer.php")?>
  <!-- END Bottom Footer -->
 	</div>
    <p id="back-top" style="display: none;">
        <a href="#top">top<i class="icon-angle-up"></i></a>
    </p>
</body>
</html>