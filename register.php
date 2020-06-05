
<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name){
	if(isset($_POST[$name])){
			echo$_POST[$name];
		}
	}
	//如果有錯誤的話，之前填過的會自動填進去
?>


<html>
  <head>

    <title>Welcome to JustMusic!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
  </head>
  <body>
  	<?php
  	
  	if(isset($_POST['registerButton'])) {
  	   echo '<script>
  		$(document).ready(function() {
			$("#loginForm").hide();
			$("#registerForm").show();
    });
    </script>';
    }
  	
  	else {
      echo '<script>
  		$(document).ready(function() {
			$("#loginForm").show();
			$("#registerForm").hide();
    });

  	</script>';
    }


  	?>

  	<div id="background">
  		<div id="loginContainer">
		    <div id="inputContainer">
			    <form id="loginForm" action="register.php" method="POST">
			    	<h2>會員登入</h2>
			    	<p>
			    		<?php echo $account->getError(Constants::$loginFailed);?>
			    		<label for="loginUsername">使用者名稱:</label>
			    		<input id="loginUsername" name="loginUsername" type="text" placeholder="輸入使用者名稱" value="<?php getInputValue('loginUsername') ?>" required>
			    	</p>
			    	<p>
			    		<label for="loginPassword">密碼:</label>
			    		<input id="loginPassword" name="loginPassword" type="Password" placeholder="輸入密碼"  required>
			    	</p>
			    	<button type="submit" name="loginButton">登入</button>
			    	<div class="hasAccountText">
			    		<span id="hideLogin">還沒有註冊嗎? 請按這裡</span>
			    	</div>
			    </form> 
		    



				 <form id="registerForm" action="register.php" method="POST">
				    	<h2>註冊免費的帳號</h2>
				    	<p>
				    		<?php echo $account->getError(Constants::$usernameCharacters);?>
				    		<?php echo $account->getError(Constants::$usernameTaken);?>
				    		<label for="username">使用者名稱</label>
				    		<input id="username" name="username" type="text" placeholder="輸入使用者名稱" value="<?php getInputValue('username') ?>"required>
				    	</p>
				    
				    	<p>
				    		<?php echo $account->getError(Constants::$lastNameCharacters);?>
				    		<label for="lastName">姓氏</label>
				    		<input id="lastName" name="lastName" type="text" placeholder="輸入姓氏" value="<?php getInputValue('lastName') ?>"  required>
				    	</p>

				    	<p>
				    		<?php echo $account->getError(Constants::$firstNameCharacters);?>
				    		<label for="firstName">名字</label>
				    		<input id="firstName" name="firstName" type="text" placeholder="輸入名稱" value="<?php getInputValue('firstName') ?>" required>
				    	</p>

				    	<p>
				    		<?php echo $account->getError(Constants::$emailsDoNotMatch);?>
				    		<?php echo $account->getError(Constants::$emailInvalid);?>
				    		<?php echo $account->getError(Constants::$emailTaken);?>
				    		<label for="email">Email</label>
				    		<input id="email" name="email" type="email" placeholder="bar@gmail.com" value="<?php getInputValue('email') ?>" required>
				    	</p>

				    	<p>
							<label for="email2">確認 email</label>
							<input id="email2" name="email2" type="email" placeholder="bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
						</p>
				    	<p>
				    		<?php echo $account->getError(Constants::$passwordsDoNoMatch);?>
				    		<?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
				    		<?php echo $account->getError(Constants::$passwordCharacters);?>
				    		<label for="password">密碼</label>
				    		<input id="password" name="password" type="password" placeholder="輸入密碼"  required>
				    	</p>
				    	<p>
				    		<label for="password2">確認密碼</label>
				    		<input id="password2" name="password2" type="password" placeholder="確認密碼" required>
				    	</p>
				    	<button type="submit" name="registerButton">註冊</button>
				    	<div class="hasAccountText">
			    		<span id="hideRegister">已經有帳號了嗎? 按這裡登入</span>
			    	</div>
				    </form> 
		    </div>
		    <div id="loginText">
		    	<h1>Just Music音樂串流平台</h1>
		    	<h2>免費收聽各種風格的歌曲</h2>
		    	<ul>
		    		<li>尋找你喜愛的音樂</li>
		    		<li>建立自己的播放清單</li>
		    		<li>追蹤喜愛歌手的最新資訊</li>
		    	</ul>
		    </div>
	    </div>
    </div>



  </body>
</html>