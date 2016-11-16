<?php

header('Content-Type: text/html; charset=utf-8');
include 'functions.php';

$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

switch ($action) {
	case'getAllProducts': {
			$products_1_json = file_get_contents('http://localhost/ias/provider1.php?todo=getAllProducts');
			$products_2_json = file_get_contents('http://localhost/ias/provider2.php?act=getListAll');

			$return['allProducts']['p1'] = json_decode($products_1_json, true);
			$return['allProducts']['p2'] = json_decode($products_2_json, true);
			break;
		}
	case'getBestsellers': {
			$best_products_1 = file_get_contents('http://localhost/ias/provider1.php?todo=getBestsellers');
			$best_products_2 = file_get_contents('http://localhost/ias/provider2.php?act=getListTop');

			$return['bestsellers']['p1'] = json_decode($best_products_1, true);
			$return['bestsellers']['p2'] = json_decode($best_products_2, true);
			break;
		}
	default: {
			$return = array('brak zdefiniowanej akcji');

			break;
		}
}

echo json_encode($return);
