<?php
include("includes/includedFiles.php");
?>


<script>


function updateTime(audio) {
	$(".aaa #time").text(audio.currentTime);
	$(".aaa #songId").text(audioElement.currentlyPlaying.id);	}


	function updateLyric(audio) {
		if(audio.currentTime >= 33+0.000000){
			$("#a1").show();
         	}
        if(audio.currentTime >= 33 + 9.000000){
			$("#a2").show();
         	}
        if(audio.currentTime >= 33 + 14.000000){
			$("#a3").show();
         	}
        if(audio.currentTime >= 33 + 22.000000){
			$("#a4").show();
         	}
        if(audio.currentTime >= 33 + 25.000000){
			$("#a5").show();
         	}
        if(audio.currentTime >= 33 + 27.000000){
			$("#a6").show();
         	}

        if(audio.currentTime >= 33 + 30.000000){
			$("#a7").show();
         	}
        if(audio.currentTime >= 33 + 30.500000){
			$("#a8").show();
         	}
        if(audio.currentTime >= 33 + 31.000000){
			$("#a9").show();
         	}
        if(audio.currentTime >= 33 + 42.000000){
			$("#b0").show();
         	}
        if(audio.currentTime >= 33 + 50.000000){
			$("#b1").show();
         	}
        if(audio.currentTime >= 33 + 58.000000){
			$("#b2").show();
         	}
        if(audio.currentTime >= 33 + 61.000000){
			$("#b3").show();
         	}
        if(audio.currentTime >= 33 + 63.000000){
			$("#b4").show();
         	}
        if(audio.currentTime >= 33 + 64.000000){
			$("#b5").show();
         	}

        if(audio.currentTime >= 36 + 67.000000){
			$("#b6").show();
         	}
        if(audio.currentTime >= 36 + 74.000000){
			$("#b7").show();
         	}
        if(audio.currentTime >= 36 + 77.000000){
			$("#b8").show();
         	}
        if(audio.currentTime >= 36 + 79.000000){
			$("#b9").show();
         	}
            if(audio.currentTime >= 36 + 81.000000){
			$("#c0").show();
         	}
        if(audio.currentTime >= 36 + 84.000000){
			$("#c1").show();
         	}
        if(audio.currentTime >= 36 + 87.000000){
			$("#c2").show();
         	}
        if(audio.currentTime >= 36 + 92.000000){
			$("#c3").show();
         	}
        if(audio.currentTime >= 36 + 94.000000){
			$("#c4").show();
         	}
        if(audio.currentTime >= 36 + 98.000000){
			$("#c5").show();
         	}

        if(audio.currentTime >= 36 + 109.000000){
			$("#c6").show();
         	}
        if(audio.currentTime >= 36 + 130.000000){
			$("#c7").show();
         	}
        if(audio.currentTime >= 36 + 137.000000){
			$("#c8").show();
         	}
        if(audio.currentTime >= 36 + 145.000000){
			$("#c9").show();
         	}
                  if(audio.currentTime >= 36 + 147.000000){
			$("#d0").show();
         	}
        if(audio.currentTime >= 36 + 151.000000){
			$("#d1").show();
         	}
        if(audio.currentTime >= 36 + 153.000000){
			$("#d2").show();
         	}
        if(audio.currentTime >= 36 + 159.000000){
			$("#d3").show();
         	}
        if(audio.currentTime >= 36 + 162.000000){
			$("#d4").show();
         	}
        if(audio.currentTime >= 36 + 164.000000){
			$("#d5").show();
         	}

        if(audio.currentTime >= 36 + 166.000000){
			$("#d6").show();
         	}
        if(audio.currentTime >= 36 + 168.000000){
			$("#d7").show();
         	}
        if(audio.currentTime >= 36 + 171.000000){
			$("#d8").show();
         	}
        if(audio.currentTime >= 36 + 173.000000){
			$("#d9").show();
         	}
        if(audio.currentTime >= 36 + 174.000000){
			$("#d9").show();
         	}
        if(audio.currentTime >= 36 + 176.000000){
			$("#e1").show();
         	}
        if(audio.currentTime >= 36 + 178.000000){
			$("#e2").show();
         	}
        if(audio.currentTime >= 36 + 180.000000){
			$("#e3").show();
         	}
        if(audio.currentTime >= 36 + 187.000000){
			$("#e4").show();
         	}


        

	}


</script>
<body>
	<div class="lyric">
		<div class="word" id="a1">書裡總愛寫到喜出望外的傍晚</div>
		<div class="word" id="a2">騎的單車還有他和她的對談</div>
		<div class="word" id="a3">女孩的白色衣裳男孩愛看她穿</div>
		<div class="word" id="a4">好多橋段</div>
		<div class="word" id="a5">好多都浪漫</div>
		<div class="word" id="a6">好多人心酸</div>
		<div class="word" id="a7">好聚好散</div>
		<div class="word" id="a8">好多天都看不完</div>
		<div class="word" id="a9">剛才吻了你一下你也喜歡對嗎</div>
		<div class="word" id="b0">不然怎麼一直牽我的手不放</div>
		<div class="word" id="b1">你說你好想帶我回去你的家鄉</div>
		<div class="word" id="b2">綠瓦紅磚</div>
		<div class="word" id="b3">柳樹和青苔</div>
		<div class="word" id="b4">過去和現在</div>
		<div class="word" id="b5">都一個樣</div>
		<div class="word" id="b6">你說你也會這樣</div>
		<div class="word" id="b7">慢慢喜歡你</div>
		<div class="word" id="b8">慢慢的親密</div>
		<div class="word" id="b9">慢慢聊自己</div>
		<div class="word" id="c0">慢慢和你走在一起</div>
		<div class="word" id="c1">慢慢我想配合你</div>
		<div class="word" id="c2">慢慢把我給你</div>
		<div class="word" id="c3">慢慢喜歡你</div>
		<div class="word" id="c4">慢慢的回憶</div>
		<div class="word" id="c5">慢慢的陪你慢慢的老去</div>
		<div class="word" id="c6">因為慢慢是個最好的原因</div>
		<div class="word" id="c7">晚餐後的甜點就點你喜歡的吧</div>
		<div class="word" id="c8">今晚就換你去床的右邊睡吧</div>
		<div class="word" id="c9">這次旅行我還想去上次的沙灘</div>
		<div class="word" id="d0">球鞋手錶</div>
		<div class="word" id="d1">襪子和襯衫都已經燙好</div>
		<div class="word" id="d2">放行李箱</div>
		<div class="word" id="d3">早上等著你起床</div>
		<div class="word" id="d4">慢慢喜歡你</div>
		<div class="word" id="d5">慢慢的親密</div>
		<div class="word" id="d6">慢慢聊自己</div>
		<div class="word" id="d7">慢慢和你走在一起</div>
		<div class="word" id="d8">慢慢我想配合你</div>
		<div class="word" id="d9">慢慢把我給你</div>
		<div class="word" id="e0">慢慢喜歡你</div>
		<div class="word" id="e1">慢慢的回憶</div>
		<div class="word" id="e2">慢慢的陪你慢慢的老去</div>
		<div class="word" id="e3">因為慢慢是個最好的原因</div>
		<div class="word" id="e4">書裡總愛寫到喜出望外的傍晚</div>
	</div>
</body>

