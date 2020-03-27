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
			}
			session_unset();     // unset $_SESSION variable for this page
			session_destroy();   // destroy session data
		}
	}
	$_SESSION["cart"] = time(); // Update session
	if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["bid"] == $v["bid"]){
							$conn->query("UPDATE main_book SET adopt_status = 0 WHERE bid='" . $v["bid"] . "'");
							$conn->query("UPDATE main_book SET user_id = NULL WHERE bid='" . $v["bid"] . "'");
							unset($_SESSION["cart_item"][$k]);	
						}
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
					$conn->query("UPDATE main_book SET adopt_status = 0 WHERE bid='" . $v["bid"] . "'");
					$conn->query("UPDATE main_book SET user_id = NULL WHERE bid='" . $v["bid"] . "'");
			}
			}
			unset($_SESSION["cart_item"]);
		break;	
	}
}

?>
<!DOCTYPE html>
<HTML>
<HEAD>
	<?php include("title.php")?>
	<link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" class="alt" href="css/theme-uc.css">
	<link rel="stylesheet" href="assets/plugins/revolutionslider/css/settings.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
		
		<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114.png" />

<style>
.container1, .emptycarttext{
	text-align:center;
	font-size:18px;
	padding-bottom:10px;
}
.emptycartimg{
	display:block;
	margin: 0 auto;
}
.continue{
	color: #e00122;
}
.dedication{
	font-size:13px;
    width:84%;
}
.adopter{
	font-size:13px;
	width:84%;
}
label{
	font-size:13px;
	display: inline-block;
	width:14%;
}
.heading{
	color:#e00122;
	font-size:26px;
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
	
button {
	font-size: 17px;
}
</style>
<script type="text/javascript">
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
</HEAD>
<BODY>

<div class="main-wrapper">
<?php include("header.php")?>
<form method="post" action="/adoptabook/details.php">
<div id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <h2 class="heading">Adoption Cart</h2>
                        
                    </div>
                </div>
			</div>    	
</div>
<div id="adoption-cart">
<div class="container" style="padding-left:50px">
	<div class="row">
	<?php
	if(isset($_SESSION["cart_item"])){
		$total_price = 0;
		$nameoffield = 1;
		$name = 1;
		foreach ($_SESSION["cart_item"] as $item) { 
	?>
	<div class="container">
		<div class="row">		
			<div class="span1">
				<a href="/adoptabook/readmore.php?<?php echo $item["bid"]; ?>">
				<img width="100 px" height="70px" src="/adoptabook/covers-thumb/<?php echo $item["image"];?>.jpg" class="max-image">
				</a>
			</div> 
			<div class="span9">
				<div ><strong> <a href="/adoptabook/readmore.php?<?php echo $item["bid"]; ?>"><?php echo $item["title"]; ?></a></strong></div>
				<div><label><b>Recognition: </b></label><input type="text" name="adopter_name<?php echo $name++ ?>" class= "adopter" maxlength="75" placeholder="Please indicate your preferred name for the personalized bookplate. (optional)"/></div>
				<div><label><b>Dedication: </b></label></b><input type="text" name="dedication<?php echo $nameoffield++ ?>" class= "dedication" maxlength="75" placeholder="You may add a dedication message for this book. (optional) Max: 75 characters"/></div>
				<div class="btnRemoveAction" id="<?php echo $item["bid"]; ?>"><a style="color:#e00122" href="cart.php?action=remove&bid=<?php echo $item["bid"]; ?>" title="Remove from Cart"><img width="18px" height="18px" src="/adoptabook/images/trash.png">  Remove</a></div>
			</div>
			<div class="span2" align="right">
				<div class="product-price"><?php echo "$ ".number_format($item["amount"], 2); ?></div>
			</div>
										
		</div>
	<hr/>
	</div>  
	<?php
	$total_price += $item["amount"];
	} ?>
	</div>
	<div align="right" style="margin-right:10px";>
	<strong>Total: <?php echo "$ ".number_format($total_price, 2);?> </strong>
	</div>
	<?php } ?>
	
</div>


</div>
<?php
	if(!empty($_SESSION["cart_item"])){
	?>	
	<br/><br/>
	<div class="container1">
	<button type="button" id="sbt" onclick="if (confirm('Are you sure? Yes/No')) window.location.href='cart.php?action=empty'">Clear cart</button>
	<button type="button" id="sbt" onclick="window.location.href='/adoptabook/tobeadopted.php'" style="margin-left:50px;">Adopt more books</button>
	<button type="submit" id="sbt" type="submit" name="checkout" style="margin-left:50px;">Check out</button>	
	</div><br/><br/><br/>
	<div style = "text-align:center;position:absolute;width:100%">
	<?php include("footer.php")?>
	</div>
	<?php
	} 
	else {
	?>
	<div>
	<p class = "emptycarttext">The cart is empty.</p>
	<img class = "emptycartimg" width="23%" height="23%" alt="" src="/adoptabook/images/empty_cart.png"><br/>
	</div>
	<div align="center">
	<button type="button" id="sbt" onclick="window.location.href='/adoptabook/tobeadopted.php'">Adopt books</button>
	</div><br/><br/>
	<div style = "text-align:center;position:absolute;width:100%">
	<?php include("footer.php")?>
	</div>
	<?php } ?>
</form>
</div>

</BODY>
</HTML>