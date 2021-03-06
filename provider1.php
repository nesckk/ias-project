<?php

header('Content-Type: application/json; charset=utf-8');


$pdo = new PDO('mysql:host=localhost;dbname=InditexPoland', 'root', 'ubuntu');
$pdo->exec("set names utf8");

$return = array();
$action = (isset($_REQUEST['todo'])) ? $_REQUEST['todo'] : '';

switch ($action) {
	case'getAllProducts': {
			$products = $pdo->query('SELECT * FROM `Produkty`');

			foreach ($products as $product) {
				$return[] = array(
					'product_name' => $product['nazwa'],
					'product_producer' => $product['producent'],
					'product_price' => $product['cena'],
					'product_qty' => $product['dostepnosc'],
				);
			}

			break;
		}
	case'getBestsellers': {
			$products = $pdo->query('SELECT * FROM `Produkty` ORDER BY `dostepnosc` DESC LIMIT 3');

			foreach ($products as $product) {
				$return[] = array(
					'product_name' => $product['nazwa'],
					'product_producer' => $product['producent'],
					'product_price' => $product['cena'],
					'product_qty' => $product['dostepnosc'],
				);
			}

			break;
		}
	default: {
			$return = array('brak zdefiniowanego todo');
			break;
		}
}

echo json_encode($return);
