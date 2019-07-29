<?php

header('Content-type: image/jpg');
$old_path = __DIR__ . $_SERVER['IMG_URI'];

$size = getimagesize($old_path);
$width = isset($_GET['width']) ? $_GET['width'] : $size[0];
$pathInfo = pathinfo(substr($_SERVER['IMG_URI'], 13));
$cache_path = __DIR__ . '/cache-img/' . $pathInfo['dirname'] . DIRECTORY_SEPARATOR . $width;
$cache_path_with_file = __DIR__ . '/cache-img/' . $pathInfo['dirname'] . DIRECTORY_SEPARATOR . $width . DIRECTORY_SEPARATOR . $pathInfo['basename'];

function returnResizedImage($oldPath, $width, $cachedPathWithFile){
	try{
		$image = new Imagick($oldPath);
		$image->thumbnailImage($width, 0);
		$image->setImageCompressionQuality(20);

		file_put_contents($cachedPathWithFile, $image);
		return $image;
	}catch (ImagickException $exception){
		var_dump($exception);
	}
	return false;
}

if (file_exists($cache_path_with_file)) {
	$img = file_get_contents($cache_path_with_file);
} else {

	if (file_exists($old_path)) {

		if (file_exists($cache_path)) {

			if (!file_exists($cache_path_with_file)) {
				$img = returnResizedImage($old_path, $width, $cache_path_with_file);
			}
		} else {
			mkdir($cache_path, 0777, true);
			$img = returnResizedImage($old_path, $width, $cache_path_with_file);
		}//else
	} else {
		$img = file_get_contents(__DIR__ . '/img/no-img-big.png');
	}//else
}//else
echo $img;
