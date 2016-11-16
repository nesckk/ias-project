<?php
header('Content-Type: text/html; charset=utf-8');


$all_products_json = file_get_contents('http://localhost/ias/api.php?action=getAllProducts');
$top_products_json = file_get_contents('http://localhost/ias/api.php?action=getBestsellers');

$all_products = json_decode($all_products_json, true);
$top_products = json_decode($top_products_json, true);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>
							Prod-Integrator v 1.0.0 <small>Sprawdź od którego producenta możesz zamówić dany produkt</small>
						</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Nazwa
								</th>
								<th>
									Cena
								</th>
								<th>
									Ilość sztuk
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($all_products['allProducts']['p1'] as $product): ?>
								<tr>
									<td>
										<?php echo $product['product_name']; ?>
									</td>
									<td>
										<?php echo $product['product_price']; ?>
									</td>
									<td>
										<?php echo $product['product_qty']; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Nazwa
								</th>
								<th>
									Cena
								</th>
								<th>
									Ilość sztuk
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($all_products['allProducts']['p2'] as $product): ?>
								<tr>
									<td>
										<?php echo $product['product_name']; ?>
									</td>
									<td>
										<?php echo $product['product_price']; ?>
									</td>
									<td>
										<?php echo $product['product_qty']; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<!--              tabelka                   -->

			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Nazwa
								</th>
								<th>
									Cena
								</th>
								<th>
									Ilość sztuk
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($top_products['bestsellers']['p1'] as $product): ?>
								<tr>
									<td>
										<?php echo $product['product_name']; ?>
									</td>
									<td>
										<?php echo $product['product_price']; ?>
									</td>
									<td>
										<?php echo $product['product_qty']; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Nazwa
								</th>
								<th>
									Cena
								</th>
								<th>
									Ilość sztuk
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($top_products['bestsellers']['p2'] as $product): ?>
								<tr>
									<td>
										<?php echo $product['product_name']; ?>
									</td>
									<td>
										<?php echo $product['product_price']; ?>
									</td>
									<td>
										<?php echo $product['product_qty']; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>