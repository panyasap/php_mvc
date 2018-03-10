<?php
$url = "https://s3-ap-southeast-1.amazonaws.com/ysetter/media/video-search.json";
$result = json_decode(file_get_contents($url), true);

$count_items = count($result["items"]);

?>
<div class="container" style="margin: auto;width:70%;" >
	<input type="text" style="width:100%;" class="form-control" placeholder="Enter text for search" />
</div>
<div class="container"style="margin-top:30px;">
	<div style="text-align:center;"><h5 class="bg-primary" style="color:white;">ผลการค้นหาจำนวน : <?php echo $count_items; ?> รายการ</h5></div>
<?php 
	$row = 0;
for($i=0; $i < $count_items; $i++){ 
	If(isset($result["items"][$i]["id"]["videoId"])){
		$row++;
		$video = "https://www.youtube.com/embed/".$result["items"][$i]["id"]["videoId"];
		$thumnail =  $result["items"][$i]["snippet"]["thumbnails"]["default"]["url"];
		$title = $result["items"][$i]["snippet"]["title"];
		$channel = $result["items"][$i]["snippet"]["channelTitle"];
		$column = 3;
?>		
		
		<?php if($row%$column == 1){ ?>
			<div class="row">
		<?php } ?>
				<div class="col-4">
					<table class="table">
						<tr style="height:5.5em;vertical-align:top;">
							<td>
								<h6 ><?php echo $title ?></h6>
							<td>
						</tr>
						<tr>
							<td>
								<iframe class="align-self-start mr-3" src="<?php echo $video; ?>" ></iframe>
							<td>
						</tr>
						<tr style="height:1em;vertical-align:top;">
							<td>
								<dd><?php echo  $channel; ?></dd>
							<td>
						</tr>
					</table>						
				</div>
		<?php if($row%$column == 0){ ?>
			</div>
		<?php } ?>
	<?php }
} ?>
</div>
