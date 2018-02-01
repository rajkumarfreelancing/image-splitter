<?php
$file_with_path = "sample.jpg";
$rows = 3;
$cols = 3;
$size = getimagesize('sample.jpg');
$width = $size[0];
$height = $size[1];
$ext = image_type_to_extension($size[2], false);
/*echo $ext;
echo "<pre>";
var_dump($size);
echo "</pre>";*/
$tile_width = intval($width/$cols);
$tile_height = intval($height/$rows);
$dest = imagecreatetruecolor($tile_width, $tile_height);
if($ext === "png"){

} elseif($ext === "jpg" || $ext === "jpeg"){
	$src = imagecreatefromjpeg($file_with_path);
	imagecopy($dest, $src, 0, 0, 0, 0, $tile_width, $tile_height);
	$result = imagejpeg($dest, "tile1.jpeg");
	var_dump($result);
}
?>