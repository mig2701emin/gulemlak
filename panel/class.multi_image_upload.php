<?
$temp_multi = "../image_temp/";
function create_image_multi($src_image, $dst_image,$prefix,$type,$width,$height,$enableWm) {
global $watermark;
if($type=='gif'){
$src = imagecreatefromgif($src_image);
}elseif($type=='png'){
$src = imagecreatefrompng($src_image);
}else{
$src = imagecreatefromjpeg($src_image);
}
$dst = imagecreatetruecolor($width, $height);
imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
fit_image_multi($src, $dst);
if($enableWm==1){
if(strlen($watermark)<=20){
$spacing=30;
}else{
$spacing=0;
}
$width_wt=$width-(strlen($watermark)*19)-$spacing;
$height_wt=$height-15;
$black = imagecolorallocate($dst, 0, 0, 0);
$white = imagecolorallocate($dst, 255, 255, 255);
imagettftext($dst, 30, 0, $width_wt, $height_wt, $black, "Font/arial.ttf", $watermark);
imagettftext($dst, 30, 0, $width_wt+1, $height_wt+1, $white, "Font/arial.ttf", $watermark);
}
$newname=$dst_image.$prefix.".".$type;
imagejpeg($dst,$newname); 
	}
	function fit_image_multi($src_image, $dst_image) {
    $src_width = imagesx($src_image);
    $src_height = imagesy($src_image);
 
    $dst_width = imagesx($dst_image);
    $dst_height = imagesy($dst_image);
 
    $new_width = $dst_width;
    $new_height = round($new_width*($src_height/$src_width));
    $new_x = 0;
    $new_y = round(($dst_height-$new_height)/2);
	
        $next = $new_height > $dst_height;
    if ($next) {
        $new_height = $dst_height;
        $new_width = round($new_height*($src_width/$src_height));
        $new_x = round(($dst_width - $new_width)/2);
        $new_y = 0;
    }
    imagecopyresampled($dst_image, $src_image , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
	}
if($admin_kilit==0){
for($i = 0; $i <= 20; $i++){
$img_multi[$i]=$_POST["uploader_".$i."_tmpname"];
if($img_multi[$i]!=''){
$SourceFile_multi[$i]=$temp_multi.$img_multi[$i];
$DestinationFile_multi[$i]=$yeni_isim_multi."_".$i;
$explodeFile_multi[$i]=explode(".",$SourceFile_multi[$i]);
$fileType_multi[$i]=$explodeFile_multi[$i][3];
 	create_image_multi($SourceFile_multi[$i],$DestinationFile_multi[$i],"",$fileType_multi[$i],"580","400",1);	
}
}
}
?>