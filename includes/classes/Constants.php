<?php
class Constants {
	public static $passwordsDoNoMatch = "確認密碼不相同";
	public static $passwordNotAlphanumeric = "密碼只能包含數字和英文字母!";
	public static $passwordCharacters = "密碼長度5~30字";
	public static $emailInvalid = "無效的Email!";
	public static $emailsDoNotMatch = "確認email不相同!";
	public static $emailTaken = "email已經被使用!";
	public static $lastNameCharacters = "你的名字長度限制為10字";
	public static $firstNameCharacters = "你的姓氏長度限制為10字";
	public static $usernameCharacters = "你的帳號長度限制為2~25字";
	public static $usernameTaken = "使用者名稱已經被使用過了!";
	
	public static $loginFailed = "你的帳號或密碼錯誤";

}
//static 不用 create instance(實體化)，且呼叫時是用::,不是用->
//Alphanumeric 包含字母和數字的