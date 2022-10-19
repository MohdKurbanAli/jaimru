<?php
session_start();
$captchaCode = '';
$captchaImageHeight = 50;
$captchaImageWidth = 130;
$totalCharactersOnImage = 6; 
$possibleCaptchaLetters = 'abcdefghhkmnopqrstuvwxyz98765432';
$captchaFont = 'monofont.ttf'; 
$randomCaptchaDots = 50;
$randomCaptchaLines = 25;
$captchaTextColor = "a94442";
$captchaNoiseColor = "a94442"; 
$characterCount = 0;
while ($characterCount < $totalCharactersOnImage) { 
	$captchaCode .= substr($possibleCaptchaLetters, mt_rand(0, strlen($possibleCaptchaLetters)-1), 1);
	$characterCount++;
} 
$captchaFont_size = $captchaImageHeight * 0.65;
$captchaImage = @imagecreate(
	$captchaImageWidth,
	$captchaImageHeight
); 
$backgroundColor = imagecolorallocate(
 $captchaImage,
 255,
 255,
 255
); 
$arrayTextColor = hextorgb($captchaTextColor);
$captchaTextColor = imagecolorallocate(
 $captchaImage,
 $arrayTextColor['red'],
 $arrayTextColor['green'],
 $arrayTextColor['blue']
); 
$arrayNoiseColor = hextorgb($captchaNoiseColor);
$imageNoiseColor = imagecolorallocate(
 $captchaImage,
 $arrayNoiseColor['red'],
 $arrayNoiseColor['green'],
 $arrayNoiseColor['blue']
); 
for( $captchaDotsCount=0; $captchaDotsCount<$randomCaptchaDots; $captchaDotsCount++ ) {
imagefilledellipse(
	 $captchaImage,
	 mt_rand(0,$captchaImageWidth),
	 mt_rand(0,$captchaImageHeight),
	 2,
	 3,
	 $imageNoiseColor
 );
}
for( $captchaLinesCount=0; $captchaLinesCount<$randomCaptchaLines; $captchaLinesCount++ ) {
	imageline(
		$captchaImage,
		mt_rand(0,$captchaImageWidth),
		mt_rand(0,$captchaImageHeight),
		mt_rand(0,$captchaImageWidth),
		mt_rand(0,$captchaImageHeight),
		$imageNoiseColor
	);
} 
$text_box = imagettfbbox(
	$captchaFont_size,
	0,
	$captchaFont,
	$captchaCode
); 
$x = ($captchaImageWidth - $text_box[4])/2;
$y = ($captchaImageHeight - $text_box[5])/2;
imagettftext(
	$captchaImage,
	$captchaFont_size,
	0,
	$x,
	$y,
	$captchaTextColor,
	$captchaFont,
	$captchaCode
); 
header('Content-Type: image/jpeg'); 
imagejpeg($captchaImage); 
imagedestroy($captchaImage);
$_SESSION['captchaCode'] = $captchaCode; 
function hextorgb ($hexstring){
	$integar = hexdec($hexstring);
	return array(
		"red" => 0xFF & ($integar >> 0x10),
		"green" => 0xFF & ($integar >> 0x8),
		"blue" => 0xFF & $integar
	);
}
?>