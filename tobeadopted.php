<?php
	include 'dbh.php';
	if (isset($_GET["page"] )) 
        {
        $page_number  = $_GET["page"]; 
        } 
    else 
       {
        $page_number=1; 
       };  
	   
	   if (isset($_GET["library"] )) 
        {
        $select2  = $_GET["library"]; 
		if($select2=='Archives ')
			$select2 = 'Archives & Rare Books Library';
        } 
    else 
       {
        $select2="--ALL--"; 
       };  
	   if (isset($_GET["category"] )) 
        {
        $select1  = $_GET["category"]; 
        } 
    else 
       {
        $select1="--ALL--"; 
       };  
	   if (isset($_GET["title"] )) 
        {
        $select3  = $_GET["title"]; 
        } 
    else 
       {
        $select3=""; 
       };  
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
		
		
	<script>
		//jquery code to load contents dynamically without reloading
		
		$(document).ready(function() {
			var datacount = 0;
			var select1;
			var select2;
			var select3;
			var adopt_status = 0;
			
			
			$("#search").click(function() {
				datacount = 0;
				select1 = $("#s1 :selected").text();
				select2 = $("#s2 :selected").text();
				select3 = $("#s3").val();
				window.location.replace("http://libapps.libraries.uc.edu/adoptabook/tobeadopted.php?page=1&category="+select1+"&library="+select2+"&title="+select3+"");
			});
			
			});
				
		
	
	</script>
    
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->    
	
	
	<style>
		
	#next,#prev,#reset,#search {
	  background-color: white; 
	  border: none;
	  color:#4A70C5;
	  padding: 8px 14px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  margin: 4px 2px;
		border:thin solid black;
	  border-radius: 4px;
	  cursor: pointer;
	  -webkit-transition-duration: 0.4s; /* Safari */
	  transition-duration: 0.4s;
	}

	
	#next:hover:enabled {
	  box-shadow: 7px 4px 7px -3px rgba(0,0,0,0.35);
	   color: #4A70C5;
	  background-color: #FFF;
	}
	
	#prev:hover:enabled {
	  box-shadow: 7px 4px 7px -3px rgba(0,0,0,0.35);
	   color: #4A70C5;
	  background-color: #FFF;
	}
	
	#reset:hover{
	  box-shadow: 7px 4px 7px -3px rgba(0,0,0,0.35);
	   color: #4A70C5;
	  background-color: #FFF;
	}
	
	#search:hover{
	  box-shadow: 7px 4px 7px -3px rgba(0,0,0,0.35);
	  color: #4A70C5;
	  background-color: #FFF;
	}
	

	#next[disabled] {
		background: #cccccc;
		cursor: not-allowed;
	}
	
	#prev[disabled] {
		background: #cccccc;
		cursor: not-allowed;
	}
	
	.foot1 {
		text-align: center;
	}
	
	#mainselection select {
   border: 0;
   color: blue;
   
   font-size: 15px;
   font-weight: bold;
   padding: 3px 10px 1px 10px;
   width: 180px;
   
}

