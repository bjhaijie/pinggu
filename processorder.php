<?php
	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$address = $_POST['address'];
	$date= date('H:i,JS F Y');
	
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	//echo $DOCUMENT_ROOT;
	

?>
<html>
	<head>
		<title>Bob 's Auto Parts - Order Results</title>
	</head>
	<body>
		<h1>Bob 's Auto Parts</h1>
		<h2>Order Resultes</h2>
		<?php
			
			echo '<p>Order processed.</p>';
			echo "<p>Order processed at " . date('H:i,jS F Y')."</p>";
			echo '<p>Your order is as follows : </p> ';
			echo $tireqty .' tires<br />';
			echo $oilqty .' bottles of oil<br />';
			echo $sparkqty .' spark plugs<br />';
			
			$totalqty = 0;
			$totalqty = $tireqty + $oilqty + $sparkqty;
			echo "Items ordered: " .$totalqty."<br />";
			

			$totalamount = 0.00;
			define('TIREPRICE',100);
			define('OILPRICE',10);
			define('SPARKPRICE',4);
			
			$totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
			
			echo 'Subtotal: $'.number_format($totalamount,2).'<br />';
			
			$taxrate = 0.10; //local sales tax is 10%
			$totalamount = $totalamount * (1 + $taxrate);
			echo 'Total including tax: $'.number_format($totalamount,2).'<br /><br />';
			
			$totalamount = number_format($totalamount,2,'.','');
			echo "<p>Total of order is $".$totalamount."</p>";
			echo "<p>Address to ship to is ".$address."</p>";
			
			if ($totalqty == 0) {
				echo '<p style="color:red">';
				echo 'You did not order anything on the previous page! <br /> <br />';
				echo '</p>';
			} else {
				if ($tireqty > 0 )
					echo $tireqty.' tires<br />';
				if ($oilqty > 0 )
					echo $oilqty.' oil<br />';
				if ($sparkqty > 0 )
					echo $sparkqty.' spark plugs<br />';
			}
			
			/*echo 'isset($tireqty):'.isset($tireqty).'<br />';
			echo 'isset($nothere):'.isset($nothere).'<br />';
			echo 'empty($tireqty):'.empty($tireqty).'<br />';
			echo 'empty($nothere):'.empty($nothere).'<br />';
			*/
			
			$outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil \t".$sparkqty." spark plugs \t\$".$totalamount."\t".$address."\r\n";
			
			$fp = @fopen("$DOCUMENT_ROOT/../orders/orders.txt",'ab');
			
			flock($fp,LOCK_EX);
			
			if (!$fp){
				echo "<p><strong>Your order could not be processed at this time.</strong></p></body></html>";
				exit;
			}
			fwrite($fp,$outputstring,strlen($outputstring));
			flock($fp,LOCK_UN);
			fclose($fp);
			
			echo "<p>Order written.</p>";
		?>
	</body>
</html>