<?php
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
		.cstm {
			background-color: #F6F4F4;
		  color: red;
		  padding: 8px 14px;
		  text-decoration: none;
		  text-transform: uppercase;
		  border-radius: 4px;
		  -webkit-transition-duration: 0.4s; /* Safari */
		  transition-duration: 0.4s;
		  cursor: pointer;
		}

		.one-edge-shadow {
			-webkit-box-shadow: 0 8px 6px -6px black;
			   -moz-box-shadow: 0 8px 6px -6px black;
					box-shadow: 0 8px 6px -6px black;
		}

		.cstm:hover {
		  background-color: #555;
		  color: red;
		  
		}
		
		.foot1 {
		text-align: center;
	    }
		.bookplate {
			background-image: url('http://libapps.libraries.uc.edu/adoptabook/covers-thumb/2.png');
			height: 615px;
		}
</style>
	
</head>
<body>

	<!-- Style Switcher Start --><!-- Style Switcher Start -->
	
	<div class="main-wrapper">

        <?php include("header.php")?>
        
        <div id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <h1 style="font-size: 35px;">Book Details</h1>
                     
                    </div>
                    
                </div>
            </div>    	
        </div>
        
        <div class="container">
		<?php
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$parsed_url = parse_url($url);
		$query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
		$query = substr($query, 1);
		$sql = "SELECT  Bid, title, author, category, library, image, description, amount, adopt_status, condition_treatment, adopter_fname ,adopter_lname, adopter_ded , pub_year FROM main_book where Bid=$query";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
					{
					while($row = $result->fetch_assoc()) 
					{		
				        if($row["adopt_status"] != 1 )
						{
							if($row["adopt_status"] == 0)
							{	
						      if($row["category"] == "Preserve for the Future")
							  {
							 echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>
									  <p>  By '.$row["author"].' , '.$row["pub_year"].'. </p>
								</div>
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
									<img width="300px" height="300px" alt="'.$row["title"].'" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>
								<div class="row">
									  <a href="/adoptabook/details.php?'.$query.'" class="one-edge-shadow cstm" style="font-size: 20px;font-weight: bold;border: 2px solid #000;border-radius: 10px;color: #4A70C5;background: white;">ADOPT</a>			   
								</div> 
								
								';
							  }
							  else
							  {
								  echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>
									  <p>  By '.$row["author"].' , '.$row["pub_year"].'. </p>
								</div>
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
								  <img width="300px" height="300px" alt="'.$row["title"].'" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>
								<div class="row">
									  <a href="/adoptabook/details.php?'.$query.'" class="one-edge-shadow cstm" style="font-size: 20px;font-weight: bold;border: 2px solid #000;border-radius: 10px;color: #4A70C5;background: white;">ADOPT</a>			   
								</div> 
								
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
									  <h1 style = "color: black;">'.$row["title"].' </h1>
									  <p>  By '.$row["author"].' , '.$row["pub_year"].'. </p>
								</div>
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
									<img width="300px" height="300px" alt="'.$row["title"].'" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>
								<div class="row">
									  <div style="width: 100px;height: 20px;border:1px solid #000;background-color: #e5e5e5;font-size: 24px;color: rgba(0, 0, 0, 0.56);padding: 10px;border-radius: 25px;"><b>Pending<b></div>		   
								</div> 
								
								';
								}
								else
								{
								echo '
							   <div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>
									  <p>  By '.$row["author"].' , '.$row["pub_year"].'. </p>
								</div>
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
								  <img width="300px" height="300px" alt="'.$row["title"].'" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								</div>
								</div>
								<br>
								<div class="row">
									  <div style="width: 100px;height: 20px;border:1px solid #000;background-color: #e5e5e5;font-size: 24px;color: rgba(0, 0, 0, 0.56);padding: 10px;border-radius: 25px;"><b>Pending<b></div>		   
								</div> 	
								';
								}
							}
						}
						else
						{
							if($row["category"] == "Preserve for the Future")
								
							{
							   echo'<div class="row" style="margin: 0px 0px 30px 2px;">
								<div class = "row" style="padding-left: 15px;">
									  <h1 style = "color: black;">'.$row["title"].'</h1>
									  <p>  By '.$row["author"].' , '.$row["pub_year"].'. </p>
								</div>
								</div>
								<div class="row">
								<div class="span6" style="text-align: justify;" width: 500px;">
								<div> 
								   <img width="100px" height="40px" style="float: left; margin-right: 10px;" alt="'.$row["title"].'" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
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
									<p><b>'.$row["title"].'</b></p>
									<p> <b>Adopted by</b> <br>
									'.$row["adopter_fname"].' </p>
									<div class="adoption_message">
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
									  <h1 style = "color: black;">'.$row["title"].'</h1>
									  <p>  By '.$row["author"].' , '.$row["pub_year"].'. </p>
								</div>
								</div>
								<div class="row">
								<div class="span6" style="text-align: justify;" width: 500px;">
								<div> 
								   <img width="100px" height="40px" style="float: left; margin-right: 10px;" alt="'.$row["title"].'" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
								<p style="text-align:justify">
									'.$row["description"].'</P>
								</div>
								<div class = "field">
								  <p> <b>Adoption Type:</b> ' .$row["category"].' </p>
								  <p> <b>Library:</b> '.$row["library"].' </p>
								</div>
								</div>
								<div class=" bookplate span6" style="width: 410px;">
									<div class="bookplate_text" style="padding: 410px 20px 20px 50px; word-break: break-word;">
									<p><b>'.$row["title"].'</b></p>
									<p> <b>Adopted by</b> <br>
									'.$row["adopter_fname"].' </p>
									<div class="adoption_message">
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
					<div class="container">
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
	
</body>
</html>