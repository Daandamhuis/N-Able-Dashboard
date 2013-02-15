<?php

include('../class/nusoap/nusoap.php');

include('../class/nable.class.php');

$nable = new nable();

if(($_POST['action'] == 'Issues') && (!empty($_POST['customer']))) {
	$array = $nable->get_issues(array('customer_id' => $_POST['customer']));
}

if(($_POST['action'] == 'Customers')) {
	$array = $nable->get_customer_list(array('customer_id' => '100'));
        file_put_contents('spool.php', json_encode($array));
}

if(!isset($_POST['action'])) {
	$array = array(
			'error' => true,
			'type' => 'Action is not defined or present'
		);
}

echo json_encode($array);

?>

