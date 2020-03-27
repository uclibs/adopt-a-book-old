<?php
	include 'dbh.php';
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
	$session_items = 0;
	if(!empty($_SESSION["cart_item"])){
		$session_items = count($_SESSION["cart_item"]);
	}	
?>
<header>
        	<div class="header-top" style="/* height: 100px; */padding: 0px;">
                <div class="container">
                    <div class="row">
                        <div class="span6">
						<img src="images/uclogo.png" alt="" style="height: 50px;">
						</div>
						<div class="span6 text-right" style="color: white; padding-top: 20px; text-align: right; font-size: 25px;">
						<p>LIBRARIES</p>
						</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
			<div class="container">
                <div class="row">   
                    <div class="span3">
                    	<div class="logo">
						
                        	<a href="index.php"><img src="images/logo.png" alt="Adopt A Book Logo"></a>
                        </div>
                    </div>
                    <div class="span8">
                        <!-- Main Navigation -->
       
        <?php include("dropdown.php")?><!-- END Main Navigation -->
                    </div>
					<div class="span1">
					<a style="display:block;margin-top:12px" href="/adoptabook/cart.php">
					<img style="max-width:50%" src="/adoptabook/images/cart.png">
					<?php 
					if ($session_items != 0) { ?>
					<button style="border-radius: 12px; background-color:white; border:none;margin-top:-28px;margin-left:-7px;"><?php echo $session_items; ?></button>
					<?php } ?>
					</a>
					</div>
                </div>
				</div>
        </header>