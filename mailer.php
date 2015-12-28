<?php require_once('include/db.class.php'); ob_start(); ?>
<?php require_once('include/phpMailer/PHPMailerAutoload.php'); ?>
<?php

					if(isset($_POST['email'])){
						$s=$_POST['email'];
						$check=$db->where("tbl_subscriber","s_email ='$s'");
						$db->num_rows_result($check);
							$row = $db->fetch_array($check);
							if($s==$row['s_email']){
								echo "Email Already Exist!! ";
							}
							else{
								$result = $db->query("INSERT INTO tbl_subscriber (s_email,s_status,s_actReq,s_active) VALUES('$s',0,NOW(),0000-00-00)");
								
					}

							
						
						
					}
				?>
<?php
	
	if(isset($s)&&($s!=$row['s_email'])){
		$result2 = $db->where("tbl_subscriber", "s_email = '$s'");
		if($db->num_rows_result($result2) !=Null){
			$row2 = $db->fetch_array($result2);
		$secret=1;
		$id=$row2['sid'];
		$hash = hash_hmac('sha256', $id, $secret);
?>


<?php


		$email = $_POST['email'];
		
		$mail = new PHPMailer;
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		$mail->Username = "your-email";
		$mail->Password = "your-password";
		$mail->SetFrom("your-email", "<name></name>");
		$mail->AddAddress($email, "Client");
		$mail->Subject = "Subscription";
		$mail->IsHTML(true);
		$body = '<style>a{color:red;}</style><div align="center">
				
					<table width="600" cellspacing="5" cellpadding="5" border="0" style="background:none repeat scroll 0% 0% #336666;border:1px solid rgb(102,102,102)">
						<tbody>
							<tr><img src="/test/logo.png" /></tr>
							<tr>
								<th style="background-color:rgb(206, 207, 208)"><b>The Wishing Trunk Boutique<b>.</th>
							</tr>
							<tr style="color: #fff;">
								<td style="text-align:left">
									Please <a href="http://www.amztco.com/test/verification.php?id='.$id.'&token='.$hash.'"><b>CLICK HERE</b></a> to get you notified about our latest offers..
								</td>
							</tr>
						</tbody>
					</table>
				</div>';
		$mail->MsgHTML($body);

		// echo $message;

		if (!$mail->Send()) {
			echo "Message Sending Fail Due to : " . $mail->ErrorInfo;
		}
		else {
			echo "Please check your email for subscribtion.";
		}
	}else{
		echo "out";
	}
}
?>