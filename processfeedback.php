<?php
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$feedback = addslashes(trim($_POST['feedback']));
	
	$email_array = explode('@',$email);
	print_r($email_array);
	echo "<br />";
	echo $new_email = implode('@',$email_array);
	echo "<br />";
	if (strtolower($email_array['1']) == "bigcustomer.com"){
		$toaddress = "bob@example.com";
	}else{
		$toaddress = "feedback@example.com";
	}
	//$toaddress = "feedback@example.com";
	
	$subject = "Feedback from web site";
	
	$mailcontent = "Custemer name:".$name."\n"."Custemer email:".$email."\n"."Custemer feebback:\n".$feedback."\n";
	
	$fromaddress = "From : webserver@example.com";
	
	echo $toaddress."<br />".$subject."<br />".$mailcontent."<br />".$fromaddress;
	//mail($toaddress,$subject,$mailcontent,$fromaddress);
?>


<html>
	<head>
		<title>Bob 's Auto Parts - Feedback Submitted</title>
	</head>
	<body>
		<h1>Feedback submitted</h1>
		<p>Your feedback has been sent.</p>
		<?php echo nl2br($mailcontent); ?>
	</body>
</html>