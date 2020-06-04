<div id="navBarContainer">
	<nav class="navBar">
		
		<span  role="link" tabindex="0" onclick="openPage('index.php')" class="logo" >
			<img src="assets/images/icons/logo.png">
		</span>

		<div class="group">
			<div class="navItem">
				<span  role='link' tabindex='0' onclick='openPage("search.php")' class="navItemLink">
				搜尋  <!-- role='link'(告訴殘障人士這是link) tabindex='0'(按tab順序)都是給殘障人士用的 --> 
					<img src="assets/images/icons/search.png" class="icon" alt="搜尋"></span>			
				</div>
		</div>
		<div class="group">
			<div class="navItem">
				<span  role="link" tabindex="0" onclick="openPage('browse.php')"> 瀏覽</span>
			</div>
			<div class="navItem">
				<span  role="link" tabindex="0" onclick="openPage('yourMusic.php')"> 你的音樂</span>
			</div>
			<div class="navItem">
				<span  role="link" tabindex="0" onclick="openPage('settings.php')"> <?php echo $userLoggedIn->getFirstAndLastName(); ?> </span>
			</div>
		</div>
	</nav>

</div>