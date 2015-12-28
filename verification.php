<?php require_once('include/db.class.php'); ob_start(); ?>
<?php
	$secret = 1;
	$id = $_REQUEST["id"]; 
	$hash=hash_hmac('sha256', $id, $secret);
	if ($hash == $_REQUEST["token"]) {
		$result = $db->query("UPDATE `tbl_subscriber` SET `Sub_Status` = 1,`Sub_ST`=NOW() WHERE `Sub_ID`=$id");
			echo "<p>Successfully Subscibed!!</p>";
			echo '<meta http-equiv="refresh" content="1; url= http://www.amztco.com/test/index.php" />';
	
}
?>