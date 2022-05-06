<?php
include 'dbh.php';
if(!isset($_SESSION)){
            session_start();
        $inactive = 1800; //time for expiration
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
				//function get_string_between($string, $start, $end){
				//	$string = ' ' . $string;
				//	$ini = strpos($string, $start);
				//	if ($ini == 0) return '';
				//	$ini += strlen($start);
				//	$len = strpos($string, $end, $ini) - $ini;
				//	return substr($string, $ini, $len);
				//}
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email_user = $_POST['email'];
				$phone = $_POST['phone'];
				//date_default_timezone_set('EDT');
				$date = date("l jS \of F Y h:i:s A");
				$total_price = 0;
				$email_admin = "bernarct@ucmail.uc.edu";
				$b1 = array();
				$title = array();
				$id = array();
				if(isset($_SESSION["cart_item"])){
					foreach ($_SESSION["cart_item"] as $item) {
						$id[] = $item["bid"];
						$sql1 = "SELECT adopt_status, title FROM main_book WHERE Bid='" . $item["bid"] . "'";
						$result = $conn->query($sql1);
						$row = $result->fetch_assoc();
						$b1[] = $row["adopt_status"];
						$title[] = $item["title"];
						$sql = "UPDATE main_book SET adopt_status = 2, adopter_recognition = '" . $item["name"] . "', adopter_ded = '" . $item["dedication"] . "', adopter_fname = '$fname', adopter_lname = '$lname', adopter_email = '$email_user' , adopter_phone = '$phone', adopt_date = '$date' WHERE Bid='" . $item["bid"] . "'";
						$conn->query($sql);
						$total_price += $item["amount"];
					}
				}
				$foundation_link = "https://foundation.uc.edu/give/hidden-treasures?amount=" . (string)$total_price;
				$message_user = "Thank you for adopting book(s) from UC Libraries!  Your pre-order is complete.
You will also receive a confirmation email from the UC Foundation, by the sender 'JotForm ucfoundation1@uc.edu' after your payment is complete. It is possible for the confirmation email to land in your junk/spam folder.\n
If you have any questions, please contact Christa Bernardo at +1(513)-556-0055 or bernarct@foundation.uc.edu.";
				$headers_user = "From: Christa Bernardo <bernarct@ucmail.uc.edu>\r\nAdopt-a-book program by University of Cincinnati Libraries";
				$subject_user = "UC Libraries Adopt-A-Book confirmation";
				$headers_admin = "Hi Christa,
	Hope you are having a great day!!
	We received an order through 'Adopt-a-book' program.";
				$message_admin = "	Number of books: '" .count($_SESSION["cart_item"]). "'
	Book Title(s):  '". implode(",\n\t\t\t\t",$title). "' 
	Book_ID(s):  '". implode(", ",$id). "'						   
	Customer name:  '".$fname." " .$lname."'
	Customer email:	'".$email_user."'
	Customer Phone:	'".$phone."'.
	
	Please track the adoption process and change the adopt_status to '1' once the payment is done.	
Thank you. " ;
				$subject_admin = "Adopted Book PRE-ORDER";
				if (!in_array("1", $b1) || !in_array("2", $b1)) 
				{ 
								mail($email_user,$subject_user,$message_user,$headers_user);
								mail($email_admin,$subject_admin,$message_admin,$headers_admin);
								echo ' <script> alert("Thank you. Click OK to be redirected to the payment page where you will be asked to enter your billing details.") </script>'; 
				

echo '<html>
<head>
<script>
window.location.href = "'.$foundation_link.'";
</script>
<head>
<body></body>
</html>';
				}	
				else {
					echo 'Invalid request';
				}
				if (isset($_SESSION["cart"])) {
            session_unset();     // unset $_SESSION variable for this page
            session_destroy();   // destroy session data
        }

?>