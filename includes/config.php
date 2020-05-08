<?php
ob_start();//打開緩衝區???(先把一些資料放在伺服器直到資料齊全再一起送出
session_start();//開啟session,可以存跨頁的變數,Session 的功能與 Cookie 很類似，不同的地方在於 session 是儲存在伺服器端的檔案。
$timmezone = date_default_timezone_set("Asia/Taipei");
$con = mysqli_connect("localhost","root","1qaz@wsx","slotify");
if ($con) {
    mysqli_query($con, 'set names utf8mb4');
    mysqli_query($con, 'set character_set_client=utf8mb4');
    mysqli_query($con, 'set character_set_results=utf8mb4');
}

if(mysqli_connect_errno()){
	echo "Failed to connect:". mysqli_connect_errno();
}//errno 把錯誤碼放在裡面

  ?>