#mainselection {
   
   width:180px;
   
   -moz-border-radius: 2px 2px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 1px 1px 1px 1px;
   box-shadow: 1px 1px 3px #330033;
   background: white;
   height: 30px;
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
                        <h1>Books Available</h1>
                        
                    </div>
                </div>
            </div>    	
        </div>
        <div class="container">
	
					 <div class="row" style="margin-bottom: 30px;">
					
						<div class="span3"> <br> <h4><strong>Search By Category</strong></h4>
						<div id="mainselection">
								<select id = "s1" name="category1" style="background-color: white;">
								  <option value="any">--ALL--</option>
								  <option value="pf">Preserve For The Future</option>
								  <option value="bc">Build The Collection</option>
								</select> </div>
								</div>
								
						<div class="span3"> <br> <h4><strong>Search By Library</strong></h4>
						<div id="mainselection">
								<select id="s2" name="library" style="background-color: white;">
								  <option value="any">--ALL--</option>
								  <option value="arbl">Archives & Rare Books Library</option>
								  <option value="jmbcl">John Miller Burnam Classical Library</option>
								  <option value="ceasl">College of Engineering and Applied Science Library</option>
								  <option value="cecjhsl">College of Education, Criminal Justice, and Human Services Library</option>
								  <option value="rdksl">Robert A. Deshon and Karl J. Schlachter Library of Design, Architecture, Art, and Planning</option>
								  <option value="gmpl">Geology-Mathematics-Physics Library</option>
								  <option value="agml">Albino Gorno Memorial Library </option>
								  <option value="dhhsl">Donald C. Harrison Health Sciences Library</option>
								  <option value="rocbl">Ralph E. Oesper Chemistry-Biology Library</option>
								  <option value="hwchhp">Henry R. Winkler Center for the History of the Health Professions</option>
								</select> </div>
								</div>
						<div class="span3"> <br> <h4><strong>Search By Title</strong></h4>
						
								<input type="text" id="s3" class="span3" style="background-color:white;" name="search" > </div> 
								
						<div class="span3">  <br> <br>         
                    <div class="pagination pagination-centered">
                        <ul style="padding-top:10px;">
                            <li><button id="search" style="font-weight: bold;border: 1px solid #fff;border-radius: 12px; border: 1px solid;">Search</button></li>
                            <li><button id="reset" onclick="topFunction()" style="font-weight: bold;border: 1px solid #fff;border-radius: 12px; border: 1px solid;">Reset </button></li>
                        </ul>
                    </div>
                </div>
					
				  </div>

