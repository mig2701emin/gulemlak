<?
function create_image($src_image, $dst_image,$prefix,$type,$width,$height) {
if($type=='image/gif'){
$src = imagecreatefromgif($src_image);
$extension ="gif";
}elseif($type=='image/png'){
$src = imagecreatefrompng($src_image);
$extension ="png";
}else{
$src = imagecreatefromjpeg($src_image);
$extension ="jpg";
}
if(empty($width) and empty($height)){
$sizes=getimagesize($src_image);
$width=$sizes[0];
$height=$sizes[1];
}
$dst = imagecreatetruecolor($width, $height);
imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
fit_image($src, $dst);
$newname=$dst_image.$prefix.".".$extension;
if($type=='image/gif'){
imagegif($dst,$newname); 
}elseif($type=='image/png'){
imagepng($dst,$newname);
}else{
imagejpeg($dst,$newname); 
}
	}
	function fit_image($src_image, $dst_image) {
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
if($img['tmp_name']!='' and $admin_kilit==0){
$SourceFile=$img['tmp_name'];
$DestinationFile=$yeni_isim;
if($img['type']=='image/gif'){
$fileType ="gif";
}elseif($img['type']=='image/png'){
$fileType ="png";
}else{
$fileType ="jpg";
}
 	create_image($SourceFile,$DestinationFile,"",$img['type'],$img_genislik,$img_yukseklik);	
}
?>