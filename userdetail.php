<?php


include 'dbh.php';
				
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email_user = $_POST['email'];
				$phone = $_POST['phone'];
				$dedication = $_POST['message'];
				$id = $_POST['id'];
				$date = date("l jS \of F Y h:i:s A");
				
				$email_admin = "christa.bernardo@uc.edu";
				$sql1 = "SELECT adopt_status, title, foundation_link FROM main_book WHERE Bid = $id";
				$result = $conn->query($sql1);
				$row = $result->fetch_assoc();
				$b1 = $row["adopt_status"];
				//$sql = "INSERT INTO main_book (adopter_fname, adopter_lname, adopter_email, adopter_phone, adopter_ded) VALUES ('$fname', '$lname', '$email', '$phone', '$dedication') WHERE Bid = $id";
				$sql = "UPDATE main_book SET adopt_status = 2, adopter_fname = '$fname', adopter_lname = '$lname', adopter_email = '$email' , adopter_phone = '$phone', adopter_ded = '$dedication', adopt_date = '$date' WHERE Bid = $id";
				$message_user = " Thank you for adopting a book from UC Libraries! Your adopted book pre-order has been successfully completed.
If you have not done the payment, please use this link to complete payment. " .$row["foundation_link"] ;
				$headers_user = "Adopt-a-book program by University of Cincinnati Libraries";
				$subject_user = "No-Reply from UC Libraries";
				
				$headers_admin = "Hi Christa,
	Hope you are having a great day!!
	We received an order for a book through 'Adopt-a-book' program.";
				$message_admin = "	
	Book Title: '" .$row["title"]. "' 
	Book_ID:  '".$id."' 
	Customer name:  '".$fname." " .$lname."'.
    Please track the adoption process and change the adopt_status to '1' once the payment is done.	
Thank you. " ;
				$subject_admin = "Adopted Book PRE-ORDER";
				
				if ($b1 == 0){
				if (mysqli_query($conn, $sql)) 
				{
						//echo "Click the Below Link to Adopt the book";
						//echo '<div class="span10" style="text-align: center; margin-top:30px;margin-bottom: 30px">
										//<a href="https://foundation.uc.edu/give" class="one-edge-shadow cstm5">ADOPT</a>
								//	</div> ';
								mail($email_user,$subject_user,$message_user,$headers_user);
								mail($email_admin,$subject_admin,$message_admin,$headers_admin);
								echo ' <script> alert("Details added successfully. You will be redirected to the payment page") </script>';
				} else 
					{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}

					mysqli_close($conn);
				
				


echo '<html>
<head>
<script>
window.location.href = "'.$row["foundation_link"].'";
</script>
<head>
<body></body>
</html>';
				}
				else {
					echo 'Invalid request';
				}
?>