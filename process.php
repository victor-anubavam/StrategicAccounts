<?php
include_once('./includes/quickbase.php');
include_once('./includes/qbintegrations.php');
// Quickbase credentials
$usrName      = 'qb@metro.com';
$pwd          = 'vv05052012';
$appToken     = 'cwfcy7gdzqrsyncqbi2bn4u4kr';
$qbDomain     = 'intermetro';
$expTime      = '10'; //in minutes

$dbIdStart   = 'bismw2mug';
$dbIdProduct = 'bismxgjuk';
$dbIdUser    = 'bismw2mti';
$dbIdReqProd = 'bismxsqqc';


if(isset($_POST['_fid_7'])){
	$quickbase = new QuickBase($usrName, $pwd, true, $dbIdStart,$appToken, $qbDomain, $expTime);
	$qbReqProd = new QuickBase($usrName, $pwd, true, $dbIdReqProd,$appToken, $qbDomain, $expTime);
	$status = addStrategicAccountsManagement ($quickbase, $qbReqProd);
	echo ($status);
} else if ($_POST['type'] == 'getProduct') {
	$products = getProductList($usrName, $pwd, $dbIdProduct ,$appToken, $qbDomain, $expTime);
	echo json_encode($products);
} else if ($_POST['type'] == 'getProductDetails') {
	//echo $_POST['rid'];
	$productDetails = getProductDetails($_POST['rid'], $usrName, $pwd, $dbIdProduct ,$appToken, $qbDomain, $expTime);
	echo json_encode($productDetails);
}

?>
