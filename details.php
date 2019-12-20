<?php
error_reporting( E_ALL );
	include 'dbh.php';
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$parsed_url = parse_url($url);
		$query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
		$query = substr($query, 1);
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
			
			$("#fname").focusout(function() {

				check_userfname();
				
			});
			
			$("#lname").focusout(function() {

				check_userlname();
				
			});
			
			
			
			function check_userfname() {
	
				var username_length = $("#fname").val().length;
				var username1_length = $("#lname").val().length;
				var phone_length = $("#phone").val().length;
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		
				if(username_length < 1) {
					alert("First Name is mandatory");
					$("#sbt").attr("disabled", true);
				} else if ( username1_length == 0 ){ 
					$("#sbt").attr("disabled", true);
				} else {
					$("#sbt").attr("disabled", false);
				}
	
			}
			
			
			function check_userlname() {
	
				var username_length = $("#lname").val().length;
				var username1_length = $("#fname").val().length;
				var phone_length = $("#phone").val().length;
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		
				if(username_length < 1) {
					alert("Last Name is mandatory");
					$("#sbt").attr("disabled", true);
				} else if ( username1_length == 0 ){ 
					$("#sbt").attr("disabled", true);
				} else {
					$("#sbt").attr("disabled", false);
				}
	
			}
			
			
			
			$("#sbt").click(function() {
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var phno = $("#phone").val();
				var emailid = $("#email").val();
				
				var msg = $("#comment").val();
				var id1 = "<?php echo $query; ?>";
				$("div#cstmm").load("userdetail.php",{
					fname: fname,
					lname: lname,
					email: emailid,
					phone: phno,
					message: msg,
					id: id1
					
				} );
								
			});
		});		
		
		
		
	
	</script>
	
	
<style>
.cstm1{
	margin-top: 30px;
	padding-bottom: 30px;
}
.cstm5 {
			background-color: #F6F4F4;
		  color: red;
		  padding: 7px 10px;
		  text-decoration: none;
		  text-transform: uppercase;
		  border-radius: 15px;
		  -webkit-transition-duration: 0.4s; /* Safari */
		  transition-duration: 0.4s;
		  cursor: pointer;
		}

		.one-edge-shadow {
			-webkit-box-shadow: 0 8px 6px -6px black;
			   -moz-box-shadow: 0 8px 6px -6px black;
					box-shadow: 0 8px 6px -6px black;
		}

		.cstm5:hover {
		  background-color: #555;
		  color: red;
		  
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

</style>


</head>
<body>
	
<div class="main-wrapper">

        <?php include("header.php")?>
            
        <div id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <h1>Adopter-  Information Form</h1>
                    </div>
					
					
                </div>
            </div>    	
        </div>

		<div class = "container" style="overflow:hidden;">
			<div class="row">
				<div class="span6"> 
					<div class="cstm1" style="font-size:15px;">
					<?php
		
				$sql = "SELECT  title, amount, image FROM main_book where Bid=$query";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo '<div> <strong> Adopted book: </strong>'.$row["title"].' </div> 
							<div> <strong>Price: </strong>$'.$row["amount"].' </div> <br>
							</div>
							<div id="content"> 
							<img src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" alt="" width="200px" height = "200px"> </img>
							</div>';							
							
						}
					}
						?>

				</div>
				
				
				
				
				
				
				<?php
				
				$sql1 = "SELECT adopt_status FROM main_book WHERE Bid = $query";
				$result = $conn->query($sql1);
				$row = $result->fetch_assoc();
				$b1 = $row["adopt_status"];
				
				if($b1 == 0) {
				
				echo '<div class="span6"> 
						<div class="cstm1" id="cstmm">
							<p style="color: red;">Please fill out all information</P> 
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
										<label style="display: inline-flex; padding-right: 83px">Email </label>
										<input type="text" class="span4" style="background:whitesmoke; color:black" id="email" name="email" >
									</div> 
									<div class="span8" style="margin-top:10px">
										<label style="display: inline-flex; padding-right: 77px">Phone </label>
										<input type="text" class="span4" style="background:whitesmoke; color:black" id="phone" name="phone" >
									</div> 
									<div class="span12" style="margin-top:10px">
										<label style="display: inline-flex; padding-right: 47px">Dedication</label>
										<p style="display: inline-block; color:red;">Dedications limit is 75 characters</P> </div>
										<div class="span12">
										<p style="margin-left: 122px; color:red; width:115px; display: inline-block;" id="chrs" class="span8"> Used Characters : </p> 
										<p style=" color:red; display: inline-block;" id="charNum">0 </p>
									</div>
										<div class="span12">
										<textarea style="margin-left: 122px; background:whitesmoke; color:black" class="span4"  rows="3" maxlength="75" id="comment" name="message" onkeyup="countChar(this)" ></textarea>
									</div> </form>
									<div class="span8" style="text-align: center; margin-top:30px;margin-bottom: 30px">
										<button id = "sbt"  disabled class="one-edge-shadow cstm5"> MAKE PAYMENT </button>
										
									</div> 
								
					</div>
				</div> ' ;
				}
				
				elseif($b1 == 1){
					
					echo '<div class="span6"> 
					<div class="cstm1" id="cstmm">
					<p style="color: red;">The Book is already Adopted. Please Look for another Book</P> 
								
					</div>
				</div> ' ;
					
				}
				
				else {
					
					echo '<div class="span6"> 
					<div class="cstm1" id="cstmm">
					<p style="color: red;">The Book is in Pending State. Someone already blocked the book</P> 
								
					</div>
				</div> ' ;
					
				}

?>







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