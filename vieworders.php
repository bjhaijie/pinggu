<?php
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
	<head>
		<title>Bob 's Auto Parts - Customer Orders</title>
	</head>
	<body>
		<h1>Bob 's Auto Parts</h1>
		<h2>Customer Orders</h2>
	
		<?php
			
			if (!file_exists("$DOCUMENT_ROOT/../orders/orders.txt")){
				echo "<p><strong>There are currently no order.txt</srtong></p>";
			}
			
			
			echo "file size: ".filesize("$DOCUMENT_ROOT/../orders/orders.txt")."<br />";
			$fp = @ fopen("$DOCUMENT_ROOT/../orders/orders.txt",'rb');
			
			//echo nl2br(fread($fp ,filesize("$DOCUMENT_ROOT/../orders/orders.txt")));
			
			if (!$fp) {
				echo "<p><strong>No orders pending . Please try again later.</strong></p>";
				exit;
			}
			
			while (!feof($fp)){
				$order = fgets($fp,999);
				echo $order."<br />";
			}
			
			
			
			
			fclose($fp);
		?>
	</body>
</html>