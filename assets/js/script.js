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
	history.pushState(null, null, url);/*(有歷史紀錄)且通过pushState可改变URL而不刷新页面 
	(change pages without reload the page)(會讓網址有變化，但不會真的去載入) */
}
function createPlaylist() {
	console.log(userLoggedIn);
	var popup = prompt("Please enter the name of your playlist");
	if(popup != null) {
		$.post("includes/handlers/ajax/createPlaylist.php",{ name:popup, username: userLoggedIn})
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