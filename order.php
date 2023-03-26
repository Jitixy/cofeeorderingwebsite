<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
	<style>
		img {
			max-width: 100%;
			height: auto;
		}
		.container {
			text-align: center;
		}
		.section {
			margin: 20px;
			padding: 20px;
			border: 1px solid #ccc;
			text-align: center;
			display: inline-block;
			width: calc(33.33% - 40px);
			vertical-align: top;
		}
		.cup-img {
			margin: 10px auto;
			width: 100%;
			max-width: 200px;
		}
		.extras-img {
			margin: 10px;
			width: 20px;
		}
	</style>
</head>
<body>
	<h1>Order Confirmation</h1>

<?php
	$numCoffee = $_POST['numCoffee'];
	$size = $_POST['size'];
	$creams = $_POST['creams'];
	$sugars = $_POST['sugars'];

	// Determine coffee name and price based on size
	if ($size == 0.5) {
		$coffeeName = 'Small';
		$coffeePrice = 1.99;
	} elseif ($size == 0.75) {
		$coffeeName = 'Medium';
		$coffeePrice = 2.49;
	} elseif ($size == 0.9) {
		$coffeeName = 'Large';
		$coffeePrice = 2.99;
	} elseif ($size == 1.0) {
		$coffeeName = 'Extra Large';
		$coffeePrice = 3.49;
	}

	for ($i = 1; $i <= $numCoffee; $i++) {
		// Add cream and sugar cost
		$creamPrice = 0.5 * $creams;
		$sugarPrice = 0.25 * $sugars;
		$totalCost = ($coffeePrice + $creamPrice + $sugarPrice);
		$totalCostWithTax = $totalCost * 1.13;

		// Display order details
		echo "<div class='container'>";
		echo "<div class='section'>";
		echo "<h2>Coffee #$i</h2>";
		echo "<p>You have ordered $coffeeName coffee with $creams cream(s) and $sugars sugar(s).</p>";

		// Display cup image for selected size
		echo "<img src='cup.jpg' alt='$coffeeName Coffee' class='cup-img' style='width: " . ($size * 200) . "px;'>";

		// Display cream and sugar images
		echo "<div>";
		if ($creams > 0) {
			echo str_repeat("<img src='cream.jpg' alt='Cream' class='extras-img'>", $creams);
		}
		if ($sugars > 0) {
			echo str_repeat("<img src='sugar.jpg' alt='Sugar' class='extras-img'>", $sugars);
		}
		echo "</div>";

		// Display total cost
		printf("<p>The total cost of your order is $%.2f (including tax).</p>", $totalCostWithTax);
		echo "</div>";
	}
?>
</body>
</html>
