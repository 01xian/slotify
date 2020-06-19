<?php
include("../../config.php");

if(!isset($_POST['username'])) {
	echo "ERROR: Could not set username";
	exit();
}


if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])){
	echo "請輸入所有欄位";
	exit();
}


if($_POST['oldPassword'] == "" || $_POST['newPassword1'] == "" || $_POST['newPassword2'] == ""){
	echo "不能有空格唷!";
	exit();
}

$username = $_POST['username'];
$oldPassword = $_POST['oldPassword'];
$newPassword1 = $_POST['newPassword1'];
$newPassword2 = $_POST['newPassword2'];
$oldMd5 = md5($oldPassword);
$passwordCheck = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password ='$oldMd5'");

if(mysqli_num_rows($passwordCheck) != 1) {
	echo "密碼錯誤";
	exit();
}

if($newPassword1 != $newPassword2) {
	echo "兩次密碼不相同";
	exit();
}

if(preg_match('/[^A-Za-z0-9]/', $newPassword1) ){
	echo "密碼只能有英文字母和數字";
	exit();
}

if(strlen($newPassword1) > 30 || strlen($newPassword1) < 5 ) {
	echo "密碼長度5~30";
	exit();
}

$newMd5 = md5($newPassword1);
$query = mysqli_query($con, "UPDATE users SET password='$newMd5' WHERE username = '$username'");
echo "更新成功";






?>