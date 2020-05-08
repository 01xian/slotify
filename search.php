<?php 
include("includes/includedFiles.php");
if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']);/*解碼的動作,改善空白會變%20的問題*/

}
else{
	$term ="";
}

?>
<div class="searchContainer">
	<h4>Search for an artist, album or song</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing..." 
	onfocus="this.value = this.value" > 

</div>
<script>
	$(function(){
		
		$(".searchInput").keyup(function(){
			clearTimeout(timer);/*重新設定時間*/

			timer = setTimeout(function(){
				var val = $(".searchInput").val();
				openPage("search.php?term=" + val);
			},2000)/*2秒後執行第一格的方法*/
		})

		$(".searchInput").focus();
        var search = $(".searchInput").val();
        $(".searchInput").val('');
        $(".searchInput").val(search);
        /*上面四行是我上網查的，因為這一行onfocus="this.value = this.value無作用*/
        
	})

</script>

<?php  if($term == "") exit(); ?>
<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">

		<?php
		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");/* % means anything after it,打前面就可以*/
		if(mysqli_num_rows($songsQuery) == 0) {
			echo "<span class='noResults'>No songs found matching". $term ."</span>";
		}

		$songIdArray = array();
		$i = 1;
       while($row = mysqli_fetch_array($songsQuery)) {
       	if($i > 15){
       		break;
       	}
       	array_push($songIdArray, $row['id']);

       
          	$albumSong = new Song($con, $row['id']);
        	$albumArtist = $albumSong->getArtist();

        	echo "<li class='tracklistRow'>

					<div class='trackCount'>
					   <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId(). "\", temPlaylist, true)'>
					   <span class='trackNumber'>$i</span>
					</div>

					<div class='trackInfo'>
					<span class='trackName'>" . $albumSong->getTitle() . "</span>
					<span class='artistName'>" . $albumArtist ->getName() . "</span>
					</div>

					<div class='trackOptions'>
					<img class='optionsButton' src='assets/images/icons/more.png'>
					</div>

					<div class='trackDuration'>
					<span class='duration'>" . $albumSong->getDuration() . "</span>
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
<div class="artistsContainer borderBottom">
	<h2>ARTISTS</h2>
	<?php
	$artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '%$term%' LIMIT 10");

	if(mysqli_num_rows($songsQuery) == 0) {
	  echo "<span class='noResults'>No artists found matching". $term ."</span>";
		}
		while($row = mysqli_fetch_array($artistsQuery)) {
			$artistFound = new Artist($con, $row['id']);
			echo"<div class='searchResultRow'>
			          <div class='artistName'>
			          <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
			          "
			          .$artistFound->getName().
			          "

			          </span>
			          </div>

			    </div>";

		
}
	?>
	
</div>  

<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	
	<?php
	$albumQuery = mysqli_query($con,"SELECT * FROM albums WHERE title LIKE '%$term%' LIMIT 10");
	if(mysqli_num_rows($albumQuery) == 0) {
	  echo "<span class='noResults'>No artists found matching". $term ."</span>";
		}
	while($row = mysqli_fetch_array ($albumQuery)) {
		echo "<div class='gridViewItem'>
				<span  role='link' tabindex='0' onclick='openPage(\"album.php?id=". $row['id']. "\")'> 
					<img src='".$row['artworkPath']."'>
					<div class='gridViewInfo'>"
					.$row['title']
					." </div>
				</span>
			  </div>";
	}
?>



</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            