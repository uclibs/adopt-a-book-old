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
		//jquery code to load contents dynamically without reloading
		
		$(document).ready(function() {
			
			$("#name").focusout(function() {

				check_fname();
				
			});
			
			$("#lastname").focusout(function() {

				check_lname();
				
			}); 
			
			$("#email").focusout(function() {

					check_email();
					
				});
				
			
			
			function check_fname() {
	
				var username_length = $("#name").val().length;
				var lastname_length = $("#lastname").val().length;
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		
				if(username_length < 1) {
					$("#sbt").attr("disabled", true);
				} else if (lastname_length < 3 || (pattern.test($("#email").val())) == 0){ 
					$("#sbt").attr("disabled", true);
				} else {
					$("#sbt").attr("disabled", false);
				}
	
			}
			
			function check_lname() {
				
				var lastname_length = $("#lastname").val().length;
				var username_length = $("#name").val().length;
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		
				if(lastname_length < 1) {
					$("#sbt").attr("disabled", true);
				} else if (username_length < 3 || (pattern.test($("#email").val())) == 0){ 
					$("#sbt").attr("disabled", true);
				} else {
					$("#sbt").attr("disabled", false);
				}
	
			}
			
			function check_email() {

				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
				var username_length = $("#name").val().length;
				var lastname_length = $("#lastname").val().length;
			
				if(pattern.test($("#email").val())) {
					if(username_length == 0 || lastname_length == 0){
						$("#sbt").attr("disabled", true);
					} else {
						$("#sbt").attr("disabled", false);
					}
				} else {
					alert("Not a valid email address");
					$("#sbt").attr("disabled", true);
				}
			
			}
			
			
			$("#sbt").click(function() {
				var fname = $("#name").val();
				var lname = $("#lastname").val();
				var phno = $("#phone").val();
				var emailid = $("#email").val();
				var msg = $("#comment").val();
				$("div#cstm1").load("mail_handler.php",{
					first_name: fname,
					last_name: lname,
					phone: phno,
					message: msg,
					email: emailid
				} );
			});
		});		
		
	
	</script>
	
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
	  color: black;
	  background-color: #06D1F3;
	}
	
	#sbt[disabled] {
		background: #666;
		cursor: not-allowed;
	}
	
	.foot1 {
		text-align: center;
	}
	.heading{
	color:#e00122;
	font-size:26px;
	}
	</style>
	
</head>
<body>

	
    
	<div class="main-wrapper">

        <?php include("header.php")?>
		
		<div id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <h2 class="heading">Contact Us</h2>
                    </div>
                    
                </div>
            </div>    	
        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="span12">&nbsp;</div>
                <div class="span8">
                    <div class="show-grid row" style="margin-top:-30px;">
                        <div class="span8">
                            <div id="sucessmessage"> </div>
                        </div>
						<div id="cstm1">
                        <form id="contact_form1" method="post" action="#" >
                            <div class="span4">
                                <label>First Name *</label>
                                <input type="text" class="span4" id="name" aria-label="First Name" name="first_name" style="background: whitesmoke; color:black" required>
                            </div>
                            <div class="span4">
                                <label>Last Name *</label>
                                <input type="text" class="span4" aria-label="Last Name"  id="lastname" name="last_name" style="background: whitesmoke; color:black" required>
                            </div>
                            <div class="span4">
                                <label>Email *</label>
                                <input type="text" aria-label="Email Address"  class="span4" id="email" name="email" style="background: whitesmoke; color:black" required>
                            </div>
                            <div class="span4">
                                <label>Phone</label>
                                <input type="text" class="span4" aria-label="Phone Number"  id="phone" name="phone" style="background: whitesmoke; color:black">
                            </div>
                            <div class="span12">
                                <label>Message</label>
                                <textarea class="span8" id="comment" aria-label="Your Message" name="message" style="background: whitesmoke; color:black" ></textarea>
                            </div>
                            <div class="span12">
                                <button id = "sbt"  disabled class="one-edge-shadow cstm5"> SUBMIT </button>
                            </div>
                        </form>
						</div>
                        </div>                        
                </div>
                 <div class="span4">
                    <h3>Christa Bernardo<br>Director Of Development</h3>
					<div class="office-info">
                        <div class="icon-wrap-foot">
                            <i class="icon-envelope"></i>
                        </div>
                        <div class="office-txt">
                            <strong>Email</strong><br>
                            <a href="mailto:bernarct@ucmail.uc.edu">bernarct@ucmail.uc.edu</a>
                        </div>
                    </div>   
					
                    <div class="office-info">
                        <div class="icon-wrap-foot">
                            <i class="icon-map-marker"></i>
                        </div>
                        <div class="office-txt">
                            <strong>Address</strong><br>
                            640 A Langsam Library,<br>
							2911 Woodside Drive, <br>
                            Cincinnati, Ohio 45221-0033 
                        </div>
                    </div>
                            
                    
                            
                    <div class="office-info">
                        <div class="icon-wrap-foot">
                            <i class="icon-mobile-phone"></i>
                        </div>
                        <div class="office-txt">
                            <strong>Phone</strong><br>
                            +513-556-0055
                        </div>
                    </div>                           
                </div>    
				
				<div class="span12">
                    <div class="divider1"></div>
                </div>
                
                
                
               
                <div class="span12">
                    <div class="port-outer">
                        <iframe width="100%" scrolling="no" height="310" frameborder="0" 
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d849.8330695717958!2d-84.51537350282636!3d39.134346875282716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8841b2930b965d73%3A0x71ed76352499c7bb!2sLangsam+Library!5e0!3m2!1sen!2sus!4v1546966392504" 
						marginwidth="0" marginheight="0" class="map"></iframe>
                    </div>
                </div>
				
				<div class="span12">
                    <div class="divider1">&nbsp;</div>
                </div>
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