<?php
	$number = range(1,10);
	print_r($number);//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 7 [7] => 8 [8] => 9 [9] => 10 ) 
	echo "<br />";
	$products = array('Tires','Oil','Spark Plugs');
	print_r($products);//Array ( [0] => Tires [1] => Oil [2] => Spark Plugs )
	echo "<br />";
	for($i =0 ; $i<count($products);$i++){
		echo $products[$i]." ";
	}
	echo "<br />";
	
	foreach ($products as $arr){
		echo $arr." ";
	}
	echo "<br />";
	
	$prices = array('Tires'=>100,'Oil'=>10,'Spark Plugs'=>4);
	foreach ($prices as $key =>$value){
		echo $key.":".$value."<br />";
	}
	
	echo "<br />";
	reset($prices);
	while(list($product,$price) = each($prices)){
		echo "$product - $price <br />";
	}
	
	$products = array(array('TIR','Tires',100),array('OIL','Oil',10),array('SPK','Spark Plugs',4));
	
	echo $products[0][0].'<br /><br />';
	
	for ($row = 0;$row < 3 ;$row++){
		for ($column =0 ; $column < 3 ; $column++){
			echo '|'.$products[$row][$column];
		}
		echo "<br />";
	}
	
	
	$pictures = array('tire.jpg','oil.jpg','spark_plug.jpg','door.jpg','steering_wheel.jpg','thermostat.jpg','wiper_blade.jpg','gasket.jpg','brake_pad.jpg');
	shuffle($pictures);
	print_r($pictures);
	echo '<br /><br />';
	
	for ($i = 0 ; $i < 3 ; $i++){
		echo $pictures[$i].' ';
	}
	echo '<br /><br />';
	
	$numbers = range(1,20);
	$numbers = array_reverse($numbers);
	print_r($numbers);
?>