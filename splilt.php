<?php
$file_with_path = "sample.jpg";
$rows = 3;
$cols = 3;
$size = getimagesize('sample.jpg');
$width = $size[0];
$height = $size[1];
$ext = image_type_to_extension($size[2], false);
$tile_width = intval($width/$cols);
$tile_height = intval($height/$rows);

if($ext === "png"){

} elseif($ext === "jpg" || $ext === "jpeg"){
	$src = imagecreatefromjpeg($file_with_path);
	for($i=0; $i<$rows; $i++){
		for($j=0; $j<$cols; $j++){
			$dest = imagecreatetruecolor($tile_width, $tile_height);
			imagecopy($dest, $src, 0, 0, $j*$tile_width, $i*$tile_height, $tile_width, $tile_height);
			$result = imagejpeg($dest, "tile$i$j.jpeg");
			echo "<img src='tile$i$j.jpeg' style='border:1px solid black;' />";
		}
		echo "<br>";
	}
}
?>