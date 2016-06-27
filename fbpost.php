<?php

include_once('IXR_Library.php');

class post {

	function __construct() {
		$this->post();
	}

	function post() {
		$appId = 'APPID';
		$secret = 'APPSECRET';
		$filename = "token.txt";
		$fp = fopen($filename, "r");
		$acc = fread( $fp, filesize($filename) );
		fclose($fp);

		$access_token = $acc;

		$post_fb = $_POST['post_content2'];
		$post_fb .= "\n";
		$post_fb .= $post_title;
		$post_fb .= "\n";
		$post_fb .= 'http://exmaple.com/?p=' .$post_id;

		// Read SDK
		require 'src/facebook.php';

		$facebook = new Facebook(array('appId' => $appId, 'secret' => $secret));

		$facebook->api('/me/feed/', 'POST', array('access_token' => $access_token, 'message' => $post_fb));
		header('location: http://exmaple.com/post_form.php');
	}

}
$post = new post;
?>
