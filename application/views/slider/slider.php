<style>
	.Abdelzaher-slider .item:nth-child(1){
		background-image: url(<?php echo LINK.'/'.$data[0]['Book']['thumbnail_address'] ?>);
		background-color: rgb(224, 26, 26);;
		/* background-position: top; */
		background-repeat: no-repeat;
		background-size: auto 150%; 
	}
	.Abdelzaher-slider .item:nth-child(2){
		background-image: url(<?php echo LINK.'/'.$data[1]['Book']['thumbnail_address'] ?>);
		background-color: rgb(224, 26, 26);;
		background-repeat: no-repeat;
		background-size: auto 150%; 
	}
	.Abdelzaher-slider .item:nth-child(3){
		background-image: url(<?php echo LINK.'/'.$data[2]['Book']['thumbnail_address'] ?>);
		background-color: rgb(224, 26, 26);;
		background-repeat: no-repeat;
		background-size: auto 150%; 
	}
</style>
<div class="Abdelzaher-slider" data-change="60000"> <!-- write number in data-change to start the change or "none" to stop the change -->

	<div class="item active">
		<button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[0]['Book']['book_id'] ?>';">Read more</button><br>
		<h1 class="example"><?php echo $data[0]["Book"]["title"]; ?></h1> <!-- This an example  you can remove it in any time -->
	</div>
	<div class="item">
		<button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[1]['Book']['book_id'] ?>';">Read more</button><br>
		<h1 class="example"><?php echo $data[1]["Book"]["title"]; ?></h1> <!-- This an example  you can remove it in any time -->
	</div>
	<div class="item">
		<button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[2]['Book']['book_id'] ?>';">Read more</button><br>
		<h1 class="example"><?php echo $data[2]["Book"]["title"]; ?></h1> <!-- This an example  you can remove it in any time -->
	</div>
	

	<div class="controls"></div>
	<div class="controlsButtons">
		<button class="prev"><i class="fa fa-chevron-left"></i></button>
		<button class="next"><i class="fa fa-chevron-right"></i></button>
	</div>

	<audio class="sound"></audio>

</div>