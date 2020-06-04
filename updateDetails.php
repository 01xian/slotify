<?php include("includes/includedFiles.php");?>

<div class="userDetails">
	<div class="container borderBottom">
		<h2>EMAIL</h2>
		<input type="text" class="email" name="email" placeholder="電子郵件地址" value="<?php echo $userLoggedIn->getEmail(); ?>">
		<span class="message"></span>
		<button class="button" onclick="updateEmail('email')">儲存</button>		
	</div>

	<div class="container">
		<h2>密碼</h2>
		<input type="password" class="oldPassword" name="oldPassword" placeholder="請輸入當前使用的密碼" >
		<input type="password" class="newPassword1" name="newPassword1" placeholder="請輸入新設定的密碼" >
		<input type="password" class="newPassword2" name="newPassword2" placeholder="確認新輸入的密碼" >
		<span class="message"></span>
		<button class="button" onclick="updatePassword('oldPassword','newPassword1','newPassword2')">SAVE</button>	
	</div>
	
</div>