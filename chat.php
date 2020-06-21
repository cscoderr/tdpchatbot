<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$postid = $_POST['pssid'] ? $_POST['pssid'] : "";
	$msg = $_POST['msg'] ? $_POST['msg'] : "";
	$msg_id = $_POST['msgid'] ? $_POST['msgid'] : "";
	if ($postid == "kjkjw838a3a839a0a") {
		if (!empty($msg)) {
			if($msg_id == 0) {
				$_SESSION['name'] = $msg;
				$res = 'Hello '.$msg.' nice to meet you, <b>where are you from?</b>';
				exit(json_encode(['msg' => $res, 'k' => 1]));
			} else if($msg_id == 1) {
				$_SESSION['state'] = $msg;
				$res = $msg.' is a really cool place, <b>how old are you?</b>';
				exit(json_encode(['msg' => $res, 'k' => 2]));
			} else if($msg_id == 2) {
				$_SESSION['age'] = $msg;
				$res = 'Wow, <b>You are on what track?</b>';
				exit(json_encode(['msg' => $res, 'k' => 3]));
			} else if($msg_id == 3) {
				$_SESSION['track'] = $msg;
				$res = 'Awesome, <b>I will be glad to know your stage too</b>';
				exit(json_encode(['msg' => $res, 'k' => 4]));
			} else if($msg_id == 4) {
				$_SESSION['stage'] = $msg;
				$res = 'Wow, one more question, what\'s your HNGi7 ID<b></b>';
				exit(json_encode(['msg' => $res, 'k' => 5]));
			} else if($msg_id == 5){
				$_SESSION['id'] = $msg;
				$res = "Thank you for your response 	" . $_SESSION['name'].", Here's what i know about you <br> Your name is ". $_SESSION['name'].", <br> Your are ".$_SESSION['age']." years old<br> You are from ".$_SESSION['state']." state <br> Your id is HNG ID". $_SESSION['id'].", <br>Your track is".$_SESSION['track']."<br> You are, currently on " . $_SESSION['stage'];
				exit(json_encode(['msg' => $res, 'k' => 6]));
			} else {
				$res = 'Thank you for using tommydprogrammer chatbot';
				exit(json_encode(['msg' => $res, 'k' => 6]));
			}
		}
	}
}

?>