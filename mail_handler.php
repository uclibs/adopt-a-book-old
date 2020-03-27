<?php 
//if(isset($_POST['submit'])){
    $to = "bernarct@ucmail.uc.edu"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message']. "\n\n The given Phone number is:" . $_POST['phone'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
	echo '<html>
<head>
<script>
window.location.href = "index.php";
</script>
<head>
<body>
<p style='margin: auto;text-align: center;color: red;font-size: large;font-variant-caps: petite-caps;'>Mail Sent. Thank you " . $first_name . ", we will contact you shortly.</p><br>
</body>
</html>';
    //echo "<p style='margin: auto;text-align: center;color: red;font-size: large;font-variant-caps: petite-caps;'>Mail Sent. Thank you " . $first_name . ", we will contact you shortly.</p><br>";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    //}
	
	//echo '<a href="index.php">Home Page </a>'
?>

