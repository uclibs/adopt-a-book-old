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
   	<script type="text/javascript" src="twitter/jquery.tweet.js"></script>
	<script type="text/javascript" src="js/jflickrfeed.min.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.js"></script>   
   	<script type="text/javascript" src="js/jcarousel.js"></script>
    <script type="text/javascript" src="js/jquery.carouFredSel.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    
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
	
	<style>
	.foot1 {
		text-align: center;
	}
	</style>
    
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->    
</head>
<body>
    
<div class="main-wrapper">

        <?php include("header.php")?>
        
       	<!-- Slider Wrapper -->
         <?php include("slider-inc.php")?>
        <!-- END Slider Wrapper -->
        
       	<div class="welcome-wrap" >
            <div class="container" style="background: white;color: black;text-align: justify;padding: 4px;">
                <div class="row" style="width:100%;">
                    <div class="span12" style="width:auto;">
					  <div class="callout clearfix"><div class="cll-left"><strong>The UC Libraries Adopt-A-Book program provides essential funding to support the preservaton, acquisition and digitization of books, manuscripts and collections held by the region&rsquo;s top-ranked research library</strong>. 
					</div></div>
                <p><span class="cll-left">Book adoptions are a wonderful way to honor loved ones and mark special occasions, while supporting the mission of the UC Libraries.</span></p>
                <p>When you adopt a book, you will be acknowledged via a virtual bookplate on our website and on a physical bookplate in your selected item. If you would like to adopt a book in honor or in memory of someone, please indicate this during the check-out process. All Adopt-A-Book donations are tax deductible. Donors will receive a gift acknowledgment and tax receipt from the UC Foundation. </p>
                
                <p>We also welcome you to come see your adopted book in person – just be in touch with Christa Bernardo to schedule a time.  To learn more about our Adopt-A-Book program or supporting other areas of the UC Libraries, contact Christa Bernardo at (513) 556-0055 or <a href="mailto:christa.bernardo@uc.edu">christa.bernardo@uc.edu</a>.</p>
                        <p>Thank you for generosity and support of the UC Libraries </p>
                    </div>
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