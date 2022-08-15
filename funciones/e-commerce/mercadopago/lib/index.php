<?php
require_once ('mercadopago.php');

$mp = new MP('511810804293642', 'H63MtQOzSrNCH6JqIaswQ4EF4Zfi5r2w');
$preference_data = array(
	"items" => array(
		array(
			"title" => "Multicolor kite",
			"quantity" => 1,
			"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
			"unit_price" => 10.00
		)
	)
);

$preference = $mp->create_preference($preference_data);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pay</title>
	</head>
	<body>
		<a href="<?php echo $preference['response']['init_point']; ?>">Pay</a>
	</body>
</html>