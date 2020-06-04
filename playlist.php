<?php include("includes/includedFiles.php");

if (isset($_GET['id'])){
	$playlistId = $_GET['id'];
}
else{
	header("Location: index.php");
}
$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());
?>
<div class="entityInfo">
	<div class="leftSection">
		<div class="playlistImage">
		<img src="assets/images/icons/playlist.png">	
		</div>
		
		
	</div>
	<div class="rightSection">
		<h2><?php echo $playlist->getName();?></h2>
		<p>建立者:<?php echo $playlist-> getOwner();?></p>
		<p>共<?php echo  $playlist-> getNumberOfSongs();?>首歌曲</p>
		<button class="button" onclick="deletePlaylist('<?php echo $playlistId;?>')">刪除播放清單</button>

	</div>
 	
</div>
<div class="tracklistContainer">
	<ul class="tracklist">

		<?php
		$songIdArray = $playlist->getSongIds();
		$i = 1;
        foreach($songIdArray as $songId ) {
        	$playlistSong = new Song($con, $songId);
        	$songArtist = $playlistSong->getArtist();

        	echo "<li class='tracklistRow'>

					<div class='trackCount'>
					   <img class='play' src='assets/images/icons/play.png' onclick='setTrack(\"" . $playlistSong->getId(). "\", temPlaylist, true)'>
					   <span class='trackNumber'>$i</span>
					</div>

					<div class='trackInfo'>
					<span class='trackName'>" . $playlistSong->getTitle() . "</span>
					<span class='artistName'>" . $songArtist ->getName() . "</span>
					</div>

				    <div class='trackOptions'>
					<input type='hidden' class='songId' value='" . $playlistSong->getId()."'>
					<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
					<span class='duration'>" . $playlistSong->getDuration() . "</span>
					</div>
 
        	      </li>";
        	      $i = $i + 1;
			
		}

		?>
		<script >
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			temPlaylist = JSON.parse(tempSongIds);
		</script>
		

	</ul>
</div>
<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
	<div class="item" onclick="removeFromPlaylist(this,'<?php echo $playlistId; ?>')">從清單中移除 </div>
</nav>

