<?php
  class Account{

  	private $con;
  	private $errorArray;
  	public function __construct($con){
  		$this->con = $con;//把private變public???
  		$this->errorArray=array();
  		//???
  	}
  	/// __construct 這個類別一旦宣告後就直接執行

  	public function login($un,$pw){
  		$pw = md5($pw);
  		$query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$un' AND password='$pw'");
  		if(mysqli_num_rows($query) == 1){
  			return true;
  		}
  		else{
  			array_push($this->errorArray,Constants::$loginFailed);
  			return false;
  		}
  	}

  	public function register($un,$fn,$ln,$em,$em2,$pw,$pw2){
  		$this->validateUsername($un);
  		$this->validateFirstName($fn);
  		$this->validateLastName($ln);
  		$this->validateEmails($em,$em2);
  		$this->validatePasswords($pw,$pw2);

  		if(empty($this->errorArray) == true) {
  			//Insert into db
  			return $this->insertUserDetails($un,$fn,$ln,$em,$pw);
  		}//$this->:代替物件名稱去呼叫一個方法???
  		else{
  			return false;
  		}
  		//如果errorArray是空的傳回insertUserDetails(),不是空的傳回false

  	}

  	public function getError($error){
  		if(!in_array($error,$this->errorArray)){
  			$error="";
  		}
  		return "<span class='errorMessage'>$error</span>";

  	}
  	private function insertUserDetails($un,$fn,$ln,$em,$pw){
  		$encryptedPw = md5($pw);//encrypted加密的
  		$profilePic = "assets/images/profile-pics/head_emerald.png";//???
  		$date = date("Y-m-d");
  		$result =mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profile-Pic') ");
  		return $result;

  	}
  	//告知使用者錯誤(特定錯誤$error已存在array裡)，如果不存在某特定錯誤$error,$error變空白($error不在array裡)

  	private function validateUsername($un){
  		if(strlen($un) > 25 || strlen($un) < 5){
  			array_push($this->errorArray, Constants::$usernameCharacters);
  			return;
  		}
  		//strlen字串長度
  		$checkUsernameQuery = mysqli_query($this->con,"SELECT username FROM users WHERE username='$un'");
  		if(mysqli_num_rows($checkUsernameQuery) != 0){
  			array_push($this->errorArray,Constants::$usernameTaken);
  			return;
  		}
  		//檢查username有無重複使用

  	}

  	
  		private function validateFirstName($fn){
  			if(strlen($fn) > 25 || strlen($fn) < 2){
  			array_push($this->errorArray, Constants::$firstNameCharacters);
  			return;

  		}}
  		private function validateLastName($ln){
  			if(strlen($ln) > 25 || strlen($ln) < 2){
  			array_push($this->errorArray, Constants::$lastNameCharacters);
  			return;

  		}}
  		private function validateEmails($em,$em2){
  			if($em != $em2){
  				array_push($this->errorArray,Constants::$emailsDoNotMatch);
  			return;
  			}
  			if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
  				array_push($this->errorArray,Constants::$emailInvalid);
  				return;
  			}
  			//FILTER_SANITIZE_EMAIL:過濾e-mail，刪除e-mail格式不該出現的字元。
  			//FILTER_VALIDATE_EMAIL:e-mail驗證,比之前的type:email更嚴謹

  		$checkEmailQuery = mysqli_query($this->con,"SELECT email FROM users WHERE email='$em'");
  		if(mysqli_num_rows($checkEmailQuery) != 0){
  			array_push($this->errorArray,Constants::$emailTaken);
  			return;
  		}
  		
  		}
  		private function validatePasswords($pw,$pw2){
  			if($pw != $pw2){
  				array_push($this->errorArray,Constants::$passwordsDoNoMatch);
  			return;
  			}
  			if(preg_match('/[^A-Za-z0-9]/',$pw)){
  				array_push($this->errorArray,Constants::$passwordNotAlphanumeric);
  				return;
  			}
  			//[]:包含。 [^  ]:不包含。[^A-Za-z0-9]不包含 A-Z,a-z,0-9
  			
  			if(strlen($pw) > 30 || strlen($pw) < 5){
  			array_push($this->errorArray,Constants::$passwordCharacters);
  			return;
  		}
  		//密碼需要做三個確認,如果第一個檢查沒通過，就不會做第二、三個檢查，因為會直接return

  		}
  }