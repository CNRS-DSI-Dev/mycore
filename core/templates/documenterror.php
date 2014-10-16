<?php
$id = $_GET['id'];
if(!isset($_)) {//also provide standalone error page
	require_once '../../../../lib/base.php';
	
	$tmpl = new OC_Template( '', $id, 'guest' );
	$tmpl->printPage();
	exit;
}
?>
