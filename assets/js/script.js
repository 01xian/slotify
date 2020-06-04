var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;/*MouseDown 發生於使用者按下滑鼠按鈕;當使用者放開滑鼠按鈕時，就會發生 MouseUp。*/
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(document).click(function(click) {
	var target = $(click.target);

	if(!target.hasClass("item") && !target.hasClass("optionsButton")) {
		hideOptionsMenu();
	}
})

$(window).scroll(function(){
	hideOptionsMenu();
})

$(document).on("change","select.playlist", function(){
	var select = $(this);/*這樣才可傳到下面ajax的function裡,不然function裡的this會等於error*/
	var playlistId = select.val();
	var songId = select.prev(".songId").val();/*from Playlist.php & album.php*/

	$.post("includes/handlers/ajax/addToPlaylist.php", {playlistId: playlistId,songId: songId })
	.done(function(error) {

	  if(error != "") {
		alert(error);
		return;
	}
		hideOptionsMenu();
		select.val("");

	});

	});

function updateEmail(emailClass){
	var emailValue = $("." + emailClass).val();
	$.post("includes/handlers/ajax/updateEmail.php",{email:emailValue, username: userLoggedIn})
	.done(function(response){
		$("."+emailClass).nextAll(".message").text(response);
	})

}

function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2){
	var oldPassword = $("." + oldPasswordClass).val();
	var newPassword1 = $("." + newPasswordClass1).val();
	var newPassword2 = $("." + newPasswordClass2).val();
	$.post("includes/handlers/ajax/updatePassword.php",
		{oldPassword: oldPassword,
		 newPassword1:newPassword1,
		 newPassword2:newPassword2,
		 username: userLoggedIn})
	.done(function(response){
		$("."+oldPasswordClass).nextAll(".message").text(response);
	})

}
function logout(){
	$.post("includes/handlers/ajax/logout.php",function(){
		location.reload();
	})
}

function openPage(url) {
	if (timer != null) {
		clearTimeout(timer);
	}

	if(url.indexOf("?") == -1) {
		/*如果url裡面不存在"?"，不存在的話indexOf會等於-1*/
		url = url + "?";
	}
	var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
	$("#mainContent").load(encodedUrl);
	$("body").scrollTop(0);/*改變頁面時會自動捲到上面*/
	history.pushState(null, null, url);
	/*(有歷史紀錄)且通过pushState可改变URL而不刷新页面 
	(change pages without reload the page)(會讓網址有變化，但不會真的去載入) */
}

function removeFromPlaylist(button, playlistId) {
	var songId = $(button).prevAll(".songId").val();
	$.post("includes/handlers/ajax/removeFromPlaylist.php",{ playlistId: playlistId, songId: songId})
    .done(function(error) {
	//js裡不能用mysql所以要用ajax
	//do something when ajax returns
     
     	hideOptionsMenu();
		alert(error);
		openPage("playlist.php?id=" + playlistId);

		});


}

function createPlaylist() {
	console.log(userLoggedIn);
	var popup = prompt("請輸入歌單名稱");
	if(popup != null) {
		$.post("includes/handlers/ajax/createPlaylist.php",{ name:popup, username: userLoggedIn})
		.done(function(error){
			//js裡不能用mysql所以要用ajax
			//do something when ajax sreturns
			if(error = null) {
				alert(error);
				return;
			}
		  openPage("yourMusic.php");
		
		})
	}

}

function deletePlaylist(playlistId){
	var prompt = confirm("Are you sure you want to delete this playlist?");
	if(prompt == true) {
	$.post("includes/handlers/ajax/deletePlaylist.php",{ playlistId: playlistId})
    .done(function(error){
	//js裡不能用mysql所以要用ajax
	//do something when ajax returns
	if(error != "") {
		alert(error);
		return;
	}
	openPage("yourMusic.php");

		});
	}
}

function hideOptionsMenu(){
	var menu = $(".optionsMenu");
	if(menu.css("display") != "none") {
		menu.css("display","none");
	}
}

function showOptionsMenu(button){
	var songId = $(button).prevAll(".songId").val();
	var menu = $(".optionsMenu");
	var menuWidth = menu.width();
	menu.find(".songId").val(songId);

	var scrollTop = $(window).scrollTop();//Distance fromtop of window to top of document(網頁卷軸到最上端網頁的距離有多少)
	var elementOffset = $(button).offset().top;//Distance from top of document
	var top = elementOffset - scrollTop;
	var left = $(button).position().left;
	menu.css({"top": top + "px", "left": left - menuWidth + "px", "display":"inline"});

}




function formatTime(seconds){
	var time = Math.round(seconds);/*四捨五入*/
	var minutes = Math.floor(time / 60);/*無條件捨去*/
	var seconds = time - (minutes * 60);

	var extraZero;
	if(seconds < 10) {
			extraZero = "0";
		}
		else {
			extraZero = "";
		}
		/* 另一方法 var extraZero = (seconds < 10) ? "0" : ""; */

	return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));
	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");/*音樂播放進度條*/

}

function playFirstSong(){
	setTrack(tempPlaylist[0], tempPlaylist, true);
}

function updateVolumeProgressBar(audio) {
	var volume = audio.volume * 100;/*音量值是介於0~1所以 * 100變成percent*/
	$(".volumeBar .progress").css("width", volume + "%");

}

function Audio() {

	this.currentlyPlaying;
	this.audio = document.createElement('audio');/*創建 HTML標籤<audio>*/
	this.audio.addEventListener("ended",function(){
		nextSong();
	})

	this.audio.addEventListener("canplay", function(){
		//'this' refers to the object that the event was called on
		var duration = formatTime(this.duration);
		$('.progressTime.remaining').text(duration); 
	});

	this.audio.addEventListener("timeupdate", function(){
		if (this.duration) {
			updateTimeProgressBar(this);

		}
		// updateLyric(this);
		// getLyric(this);
		// updateTime(this) ;
		


	});
	this.audio.addEventListener("volumechange",function() {
		updateVolumeProgressBar(this);

	});


	this.setTrack = function(track) {
		this.currentlyPlaying = track;
		this.audio.src = track.path;
	}
	this.play = function() {
		this.audio.play();
	}

	this.pause = function() {
		this.audio.pause();
	}
	this.setTime = function(seconds) {
		this.audio.currentTime = seconds;
	}
	
	this.getTime = function(){

		return this.audio.currentTime;
	}

}