<?php


function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","",$inputText);
	return $inputText;
}

function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	//把標籤符號拿掉
	$inputText = str_replace(" ","",$inputText);
	//把第三格字串裡所有第一格東西換成第二格,這裡就是把空白拿掉
	$inputText = ucfirst(strtolower($inputText));
	//ucfirst("  ")首字轉大寫。strtolower(" ")轉小寫
	return $inputText;
}




if (isset($_POST['registerButton'])){
	// register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful=$account->register($username,$firstName,$lastName,$email,$email2,$password,$password2);
	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}

?>