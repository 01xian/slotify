<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array();
while($row = mysqli_fetch_array($songQuery)) {
	array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>
	
	$(document).ready(function() {
		var newPlaylist = <?php echo $jsonArray; ?>;
		audioElement = new Audio();
		setTrack(newPlaylist[0],newPlaylist,false);
		updateVolumeProgressBar(audioElement.audio);

		$("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e){
			/*on後面可接很多事件*/
			e.preventDefault();/*阻止預設事件發生，這邊是指反白*/

		});

		$(".playbackBar .progressBar").mousedown(function() {
			mouseDown = true;
		});

		$(".playbackBar .progressBar").mousemove(function(e) {
		if(mouseDown == true) {
		//Set time of song, depending on position of mouse
		   timeFromOffset(e,this) ;
	     }

		});

		$(".playbackBar .progressBar").mouseup(function(e) {
		   timeFromOffset(e,this) ;
		   });

        
        $(".volumeBar .progressBar").mousedown(function() {
			mouseDown = true;
		});

		$(".volumeBar .progressBar").mousemove(function(e) {
			if(mouseDown == true){
		    var percentage = e.offsetX / $(this).width();
		    if(percentage >= 0 && percentage <= 1) {
		    	audioElement.audio.volume = percentage;
		    }
		    }  
	     }

		);

		$(".volumeBar .progressBar").mouseup(function(e) {
			var percentage = e.offsetX / $(this).width();
		    if(percentage >= 0 && percentage <= 1) {
		    	audioElement.audio.volume = percentage;
		    }  
	     }
		);

		$(document).mouseup(function() {
			mouseDown = false;
		});
			
		
    });

	function timeFromOffset(mouse, progressBar) {
		var percentage = mouse.offsetX / $(progressBar).width() * 100;
		var seconds =audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds);
	}
	function prevSong() {
		if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
			audioElement.setTime(0);
		}
		else {
			currentIndex = currentIndex - 1;
			setTrack(currentPlaylist[currentIndex],currentPlaylist,true);


		}

	};

	function nextSong() {
		if(repeat == true) {
			audioElement.setTime(0);
			playSong();
			return;
		}
		if(currentIndex == currentPlaylist.length-1) {
			currentIndex = 0;
		}
		else {
			currentIndex++;
		}
		var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
		setTrack(trackToPlay,currentPlaylist,true);


	}

	function setRepeat() {
		repeat = !repeat;/*true的話變false,false的話變true。(本來是開按一下變關,本來是關按一下變開)*/
		var imageName = repeat ? "repeat-active.png" : "repeat.png"; /*repeat=true,imageName="?"後面。repeat=false,imageName=":"後面。(按一下變色)*/
		$(".controlButton.repeat img").attr("src","assets/images/icons/" + imageName);
	}
	function setMute() {
		/*mute靜音*/
		audioElement.audio.muted = !audioElement.audio.muted;
		var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
		$(".controlButton.volume img").attr("src" , "assets/images/icons/" + imageName);
	}

	function setShuffle() {
		shuffle = ! shuffle;
		var imageName = shuffle ? "shuffle-active.png" : "shuffle.png";
		$(".controlButton.shuffle img").attr("src" , "assets/images/icons/" + imageName);

		if(shuffle == true) {
			//Randomize playlist
			shuffleArray(shufflePlaylist);
			currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id)/*找出現在正在撥的歌在shufflePlaylist裡的索引*/
		}
		else{
			//shuffle has been deactivated
			//go back to regular playist
			currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id)/*找出現在正在撥的歌在currentPlaylist裡的索引*/
		}

	}
	function shuffleArray(a) {
	    var j, x, i;
	    for (i = a.length - 1; i > 0; i--) {
	        j = Math.floor(Math.random() * (i + 1));
	        x = a[i];
	        a[i] = a[j];
	        a[j] = x;
	    }
	    return a;
	    }/*google shuffle array javascript*/

	function setTrack(trackId,newPlaylist,play){
		if(newPlaylist != currentPlaylist) {
			currentPlaylist = newPlaylist;
			shufflePlaylist = currentPlaylist.slice();/*slice複製一個currentPlaylist給shuffePlaylist做使用，這樣聽歌時隨時都有兩種選擇，shuffle&current*/
			shuffleArray(shufflePlaylist);
		}/*正在撥一首歌又跑去另一專輯撥歌就會有newPlaylist*/
		if(shuffle == true) {
			currentIndex = shufflePlaylist.indexOf(trackId);
		}
		else{
				currentIndex = currentPlaylist.indexOf(trackId);
			}

		pauseSong();
		$.post("includes/handlers/ajax/getSongJson.php", { songId: trackId },function(data) {
			//不能在javascipt裡呼叫php所以要用Ajax
			// AJAX應用可以僅向伺服器傳送並取回必須的資料,不用傳一整個頁面
			/*.post()裡第三格裡面的data來自第一格url裡echo的東西*/
			/*newPlaylist接下來準備要撥放的歌*/

			var track = JSON.parse(data);/*把JSON 字串變為JavaScript 物件*/
			$(".trackName span").text(track.title);/*左下出現正在播放歌名*/

			$.post("includes/handlers/ajax/getArtistJson.php", { artistId:track.artist },function(data) {
				var artist = JSON.parse(data);
				$(".trackInfo .artistName span").text(artist.name);
				$(".trackInfo .artistName span").attr("onclick", "openPage('artist.php?id=" + artist.id + "')");
			});

				$.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album },function(data) {
				var album = JSON.parse(data);
				$(".content .albumLink img").attr("src", album.artworkPath);
				/*在img裡加src屬性*/
				$(".content .albumLink img").attr("onclick", "openPage('album.php?id=" + album.id + "')");
				$(".trackInfo .trackName span").attr("onclick", "openPage('album.php?id=" + album.id + "')");
			});
		
		
			audioElement.setTrack(track);/*這裡的setTrack來自class Audio(script.js)*/
			if(play == true) {
			playSong();
		}
		
		});
	
		
		
		
	}

	function playSong(){
		if(audioElement.audio.currentTime == 0){
			$.post("includes/handlers/ajax/updatePlays.php",{ songId: audioElement.currentlyPlaying.id});
	
		}
		$(".controlButton.play").hide();
		/*.controlButton和.play中間不能有空隙,因為他們倆個是同一個，如果有空隙會變成.controlButton裡的.play*/
		$(".controlButton.pause").show();
		audioElement.play();
	}
	function pauseSong(){
		$(".controlButton.play").show();
		$(".controlButton.pause").hide();
		audioElement.pause();
	}