</div>  <br><br>
        <div class="container">
            <div class="row">
                <div class="clearfix"></div>
				<div id="content" class="light small uscontent sample1">
				
				<?php 
				
				$limit = 8;
				$record_index = ($page_number-1) * $limit;
				
				$adopt_status = '(0)';				
				
				//$sql = "SELECT  Bid, amount, title, author, category, library, image, foundation_link FROM main_book WHERE adopt_status IN (0,2) AND title LIKE '%$title%' AND category = '$category' AND library = '$library' LIMIT $record_index, $limit";
				
				
				if($select1=="--ALL--" && $select2 == "--ALL--" && $select3 == ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE adopt_status IN $adopt_status LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE adopt_status IN $adopt_status ";
					
				}
				elseif($select1!="--ALL--" && $select2 != "--ALL--" && $select3 != ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE title LIKE '%$select3%' AND category = '$select1' AND adopt_status IN $adopt_status AND library = '$select2' LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE title LIKE '%$select3%' AND category = '$select1' AND adopt_status IN $adopt_status AND library = '$select2' ";
					}
				elseif($select1=="--ALL--" && $select2 != "--ALL--" && $select3 != ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE title LIKE '%$select3%' AND adopt_status IN $adopt_status AND library = '$select2' LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE title LIKE '%$select3%' AND adopt_status IN $adopt_status AND library = '$select2' ";
					}
				elseif($select1!="--ALL--" && $select2 == "--ALL--" && $select3 != ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE title LIKE '%$select3%' AND category = '$select1' AND adopt_status IN $adopt_status LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE title LIKE '%$select3%' AND category = '$select1' AND adopt_status IN $adopt_status ";
					}
				elseif($select1!="--ALL--" && $select2 != "--ALL--" && $select3 == ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE  category = '$select1' AND adopt_status IN $adopt_status AND library = '$select2' LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE  category = '$select1' AND adopt_status IN $adopt_status AND library = '$select2' ";
					}
				elseif($select1=="--ALL--" && $select2 == "--ALL--" && $select3 != ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE title LIKE '%$select3%' AND adopt_status IN $adopt_status LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE title LIKE '%$select3%'  AND adopt_status IN $adopt_status ";
					}
				elseif($select1!="--ALL--" && $select2 == "--ALL--" && $select3 == ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE category = '$select1' AND adopt_status IN $adopt_status  LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE category = '$select1' AND adopt_status IN $adopt_status  ";
					}
				elseif($select1=="--ALL--" && $select2 != "--ALL--" && $select3 == ""){
					$sql = "SELECT  Bid, title, amount, author, image, category, library FROM main_book WHERE adopt_status IN $adopt_status AND library = '$select2' LIMIT $record_index, $limit";
					$sql1 = "SELECT  count(*) AS total_count FROM main_book WHERE adopt_status IN $adopt_status AND library = '$select2' ";
					}
				
				
				$result = $conn->query($sql);
				$count =0;
				
				//$sql1 = "SELECT  count(*) AS total_count from main_book WHERE adopt_status IN (0,2) AND title LIKE '%$title%' AND category = '$category' AND library = '$library'";
				$result1 = $conn->query($sql1);
				$row1 = $result1->fetch_assoc();
				$total_records =$row1["total_count"];
				
				$total_pages = ceil($total_records / $limit);  
				
				
				if ($result->num_rows > 0) 
				{
				// output data of each row
					while($row = $result->fetch_assoc()) 
					{
						$count = $count + 1;
						echo '
									<div class="container">
	
										 <div class="row">
										
											<div class="span3">
												<a href="/adoptabook/readmore.php?'.$row["Bid"].'">
													<img width="100px" height="40px" alt="" src="http://libapps.libraries.uc.edu/adoptabook/covers-thumb/'.$row["image"].'.jpg" class="max-image">
												</a>
											</div> 
											<div class="span9">
												<a href="/adoptabook/readmore.php?'.$row["Bid"].'"> <h3>'.$row["aab-number"].$row["title"].' </h3></a>
												<strong>Adoption Amount: </strong>$<span>'.$row["amount"].'</span> <br>
												<strong>Author: </strong><span>'.$row["author"].'</span> <br>
												<strong>Category: </strong><span>'.$row["category"].'</span> <br>
												<strong>Library: </strong><span>'.$row["library"].'</span> <br>
												<a href="readmore.php?'.$row["Bid"].'">Link to Read More</a>
											</div>
										
									  </div> <br> <br>

									</div>                        
								';
					}
				}
				
				else {
						echo "No books found. Modify your search criteria"; 
						echo '
						<script> 
								$(document).ready(function() {
									$("#next").attr("disabled", true);
								});	
						</script>
					';
						}
				
				if ($count < 8) 
				{
					echo '  
						<script> 
								$(document).ready(function() {
									$("#next").attr("disabled", true);
								});	
						</script>
					';
				}

				
				?>
				
                </div>
                <div class="span12">            
                    <div class="pagination pagination-centered">
                        <ul>
                            
							<?php
							
							$i=(ceil(($page_number/5))*5)-4;
							$j=0;
							$nxt = $page_number+1;
							$prv = $page_number -1;
							
							if($prv<=0)
								echo '
								<li><a href="#" id="prev" style="font-weight: bold;border: 2px solid #000;border-radius: 10px; pointer-events: none" disabled>Prev</a></li>
							';
							else
							echo '
								<li><a href="/adoptabook/tobeadopted.php?&page='.$prv.'&category='.$select1.'&library='.$select2.'&title='.$select3.'" id="prev" style="font-weight: bold;border: 2px solid #000;border-radius: 10px;background:#124f7c; color:white;" >Prev</a></li>
							';
								while($i<=$total_pages){
									if($i==$page_number)
										echo '
								<li><a href="/adoptabook/tobeadopted.php?&page='.$i.'&category='.$select1.'&library='.$select2.'&title='.$select3.'" id="prev" style="background:#E00122; color:white; font-weight: bold;border: 2px solid #000;border-radius: 10px;" >'.$i.'</a></li>
								';
								else 
								echo '
								<li><a href="/adoptabook/tobeadopted.php?&page='.$i.'&category='.$select1.'&library='.$select2.'&title='.$select3.'" id="prev" style="font-weight: bold;border: 2px solid #000;border-radius: 10px;" >'.$i.'</a></li>
								';
								$i++;
								$j++;
								if($j==5) break;
								}
								if($nxt<=$total_pages)
									echo '
									<li><a href="/adoptabook/tobeadopted.php?&page='.$nxt.'&category='.$select1.'&library='.$select2.'&title='.$select3.'" id="next" style="font-weight: bold;border: 2px solid #000;border-radius: 10px;background:#124f7c; color:white;" >Next</a></li>
								
								';
								else
								echo '
									<li><a href="#" id="next" style="font-weight: bold;border: 2px solid #000;border-radius: 10px; pointer-events: none;" disabled>Next</a></li>
								
								';

							?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
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
        <a href="#top"><i class="icon-angle-up"></i></a>
    </p>
	
	<script>
	function topFunction() 
	{
	window.location.replace("http://libapps.libraries.uc.edu/adoptabook/tobeadopted.php?page=1");
	}
	</script>
	
</body>
</html>