<?php 
/* 	
If you see this text in your browser, PHP is not configured correctly on this webhost. 
Contact your hosting provider regarding PHP configuration for your site.
*/

require_once('form_throttle.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	if (formthrottle_too_many_submissions($_SERVER["REMOTE_ADDR"]))
	{
		echo '{"MusePHPFormResponse": { "success": false,"error": "Too many recent submissions from this IP"}}';
	} 
	else 
	{
		emailFormSubmission();
	}
} 

function emailFormSubmission()
{
	$to = 'info@kyukatsu.com';
	$subject = 'ホーム フォーム の送信';
	
	$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/><title>' . htmlentities($subject,ENT_COMPAT | ENT_HTML401,'UTF-8') . '</title></head>';
	$message .= '<body style="background-color: #ffffff; color: #000000; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: 18px; font-family: helvetica, arial, verdana, sans-serif;">';
	$message .= '<h2 style="background-color: #eeeeee;">新規フォームの送信</h2><table cellspacing="0" cellpadding="0" width="100%" style="background-color: #ffffff;">'; 
	$message .= '<tr><td valign="top" style="background-color: #ffffff;"><b>名前:</b></td><td>' . htmlentities($_REQUEST["custom_U623"],ENT_COMPAT | ENT_HTML401,'UTF-8') . '</td></tr>';
	$message .= '<tr><td valign="top" style="background-color: #ffffff;"><b>電子メールアドレス:</b></td><td>' . htmlentities($_REQUEST["Email"],ENT_COMPAT | ENT_HTML401,'UTF-8') . '</td></tr>';

	$message .= '</table><br/><br/>';
	$message .= '<div style="background-color: #eeeeee; font-size: 10px; line-height: 11px;">Web サイトから送信されたフォーム : ' . htmlentities($_SERVER["SERVER_NAME"],ENT_COMPAT | ENT_HTML401,'UTF-8') . '</div>';
	$message .= '<div style="background-color: #eeeeee; font-size: 10px; line-height: 11px;">訪問者の IP アドレス : ' . htmlentities($_SERVER["REMOTE_ADDR"],ENT_COMPAT | ENT_HTML401,'UTF-8') . '</div>';
	$message .= '</body></html>';
	$message = cleanupMessage($message);
	
	$formEmail = cleanupEmail($_REQUEST['Email']);
	$headers = 'From:  info@kyukatsu.com' . "\r\n" . 'Reply-To: ' . $formEmail .  "\r\n" .'X-Mailer: Adobe Muse 6.0.751 with PHP/' . phpversion() . "\r\n" . 'Content-type: text/html; charset=utf-8' . "\r\n";
	
	$sent = @mail($to, $subject, $message, $headers);
	
	if($sent)
	{
		echo '{"FormResponse": { "success": true}}';

	}
	else
	{
		echo '{"MusePHPFormResponse": { "success": false,"error": "Failed to send email"}}';
	}
}

function cleanupEmail($email)
{
	$email = htmlentities($email,ENT_COMPAT | ENT_HTML401,'UTF-8');
	$email = preg_replace('=((<CR>|<LF>|0x0A/%0A|0x0D/%0D|\\n|\\r)\S).*=i', null, $email);
	return $email;
}

function cleanupMessage($message)
{
	$message = wordwrap($message, 70, "\r\n");
	return $message;
}
?>