</script>

<div id="nowPlayingBarContainer">
 <div id="nowPlayingBar">
	<div id="nowPlayingLeft">
		<div class="content">
			<span class="albumLink">
				<img role="link" tabindex="0" src="" class="albumArtwork">
			</span>
			<div class="trackInfo">
				<span class="trackName">
					<span role="link" tabindex="0"></span>
				</span>

				<span class="artistName">
					<span role="link" tabindex="0"></span>
				</span>
			</div>
		</div>
	</div>
	<div id="nowPlayingCenter">
		<div class="content playerControls">
			<div class="buttons">
				<button class="controlButton shuffle" title="Shuffle button">
					<img src="assets/images/icons/Shuffle.png" alt="Shuffle" onclick="setShuffle()">
				</button>

				<button class="controlButton previous" title="previous button" onclick="prevSong()">
					<img src="assets/images/icons/previous.png" alt="previous">
				</button>

				<button class="controlButton play" title="play button" onclick="playSong()">
					<img src="assets/images/icons/play.png" alt="play">
				</button>

				<button class="controlButton pause" title="pause button" style="display: none;" onclick="pauseSong()">
					<img src="assets/images/icons/pause.png" alt="pause">
				</button>

				<button class="controlButton next" title="next button" onclick="nextSong()">
					<img src="assets/images/icons/next.png" alt="next">
				</button>

				<button class="controlButton repeat" title="repeat button" onclick="setRepeat()">
					<img src="assets/images/icons/repeat.png" alt="repeat">
				</button>
			</div>
			<div class="playbackBar">
				<span class="progressTime current">0.00</span>
				<div class="progressBar">
					<div class="progressBarBg">
						<div class="progress"></div>
					
				</div>
					
				</div>

				<span class="progressTime remaining">0.00</span>
			</div>
			
		</div>
		
	</div>
	<div id="nowPlayingRight">
		<div class="volumeBar ">
			<button class="controlButton volume" title="Volume button" onclick="setMute()">
				<img src="assets/images/icons/volume.png" alt="Volume">
			</button>

			<div class="progressBar">
				<div class="progressBarBg">
					<div class="progress"></div>
				</div>	
			</div>

		</div>
		
	</div>
	
  </div>
</div>