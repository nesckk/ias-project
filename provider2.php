<?php

header('Content-Type: text/html; charset=utf-8');

include 'functions.php';

$pdo = new PDO('mysql:host=localhost;dbname=InditexWorldwide', 'root', 'ubuntu');
$pdo->exec("set names utf8");

$return = array();
$action = (isset($_REQUEST['act'])) ? $_REQUEST['act'] : '';

switch ($action) {
	case'getListAll': {
			$stmt = $pdo->query('SELECT * FROM `Products`');

			foreach ($stmt as $product) {
				$return[] = array(
					'product_name' => $product['name'],
					'product_producer' => $product['producer'],
					'product_price' => $product['price'],
					'product_qty' => $product['availability'],
				);
			}

			break;
		}
	case'getListTop': {
			$stmt = $pdo->query('SELECT * FROM `Products` ORDER BY `availability` DESC LIMIT 3');

			foreach ($stmt as $product) {
				$return[] = array(
					'product_name' => $product['name'],
					'product_producer' => $product['producer'],
					'product_price' => $product['price'],
					'product_qty' => $product['availability'],
				);
			}

			break;
		}
	default: {
			$return = 'brak zdefiniowanego act';
			break;
		}
}

echo json_encode($return);
